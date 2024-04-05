<?php
// session_start();
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/danhgia.php");
require("../../model/donhang.php");
require("../../model/traloidanhgia.php");

// Biến $isLogin cho biết người dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);
// Kiểm tra hành động $action: yêu cầu đăng nhập nếu chưa xác thực
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} elseif ($isLogin == FALSE) {
    $action = "dangnhap";
    // } 
    // elseif($_SESSION["nguoidung"]["MaQ"] == 2){
    //     header("Location:../../public/");
} else {
    $action = "macdinh";
}
$nd = new NGUOIDUNG();
$q = new QUYEN();
$dg = new DANHGIA();
$dh = new DONHANG();
$tl = new TRALOIDANHGIA();
switch ($action) {
    case "macdinh":
        $donhang = $dh->laydanhsachdonhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        $danhgia = $dg->laydanhsachdanhgia();

        $thanght = date("m");
        $namht = date("Y");
        // Tính tổng doanh thu theo tháng
        $tongdt_thanght = 0;
        foreach ($donhang as $d) {
            $thangdh = date('m', strtotime($d['NgayGiaoHang']));
            if ($thangdh == $thanght) {
                $tongdt_thanght += $d["TongTien"];
            }
        }
        // Tính tổng doanh thu theo năm
        $tongdt_namht = 0;
        foreach ($donhang as $d) {
            $namdh = date('Y', strtotime($d['NgayGiaoHang']));
            if ($namdh == $namht) {
                $tongdt_namht += $d["TongTien"];
            }
        }
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        include("main.php");
        break;
    case "chuyentrang":
        header("Location:../../public/index.php");
        break;
    case "hoso":
        if (isset($_GET["id"])) {
            $nguoidung_ht = $nd->laynguoidungtheoid($_GET["id"]);
            $danhgia = $dg->laydanhsachdanhgia();
            $traloidanhgia = $tl->laydanhsachtraloidanhgia();
            // Đánh giá chưa được phản hồi 
            $luotdg = 0;
            foreach ($traloidanhgia as $tl) {
                if ($tl["TraLoi"] == null) {
                    $luotdg = $luotdg + 1;
                }
            }
            include("profile.php");
        }
        // include("profile.php");
        break;
    case "luuhoso":

        // gán dữ liệu từ form
        $sua = new NGUOIDUNG();
        $sua->setMaND($_POST["MaND"]);
        $sua->setTrangThai($_POST["TrangThai"]);
        $sua->setMaQ($_POST["MaQ"]);
        $sua->setHoTen($_POST["txthoten"]);
        $sua->setDiaChi($_POST["txtdiachi"]);
        $sua->setSdt($_POST["sdt"]);
        $sua->setTenDangNhap($_POST["txttendn"]);
        $sua->setMatKhau($_POST["txtmk"]);
        $sua->setHinhAnh($_POST["hinhanh"]);

        if ($_FILES["filehinhanh"]["name"] != "") {
            //xử lý load ảnh
            $hinhanh = basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
            $sua->sethinhanh($hinhanh);
            $duongdan = "../../img/user/" . $hinhanh; //nơi lưu file upload
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
            $_SESSION["nguoidung"]["HinhAnh"] = $hinhanh; // Cập nhật hình ảnh mới vào session
        }
        // sửa
        $nd->suanguoidung($sua);
        // Sau khi lưu thành công, cập nhật thông tin hình ảnh mới vào session.
        $hoten = $_POST["txthoten"];
        $_SESSION["nguoidung"]["HoTen"] = $hoten;
        // load danh sách
        $donhang = $dh->laydanhsachdonhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        $danhgia = $dg->laydanhsachdanhgia();

        $thanght = date("m");
        $namht = date("Y");
        // Tính tổng doanh thu theo tháng
        $tongdt_thanght = 0;
        foreach ($donhang as $d) {
            $thangdh = date('m', strtotime($d['NgayGiaoHang']));
            if ($thangdh == $thanght) {
                $tongdt_thanght += $d["TongTien"];
            }
        }
        // Tính tổng doanh thu theo năm
        $tongdt_namht = 0;
        foreach ($donhang as $d) {
            $namdh = date('Y', strtotime($d['NgayGiaoHang']));
            if ($namdh == $namht) {
                $tongdt_namht += $d["TongTien"];
            }
        }
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        include("main.php");
        break;
    case "dangnhap":
        include("login.php");
        break;
    // case "dangky":
    //     include("register.php");
    //     break;
    case "dangxuat":
        unset($_SESSION["nguoidung"]);
        include("login.php");
        break;
        // case "quenmatkhau":
        //     include("forgot-password.php");
        //     break;
    case "xulydangnhap":

        $tendangnhap = $_POST["txtdangnhap"];
        $matkhau = $_POST["txtpassword"];

        // Kiểm tra tính hợp lệ của tendangnhap và mật khẩu
        if ($nd->kiemtranguoidunghople($tendangnhap, $matkhau) == TRUE) {
            $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($tendangnhap);
            if ($_SESSION["nguoidung"]["TrangThai"] == 1 && $_SESSION["nguoidung"]["MaQ"] == 1 || $_SESSION["nguoidung"]["MaQ"] == 3) {

                $donhang = $dh->laydanhsachdonhang();
                $nguoidung = $nd->laydanhsachnguoidung();
                $danhgia = $dg->laydanhsachdanhgia();

                $thanght = date("m");
                $namht = date("Y");
                // Tính tổng doanh thu theo tháng
                $tongdt_thanght = 0;
                foreach ($donhang as $d) {
                    $thangdh = date('m', strtotime($d['NgayGiaoHang']));
                    if ($thangdh == $thanght) {
                        $tongdt_thanght += $d["TongTien"];
                    }
                }
                // Tính tổng doanh thu theo năm
                $tongdt_namht = 0;
                foreach ($donhang as $d) {
                    $namdh = date('Y', strtotime($d['NgayGiaoHang']));
                    if ($namdh == $namht) {
                        $tongdt_namht += $d["TongTien"];
                    }
                }
                // Đánh giá chưa được phản hồi 
                $luotdg = 0;
                foreach ($danhgia as $dg) {
                    if ($dg["TraLoi"] == null) {
                        $luotdg = $luotdg + 1;
                    }
                }

                include("main.php");
            } elseif ($_SESSION["nguoidung"]["TrangThai"] == 1 && $_SESSION["nguoidung"]["MaQ"] == 2) {
                header("Location:../../public/index.php");
            } elseif ($_SESSION["nguoidung"]["TrangThai"] == 0) {
                $thongbao = "Tài khoản đã bị khóa";
                include("login.php");
            } else {
                $thongbao = "Nhập sai mật khẩu hoặc tên đăng nhập";
                include("login.php");
            }
        } else {
            $thongbao = "Nhập sai mật khẩu hoặc tên đăng nhập";
            include("login.php");
        }
        // else {
        //     $thongbao = "Mật khẩu hoặc tendangnhap khôgn hợp lệ";
        //     include("login.php");
        // }
        break;
    // case "xulydangky":
    //     // $sodienthoai = $_POST["sdt"];
    //     // $tendangnhap = $_POST["txttendn"];

    //     // $kiemtra1 = $nd->kiemtraSdtTonTai($sodienthoai);
    //     // $kiemtra2 = $nd->kiemtraTenDangNhapTonTai($tendangnhap);

    //     // if (strlen($sodienthoai) < 10) {
    //     //     echo "<script>alert('Số điện thoại phải tối thiểu 10 chữ số, Vui lòng nhập lại số điện thoại.');</script>";
    //     //     $HoTen = $_POST["txthoten"];
    //     //     $tendangnhap = $_POST["txttendn"];
    //     //     $DiaChi = $_POST["txtdiachi"];
    //     //     $MatKhau = $_POST["txtmatkhau"];
    //     //     $MaQ = $_POST["optquyen"];
    //     //     $TrangThai = $_POST["txttrangthai"];
    //     //     $HinhAnh = basename($_FILES["fileanh"]["name"]);
    //     //     $quyen = $q->laydanhsachquyen();
    //     //     include("register.php");
    //     // } elseif ($kiemtra1) {
    //     //     // Nếu số điện thoại đã tồn tại, hiển thị thông báo
    //     //     echo "<script>alert('Số điện thoại đã tồn tại trong cơ sở dữ liệu. Vui lòng nhập số điện thoại khác.');</script>";
    //     //     $HoTen = $_POST["txthoten"];
    //     //     $tendangnhap = $_POST["txttendn"];
    //     //     $DiaChi = $_POST["txtdiachi"];
    //     //     $MatKhau = $_POST["txtmatkhau"];
    //     //     $MaQ = $_POST["optquyen"];
    //     //     $TrangThai = $_POST["txttrangthai"];
    //     //     $HinhAnh = basename($_FILES["fileanh"]["name"]);
    //     //     $quyen = $q->laydanhsachquyen();
    //     //     include("register.php");
    //     // } elseif ($kiemtra2) {
    //     //     // Nếu email đã tồn tại, hiển thị thông báo
    //     //     echo "<script>alert('Tên đăng nhập đã tồn tại trong cơ sở dữ liệu. Vui lòng nhập Tên đăng nhập khác.');</script>";
    //     //     $HoTen = $_POST["txthoten"];
    //     //     $Sdt = $_POST["sdt"];
    //     //     $DiaChi = $_POST["txtdiachi"];
    //     //     $MatKhau = $_POST["txtmatkhau"];
    //     //     $MaQ = $_POST["optquyen"];
    //     //     $TrangThai = $_POST["txttrangthai"];
    //     //     $HinhAnh = basename($_FILES["fileanh"]["name"]);
    //     //     $quyen = $q->laydanhsachquyen();
    //     //     include("register.php");
    //     // } else {
    //     //xử lý load ảnh
    //     $hinhanh = "user_md.png"; // đường dẫn ảnh lưu trong db
    //     // $duongdan = "../../img/user/" . $hinhanh; //nơi lưu file upload
    //     // move_uploaded_file($_FILES["fileanh"]["tmp_name"], $duongdan);
    //     //xử lý thêm 
    //     $nguoidungmoi = new NGUOIDUNG();
    //     $nguoidungmoi->setTenDangNhap($_POST["txttendn"]);
    //     $nguoidungmoi->setSdt($_POST["sdt"]);
    //     $nguoidungmoi->setMatKhau($_POST["txtmk"]);
    //     $nguoidungmoi->setDiaChi($_POST["txtdiachi"]);
    //     $nguoidungmoi->setHoTen($_POST["txthoten"]);
    //     $nguoidungmoi->setMaQ($_POST["quyen"]);
    //     $nguoidungmoi->setTrangThai($_POST["trangthai"]);
    //     $nguoidungmoi->setHinhAnh($hinhanh);

    //     // thêm
    //     $nd->themnguoidung($nguoidungmoi);
    //     // load người dùng
    //     $quyen = $q->laydanhsachquyen();
    //     $nguoidung = $nd->laydanhsachnguoidung();
    //     include("login.php");
    //     // }
    //     include("login.php");
    //     break;
    default:
        break;
}

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
        //doanh thu tháng
        $doanhthuthang = $dh->laydoanhthuthang();
        // Chuyển đổi dữ liệu doanh thu thành JSON để truyền vào JavaScript
        $doanhthu_json = json_encode($doanhthu);

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
        // foreach ($danhgia as $d) {
        //     $luotdg = $dg->soluongchuatraloi($d["MaDG"]);
        // }
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
                $traloidanhgia = $tl->laydanhsachtraloidanhgia();
                // Đánh giá chưa được phản hồi 
                // foreach ($danhgia as $d) {
                //     $luotdg = $dg->soluongchuatraloi($d["MaDG"]);
                // }

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
        
    default:
        break;
}

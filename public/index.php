<?php
// session_start();
require("../model/database.php");
require("../model/sim.php");
require("../model/loaisim.php");
require("../model/khuyenmai.php");
require("../model/nguoidung.php");
require("../model/goicuoc.php");
require("../model/loaigoicuoc.php");
require("../model/danhgia.php");
require("../model/traloidanhgia.php");
require("../model/giohang_ct.php");
require("../model/donhang.php");
require("../model/donhang_ct.php");
require("../model/quangcao.php");



// Xét xem có thao tác nào được chọn
$isLogin = isset($_SESSION["nguoidung"]);
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} elseif ($isLogin == FALSE) {
    $action = "macdinh";
} else {   // mặc định là xem danh sách
    $action = "macdinh";
}

$s = new SIM();
$ls = new LOAISIM();
$km = new KHUYENMAI();
$nd = new NGUOIDUNG();
$dg = new DANHGIA();
$gc = new GOICUOC();
$lgc = new LOAIGOICUOC();
$tl = new TRALOIDANHGIA();
$gh = new GIOHANG_CT();
$dh = new DONHANG();
$dh_ct = new DONHANG_CT();
$qc = new QUANGCAO();


switch ($action) {
    case "macdinh":
        $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
        $goicuoc = $gc->laydanhsachgoicuoc();
        $sim = $s->laydanhsachsim();
        $thuebao = $s->laydanhsachloaithuebao();
        $loaisim = $ls->laydanhsachloaisim();
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();
        $quangcao = $qc->laydanhsachquangcao();
        include("main.php");
        break;
    case "chuyentrang":
        header("Location:../../WebBanSimViettel/admin/index.php");
        break;

    case "khuyenmai":
        $danhgia = $dg->laydanhsachdanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $loaisim = $ls->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        include("blog.php");
        break;
    case "sim":
        $sim = $s->laydanhsachsim();
        $thuebao = $s->laydanhsachloaithuebao();
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $loaisim = $ls->laydanhsachloaisim();
        include("sim.php");
        break;
        // case "dstheoloaisim":
        //     $sim = $s->laydanhsachsim();
        //     $thuebao = $s->laydanhsachloaithuebao();
        //     $khuyenmai = $km->laydanhsachkhuyenmai();
        //     $loaisim = $ls->laydanhsachloaisim();
        //     include("sim.php");
        //     break;
    case "goicuoc":
        $loaisim = $ls->laydanhsachloaisim();
        $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
        $sim = $s->laydanhsachsim();
        $goicuoc = $gc->laydanhsachgoicuoc();
        include("goicuoc.php");
        break;
    case "thongtin":
        $sim = $s->laydanhsachsim();
        $thuebao = $s->laydanhsachloaithuebao();
        $loaisim = $ls->laydanhsachloaisim();
        include("about.php");
        break;
    case "lienhe":
        $loaisim = $ls->laydanhsachloaisim();
        $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
        $goicuoc = $gc->laydanhsachgoicuoc();
        $sim = $s->laydanhsachsim();
        include("contact.php");
        break;
    case "themvaogio":
        if ($isLogin == FALSE) {
            include("login.php");
        }
        $ls_km = $ls->laydanhsachloaisim();
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $giohang = $gh->laydanhsachgiohang_ct();
        $giaban = $_GET["DonGia"];
        //lấy giá khuyến mãi nếu có
        foreach ($khuyenmai as $km_ls) :
            foreach ($ls_km as $lskm) :
                if ($km_ls["MaLS"] == $lskm["MaLS"] && $km_ls["TrangThai"] == 1 && $_GET["MaLS"] == $lskm["MaLS"]) {
                    $giaban = $lskm["GiaBan"] * $km_ls["GiaTriKM"] / 100;
                }
            endforeach;
        endforeach;
        //kiểm tra sim có trong giỏ chưa
        $simDaTonTai = false;
        foreach ($giohang as $gio) :
            if ($gio["MaS"] == $_GET["MaSim"]) {
                $simDaTonTai = true;
                break;
            }
        endforeach;
        if ($simDaTonTai) {
            echo "<script>alert('Sim đã tồn tại trong giỏ hàng.'); window.history.back();</script>";
        } else {
            $moi = new GIOHANG_CT();
            $moi->setMaND($_SESSION["nguoidung"]["MaND"]);
            $moi->setMaS($_GET["MaSim"]);
            $moi->setSL(1);
            $moi->setDonGia($giaban);

            $gh->themgiohang_ct($moi);
            echo "<script>alert('Đã thêm vào giỏ.'); window.history.back();</script>";
        }
        break;
    case "themvaogiohang":
        if ($isLogin == FALSE) {
            include("login.php");
        }
        $ls_km = $ls->laydanhsachloaisim();
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $giohang = $gh->laydanhsachgiohang_ct();
        $giaban = $_GET["DonGia"];
        //lấy giá khuyến mãi nếu có
        foreach ($khuyenmai as $km_ls) :
            foreach ($ls_km as $lskm) :
                if ($km_ls["MaLS"] == $lskm["MaLS"] && $km_ls["TrangThai"] == 1 && $_GET["MaLS"] == $lskm["MaLS"]) {
                    $giaban = $lskm["GiaBan"] * $km_ls["GiaTriKM"] / 100;
                }
            endforeach;
        endforeach;
        //kiểm tra sim có trong giỏ chưa
        $simDaTonTai = false;
        foreach ($giohang as $gio) :
            if ($gio["MaS"] == $_GET["MaSim"]) {
                $simDaTonTai = true;
                break;
            }
        endforeach;
        if ($simDaTonTai) {
            echo "<script>alert('Sim đã tồn tại trong giỏ hàng.'); window.history.back();</script>";
        } else {
            $moi = new GIOHANG_CT();
            $moi->setMaND($_SESSION["nguoidung"]["MaND"]);
            $moi->setMaS($_GET["MaSim"]);
            $moi->setSL(1);
            $moi->setDonGia($giaban);

            $gh->themgiohang_ct($moi);
            echo "<script>alert('Đã thêm vào giỏ.'); window.history.back();</script>";
        }
        break;
    case "xemgiohang":
        if (isset($_SESSION["nguoidung"])) {
            $loaisim = $ls->laydanhsachloaisim();
            $sim = $s->laydanhsachsim();
            $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
            $goicuoc = $gc->laydanhsachgoicuoc();
            $giohang = $gh->laydanhsachgiohang_ct();
            include("shoping-cart.php");
        }

        break;
    case "dathang":
        if (isset($_SESSION["nguoidung"])) {
            $loaisim = $ls->laydanhsachloaisim();
            $sim = $s->laydanhsachsim();
            $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
            $goicuoc = $gc->laydanhsachgoicuoc();
            $giohang = $gh->laydanhsachgiohang_ct();
            include("checkout.php");
        }
        break;
    case "luudonhang":
        $nguoidung_id = $_SESSION["nguoidung"]["MaND"];
        // lưu đơn hàng

        $ngayhd = date("Y-m-d");
        $tongtien = $gh->tinhtongtientheond($nguoidung_id);

        $dh_moi = new DONHANG();
        $dh_moi->setMaND($_SESSION["nguoidung"]["MaND"]);
        $dh_moi->setNgayDatHang($ngayhd);
        $dh_moi->setNgayGiaoHang("0/0/0");
        $dh_moi->setTongTien($tongtien);
        $dh_moi->setGhiChu(null);
        $dh_moi->setTrangThai(0);
        $dh->themdonhang($dh_moi);
        $dh_id = $dh->laymadhvuathem();

        // lưu chi tiết đơn hàng
        $soluong = $gh->laygiohangtheond($nguoidung_id);
        // print_r($soluong);
        // exit();
        foreach ($soluong as $sl) :
            if (!empty($sl["MaS"]) && isset($sl["MaS"])) {
                //đổi trạng thái sim
                $trangthai = 0;
                $s->doitrangthai($sl["MaS"], $trangthai);
            }
            //thêm chi tiết đơn hàng
            $dongia = $gh->laydongiatheomas($sl["MaS"]);
            $dhct_moi = new DONHANG_CT();
            $dhct_moi->setMaDH($dh_id);
            $dhct_moi->setMaS($sl["MaS"]);
            $dhct_moi->setDonGia($dongia);
            $dhct_moi->setSoLuong(1);
            $dhct_moi->setThanhTien($dongia);
            //THÊM LƯỢT MUA CHO LOẠI SIM 
            $loaisim = $ls->laydanhsachloaisim();
            $sim = $s->laydanhsachsimtheoid($sl["MaS"]);
            foreach ($loaisim as $l) :

                if ($l["MaLS"] == $sim["MaLS"]) {
                    $ls->tangluotmualoaisim($l["MaLS"]);
                }
            endforeach;
            $dh_ct->themdonhang_ct($dhct_moi);
        endforeach;


        // xóa giỏ hàng
        $giohang_nd = $gh->laygiohangtheond($nguoidung_id);

        if (isset($giohang_nd)) {
            foreach ($giohang_nd as $gh_nd) :
                // print_r($gh_nd["MaGH"]);
                // exit();
                // lấy dòng muốn xóa
                $xoa = new GIOHANG_CT();
                $xoa->setMaGH($gh_nd["MaGH"]);
                // xóa
                $gh->xoagiohang_ct($xoa);

            endforeach;
        } else {
            // Xử lý trường hợp không tồn tại MaGH
            echo "<script>alert('MaGH không được cung cấp!.'); window.history.back();</script>";

            // Hoặc thực hiện hành động khác như điều hướng người dùng...
        }

        $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
        $goicuoc = $gc->laydanhsachgoicuoc();
        $sim = $s->laydanhsachsim();
        $thuebao = $s->laydanhsachloaithuebao();
        $loaisim = $ls->laydanhsachloaisim();
        $quangcao = $qc->laydanhsachquangcao();
        $khuyenmai = $km->laydanhsachkhuyenmai();
        include("thanks.php");
        break;
    case "xoamotsim":
        if (isset($_GET["id"])) {
            $xoa = $_GET["id"];
            $gh->xoagiohangtheosim($xoa);
        }
        echo "<script>alert('Đã xóa.'); window.history.back();</script>";
        break;
    case "dangnhap":
        include("login.php");
        break;
    case "dangky":
        include("register.php");
        break;
    case "xldangnhap":
        $tendangnhap = $_POST["txtdangnhap"];
        $matkhau = $_POST["txtpassword"];
        // Kiểm tra tính hợp lệ của tendangnhap và mật khẩu
        if ($nd->kiemtranguoidunghople($tendangnhap, $matkhau) == TRUE) {
            $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($tendangnhap);
            if ($_SESSION["nguoidung"]["TrangThai"] == 1 && $_SESSION["nguoidung"]["MaQ"] == 1) {
                $sim = $s->laydanhsachsim();
                $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
                $goicuoc = $gc->laydanhsachgoicuoc();
                $thuebao = $s->laydanhsachloaithuebao();
                $loaisim = $ls->laydanhsachloaisim();
                $khuyenmai = $km->laydanhsachkhuyenmai();

                header("Location:../../WebBanSimViettel/admin/index.php");
            } elseif ($_SESSION["nguoidung"]["TrangThai"] == 1 && $_SESSION["nguoidung"]["MaQ"] == 2 || $_SESSION["nguoidung"]["MaQ"] == 3) {
                $sim = $s->laydanhsachsim();
                $thuebao = $s->laydanhsachloaithuebao();
                $loaisim = $ls->laydanhsachloaisim();
                $khuyenmai = $km->laydanhsachkhuyenmai();
                $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
                $goicuoc = $gc->laydanhsachgoicuoc();
                $quangcao = $qc->laydanhsachquangcao();
                $nguoidung = $nd->laydanhsachnguoidung();

                include("main.php");
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
    case "xldangky":
        $sodienthoai = $_POST["sdt"];
        $tendangnhap = $_POST["txttendn"];

        $kiemtra1 = $nd->kiemtraSdtTonTai($sodienthoai);
        $kiemtra2 = $nd->kiemtraTenDangNhapTonTai($tendangnhap);

        if (strlen($sodienthoai) < 10) {
            echo "<script>alert('Số điện thoại phải tối thiểu 10 chữ số, Vui lòng nhập lại số điện thoại.');</script>";
            $HoTen = $_POST["txthoten"];
            $tendangnhap = $_POST["txttendn"];
            $DiaChi = $_POST["txtdiachi"];
            $MatKhau = $_POST["txtmatkhau"];
            $MaQ = $_POST["optquyen"];
            $TrangThai = $_POST["txttrangthai"];
            $HinhAnh = basename($_FILES["fileanh"]["name"]);
            $quyen = $q->laydanhsachquyen();
            include("register.php");
        } elseif ($kiemtra1) {
            // Nếu số điện thoại đã tồn tại, hiển thị thông báo
            echo "<script>alert('Số điện thoại đã tồn tại trong cơ sở dữ liệu. Vui lòng nhập số điện thoại khác.');</script>";
            $HoTen = $_POST["txthoten"];
            $tendangnhap = $_POST["txttendn"];
            $DiaChi = $_POST["txtdiachi"];
            $MatKhau = $_POST["txtmatkhau"];
            $MaQ = $_POST["optquyen"];
            $TrangThai = $_POST["txttrangthai"];
            $HinhAnh = basename($_FILES["fileanh"]["name"]);
            $quyen = $q->laydanhsachquyen();
            include("register.php");
        }
        // elseif ($kiemtra2) {
        //     // Nếu email đã tồn tại, hiển thị thông báo
        //     echo "<script>alert('Tên đăng nhập đã tồn tại trong cơ sở dữ liệu. Vui lòng nhập Tên đăng nhập khác.');</script>";
        //     $HoTen = $_POST["txthoten"];
        //     $Sdt = $_POST["sdt"];
        //     $DiaChi = $_POST["txtdiachi"];
        //     $MatKhau = $_POST["txtmatkhau"];
        //     $MaQ = $_POST["optquyen"];
        //     $TrangThai = $_POST["txttrangthai"];
        //     $HinhAnh = basename($_FILES["fileanh"]["name"]);
        //     $quyen = $q->laydanhsachquyen();
        //     include("register.php");
        // } else {
        //xử lý load ảnh
        $hinhanh = "user_md.png"; // đường dẫn ảnh lưu trong db
        // $duongdan = "../../img/user/" . $hinhanh; //nơi lưu file upload
        // move_uploaded_file($_FILES["fileanh"]["tmp_name"], $duongdan);
        //xử lý thêm 
        $nguoidungmoi = new NGUOIDUNG();
        $nguoidungmoi->setTenDangNhap($_POST["txttendangnhap"]);
        $nguoidungmoi->setSdt($_POST["sodienthoai"]);
        $nguoidungmoi->setMatKhau($_POST["txtpassword"]);
        $nguoidungmoi->setDiaChi($_POST["diachi"]);
        $nguoidungmoi->setHoTen($_POST["txthoten"]);
        $nguoidungmoi->setMaQ($_POST["quyen"]);
        $nguoidungmoi->setTrangThai($_POST["trangthai"]);
        $nguoidungmoi->setHinhAnh($hinhanh);

        // thêm
        $nd->themnguoidung($nguoidungmoi);
        // load người dùng

        include("login.php");
        // }
        include("login.php");
        break;
    case "dangxuat":
        unset($_SESSION["nguoidung"]);
        $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
        $goicuoc = $gc->laydanhsachgoicuoc();
        $sim = $s->laydanhsachsim();
        $thuebao = $s->laydanhsachloaithuebao();
        $loaisim = $ls->laydanhsachloaisim();
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();
        $quangcao = $qc->laydanhsachquangcao();

        include("main.php");
        break;

    case "detail":
        if (isset($_GET["id"])) {
            $khuyenmai_ht = $km->laydanhsachkhuyenmaitheoid($_GET["id"]);
            $danhgia = $dg->laydanhsachdanhgia();
            $nguoidung = $nd->laydanhsachnguoidung();
            $loaisim = $ls->laydanhsachloaisim();
            $khuyenmai = $km->laydanhsachkhuyenmai();
            $traloidanhgia = $tl->laydanhsachtraloidanhgia();
            $sim = $s->laydanhsachsim();

            include("blog-detail.php");
        } else {
            $sim = $s->laydanhsachsim();
            $thuebao = $s->laydanhsachloaithuebao();
            $loaisim = $ls->laydanhsachloaisim();
            $khuyenmai = $km->laydanhsachkhuyenmai();
            $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
            $goicuoc = $gc->laydanhsachgoicuoc();
            $quangcao = $qc->laydanhsachquangcao();

            include("main.php");
        }
        break;
    case "danhgia":
        if (isset($_POST["danhgia"]) && !empty($_POST["danhgia"])) {
            $nguoidung_dg = $_POST["danhgia"];
            $ngaydg = date("Y-m-d");
            $moi = new DANHGIA();
            $moi->setNoiDung($nguoidung_dg);
            $moi->setMaND($_SESSION["nguoidung"]["MaND"]);
            $moi->setMaKM($_POST["MaKM"]);
            $moi->setNgayDG($ngaydg);

            // Thêm đánh giá mới vào cơ sở dữ liệu
            $dg->themdanhgia($moi);
        } else {
            echo "Không có đánh giá nào được nhập.";
        }

        // Load lại dữ liệu và bao gồm trang blog-detail.php
        $khuyenmai_ht = $km->laydanhsachkhuyenmaitheoid($_POST["MaKM"]);
        $danhgia = $dg->laydanhsachdanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $loaisim = $ls->laydanhsachloaisim();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $sim = $s->laydanhsachsim();

        include("blog-detail.php");
        break;
    case "traloidanhgia":
        $moi = new TRALOIDANHGIA();
        $ngaytl = date("Y-m-d");
        $moi->setTraLoi($_POST["traloi"]);
        $moi->setMaDG($_POST["MaDG"]);
        $moi->setMaND($_SESSION["nguoidung"]["MaND"]);
        $moi->setNgayTL($ngaytl);
        // thêm
        $tl->themtraloidanhgia($moi);
        // load 
        $danhgia = $dg->laydanhsachdanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        $khuyenmai_ht = $km->laydanhsachkhuyenmaitheoid($_POST["MaKM"]);
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $loaisim = $ls->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        include("blog-detail.php");
        break;
    case "chitietgoicuoc":
        if (isset($_GET["id"])) {
            $goicuoc_ht = $gc->laygoicuoctheoid($_GET["id"]);
            $loaisim = $ls->laydanhsachloaisim();
            $sim = $s->laydanhsachsim();
            include("chitietgoicuoc.php");
        }
        $sim = $s->laydanhsachsim();
        include("chitietgoicuoc.php");
        break;
    case "hoso":
        $loaisim = $ls->laydanhsachloaisim();
        include("hoso.php");
        break;
    case "xlhoso":
        // gán dữ liệu từ form
        $sua = new NGUOIDUNG();
        $MaND = $_POST["MaND"];
        $TenDangNhap = $_POST["txttendn"];
        $Sdt = $_POST["sdt"];
        $HoTen = $_POST["txthoten"];
        $HinhAnh = $_POST["HinhAnh"];
        $DiaChi = $_POST["txtdiachi"];
        $MatKhau = $_POST["txtmk"];

        if ($_FILES["fhinhanh"]["name"] != null) {
            //xử lý load ảnh
            $hinhanh = basename($_FILES["fhinhanh"]["name"]); // đường dẫn ảnh lưu trong db
            $duongdan = "../img/user/" . $hinhanh; //nơi lưu file upload
            move_uploaded_file($_FILES["fhinhanh"]["tmp_name"], $duongdan);
            $_SESSION["nguoidung"]["HinhAnh"] = $hinhanh; // Cập nhật hình ảnh mới vào session
        }

        // sửa
        $nd->capnhatnguoidung($MaND, $HoTen, $TenDangNhap, $Sdt, $MatKhau, $HinhAnh, $DiaChi);
        // Sau khi lưu thành công, cập nhật thông tin hình ảnh mới vào session.
        $hoten = $_POST["txthoten"];
        $_SESSION["nguoidung"]["HoTen"] = $hoten;
        // load danh sách
        $donhang = $dh->laydanhsachdonhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        $danhgia = $dg->laydanhsachdanhgia();
        $loaisim = $ls->laydanhsachloaisim();
        include("hoso.php");
        break;
    case "xemdondamua":
        $loaisim = $ls->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        $donhang_nd = $dh->laydonhangtheomand($_SESSION["nguoidung"]["MaND"]);
        $donhang = $dh->laydanhsachdonhang();
        $donhang_ct = $dh_ct->laydanhsachdonhang_ct();
        // print_r($donhang_ct);
        // exit();
        include("dondamua.php");
        break;
    case "hoantat":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["TrangThai"]))
            $tinhtrang = $_REQUEST["TrangThai"];
        else
            $tinhtrang = "1";
        if ($tinhtrang == "1") {
            $tinhtrang = 2;
            $dh->doitrangthai($id, $tinhtrang);
        }
        //cập nhật thời gian giao hàng khi nhấn nút hoàn tất
        $donhanght = new DONHANG();
        $currentDateTime = date('Y-m-d H:i:s');
        $dh->capnhatngaygiaohang($id, $currentDateTime);

        // load hóa đơn
        $loaisim = $ls->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        $donhang = $dh->laydanhsachdonhang();
        $donhang_ct = $dh_ct->laydanhsachdonhang_ct();
        include("dondamua.php");
        break;
    case "huydon":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["tinhtrang"]))
            $tinhtrang = $_REQUEST["tinhtrang"];
        else
            $tinhtrang = "1";
        $tinhtrang = 3;
        $dh->doitrangthai($id, $tinhtrang);
        // load hóa đơn
        $loaisim = $ls->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        $donhang = $dh->laydanhsachdonhang();
        $donhang_ct = $dh_ct->laydanhsachdonhang_ct();
        include("dondamua.php");
        break;
    case "xemtheoloaigc":
        if (isset($_GET["MaLGC"])) {
            $loaigc_ht = $lgc->laydanhsachloaigoicuoctheoid($_GET["MaLGC"]);
            $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
            $goicuoc = $gc->laydanhsachgoicuoc();
            $loaisim = $ls->laydanhsachloaisim();
            include("xemtheoloaigc.php");
        }
        break;
    case "timkiemsim":
        if (isset($_POST["timkiem"])) {
            $tukhoa = $_POST["timkiem"];
            $vitri = strpos($tukhoa, '*'); // vị trí của dấu * trong chuỗi

            // Nếu không có dấu '*' trong từ khóa
            if ($vitri === false) {
                // Xử lý khi từ khóa không chứa dấu '*'
                $sim = $s->timkiemsimtheo($tukhoa);
                $thuebao = $s->laydanhsachloaithuebao();
                $khuyenmai = $km->laydanhsachkhuyenmai();
                $loaisim = $ls->laydanhsachloaisim();
                include("timkiemsim.php");
            } elseif ($vitri == 0) {
                // Xử lý khi từ khóa chứa dấu '*' ở đầu
                $tk = str_replace("*", "", $tukhoa); // đổi * thành khoảng trắng trong chuỗi 
                $sim = $s->timkiemsimtheoduoiso($tk);
                $thuebao = $s->laydanhsachloaithuebao();
                $khuyenmai = $km->laydanhsachkhuyenmai();
                $loaisim = $ls->laydanhsachloaisim();
                include("timkiemsim.php");
            } else {
                // Xử lý khi từ khóa chứa dấu '*' ở vị trí khác đầu
                $tk = str_replace("*", "", $tukhoa); // đổi * thành khoảng trắng trong chuỗi 
                $sim = $s->timkiemsimtheodauso($tk);
                $thuebao = $s->laydanhsachloaithuebao();
                $khuyenmai = $km->laydanhsachkhuyenmai();
                $loaisim = $ls->laydanhsachloaisim();
                include("timkiemsim.php");
            }
        }

        break;
    default:
        break;
}

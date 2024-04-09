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



// Xét xem có thao tác nào được chọn
$isLogin = isset($_SESSION["nguoidung"]);
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} elseif ($isLogin == FALSE) {
    $action = "dangnhap";
    // } 
    // elseif($_SESSION["nguoidung"]["MaQ"] == 2){
    //     header("Location:../../public/");
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


switch ($action) {
    case "macdinh":
        $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
        $goicuoc = $gc->laydanhsachgoicuoc();
        $sim = $s->laydanhsachsim();
        $thuebao = $s->laydanhsachloaithuebao();
        $loaisim = $ls->laydanhsachloaisim();
        $khuyenmai = $km->laydanhsachkhuyenmai();
        include("main.php");
        break;
    case "khuyenmai":
        $danhgia = $dg->laydanhsachdanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $loaisim = $ls->laydanhsachloaisim();
        include("blog.php");
        break;
    case "sim":
        $sim = $s->laydanhsachsim();
        $thuebao = $s->laydanhsachloaithuebao();
        $loaisim = $ls->laydanhsachloaisim();
        include("sim.php");
        break;
    case "goicuoc":
        $loaisim = $ls->laydanhsachloaisim();
        $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
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
        include("contact.php");
        break;
    case "themvaogio":
        $moi = new GIOHANG_CT();
        $moi->setMaND($_SESSION["nguoidung"]["MaND"]);
        $moi->setMaS($_GET["MaSim"]);
        $moi->setSL(1);
        $moi->setDonGia($_GET["DonGia"]);

        $gh->themgiohang_ct($moi);
        $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
        $goicuoc = $gc->laydanhsachgoicuoc();
        $sim = $s->laydanhsachsim();
        $thuebao = $s->laydanhsachloaithuebao();
        $loaisim = $ls->laydanhsachloaisim();
        $khuyenmai = $km->laydanhsachkhuyenmai();
        include("main.php");
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
        $mas = $gh->laymasimtheond($nguoidung_id);
        $da_thay_doi_trang_thai = false;
        foreach ($mas as $ms) :
            if (!empty($ms) && isset($ms) && !$da_thay_doi_trang_thai) {
                //đổi trạng thái sim
                $da_thay_doi_trang_thai = true; // Đánh dấu rằng đã thay đổi trạng thái cho ít nhất một sim
                $trangthai = 0;
                $s->doitrangthai($ms, $trangthai);
            }
                //thêm chi tiết đơn hàng
                $dongia = $gh->laydongiatheomas($ms);
                $dhct_moi = new DONHANG_CT();
                $dhct_moi->setMaDH($dh_id);
                $dhct_moi->setMaS($ms);
                $dhct_moi->setDonGia($dongia);
                $dhct_moi->setSoLuong(1);
                $dhct_moi->setThanhTien($dongia);
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
            echo "MaGH không được cung cấp!";
            // Hoặc thực hiện hành động khác như điều hướng người dùng...
        }

        $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
        $goicuoc = $gc->laydanhsachgoicuoc();
        $sim = $s->laydanhsachsim();
        $thuebao = $s->laydanhsachloaithuebao();
        $loaisim = $ls->laydanhsachloaisim();
        $khuyenmai = $km->laydanhsachkhuyenmai();
        include("main.php");
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
            } elseif ($_SESSION["nguoidung"]["TrangThai"] == 1 && $_SESSION["nguoidung"]["MaQ"] == 2) {
                $sim = $s->laydanhsachsim();
                $thuebao = $s->laydanhsachloaithuebao();
                $loaisim = $ls->laydanhsachloaisim();
                $khuyenmai = $km->laydanhsachkhuyenmai();
                $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
                $goicuoc = $gc->laydanhsachgoicuoc();
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
        $sim = $s->laydanhsachsim();
        $thuebao = $s->laydanhsachloaithuebao();
        $loaisim = $ls->laydanhsachloaisim();
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
        $goicuoc = $gc->laydanhsachgoicuoc();
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
            include("blog-detail.php");
        } else {
            $sim = $s->laydanhsachsim();
            $thuebao = $s->laydanhsachloaithuebao();
            $loaisim = $ls->laydanhsachloaisim();
            $khuyenmai = $km->laydanhsachkhuyenmai();
            $loaigoicuoc = $lgc->laydanhsachloaigoicuoc();
            $goicuoc = $gc->laydanhsachgoicuoc();
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
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        include("blog-detail.php");
        break;
    case "chitietgoicuoc":
        if (isset($_GET["id"])) {
            $goicuoc_ht = $gc->laygoicuoctheoid($_GET["id"]);
            $loaisim = $ls->laydanhsachloaisim();
            include("chitietgoicuoc.php");
        }
        include("chitietgoicuoc.php");
        break;
    case "hoso":
        // $id = $_SESSION["nguoidung"]["id"];
        // $sogio = $gh->demgiohang($id);
        $loaisim = $ls->laydanhsachloaisim();
        include("hoso.php");
        break;
    case "xlhoso":
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
        include("profile.php");
        break;
    case "xemdonhang":
        $loaisim = $ls->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        $donhang = $dh->laydanhsachdonhang();
        $donhang_ct = $dh_ct->laydanhsachdonhang_ct();
        include("donhang.php");
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
        include("donhang.php");
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
        include("donhang.php");
        break;
    default:
        break;
}

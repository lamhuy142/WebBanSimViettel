<?php 
// session_start();
require("../model/database.php");
require("../model/sim.php");
require("../model/loaisim.php");
require("../model/khuyenmai.php");
require("../model/nguoidung.php");



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

switch ($action) {
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
                $thuebao = $s->laydanhsachloaithuebao();
                $loaisim = $ls->laydanhsachloaisim();
                $khuyenmai = $km->laydanhsachkhuyenmai();
                
                header("Location:../../admin/index.php");
            } elseif ($_SESSION["nguoidung"]["TrangThai"] == 1 && $_SESSION["nguoidung"]["MaQ"] == 2) {
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
        // $sodienthoai = $_POST["sdt"];
        // $tendangnhap = $_POST["txttendn"];

        // $kiemtra1 = $nd->kiemtraSdtTonTai($sodienthoai);
        // $kiemtra2 = $nd->kiemtraTenDangNhapTonTai($tendangnhap);

        // if (strlen($sodienthoai) < 10) {
        //     echo "<script>alert('Số điện thoại phải tối thiểu 10 chữ số, Vui lòng nhập lại số điện thoại.');</script>";
        //     $HoTen = $_POST["txthoten"];
        //     $tendangnhap = $_POST["txttendn"];
        //     $DiaChi = $_POST["txtdiachi"];
        //     $MatKhau = $_POST["txtmatkhau"];
        //     $MaQ = $_POST["optquyen"];
        //     $TrangThai = $_POST["txttrangthai"];
        //     $HinhAnh = basename($_FILES["fileanh"]["name"]);
        //     $quyen = $q->laydanhsachquyen();
        //     include("register.php");
        // } elseif ($kiemtra1) {
        //     // Nếu số điện thoại đã tồn tại, hiển thị thông báo
        //     echo "<script>alert('Số điện thoại đã tồn tại trong cơ sở dữ liệu. Vui lòng nhập số điện thoại khác.');</script>";
        //     $HoTen = $_POST["txthoten"];
        //     $tendangnhap = $_POST["txttendn"];
        //     $DiaChi = $_POST["txtdiachi"];
        //     $MatKhau = $_POST["txtmatkhau"];
        //     $MaQ = $_POST["optquyen"];
        //     $TrangThai = $_POST["txttrangthai"];
        //     $HinhAnh = basename($_FILES["fileanh"]["name"]);
        //     $quyen = $q->laydanhsachquyen();
        //     include("register.php");
        // } elseif ($kiemtra2) {
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
        include("main.php");
        break;
    case "macdinh":

        $sim = $s->laydanhsachsim();
        $thuebao = $s->laydanhsachloaithuebao();
        $loaisim = $ls->laydanhsachloaisim();
        $khuyenmai = $km->laydanhsachkhuyenmai();
        include("main.php");
        break;
    case "detail":
        if (isset($_GET["id"])) {
            $khuyenmai_ht = $km->laydanhsachkhuyenmaitheoid($_GET["id"]);
            include("blog-detail.php");
        } else {
            $sim = $s->laydanhsachsim();
            $thuebao = $s->laydanhsachloaithuebao();
            $loaisim = $ls->laydanhsachloaisim();
            $khuyenmai = $km->laydanhsachkhuyenmai();
            include("main.php");
        }
        break;
    case "blog":
        $khuyenmai = $km->laydanhsachkhuyenmai();
        include("blog.php");
        break;
    default:
        break;
}

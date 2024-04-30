<?php 
// session_start();
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/danhgia.php");
require("../../model/traloidanhgia.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$q = new QUYEN();
$nd = new NGUOIDUNG();
$dg = new DANHGIA();
$tl = new TRALOIDANHGIA();

switch ($action) {
    case "xem":
        $quyen = $q->laydanhsachquyen();
        $nguoidung = $nd->laydanhsachnguoidung();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        
        include("main.php");
        break;
    case "chuyentrang":
        header("Location:../../public/index.php");
        break;
    case "themnd":
        $quyen = $q->laydanhsachquyen();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("themnguoidung.php");
        break;
    case "xulythemnd":
        $sodienthoai = $_POST["txtsodienthoai"];
        $tendangnhap= $_POST["txttendangnhap"];

        $kiemtra1 = $nd->kiemtraSdtTonTai($sodienthoai);
        $kiemtra2 = $nd->kiemtraTenDangNhapTonTai($tendangnhap);
        
        if($kiemtra1) {
            // Nếu số điện thoại đã tồn tại, hiển thị thông báo
            echo "<script>alert('Số điện thoại đã tồn tại trong cơ sở dữ liệu. Vui lòng nhập số điện thoại khác.');window.history.back();</script>";
            $HoTen = $_POST["txthoten"];
            $tendangnhap= $_POST["txttendangnhap"];
            $DiaChi = $_POST["txtdiachi"];
            $MatKhau = $_POST["txtmatkhau"];
            $MaQ = $_POST["optquyen"];
            $HinhAnh = ($_FILES["fileanh"]);
            exit();
        }elseif($kiemtra2){
            // Nếu email đã tồn tại, hiển thị thông báo
            echo "<script>alert('Tên đăng nhập đã tồn tại trong cơ sở dữ liệu. Vui lòng nhập Tên đăng nhập khác.');window.history.back();</script>";
            $HoTen = $_POST["txthoten"];
            $Sdt = $_POST["txtsodienthoai"];
            $DiaChi = $_POST["txtdiachi"];
            $TenDangNhap = $_POST["txttendangnhap"];
            $MatKhau = $_POST["txtmatkhau"];
            $MaQ = $_POST["optquyen"];
            $HinhAnh = ($_FILES["fileanh"]);
            exit();
        } elseif (strlen($tendangnhap) < 3 ) {
            // Nếu email đã tồn tại, hiển thị thông báo
            echo "<script>alert('Tên đăng nhập phải tối thiểu 3 kí tự. Vui lòng nhập lại.');window.history.back();</script>";
            $HoTen = $_POST["txthoten"];
            $Sdt = $_POST["txtsodienthoai"];
            $DiaChi = $_POST["txtdiachi"];
            $TenDangNhap = $_POST["txttendangnhap"];
            $MatKhau = $_POST["txtmatkhau"];
            $MaQ = $_POST["optquyen"];
            $HinhAnh = ($_FILES["fileanh"]);
            exit();
        } elseif (strlen($_POST["txtmatkhau"]) < 3) {
            // Nếu email đã tồn tại, hiển thị thông báo
            echo "<script>alert('Mật khẩu phải tối thiểu 3 kí tự. Vui lòng nhập lại.');window.history.back();</script>";
            $HoTen = $_POST["txthoten"];
            $Sdt = $_POST["txtsodienthoai"];
            $DiaChi = $_POST["txtdiachi"];
            $TenDangNhap = $_POST["txttendangnhap"];
            $MatKhau = $_POST["txtmatkhau"];
            $MaQ = $_POST["optquyen"];
            $HinhAnh = ($_FILES["fileanh"]);
            exit();
        } elseif (strlen($_POST["txtsodienthoai"]) < 10) {
            // Nếu email đã tồn tại, hiển thị thông báo
            echo "<script>alert('Số điện thoại tối thiểu 10 số. Vui lòng nhập lại.');window.history.back();</script>";
            $HoTen = $_POST["txthoten"];
            $Sdt = $_POST["txtsodienthoai"];
            $DiaChi = $_POST["txtdiachi"];
            $TenDangNhap = $_POST["txttendangnhap"];
            $MatKhau = $_POST["txtmatkhau"];
            $MaQ = $_POST["optquyen"];
            $HinhAnh = $_FILES["fileanh"];
            exit();
        }else {
            //xử lý load ảnh
            $hinhanh = basename($_FILES["fileanh"]["name"]); // Lấy tên tệp ảnh
            $duongdan_moi = "../../img/user/" . $hinhanh; // Đường dẫn mới đến thư mục mong muốn

            // Di chuyển tệp ảnh đến thư mục mong muốn
            if (!empty($hinhanh)) {
                move_uploaded_file($_FILES["fileanh"]["tmp_name"], $duongdan_moi);
            }
            //xử lý thêm 
            $nguoidungmoi = new NGUOIDUNG();
            $nguoidungmoi->setTenDangNhap($_POST["txttendangnhap"]);
            $nguoidungmoi->setSdt($_POST["txtsodienthoai"]);
            $nguoidungmoi->setMatKhau($_POST["txtmatkhau"]);
            $nguoidungmoi->setDiaChi($_POST["txtdiachi"]);
            $nguoidungmoi->setHoTen($_POST["txthoten"]);
            $nguoidungmoi->setMaQ($_POST["optquyen"]);
            $nguoidungmoi->setTrangThai(1);
            $nguoidungmoi->setHinhAnh($hinhanh);
            // thêm
            $nd->themnguoidung($nguoidungmoi);
            // load người dùng
            $quyen = $q->laydanhsachquyen();
            $nguoidung = $nd->laydanhsachnguoidung();
            $danhgia = $dg->laydanhsachdanhgia();
            echo "<script>alert('Thêm thành công.');</script>";
            
            include("main.php");
        }
        break;
    case "khoa":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["TrangThai"]))
            $trangthai = $_REQUEST["TrangThai"];
        else
            $trangthai = "1";
        if ($trangthai == "1") {
            $trangthai = 0;
            $nd->doitrangthai($id, $trangthai);
        } else {
            $trangthai = 1;
            $nd->doitrangthai($id, $trangthai);
        }
        // load người dùng
        $quyen = $q->laydanhsachquyen();
        $nguoidung = $nd->laydanhsachnguoidung();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        echo "<script>alert('Đã đổi trạng thái.');</script>";
        
        include("main.php");
        break;
    default:
        break;
}

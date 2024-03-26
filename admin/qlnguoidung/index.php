<?php session_start();
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$q = new QUYEN();
$nd = new NGUOIDUNG();

switch ($action) {
    case "xem":
        $quyen = $q->laydanhsachquyen();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("main.php");
        break;
    case "themnd":
        $quyen = $q->laydanhsachquyen();
        include("themnguoidung.php");
        break;
    case "xulythemnd":
        $sodienthoai = $_POST["txtsodienthoai"];
        $tendangnhap= $_POST["txttendangnhap"];

        $kiemtra1 = $nd->kiemtraSdtTonTai($sodienthoai);
        $kiemtra2 = $nd->kiemtraTenDangNhapTonTai($tendangnhap);
        
        if(strlen($sodienthoai) < 10 ){
            echo "<script>alert('Số điện thoại phải tối thiểu 10 chữ số, Vui lòng nhập lại số điện thoại.');</script>";
            $HoTen = $_POST["txthoten"];
            $tendangnhap = $_POST["txttendangnhap"];
            $DiaChi = $_POST["txtdiachi"];
            $MatKhau = $_POST["txtmatkhau"];
            $MaQ = $_POST["optquyen"];
            $TrangThai = $_POST["txttrangthai"];
            $HinhAnh = basename($_FILES["fileanh"]["name"]);
            $quyen = $q->laydanhsachquyen();
            include("themnguoidung.php");
        }elseif($kiemtra1) {
            // Nếu số điện thoại đã tồn tại, hiển thị thông báo
            echo "<script>alert('Số điện thoại đã tồn tại trong cơ sở dữ liệu. Vui lòng nhập số điện thoại khác.');</script>";
            $HoTen = $_POST["txthoten"];
            $tendangnhap= $_POST["txttendangnhap"];
            $DiaChi = $_POST["txtdiachi"];
            $MatKhau = $_POST["txtmatkhau"];
            $MaQ = $_POST["optquyen"];
            $TrangThai = $_POST["txttrangthai"];
            $HinhAnh = basename($_FILES["fileanh"]["name"]);
            $quyen = $q->laydanhsachquyen();
            include("themnguoidung.php");
        }elseif($kiemtra2){
            // Nếu email đã tồn tại, hiển thị thông báo
            echo "<script>alert('Tên đăng nhập đã tồn tại trong cơ sở dữ liệu. Vui lòng nhập Tên đăng nhập khác.');</script>";
            $HoTen = $_POST["txthoten"];
            $Sdt = $_POST["txtsodienthoai"];
            $DiaChi = $_POST["txtdiachi"];
            $MatKhau = $_POST["txtmatkhau"];
            $MaQ = $_POST["optquyen"];
            $TrangThai = $_POST["txttrangthai"];
            $HinhAnh = basename($_FILES["fileanh"]["name"]);
            $quyen = $q->laydanhsachquyen();
            include("themnguoidung.php");
        }
         else {
            //xử lý load ảnh
            $hinhanh = basename($_FILES["fileanh"]["name"]); // đường dẫn ảnh lưu trong db
            $duongdan = "../../img/user/" . $hinhanh; //nơi lưu file upload
            move_uploaded_file($_FILES["fileanh"]["tmp_name"], $duongdan);
            //xử lý thêm 
            $nguoidungmoi = new NGUOIDUNG();
            $nguoidungmoi->setTenDangNhap($_POST["txttendangnhap"]);
            $nguoidungmoi->setSdt($_POST["txtsodienthoai"]);
            $nguoidungmoi->setMatKhau($_POST["txtmatkhau"]);
            $nguoidungmoi->setDiaChi($_POST["txtdiachi"]);
            $nguoidungmoi->setHoTen($_POST["txthoten"]);
            $nguoidungmoi->setMaQ($_POST["optquyen"]);
            $nguoidungmoi->setTrangThai($_POST["txttrangthai"]);
            $nguoidungmoi->setHinhAnh($hinhanh);
            // thêm
            $nd->themnguoidung($nguoidungmoi);
            // load người dùng
            $quyen = $q->laydanhsachquyen();
            $nguoidung = $nd->laydanhsachnguoidung();
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
        include("main.php");
        break;
    default:
        break;
}

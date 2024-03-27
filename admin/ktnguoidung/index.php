<?php session_start();
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");

// Biến $isLogin cho biết người dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);
// Kiểm tra hành động $action: yêu cầu đăng nhập nếu chưa xác thực
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} elseif ($isLogin == FALSE) {
    $action = "dangnhap";
} else {
    $action = "macdinh";
}
$nd = new NGUOIDUNG();
$q = new QUYEN();
switch ($action) {
    case "macdinh":
        include("main.php");
        break;
    case "dangnhap":
        include("login.php");
        break;
    case "dangky":
        include("register.php");
        break;
    case "quenmatkhau":
        include("forgot-password.php");
        break;
    case "xulydangnhap":

        $tendangnhap = $_POST["txtdangnhap"];
        $matkhau = $_POST["txtpassword"];

        // Kiểm tra tính hợp lệ của tendangnhap và mật khẩu
        if ($nd->kiemtranguoidunghople($tendangnhap, $matkhau) == TRUE) {
            $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($tendangnhap);
            if ($_SESSION["nguoidung"]["TrangThai"] == 1 && $_SESSION["nguoidung"]["MaQ"] == 1) {
                include("main.php");
            } elseif ($_SESSION["nguoidung"]["TrangThai"] == 1 && $_SESSION["nguoidung"]["MaQ"] == 2) {
                header("Location:../../public/index.php");
            }elseif($_SESSION["nguoidung"]["TrangThai"] == 0){
                $thongbao = "Tài khoản đã bị khóa";
                include("login.php");
            } 
            else {
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
    case "xulydangky":
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
        } elseif ($kiemtra2) {
            // Nếu email đã tồn tại, hiển thị thông báo
            echo "<script>alert('Tên đăng nhập đã tồn tại trong cơ sở dữ liệu. Vui lòng nhập Tên đăng nhập khác.');</script>";
            $HoTen = $_POST["txthoten"];
            $Sdt = $_POST["sdt"];
            $DiaChi = $_POST["txtdiachi"];
            $MatKhau = $_POST["txtmatkhau"];
            $MaQ = $_POST["optquyen"];
            $TrangThai = $_POST["txttrangthai"];
            $HinhAnh = basename($_FILES["fileanh"]["name"]);
            $quyen = $q->laydanhsachquyen();
            include("register.php");
        } else {
            //xử lý load ảnh
            $hinhanh = basename($_FILES["fileanh"]["name"]); // đường dẫn ảnh lưu trong db
            $duongdan = "../../img/user/" . $hinhanh; //nơi lưu file upload
            move_uploaded_file($_FILES["fileanh"]["tmp_name"], $duongdan);
            //xử lý thêm 
            $nguoidungmoi = new NGUOIDUNG();
            $nguoidungmoi->setTenDangNhap($_POST["txttendn"]);
            $nguoidungmoi->setSdt($_POST["sdt"]);
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
            include("login.php");
        }
        include("login.php");
        break;
    default:
        break;
}

<?php
// if (!isset($_SESSION["nguoidung"]))
//     header("location:../index.php");

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
        //xử lý load ảnh
        $hinhanh = basename($_FILES["fileanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../img/user/" . $hinhanh; //nơi lưu file upload
        move_uploaded_file($_FILES["fileanh"]["tmp_name"], $duongdan);
        //xử lý thêm 
        $nguoidungmoi = new NGUOIDUNG();
        $nguoidungmoi->setEmail($_POST["txtemail"]);
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
        break;
    case "khoa":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["trangthai"]))
            $trangthai = $_REQUEST["trangthai"];
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

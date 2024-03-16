<?php
// if (!isset($_SESSION["nguoidung"]))
//     header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/quangcao.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$q = new QUYEN();
$nd = new NGUOIDUNG();
$qc = new QUANGCAO();

switch ($action) {
    case "xem":
        $quangcao = $qc->laydanhsachquangcao();
        include("main.php");
        break;
    case "themqc":
        include("themquangcao.php");
        break;
    case "xulythemqc":
        //xử lý load ảnh
        $hinhanh = basename($_FILES["fileanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../img/user/" . $hinhanh; //nơi lưu file upload
        move_uploaded_file($_FILES["fileanh"]["tmp_name"], $duongdan);
        //xử lý thêm 
        $quangcaomoi = new QUANGCAO();
        $quangcaomoi->setMoTa($_POST["txtmota"]);
        $quangcaomoi->setUrl($_POST["txturl"]);
        $quangcaomoi->setTrangThai($_POST["txttrangthai"]);
        $quangcaomoi->setHinhAnh($hinhanh);
        // thêm
        $qc->themquangcao($quangcaomoi);
        // load người dùng
        $quangcao = $qc->laydanhsachquangcao();
        include("main.php");
        break;
    case "suaqc":
        if (isset($_GET["id"])) {
            $goicuoc_ht = $gc->laydanhsachgoicuoctheoid($_GET["id"]);
            include("suagoicuoc.php");
        } else {
            $goicuoc = $gc->laydanhsachgoicuoc();
            include("goicuoc.php");
        }
        break;
    case "xulysuaqc": // lưu dữ liệu sửa mới vào db

        // gán dữ liệu từ form

        $sua = new GOICUOC();
        $sua->setMaGC($_POST["MaGC"]);
        $sua->setTen($_POST["txtten"]);
        $sua->setMoTa($_POST["txtmota"]);
        $sua->setDungLuong($_POST["txtdungluong"]);
        $sua->setThoiGianHieuLuc($_POST["thoigianhieuluc"]);
        // sửa
        $gc->suagoicuoc($sua);
        // load danh sách
        $goicuoc = $gc->laydanhsachgoicuoc();
        include("goicuoc.php");
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

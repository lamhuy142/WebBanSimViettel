<?php
// if (!isset($_SESSION["nguoidung"]))
//     header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/khuyenmai.php");
require("../../model/khuyenmai_gc.php");
require("../../model/khuyenmai_sim.php");
require("../../model/loaikhuyenmai.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$q = new QUYEN();
$nd = new NGUOIDUNG();
$km = new KHUYENMAI();
$km_gc = new KHUYENMAI_GC();
$km_s = new KHUYENMAI_SIM();
$l = new LOAIKHUYENMAI();

switch ($action) {
    case "xem":
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $loaikhuyenmai = $l->laydanhsachloaikhuyenmai();
        $ngayht = date("Y-m-d");
        include("main.php");
        break;
    case "themkm":
        $loaikhuyenmai = $l->laydanhsachloaikhuyenmai();
        include("themchuongtrinhkm.php");
        break;
    case "xulythemkm":
        //xử lý thêm 
        $khuyenmaimoi = new KHUYENMAI();
        $khuyenmaimoi->setTenKM($_POST["txttenkm"]);
        $khuyenmaimoi->setLoaiKM($_POST["optloai"]);
        $khuyenmaimoi->setGiaTriKM($_POST["txtgiatri"]);
        $khuyenmaimoi->setMoTa($_POST["txtmota"]);
        $khuyenmaimoi->setNgayBD($_POST["ngaybd"]);
        $khuyenmaimoi->setNgayKT($_POST["ngaykt"]);
        // thêm
        $km->themkhuyenmai($khuyenmaimoi);
        // load người dùng
        $loaikhuyenmai = $l->laydanhsachloaikhuyenmai();
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $ngayht = date("Y-m-d");
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

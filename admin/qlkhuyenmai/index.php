<?php
// if (!isset($_SESSION["nguoidung"]))
//     header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/khuyenmai.php");


// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$q = new QUYEN();
$nd = new NGUOIDUNG();
$km = new KHUYENMAI();


switch ($action) {
    case "xem":
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $ngayht = date("Y-m-d");
        include("main.php");
        break;
    case "themkm":
        include("themchuongtrinhkm.php");
        break;
    case "xulythemkm":
        //xử lý thêm 
        $khuyenmaimoi = new KHUYENMAI();
        $khuyenmaimoi->setTenKM($_POST["txttenkm"]);
        $khuyenmaimoi->setTieuDe($_POST["txttieude"]);
        $khuyenmaimoi->setLoaiKM($_POST["optloai"]);
        $khuyenmaimoi->setGiaTriKM($_POST["txtgiatri"]);
        $khuyenmaimoi->setMoTa($_POST["txtmota"]);
        $khuyenmaimoi->setNgayBD($_POST["ngaybd"]);
        $khuyenmaimoi->setNgayKT($_POST["ngaykt"]);
        $khuyenmaimoi->setTrangThai($_POST["trangthai"]);
        // thêm
        $km->themkhuyenmai($khuyenmaimoi);
        // load người dùng
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $ngayht = date("Y-m-d");
        include("main.php");
        break;
    case "sua":
        if (isset($_GET["id"])) {
            $khuyenmai_ht = $km->laydanhsachkhuyenmaitheoid($_GET["id"]);
            include("suakhuyenmai.php");
        } else {
            $khuyenmai = $km->laydanhsachkhuyenmai();
            $ngayht = date("Y-m-d");
            include("main.php");
        }
        break;
    case "xulysua": // lưu dữ liệu sửa mới vào db

        // gán dữ liệu từ form

        $sua = new KHUYENMAI();
        $sua->setMaKM($_POST["MaKM"]);
        $sua->setTenKM($_POST["txttenkm"]);
        $sua->setMoTa($_POST["txtmota"]);
        $sua->setTrangThai($_POST["txttrangthai"]);
        $sua->setTieuDe($_POST["txttieude"]);
        $sua->setGiaTriKM($_POST["txtgiatri"]);
        $sua->setLoaiKM($_POST["optloai"]);
        $sua->setNgayBD($_POST["ngaybd"]);
        $sua->setNgayKT($_POST["ngaykt"]);

        
        // sửa
        $km->suakhuyenmai($sua);
        // load danh sách
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $ngayht = date("Y-m-d");
        include("main.php");
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
            $km->doitrangthai($id, $trangthai);
        } else {
            $trangthai = 1;
            $km->doitrangthai($id, $trangthai);
        }
        // load người dùng
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $ngayht = date("Y-m-d");
        include("main.php");
        break;
    default:
        break;
}

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
        $nguoidung = $nd->laydanhsachnguoidung();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        // Đánh giá chưa được phản hồi 
        $nguoidung = $nd->laydanhsachnguoidung();

        include("main.php");
        break;
    case "chuyentrang":
        header("Location:../../public/index.php");
        break;
    case "phanhoi":
        if (isset($_GET["id"])) {
            $danhgia_ht = $dg->laydanhsachdanhgiatheoid($_GET["id"]);
            $trangthai = $dg->kiemtradanhgia($_GET["id"]);
            $danhgia = $dg->laydanhsachdanhgia();
            $traloidanhgia = $tl->laydanhsachtraloidanhgia();
            $traloi = $tl->traloidanhgiatheomadg($_GET["id"]);
            // print_r($traloi);
            // exit();
            $nguoidung = $nd->laydanhsachnguoidung();

            include("phanhoi.php");
        }else {
            $nguoidung = $nd->laydanhsachnguoidung();
            $danhgia = $dg->laydanhsachdanhgia();
            $traloidanhgia = $tl->laydanhsachtraloidanhgia();
            include("main.php");
        }

        break;
    case "xulyphanhoi":
        //xử lý thêm 
        $moi = new TRALOIDANHGIA();
        $ngaytl = date("Y-m-d");
        $moi->setTraLoi($_POST["txttraloi"]);
        $moi->setMaDG($_POST["MaDG"]);
        $moi->setMaND($_SESSION["nguoidung"]["MaND"]);
        $moi->setNgayTL($ngaytl);
        // thêm
        $tl->themtraloidanhgia($moi);
        // load người dùng
        $danhgia = $dg->laydanhsachdanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        echo "<script>alert('Đã phản hồi.');</script>";
        include("main.php");
        break;
    default:
        break;
}

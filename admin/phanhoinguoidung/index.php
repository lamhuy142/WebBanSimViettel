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
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        include("main.php");
        break;
    case "chuyentrang":
        header("Location:../../public/index.php");
        break;
    case "phanhoi":
        if (isset($_GET["id"])) {
            $danhgia_ht = $dg->laydanhsachdanhgiatheoid($_GET["id"]);
            $danhgia = $dg->laydanhsachdanhgia();
            $traloidanhgia = $tl->laydanhsachtraloidanhgia();
            // Đánh giá chưa được phản hồi 
            $luotdg = 0;
            foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
            include("phanhoi.php");
        } else {
            $nguoidung = $nd->laydanhsachnguoidung();
            $danhgia = $dg->laydanhsachdanhgia();
            $traloidanhgia = $tl->laydanhsachtraloidanhgia();
            // Đánh giá chưa được phản hồi 
            $luotdg = 0;
            foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
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
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $t) {
            if ($t["TraLoi"] == null
            ) {
                $luotdg = $luotdg + 1;
            }
        }
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
        $danhgia = $dg->laydanhsachdanhgia();
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $t) {
            if ($t["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        include("main.php");
        break;
    default:
        break;
}

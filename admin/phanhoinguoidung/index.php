<?php
// session_start();

if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/danhgia.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$q = new QUYEN();
$nd = new NGUOIDUNG();
$dg = new DANHGIA();

switch ($action) {
    case "xem":
        $nguoidung = $nd->laydanhsachnguoidung();
        $danhgia = $dg->laydanhsachdanhgia();
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($danhgia as $dg) {
            if ($dg["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        include("main.php");
        break;
    case "phanhoi":
        if (isset($_GET["id"])) {
            $danhgia_ht = $dg->laydanhsachdanhgiatheoid($_GET["id"]);
            $danhgia = $dg->laydanhsachdanhgia();
            // Đánh giá chưa được phản hồi 
            $luotdg = 0;
            foreach ($danhgia as $dg) {
                if ($dg["TraLoi"] == null) {
                    $luotdg = $luotdg + 1;
                }
            }
            include("phanhoi.php");
        } else {
            $nguoidung = $nd->laydanhsachnguoidung();
            $danhgia = $dg->laydanhsachdanhgia();
            $danhgia = $dg->laydanhsachdanhgia();
            // Đánh giá chưa được phản hồi 
            $luotdg = 0;
            foreach ($danhgia as $dg) {
                if ($dg["TraLoi"] == null) {
                    $luotdg = $luotdg + 1;
                }
            }
            include("main.php");
        }

        break;
    case "xulyphanhoi":
        //xử lý thêm 
        // $moi = new DANHGIA();
        $MaDG = $_POST["MaDG"];
        $TraLoi = $_POST["txttraloi"];
        // thêm
        $dg->capnhattraloi($MaDG, $TraLoi);
        // load người dùng
        $danhgia = $dg->laydanhsachdanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($danhgia as $dg) {
            if ($dg["TraLoi"] == null
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
        foreach ($danhgia as $dg) {
            if ($dg["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        include("main.php");
        break;
    default:
        break;
}

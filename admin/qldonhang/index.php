<?php
// if (!isset($_SESSION["nguoidung"]))
//     header("location:../index.php");

require("../../model/database.php");
// require("../../mode/donhang_ct.php");
require("../../model/donhang.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");


// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "xem";
}

$dh = new DONHANG();
$nd = new NGUOIDUNG();
$q = new QUYEN();

switch ($action) {
    case "xem":
        // Kiểm tra xem có yêu cầu tìm kiếm mã đơn hàng không
        // Kiểm tra và xử lý yêu cầu tìm kiếm mã đơn hàng
        if (isset($_GET['txtMaDH'])) {
            $maDH = $_GET['txtMaDH'];
            $donhang_tk = $dh->timdonhangtheoid($maDH);
            include("timkiem.php");
        } else {
            $donhang = $dh->laydanhsachdonhang();
            $nguoidung = $nd->laydanhsachnguoidung();
            include("main.php");
        }
        
        break;
    case "xemchitiet":
        $donhang = $dh->laydanhsachdonhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("chitietdonhang.php");
        break;
    case "khoa":

        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["TrangThai"]))
            $tinhtrang = $_REQUEST["TrangThai"];
        else
            $tinhtrang = "1";
        if ($tinhtrang == "0") {
            $tinhtrang = 1;
            $dh->doitrangthai($id, $tinhtrang);
        }
        // load hóa đơn
        $quyen = $q->laydanhsachquyen();
        $nguoidung = $nd->laydanhsachnguoidung();
        $donhang = $dh->laydanhsachdonhang();
        include("main.php");
        break;
    case "hoantat":

        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["TrangThai"]))
            $tinhtrang = $_REQUEST["TrangThai"];
        else
            $tinhtrang = "1";
        if ($tinhtrang == "1") {
            $tinhtrang = 2;
            $dh->doitrangthai($id, $tinhtrang);
        }
        //cập nhật thời gian giao hàng khi nhấn nút hoàn tất
        $donhanght = new DONHANG();
        $currentDateTime = date('Y-m-d H:i:s');
        $dh->capnhatngaygiaohang($id, $currentDateTime);

        // load hóa đơn
        $quyen = $q->laydanhsachquyen();
        $nguoidung = $nd->laydanhsachnguoidung();
        $donhang = $dh->laydanhsachdonhang();
        include("main.php");
        break;
    case "huydon":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["tinhtrang"]))
            $tinhtrang = $_REQUEST["tinhtrang"];
        else
            $tinhtrang = "1";
        $tinhtrang = 3;
        $dh->doitrangthai($id, $tinhtrang);
        // load hóa đơn
        $quyen = $q->laydanhsachquyen();
        $nguoidung = $nd->laydanhsachnguoidung();
        $donhang = $dh->laydanhsachdonhang();
        include("main.php");
        break;
    default:
        break;
}

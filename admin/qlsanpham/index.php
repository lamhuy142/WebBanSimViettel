<?php
// if (!isset($_SESSION["nguoidung"])) 
// header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/sim.php");
require("../../model/goicuoc.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "macdinh";
}

$s = new SIM();
$gc = new GOICUOC();

switch ($action) {
    case "sim":
        $sim = $s->laydanhsachsim();
        include("sim.php");
        break;
    case "goicuoc":
        $goicuoc = $gc->laydanhsachgoicuoc();
        include("goicuoc.php");
        break;
    case "themsim":
        
        include("themsim.php");
        break;
    case "xulythem":
        //xử lý thêm mặt hàng
        $moi = new SIM();
        $moi->setSoSim($_POST["txttenmp"]);
        $moi->setMoTa($_POST["optphanloai"]);
        $moi->setHinhAnh($_POST["txtthuonghieu"]);
        $moi->setGiaGoc($_POST["txtthuonghieu"]);
        $moi->setGiaBan($_POST["txtthuonghieu"]);
        $moi->setMaLS($_POST["txtthuonghieu"]);
        // thêm
        $mp->themmypham($moi);

        // load sản phẩm
        $loai = $lmp->layloaimypham();
        $mypham = $mp->laymypham();
        include("main.php");
        break;
    default:
        break;
}

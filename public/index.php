<?php
require("../model/database.php");
require("../model/sim.php");
require("../model/loaisim.php");
require("../model/khuyenmai.php");



// Xét xem có thao tác nào được chọn
// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "macdinh";
}

$s = new SIM();
$ls = new LOAISIM();
$km = new KHUYENMAI();

switch ($action) {
    case "macdinh":
        $sim = $s->laydanhsachsim();
        $thuebao = $s->laydanhsachloaithuebao();
        $loaisim = $ls->laydanhsachloaisim();
        $khuyenmai = $km->laydanhsachkhuyenmai();
        include("main.php");
        break;
    case "detail":
        if (isset($_GET["id"])) {
            $khuyenmai_ht = $km->laydanhsachkhuyenmaitheoid($_GET["id"]);
            include("blog-detail.php");
        } else {
            $sim = $s->laydanhsachsim();
            $thuebao = $s->laydanhsachloaithuebao();
            $loaisim = $ls->laydanhsachloaisim();
            $khuyenmai = $km->laydanhsachkhuyenmai();
            include("main.php");
        }
        break;
        
    default:
        break;
}

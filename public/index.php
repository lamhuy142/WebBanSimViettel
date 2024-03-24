<?php
require("../model/database.php");
require("../model/sim.php");
require("../model/loaisim.php");



// Xét xem có thao tác nào được chọn
// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "macdinh";
}

$s = new SIM();
$ls = new LOAISIM();

switch ($action) {
    case "macdinh":
        $sim = $s->laydanhsachsim();
        $thuebao = $s->laydanhsachloaithuebao();
        $loaisim = $ls->laydanhsachloaisim();
        include("main.php");
        break;
    default:
        break;
}

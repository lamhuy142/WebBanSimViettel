<?php
require("../model/database.php");
require("../model/sim.php");
require("../model/loaisim.php");



// Xét xem có thao tác nào được chọn

    $action = "macdinh";

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

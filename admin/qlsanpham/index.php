<?php
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{   // mặc định là xem danh sách
    $action="macdinh";
}

switch ($action) {
case "macdinh":
    include("main.php");
    break;
default:
    break;
}

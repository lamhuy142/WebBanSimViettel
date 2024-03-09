<?php
require("../model/database.php");


// Xét xem có thao tác nào được chọn

    $action = "macdinh";

switch ($action) {
    case "macdinh":
       
        include("main.php");
        break;
    default:
        break;
}

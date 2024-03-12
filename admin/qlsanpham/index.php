<?php
// if (!isset($_SESSION["nguoidung"])) 
// header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/sim.php");
require("../../model/goicuoc.php");
require("../../model/loaisim.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "sim";
}

$s = new SIM();
$gc = new GOICUOC();
$ls = new LOAISIM();

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
        $loaisim = $ls->laydanhsachloaisim();
        include("themsim.php");
        break;
    case "xulythem":
        //xử lý thêm mặt hàng
        //xử lý load ảnh
        $hinhanh = basename($_FILES["fileanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../img/sim/sim/" .$hinhanh; //nơi lưu file upload
        $moi = new SIM();
        $moi->sethinhanh($hinhanh);
        $moi->setSoSim($_POST["txtsosim"]);
        $moi->setMoTa($_POST["txtmota"]);
        $moi->setMaLS($_POST["optloaisim"]);
        $moi->setHinhAnh($hinhanh);
        $moi->setGiaGoc($_POST["txtgiagoc"]);
        $moi->setGiaBan($_POST["txtgiaban"]);
        // thêm
        $s->themsim($moi);

        // load sản phẩm
        $loaisim = $ls->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        include("sim.php");
        break;
    case "xoa":
        $xoa = new SIM();
        $xoa->setMaSim($_GET["id"]);
        $sim = $s->xoasim($xoa);
        $loaisim = $l->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        include("sim.php");
        break;
    case "sua":
        if (isset($_GET["id"])) {
            $sim_ht = $s->laydanhsachsim($_GET["id"]);
            $loai = $ls->laydanhsachloaisim();
            include("suasim.php");
        } else {
            $sim = $s->laydanhsachsim();
            include("sim.php");
        }
        break;
    case "xulysua": // lưu dữ liệu sửa mới vào db

        // gán dữ liệu từ form
        $sua = new SIM();
        $sua->setMaSim($_POST["id"]);
        $sua->setSoSim($_POST["txtsosim"]);
        $sua->setGiaGoc($_POST["txtgiagoc"]);
        $sua->setGiaBan($_POST["txtgiaban"]);
        $sua->setMoTa($_POST["txtmota"]);
        $sua->setHinhAnh($_POST["hinhanh"]);

        if ($_FILES["filehinhanh"]["name"] != "") {
            //xử lý load ảnh
            $hinhanh = basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
            $sua->sethinhanh($hinhanh);
            $duongdan = "../../img/sim/sim/" . $hinhanh; //nơi lưu file upload
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        // sửa
        $s->suasim($sua);
        // load danh sách
        $loai = $ls->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        include("sim.php");
        break;
    default:
        break;
}

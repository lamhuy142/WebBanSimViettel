<?php
// if (!isset($_SESSION["nguoidung"])) 
// header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/sim.php");
require("../../model/loaisim.php");
require("../../model/goicuoc.php");


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
        $loai = $ls->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        include("sim.php");
        break;
    case "loaisim":
        $loai = $ls->laydanhsachloaisim();
        $goicuoc = $gc->laydanhsachgoicuoc();
        include("loaisim.php");
        break;
    case "themsim":
        $loai = $ls->laydanhsachloaisim();
        $loaithuebao = $s->laydanhsachloaithuebao();
        include("themsim.php");
        break;
    case "xulythem":
        //xử lý thêm mặt hàng
        //xử lý load ảnh
        $hinhanh = basename($_FILES["fileanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../img/sim/sim/" . $hinhanh; //nơi lưu file upload
        $moi = new SIM();
        $moi->sethinhanh($hinhanh);
        $moi->setSoSim($_POST["txtsosim"]);
        $moi->setLoaiThueBao($_POST["optloaithuebao"]);
        $moi->setMoTa($_POST["txtmota"]);
        $moi->setMaLS($_POST["optloaisim"]);
        $moi->setHinhAnh($hinhanh);
        $moi->setGiaGoc($_POST["txtgiagoc"]);
        $moi->setGiaBan($_POST["txtgiaban"]);
        $moi->setTinhTrang($_POST["txttinhtrang"]);
        // thêm
        $s->themsim($moi);
        // load sản phẩm
        $loai = $ls->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        include("sim.php");
        break;
    case "themls":
        include("themloaisim.php");
        break;
    case "xulythemls":
        $SoSim = $_POST["txtsosim"];
        $DungLuong = $_POST["txtdungluong"];
        $MoTa = $_POST["txtmota"];
        $GiaGoc = $_POST["txtgiagoc"];
        $GiaBan = $_POST["txtgiaban"];
        //xử lý thêm mặt hàng
        $moi = new GOICUOC();
        $moi->setTen($_POST["txttengc"]);
        $moi->setMoTa($_POST["txtmota"]);
        $moi->setDungLuong($_POST["txtdungluong"]);
        $moi->setGia($_POST["gia"]);
        $moi->setGia($_POST["gia"]);
        // thêm
        $gc->themgoicuoc($moi);

        // load sản phẩm
        $loai = $ls->laydanhsachloaisim();
        include("loaisim.php");
        break;
    // case "xoa":
    //     $xoa = new SIM();
    //     $xoa->setMaSim($_GET["id"]);
    //     $sim = $s->xoasim($xoa);
    //     $loaisim = $ls->laydanhsachloaisim();
    //     $sim = $s->laydanhsachsim();
    //     include("sim.php");
    //     break;
    case "sua":
        if (isset($_GET["id"])) {
            $sim_ht = $s->laydanhsachsimtheoid($_GET["id"]);
            $loai = $ls->laydanhsachloaisim();
            $loaithuebao = $s->laydanhsachloaithuebao();
            include("suasim.php");
        } else {
            $sim = $s->laydanhsachsim();
            $loai = $ls->laydanhsachloaisim();
            $loaithuebao = $s->laydanhsachloaithuebao();
            include("sim.php");
        }
        break;
    case "xulysua": // lưu dữ liệu sửa mới vào db

        // gán dữ liệu từ form
        
        $sua = new SIM();
        $sua->setMaLS($_POST["optloaisim"]);
        $sua->setLoaiThueBao($_POST["optloaithuebao"]);
        $sua->setSoSim($_POST["txtsosim"]);
        $sua->setGiaGoc($_POST["txtgiagoc"]);
        $sua->setGiaBan($_POST["txtgiaban"]);
        $sua->setMoTa($_POST["txtmota"]);
        $sua->setTinhTrang($_POST["txttinhtrang"]);
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
        $loaithuebao = $s->laydanhsachloaithuebao();
        include("sim.php");
        break;
    
    case "suals":
        if (isset($_GET["id"])) {
            $loaisim_ht = $ls->laydanhsachloaisimtheoid($_GET["id"]);
            $loai = $ls->laydanhsachloaisim();
            $goicuoc = $gc->laydanhsachgoicuoc();
            include("sualoaisim.php");
        } else {
            $loai = $ls->laydanhsachloaisim();
            $goicuoc = $gc->laydanhsachgoicuoc();
            include("loaisim.php");
        }
        break;
    case "xulysuals": // lưu dữ liệu sửa mới vào db
        // gán dữ liệu từ form
        $sua = new LOAISIM();
        $sua->setMaGC($_POST["optloaigoicuoc"]);
        $sua->setTenLS($_POST["optloaisim"]);
        $sua->setLuotMua($_POST["txtluotmua"]);
        // sửa
        $ls->sualoaisim($sua);
        // load danh sách
        $loai = $ls->laydanhsachloaisim();
        $goicuoc = $gc->laydanhsachgoicuoc();
        include("loaisim.php");
        break;
    default:
        break;
}

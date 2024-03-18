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
        $loaisim = $ls->laydanhsachloaisim();
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
        $duongdan = "../../img/sim/sim/" . $hinhanh; //nơi lưu file upload
        $moi = new SIM();
        $moi->sethinhanh($hinhanh);
        $moi->setSoSim($_POST["txtsosim"]);
        $moi->setMoTa($_POST["txtmota"]);
        $moi->setMaLS($_POST["optloaisim"]);
        $moi->setHinhAnh($hinhanh);
        $moi->setGiaGoc($_POST["txtgiagoc"]);
        $moi->setGiaBan($_POST["txtgiaban"]);
        $moi->setTinhTrang($_POST["txttinhtrang"]);
        // thêm
        $s->themsim($moi);

        // load sản phẩm
        $loaisim = $ls->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        include("sim.php");
        break;
    case "themgoicuoc":
        include("themgoicuoc.php");
        break;
    case "xulythemgc":
        //xử lý thêm mặt hàng
        $moi = new GOICUOC();
        $moi->setTen($_POST["txttengc"]);
        $moi->setMoTa($_POST["txtmota"]);
        $moi->setDungLuong($_POST["txtdungluong"]);
        $moi->setThoiGianHieuLuc($_POST["txtthoigianhieuluc"]);
        $moi->setGia($_POST["gia"]);
        // thêm
        $gc->themgoicuoc($moi);

        // load sản phẩm
        $goicuoc = $gc->laydanhsachgoicuoc();
        include("goicuoc.php");
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
            include("suasim.php");
        } else {
            $sim = $s->laydanhsachsim();
            include("sim.php");
        }
        break;
    case "xulysua": // lưu dữ liệu sửa mới vào db

        // gán dữ liệu từ form
        
        $sua = new SIM();
        $sua->setMaSim($_POST["MaSim"]);
        $sua->setMaLS($_POST["optloaisim"]);
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
        include("sim.php");
        break;
    // case "xoagc":
    //     $xoa = new GOICUOC();
    //     $xoa->setMaGC($_GET["id"]);
    //     $goicuoc = $gc->xoagoicuoc($xoa);
    //     $goicuoc = $gc->laydanhsachgoicuoc();
    //     include("goicuoc.php");
    //     break;
    case "suagc":
        if (isset($_GET["id"])) {
            $goicuoc_ht = $gc->laydanhsachgoicuoctheoid($_GET["id"]);
            include("suagoicuoc.php");
        } else {
            $goicuoc = $gc->laydanhsachgoicuoc();
            include("goicuoc.php");
        }
        break;
    case "xulysuagc": // lưu dữ liệu sửa mới vào db

        // gán dữ liệu từ form

        $sua = new GOICUOC();
        $sua->setMaGC($_POST["MaGC"]);
        $sua->setTen($_POST["txtten"]);
        $sua->setMoTa($_POST["txtmota"]);
        $sua->setDungLuong($_POST["txtdungluong"]);
        $sua->setThoiGianHieuLuc($_POST["txtthoigianhieuluc"]);
        $sua->setGia($_POST["gia"]);
        // sửa
        $gc->suagoicuoc($sua);
        // load danh sách
        $goicuoc = $gc->laydanhsachgoicuoc();
        include("goicuoc.php");
        break;
    default:
        break;
}

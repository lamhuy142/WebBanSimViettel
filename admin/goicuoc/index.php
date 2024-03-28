<?php 
// session_start();

if (!isset($_SESSION["nguoidung"])) 
header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/sim.php");
require("../../model/loaisim.php");
require("../../model/goicuoc.php");
require("../../model/loaigoicuoc.php");


// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "goicuoc";
}

$s = new SIM();
$gc = new GOICUOC();
$ls = new LOAISIM();
$l = new LOAIGOICUOC();

switch ($action) {
    case "goicuoc":
        $loai = $l->laydanhsachloaigoicuoc();
        $goicuoc = $gc->laydanhsachgoicuoc();
        include("goicuoc.php");
        break;
    case "loaigoicuoc":
        $loai = $l->laydanhsachloaigoicuoc();
        $goicuoc = $gc->laydanhsachgoicuoc();
        include("loaigoicuoc.php");
        break;
    case "themsim":
        $loai = $ls->laydanhsachloaisim();
        $loaithuebao = $s->laydanhsachloaithuebao();
        include("themsim.php");
        break;
    case "xulythem":
        
        //xử lý load ảnh
        $hinhanh = basename($_FILES["fileanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../img/sim/" . $hinhanh; //nơi lưu file upload
        $moi = new SIM();
        $moi->sethinhanh($hinhanh);
        $moi->setSoSim($_POST["txtsosim"]);
        $moi->setLoaiThueBao($_POST["optloaithuebao"]);
        $moi->setMoTa($_POST["txtmota"]);
        $moi->setMaLS($_POST["optloaisim"]);
        $moi->setHinhAnh($hinhanh);
        $moi->setTinhTrang($_POST["txttinhtrang"]);
        // thêm
        $s->themsim($moi);
        // load sản phẩm
        $loai = $ls->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        include("sim.php");
        break;
    case "khoa":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["TrangThai"]))
        $trangthai = $_REQUEST["TrangThai"];
        else
            $trangthai = "1";
        if ($trangthai == "1") {
            $trangthai = 0;
            $s->doitrangthai($id, $trangthai);
        } else {
            $trangthai = 1;
            $s->doitrangthai($id, $trangthai);
        }
        // load danh sách
        $loai = $ls->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        include("sim.php");
        break;
    case "themls":
        $goicuoc = $gc->laydanhsachgoicuoc();
        include("themloaisim.php");
        break;
    case "xulythemls":
        
        // $SoSim = $_POST["txtsosim"];
        // $DungLuong = $_POST["txtdungluong"];
        // $MoTa = $_POST["txtmota"];
        // $GiaGoc = $_POST["txtgiagoc"];
        // $GiaBan = $_POST["txtgiaban"];
        //xử lý thêm mặt hàng
        $moi = new LOAISIM();
        $moi->setTenLS($_POST["txttenloaisim"]);
        $moi->setGiaBan($_POST["giaban"]);
        $moi->setGiaGoc($_POST["giagoc"]);
        $moi->setMaGC($_POST["optloaicuoc"]);
        $moi->setLuotMua($_POST["luotmua"]);
        // thêm
        $ls->themloaisim($moi);

        // load sản phẩm
        $loai = $ls->laydanhsachloaisim();
        $goicuoc = $gc->laydanhsachgoicuoc();
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
    case "suagc":
        if (isset($_GET["id"])) {
            $goicuoc_ht = $gc->laydanhsachgoicuoctheoid($_GET["id"]);
            $loai = $l->laydanhsachloaigoicuoc();
            include("suagoicuoc.php");
        } else {
            $loai = $l->laydanhsachloaigoicuoc();
            $goicuoc = $gc->laydanhsachgoicuoc();
            include("goicuoc.php");
        }
        break;
    case "xulysuagc": // lưu dữ liệu sửa mới vào db

        // gán dữ liệu từ form
        
        $sua = new GOICUOC();
        $sua->setMaGC($_POST["MaGC"]);
        $sua->setMaLGC($_POST["optloai"]);
        $sua->setTen($_POST["txtten"]);
        $sua->setThoiHan($_POST["txtthoihan"]);
        $sua->setMoTa($_POST["txtmota"]);
        $sua->setGia($_POST["gia"]);
        $sua->setGiaTriKM($_POST["giatrikm"]);

        // sửa
        $gc->suagoicuoc($sua);
        // load danh sách
        $loai = $l->laydanhsachloaigoicuoc();
        $goicuoc = $gc->laydanhsachgoicuoc();
        include("goicuoc.php");
        break;
    
    case "sualgc":
        if (isset($_GET["id"])) {
            $loaigoicuoc_ht = $l->laydanhsachloaigoicuoctheoid($_GET["id"]);
            $loai = $l->laydanhsachloaigoicuoc();
            include("sualoaigoicuoc.php");
        } else {
            $loai = $l->laydanhsachloaigoicuoc();
            include("loaigoicuoc.php");
        }
        break;
    case "xulysualgc": // lưu dữ liệu sửa mới vào db
        // gán dữ liệu từ form
        $sua = new LOAISIM();
        $sua->setMaLS($_POST["MaLS"]);
        $sua->setTenLS($_POST["txttenloaisim"]);
        $sua->setMaGC($_POST["optloaigoicuoc"]);
        $sua->setGiaGoc($_POST["txtgiagoc"]);
        $sua->setGiaBan($_POST["txtgiaban"]);
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

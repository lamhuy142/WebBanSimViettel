<?php 
// session_start();

if (!isset($_SESSION["nguoidung"])) 
header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/goicuoc.php");
require("../../model/loaigoicuoc.php");
require("../../model/sim.php");
require("../../model/loaisim.php");
require("../../model/danhgia.php");
require("../../model/traloidanhgia.php");



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
$dg = new DANHGIA();
$tl = new TRALOIDANHGIA();
$nd = new NGUOIDUNG();
switch ($action) {
    case "goicuoc":
        $loai = $l->laydanhsachloaigoicuoc();
        $goicuoc = $gc->laydanhsachgoicuoc();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("goicuoc.php");
        break;
    case "chuyentrang":
        header("Location:../../public/index.php");
        break;
    case "loaigoicuoc":
        $loai = $l->laydanhsachloaigoicuoc();
        $goicuoc = $gc->laydanhsachgoicuoc();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("loaigoicuoc.php");
        break;
    case "themgoicuoc":
        $loai = $l->laydanhsachloaigoicuoc();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("themgoicuoc.php");
        break;
    case "xulythemgc":
        $dsgc = $gc->laydanhsachgoicuoc();
        foreach ($dsgc as $kt) :
            // print_r($kt["Ten"]);
            // exit();
            if ($kt["Ten"] == $_POST["txttengc"]) {
                echo "<script>alert('Tên gói cước đã tồn tại, Vui lòng nhập lại.'); window.history.back();</script>";
                $LoaiGC = $_POST["optloaigc"];
                $GoiCuoc = $_POST["txttengc"];
                $GiaTriKM = $_POST["txtgiatrikm"];
                $ThoiHan = $_POST["txtthoihan"];
                $Gia = $_POST["gia"];
                $MoTa = $_POST["txtmota"];
                exit();
            } 
            elseif (strlen($_POST["gia"]) < 4 ||  $_POST["gia"] < 0 ) {
                echo "<script>alert('Giá phải 4 kí tự và không được là số âm , Vui lòng nhập lại.');window.history.back();</script>";
                $LoaiGC = $_POST["optloaigc"];
                $GoiCuoc = $_POST["txttengc"];
                $GiaTriKM = $_POST["txtgiatrikm"];
                $ThoiHan = $_POST["txtthoihan"];
                $Gia = $_POST["gia"];
                $MoTa = $_POST["txtmota"];
                exit();
            } elseif ($_POST["gia"] == null) {
                echo "<script>alert(', Vui lòng nhập lại số điện thoại.');window.history.back();</script>";
                $LoaiGC = $_POST["optloaigc"];
                $GoiCuoc = $_POST["txttengc"];
                $GiaTriKM = $_POST["txtgiatrikm"];
                $ThoiHan = $_POST["txtthoihan"];
                $Gia = $_POST["gia"];
                $MoTa = $_POST["txtmota"];
                exit();
            }
        endforeach;
        // thêm gói cước
        $moi = new GOICUOC();
        $moi->setTen($_POST["txttengc"]);
        $moi->setGia($_POST["gia"]);
        $moi->setMaLGC($_POST["optloaigc"]);
        $moi->setMoTa($_POST["txtmota"]);
        $moi->setGiaTriKM($_POST["txtgiatrikm"]);
        $moi->setThoiHan($_POST["txtthoihan"]);
        // thêm
        $gc->themgoicuoc($moi);
        echo "<script>alert('Thêm thành công.');</script>";

        // load sản phẩm
        $loai = $l->laydanhsachloaigoicuoc();
        $goicuoc = $gc->laydanhsachgoicuoc();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("goicuoc.php");
        break;
    case "doitrangthaigc":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["TrangThai"]))
        $trangthai = $_REQUEST["TrangThai"];
        else
            $trangthai = "1";
        if ($trangthai == "1") {
            $trangthai = 0;
            $gc->doitrangthai($id, $trangthai);
        } else {
            $trangthai = 1;
            $gc->doitrangthai($id, $trangthai);
        }
        // load danh sách
        $loai = $l->laydanhsachloaigoicuoc();
        $goicuoc = $gc->laydanhsachgoicuoc();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        echo "<script>alert('Đổi trạng thái thành công.');</script>";

        include("goicuoc.php");

        break;
    case "khoalgc":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["TrangThai"]))
        $trangthai = $_REQUEST["TrangThai"];
        else
            $trangthai = "1";
        if ($trangthai == "1") {
            $trangthai = 0;
            $l->doitrangthai($id, $trangthai);
        } else {
            $trangthai = 1;
            $l->doitrangthai($id, $trangthai);
        }
        // load danh sách
        $loai = $l->laydanhsachloaigoicuoc();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        echo "<script>alert('Đổi trạng thái thành công.');</script>";

        include("loaigoicuoc.php");
        
        break;
    case "themlgc":
        $goicuoc = $gc->laydanhsachgoicuoc();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("themloaigoicuoc.php");
        break;
    case "xulythemlgc":

        $dsloai = $l->laydanhsachloaigoicuoc();
        foreach ($dsloai as $kt) :
            // print_r($kt["Ten"]);
            // exit();
            if ($kt["TenLGC"] == $_POST["txttenlgc"]) {
                echo "<script>alert('Loại gói cước đã tồn tại, Vui lòng nhập lại.'); window.history.back();</script>";
                $LoaiGC = $_POST["txttenlgc"];
                exit();
            } elseif (strlen($_POST["txttenlgc"]) < 4 ) {
                echo "<script>alert('Tên loại gói cước phải 4 kí tự và không được là số âm , Vui lòng nhập lại.');window.history.back();</script>";
                $LoaiGC = $_POST["txttenlgc"];
                exit();
            } elseif ($_POST["txttenlgc"] == null) {
                echo "<script>alert('Tên loại gói cước không được để trống, Vui lòng nhập lại.');window.history.back();</script>";
                $LoaiGC = $_POST["txttenlgc"];
                exit();
            }
        endforeach;
        //xử lý thêm mặt hàng
        $moi = new LOAIGOICUOC();
        $moi->setTenLGC($_POST["txttenlgc"]);
        $moi->setTrangThai(1);
        // thêm
        $l->themloaigoicuoc($moi);
        echo "<script>alert('Thêm thành công.');</script>";

        // load sản phẩm
        $loai = $l->laydanhsachloaigoicuoc();
        $goicuoc = $gc->laydanhsachgoicuoc();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("loaigoicuoc.php");
        break;
    case "suagc":
        if (isset($_GET["id"])) {
            $goicuoc_ht = $gc->laygoicuoctheoid($_GET["id"]);
            $loai = $l->laydanhsachloaigoicuoc();
            $danhgia = $dg->laydanhsachdanhgia();
            $traloidanhgia = $tl->laydanhsachtraloidanhgia();
            $nguoidung = $nd->laydanhsachnguoidung();

            include("suagoicuoc.php");
        } else {
            $loai = $l->laydanhsachloaigoicuoc();
            $goicuoc = $gc->laydanhsachgoicuoc();
            $danhgia = $dg->laydanhsachdanhgia();
            $traloidanhgia = $tl->laydanhsachtraloidanhgia();
            $nguoidung = $nd->laydanhsachnguoidung();

            include("goicuoc.php");
        }
        break;
    case "xulysuagc": // lưu dữ liệu sửa mới vào db
        $dsgc = $gc->laydanhsachgoicuoc();
        foreach ($dsgc as $kt) :
            // print_r($kt["Ten"]);
            // exit();
            if(strlen($_POST["gia"]) < 4 ||  $_POST["gia"] < 0) {
                echo "<script>alert('Giá phải 4 kí tự và không được là số âm , Vui lòng nhập lại.');window.history.back();</script>";
                exit();
            } elseif ($_POST["gia"] == null) {
                echo "<script>alert('Gia không được để trống, Vui lòng nhập giá.');window.history.back();</script>";
                // $LoaiGC = $_POST["optloai"];
                // $GoiCuoc = $_POST["txtten"];
                // $GiaTriKM = $_POST["giatrikm"];
                // $ThoiHan = $_POST["txtthoihan"];
                // $Gia = $_POST["gia"];
                // $MoTa = $_POST["txtmota"];
                exit();
            }elseif (strlen($_POST["txtten"]) < 2 ) {
                echo "<script>alert('Tên gói cước tối thiểu 2 kí tự, Vui lòng nhập lại.');window.history.back();</script>";
                exit();
            }
        endforeach;
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
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        echo "<script>alert('Cập nhật thành công.');</script>";

        include("goicuoc.php");
        break;
    
    case "sualgc":
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            // $loaigoicuoc_ht = $l->laydanhsachloaigoicuoctheoid($_GET["id"]);
            $loai = $l->laydanhsachloaigoicuoc();
            $danhgia = $dg->laydanhsachdanhgia();
            $traloidanhgia = $tl->laydanhsachtraloidanhgia();
            $nguoidung = $nd->laydanhsachnguoidung();

            include("loaigoicuoc.php");
        } else {
            $loai = $l->laydanhsachloaigoicuoc();
            $danhgia = $dg->laydanhsachdanhgia();
            $nguoidung = $nd->laydanhsachnguoidung();

            include("loaigoicuoc.php");
        }
        break;
    case "xulysualgc": // lưu dữ liệu sửa mới vào db
        $dslgc = $l->laydanhsachloaigoicuoc();
        foreach ($dslgc as $kt) :
            // print_r($kt["Ten"]);
            // exit();
            if (strlen($_POST["txtten"]) < 4) {
                echo "<script>alert('Tên loại gói cước phải 4 kí tự và không được là số âm , Vui lòng nhập lại.');window.history.back();</script>";
                exit();
            } elseif ($_POST["txtten"] == null
            ) {
                echo "<script>alert('Tên loại gói cước không được để trống, Vui lòng nhập giá.');window.history.back();</script>";
                // $LoaiGC = $_POST["optloai"];
                // $GoiCuoc = $_POST["txtten"];
                // $GiaTriKM = $_POST["giatrikm"];
                // $ThoiHan = $_POST["txtthoihan"];
                // $Gia = $_POST["gia"];
                // $MoTa = $_POST["txtmota"];
                exit();
            } elseif (strlen($_POST["txtten"]) < 2) {
                echo "<script>alert('Tên loại gói cước tối thiểu 2 kí tự, Vui lòng nhập lại.');window.history.back();</script>";
                exit();
            }
        endforeach;
        // gán dữ liệu từ form
        $sua = new LOAIGOICUOC();
        $sua->setMaLGC($_POST["MaLGC"]);
        $sua->setTenLGC($_POST["txtten"]);
        $sua->setTrangThai($_POST["trangthai"]);
        // sửa
        $l->sualoaigoicuoc($sua);
        // load danh sách
        $loai = $l->laydanhsachloaigoicuoc();
        $goicuoc = $gc->laydanhsachgoicuoc();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        echo "<script>alert('Cập nhật thành công.');</script>";

        include("loaigoicuoc.php");
        break;
    default:
        break;
}

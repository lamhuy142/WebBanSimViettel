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
require("../../model/danhgia.php");
require("../../model/traloidanhgia.php");


// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "sim";
}

$s = new SIM();
$gc = new GOICUOC();
$ls = new LOAISIM();
$dg = new DANHGIA();
$tl = new TRALOIDANHGIA();
$nd = new NGUOIDUNG();

switch ($action) {
    case "sim":
        $loai = $ls->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        $danhgia = $dg->laydanhsachdanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        include("sim.php");
        break;
    case "trove":
        header("Location: {$_SERVER['HTTP_REFERER']}");
        // exit();
        break;
    case "chuyentrang":
        header("Location:../../public/index.php");
        break;
    case "loaisim":
        $loai = $ls->laydanhsachloaisim();
        $goicuoc = $gc->laydanhsachgoicuoc();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("loaisim.php");
        break;
    case "themsim":
        $loai = $ls->laydanhsachloaisim();
        $loaithuebao = $s->laydanhsachloaithuebao();
        $danhgia = $dg->laydanhsachdanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();

        include("themsim.php");
        break;
    case "xulythem":
        $dssim = $s->laydanhsachsim();
        foreach ($dssim as $kt) :
            if ($kt["SoSim"] == $_POST["txtsosim"]) {
                echo "<script>alert('Số điện thoại đã tồn tại, Vui lòng nhập lại số điện thoại khác.'); window.history.back();</script>";
                $SoSim = $_POST["txtsosim"];
                $LoaiSim = $_POST["optloaisim"];
                $ThueBao = $_POST["optloaithuebao"];
                exit();
            } elseif (strlen($_POST["txtsosim"]) < 10) {
                echo "<script>alert('Số điện thoại phải có ít nhất 10 kí tự, Vui lòng nhập lại số điện thoại.'); window.history.back();</script>";
                $SoSim = $_POST["txtsosim"];
                $LoaiSim = $_POST["optloaisim"];
                $ThueBao = $_POST["optloaithuebao"];
                exit();
            } elseif (substr($_POST["txtsosim"], 0, 1) != "0") {
                echo "<script>alert('Số điện thoại phải có kí từ đầu là 0, Vui lòng nhập lại số điện thoại.'); window.history.back();</script>";
                $SoSim = $_POST["txtsosim"];
                $LoaiSim = $_POST["optloaisim"];
                $ThueBao = $_POST["optloaithuebao"];
                exit();
            }
        endforeach;
        $moi = new SIM();
        $moi->setSoSim($_POST["txtsosim"]);
        $moi->setLoaiThueBao($_POST["optloaithuebao"]);
        $moi->setMaLS($_POST["optloaisim"]);
        $moi->setTinhTrang(1);
        // thêm
        $s->themsim($moi);
        echo "<script>alert('Thêm thành công.');</script>";
        // load sản phẩm
        $loai = $ls->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("sim.php");
        break;
    case "doitrangthaisim":
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
        echo "<script>alert('Đã đổi trạng thái.');</script>";
        // load danh sách
        $loai = $ls->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        $danhgia = $dg->laydanhsachdanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();

        include("sim.php");
        break;
    case "doitrangthails":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["TrangThai"]))
            $trangthai = $_REQUEST["TrangThai"];
        else
            $trangthai = "1";
        if ($trangthai == "1") {
            $trangthai = 0;
            $ls->doitrangthai($id, $trangthai);
        } else {
            $trangthai = 1;
            $ls->doitrangthai($id, $trangthai);
        }
        echo "<script>alert('Đã đổi trạng thái.');</script>";
        // load danh sách
        $loai = $ls->laydanhsachloaisim();
        $goicuoc = $gc->laydanhsachgoicuoc();
        $danhgia = $dg->laydanhsachdanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        include("loaisim.php");
        break;
    case "themls":
        $goicuoc = $gc->laydanhsachgoicuoc();
        $danhgia = $dg->laydanhsachdanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        include("themloaisim.php");
        break;
    case "xulythemls":
        // print_r(strlen($_POST["giagoc"]));
        // exit();
        $dsloaisim = $ls->laydanhsachloaisim();
        foreach ($dsloaisim as $kt) :
            if ($kt["TenLS"] == $_POST["txttenloaisim"]) {
                echo "<script>alert('Loại sim đã tồn tại, Vui lòng nhập lại.'); window.history.back();</script>";
                $TenLS = $_POST["txttenloaisim"];
                $GiaGoc = $_POST["giagoc"];
                $GiaBan = $_POST["giaban"];
                $GoiCuoc = $_POST["optloaicuoc"];
                exit();
            } elseif (strlen($_POST["giagoc"]) < 4 ||  $_POST["giagoc"] < 0 || strlen($_POST["giaban"]) < 4 ||  $_POST["giaban"] < 0) {
                echo "<script>alert('Giá phải 4 kí tự và không được là số âm , Vui lòng nhập lại.');window.history.back();</script>";
                $TenLS = $_POST["txttenloaisim"];
                $GiaGoc = $_POST["giagoc"];
                $GiaBan = $_POST["giaban"];
                $GoiCuoc = $_POST["optloaicuoc"];
                exit();
            } elseif ($_POST["giagoc"] == null) {
                echo "<script>alert(', Vui lòng nhập lại số điện thoại.');window.history.back();</script>";
                $TenLS = $_POST["txttenloaisim"];
                $GiaGoc = $_POST["giagoc"];
                $GiaBan = $_POST["giaban"];
                $GoiCuoc = $_POST["optloaicuoc"];
                exit();
            }
        endforeach;
        //xử lý thêm mặt hàng
        $moi = new LOAISIM();
        $moi->setTenLS($_POST["txttenloaisim"]);
        $moi->setGiaBan($_POST["giaban"]);
        $moi->setGiaGoc($_POST["giagoc"]);
        $moi->setMaGC($_POST["optloaicuoc"]);
        $moi->setLuotMua($_POST["luotmua"]);
        $moi->setTrangThai(1);
        // thêm
        $ls->themloaisim($moi);

        // load 
        $loai = $ls->laydanhsachloaisim();
        $goicuoc = $gc->laydanhsachgoicuoc();
        $danhgia = $dg->laydanhsachdanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        echo "<script>alert('Thêm thành công.');</script>";
        include("loaisim.php");
        break;
    case "sua":
        if (isset($_GET["id"])) {
            $sim_ht = $s->laydanhsachsimtheoid($_GET["id"]);
            $loai = $ls->laydanhsachloaisim();
            $loaithuebao = $s->laydanhsachloaithuebao();
            $nguoidung = $nd->laydanhsachnguoidung();
            $danhgia = $dg->laydanhsachdanhgia();
            include("suasim.php");
        } else {
            $sim = $s->laydanhsachsim();
            $loai = $ls->laydanhsachloaisim();
            $loaithuebao = $s->laydanhsachloaithuebao();
            $nguoidung = $nd->laydanhsachnguoidung();
            $danhgia = $dg->laydanhsachdanhgia();
            
            include("sim.php");
        }
        break;
    case "xulysua": // lưu dữ liệu sửa mới vào db
        //kiểm tra 
        // $dssim = $s->laydanhsachsim();
        // foreach ($dssim as $kt) :
            if (strlen($_POST["txtsosim"]) < 10) {
                echo "<script>alert('Số điện thoại phải có ít nhất 10 kí tự, Vui lòng nhập lại số điện thoại.');window.history.back();</script>";
                exit();
            } elseif (substr($_POST["txtsosim"], 0, 1) != "0") {
                echo "<script>alert('Số điện thoại phải có kí từ đầu là 0, Vui lòng nhập lại số điện thoại.');window.history.back();</script>";
                exit();
            }
        // endforeach;
        // gán dữ liệu từ form

        $sua = new SIM();
        $sua->setMaSim($_POST["MaSim"]);
        $sua->setMaLS($_POST["optloaisim"]);
        $sua->setLoaiThueBao($_POST["optloaithuebao"]);
        $sua->setSoSim($_POST["txtsosim"]);
        $sua->setTinhTrang($_POST["trangthai"]);
        // sửa
        $s->suasim($sua);
        echo "<script>alert('Cập nhật thành công.');</script>";

        // load danh sách
        $loai = $ls->laydanhsachloaisim();
        $sim = $s->laydanhsachsim();
        $loaithuebao = $s->laydanhsachloaithuebao();
        $danhgia = $dg->laydanhsachdanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();

        include("sim.php");
        break;

    case "suals":
        
        if (isset($_GET["id"])) {
            $loaisim_ht = $ls->laydanhsachloaisimtheoid($_GET["id"]);
            $loai = $ls->laydanhsachloaisim();
            $goicuoc = $gc->laydanhsachgoicuoc();
            $nguoidung = $nd->laydanhsachnguoidung();
            $danhgia = $dg->laydanhsachdanhgia();
            include("sualoaisim.php");
        } else {
            $loai = $ls->laydanhsachloaisim();
            $goicuoc = $gc->laydanhsachgoicuoc();
            $nguoidung = $nd->laydanhsachnguoidung();
            $danhgia = $dg->laydanhsachdanhgia();
            include("loaisim.php");
        }
        break;
    case "xulysuals": // lưu dữ liệu sửa mới vào db
        $dsloaisim = $ls->laydanhsachloaisim();
        foreach ($dsloaisim as $kt) :
            if (strlen($_POST["giagoc"]) < 4 ||  $_POST["giagoc"] < 0 || strlen($_POST["giaban"]) < 4 ||  $_POST["giaban"] < 0) {
                echo "<script>alert('Giá phải 4 kí tự và không được là số âm , Vui lòng nhập lại.');window.history.back();</script>";
                exit();
            } elseif ($_POST["giagoc"] == null
            ) {
                echo "<script>alert('Giá không được để trống, Vui lòng nhập giá.');window.history.back();</script>";
                exit();
            }
        endforeach;
        // gán dữ liệu từ form
        $sua = new LOAISIM();
        $sua->setMaLS($_POST["MaLS"]);
        $sua->setTenLS($_POST["txttenloaisim"]);
        $sua->setMaGC($_POST["optloaigoicuoc"]);
        $sua->setGiaGoc($_POST["giagoc"]);
        $sua->setGiaBan($_POST["giaban"]);
        $sua->setLuotMua($_POST["txtluotmua"]);
        // sửa
        $ls->sualoaisim($sua);
        // load danh sách
        $loai = $ls->laydanhsachloaisim();
        $goicuoc = $gc->laydanhsachgoicuoc();
        $danhgia = $dg->laydanhsachdanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        echo "<script>alert('Cập nhật thành công.');</script>";

        include("loaisim.php");
        break;
    default:
        break;
}

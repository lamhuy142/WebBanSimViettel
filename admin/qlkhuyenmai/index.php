<?php
// session_start();

if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/khuyenmai.php");
require("../../model/loaikhuyenmai.php");
require("../../model/loaisim.php");
require("../../model/danhgia.php");
require("../../model/traloidanhgia.php");


// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$q = new QUYEN();
$nd = new NGUOIDUNG();
$km = new KHUYENMAI();
$lkm = new LOAIKHUYENMAI();
$ls = new LOAISIM();
$dg = new DANHGIA();
$tl = new TRALOIDANHGIA();


switch ($action) {
    case "xem":
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $loaikhuyenmai = $lkm->laydanhsachloaikhuyenmai();
        $loaisim = $ls->laydanhsachloaisim();
        $nguoidung = $nd->laydanhsachnguoidung();
        $ngayht = date("Y-m-d");
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        include("khuyenmai.php");
        break;
    case "chuyentrang":
        header("Location:../../public/index.php");
        break;
    case "themkm":
        $loaikhuyenmai = $lkm->laydanhsachloaikhuyenmai();
        $loaisim = $ls->laydanhsachloaisim();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("themchuongtrinhkm.php");
        break;
    case "xulythemkm":
        $dskm = $km->laydanhsachkhuyenmai();
        foreach ($dskm as $kt) :
            if ($kt["TenKM"] == $_POST["txttenkm"]) {
                echo "<script>alert('Tên đã tồn tại, Vui lòng nhập lại Tên khác.'); window.history.back();</script>";
                $tenkm = $_POST["txttenkm"];
                $giatri = $_POST["txtgiatri"];
                $loaikm = $_POST["optloai"];
                $loais = $_POST["optloaisim"];
                $hinhanh = $_FILES["fileanh"];
                $mota = $_POST["txtmota"];
                $ngaybd = $_POST["ngaybd"];
                $ngaykt = $_POST["ngaykt"];
                exit();
            } elseif (strlen($_POST["txttenkm"]) < 6) {
                echo "<script>alert('Tên phải có ít nhất 6 kí tự, Vui lòng nhập lại Tên.'); window.history.back();</script>";
                $tenkm = $_POST["txttenkm"];
                $giatri = $_POST["txtgiatri"];
                $loaikm = $_POST["optloai"];
                $loais = $_POST["optloaisim"];
                $hinhanh = $_FILES["fileanh"];
                $mota = $_POST["txtmota"];
                $ngaybd = $_POST["ngaybd"];
                $ngaykt = $_POST["ngaykt"];
                exit();
             }elseif ($_POST["txtgiatri"] == "0") {
                echo "<script>alert('Giá trị phải lớn hơn 0, Vui lòng nhập lại.'); window.history.back();</script>";
                $tenkm = $_POST["txttenkm"];
                $giatri = $_POST["txtgiatri"];
                $loaikm = $_POST["optloai"];
                $loais = $_POST["optloaisim"];
                $hinhanh = $_FILES["fileanh"];
                $mota = $_POST["txtmota"];
                $ngaybd = $_POST["ngaybd"];
                $ngaykt = $_POST["ngaykt"];
                exit();
            }
        endforeach;
        //xử lý load ảnh
        $hinhanh = basename($_FILES["fileanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../img/khuyenmai/" . $hinhanh; //nơi lưu file upload
        //xử lý thêm 
        $ngaytao = date("Y-m-d");
        $khuyenmaimoi = new KHUYENMAI();
        $khuyenmaimoi->setTenKM($_POST["txttenkm"]);
        $khuyenmaimoi->setMaLS($_POST["optloaisim"]);
        $khuyenmaimoi->setMaND($_SESSION["nguoidung"]["MaND"]);
        $khuyenmaimoi->setNgayTao($ngaytao);
        $khuyenmaimoi->setLoaiKM($_POST["optloai"]);
        $khuyenmaimoi->setGiaTriKM($_POST["txtgiatri"]);
        $khuyenmaimoi->setMoTa($_POST["txtmota"]);
        $khuyenmaimoi->setHinhAnh($hinhanh);
        $khuyenmaimoi->setNgayBD($_POST["ngaybd"]);
        $khuyenmaimoi->setNgayKT($_POST["ngaykt"]);
        $khuyenmaimoi->setTrangThai($_POST["trangthai"]);
        // thêm
        $km->themkhuyenmai($khuyenmaimoi);
        // load người dùng
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $loaikhuyenmai = $lkm->laydanhsachloaikhuyenmai();
        $nguoidung = $nd->laydanhsachnguoidung();
        $loaisim = $ls->laydanhsachloaisim();
        $danhgia = $dg->laydanhsachdanhgia();
        $ngayht = date("Y-m-d");
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        echo "<script>alert('Thêm thành công.');</script>";


        include("khuyenmai.php");
        break;
    case "sua":
        if (isset($_GET["id"])) {
            $khuyenmai_ht = $km->laydanhsachkhuyenmaitheoid($_GET["id"]);
            $loaikhuyenmai = $lkm->laydanhsachloaikhuyenmai();
            $loaisim = $ls->laydanhsachloaisim();
            if ($khuyenmai_ht == false) {
                echo "Không có dữ liệu";
                exit();
            }
            $nguoidung = $nd->laydanhsachnguoidung();
            $danhgia = $dg->laydanhsachdanhgia();

            include("suakhuyenmai.php");
        } else {
            $khuyenmai = $km->laydanhsachkhuyenmai();
            $loaikhuyenmai = $lkm->laydanhsachloaikhuyenmai();
            $loaisim = $ls->laydanhsachloaisim();
            $nguoidung = $nd->laydanhsachnguoidung();
            $danhgia = $dg->laydanhsachdanhgia();
            $ngayht = date("Y-m-d");

            include("khuyenmai.php");
        }
        break;
    case "xulysua": // lưu dữ liệu sửa mới vào db
        $dskm = $km->laydanhsachkhuyenmai();
        foreach ($dskm as $kt) :
            if (strlen($_POST["txttenkm"]) < 6) {
                echo "<script>alert('Tên phải có ít nhất 6 kí tự, Vui lòng nhập lại Tên.'); window.history.back();</script>";
                exit();
            } elseif ($_POST["txtgiatri"] == "0") {
                echo "<script>alert('Giá trị phải lớn hơn 0, Vui lòng nhập lại.'); window.history.back();</script>";
                exit();
            }
        endforeach;
        // gán dữ liệu từ form

        $sua = new KHUYENMAI();
        $sua->setMaKM($_POST["MaKM"]);
        $sua->setTenKM($_POST["txttenkm"]);
        $sua->setMaLS($_POST["optloai"]);
        $sua->setMoTa($_POST["txtmota"]);
        $sua->setHinhAnh($_POST["hinhanh"]);
        $sua->setTrangThai($_POST["txttrangthai"]);
        $sua->setGiaTriKM($_POST["txtgiatri"]);
        $sua->setLoaiKM($_POST["optloaikm"]);
        $sua->setNgayTao($_POST["ngaytao"]);
        $sua->setNgayBD($_POST["ngaybd"]);
        $sua->setNgayKT($_POST["ngaykt"]);

        if ($_FILES["filehinhanh"]["name"] != "") {
            //xử lý load ảnh
            $hinhanh = basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
            $sua->sethinhanh($hinhanh);
            $duongdan = "../../img/khuyenmai/" . $hinhanh; //nơi lưu file upload
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }

        // sửa
        $km->suakhuyenmai($sua);
        // load danh sách
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $loaikhuyenmai = $lkm->laydanhsachloaikhuyenmai();
        $loaisim = $ls->laydanhsachloaisim();
        $nguoidung = $nd->laydanhsachnguoidung();
        $danhgia = $dg->laydanhsachdanhgia();
        $ngayht = date("Y-m-d");
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        echo "<script>alert('Cập nhật thành công.');</script>";
        include("khuyenmai.php");
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
            $km->doitrangthai($id, $trangthai);
        } else {
            $trangthai = 1;
            $km->doitrangthai($id, $trangthai);
        }
        // load 
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $loaikhuyenmai = $lkm->laydanhsachloaikhuyenmai();
        $loaisim = $ls->laydanhsachloaisim();
        $nguoidung = $nd->laydanhsachnguoidung();
        $danhgia = $dg->laydanhsachdanhgia();
        $ngayht = date("Y-m-d");
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        echo "<script>alert('Đã đổi trạng thái.');</script>";

        include("khuyenmai.php");
        break;
        //-----------------------------------------------------------------
    case "danhmuc":
        $loai = $lkm->laydanhsachloaikhuyenmai();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("loaikhuyenmai.php");
        break;
    case "themloaikm":
        $danhgia = $dg->laydanhsachdanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        include("themloaikm.php");
        break;
    case "xulythemloaikm":
        //xử lý thêm 
        $moi = new LOAIKHUYENMAI();
        $moi->setTenLKM($_POST["txtten"]);
        $moi->setDonViKM($_POST["txtdonvi"]);
        $moi->setTrangThai($_POST["opttrangthai"]);
        // thêm
        $lkm->themloaikhuyenmai($moi);
        // load người dùng
        $loai = $lkm->laydanhsachloaikhuyenmai();
        $danhgia = $dg->laydanhsachdanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("loaikhuyenmai.php");
        break;
    case "sualoaikm":
        if (isset($_GET["id"])) {
            $loai_ht = $lkm->laydanhsachloaikmtheoid($_GET["id"]);
            $danhgia = $dg->laydanhsachdanhgia();
            $nguoidung = $nd->laydanhsachnguoidung();

            include("sualoaikm.php");
        } else {
            $loai = $lkm->laydanhsachloaikhuyenmai();
            $danhgia = $dg->laydanhsachdanhgia();
            $nguoidung = $nd->laydanhsachnguoidung();

            include("loaikhuyenmai.php");
        }
        break;
    case "xulysualoaikm": // lưu dữ liệu sửa mới vào db

        // gán dữ liệu từ form

        $sua = new LOAIKHUYENMAI();
        $sua->setMaLKM($_POST["MaLKM"]);
        $sua->setTenLKM($_POST["txtten"]);
        $sua->setDonViKM($_POST["txtdonvi"]);
        $sua->setTrangThai($_POST["opttrangthai"]);
        // sửa
        $lkm->capnhatloaikhuyenmai($sua);
        // load danh sách
        $loai = $lkm->laydanhsachloaikhuyenmai();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("loaikhuyenmai.php");
        break;
    case "khoaloaikm":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["TrangThai"]))
            $trangthai = $_REQUEST["TrangThai"];
        else
            $trangthai = "1";
        if ($trangthai == "1") {
            $trangthai = 0;
            $lkm->doitrangthai($id, $trangthai);
        } else {
            $trangthai = 1;
            $lkm->doitrangthai($id, $trangthai);
        }
        $loai = $lkm->laydanhsachloaikhuyenmai();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("loaikhuyenmai.php");
        break;
    default:
        break;
}

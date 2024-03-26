<?php

if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/khuyenmai.php");
require("../../model/loaikhuyenmai.php");
require("../../model/loaisim.php");


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


switch ($action) {
    case "xem":
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $loaikhuyenmai = $lkm->laydanhsachloaikhuyenmai();
        $loaisim = $ls->laydanhsachloaisim();
        $ngayht = date("Y-m-d");
        include("khuyenmai.php");
        break;
    case "themkm":
        $loaikhuyenmai = $lkm->laydanhsachloaikhuyenmai();
        $loaisim = $ls->laydanhsachloaisim();
        include("themchuongtrinhkm.php");
        break;
    case "xulythemkm":
        //xử lý load ảnh
        $hinhanh = basename($_FILES["fileanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../img/khuyenmai/" . $hinhanh; //nơi lưu file upload
        //xử lý thêm 
        $khuyenmaimoi = new KHUYENMAI();
        $khuyenmaimoi->setTenKM($_POST["txttenkm"]);
        $khuyenmaimoi->setMaLS($_POST["optloaisim"]);
        $khuyenmaimoi->setTieuDe($_POST["txttieude"]);
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
        $loaisim = $ls->laydanhsachloaisim();
        $ngayht = date("Y-m-d");
        include("khuyenmai.php");
        break;
    case "sua":
        if (isset($_GET["id"])) {
            $khuyenmai_ht = $km->laydanhsachkhuyenmaitheoid($_GET["id"]);
            include("suakhuyenmai.php");
        } else {
            $khuyenmai = $km->laydanhsachkhuyenmai();
            $loaikhuyenmai = $lkm->laydanhsachloaikhuyenmai();
            $loaisim = $ls->laydanhsachloaisim();
            $ngayht = date("Y-m-d");
            include("khuyenmai.php");
        }
        break;
    case "xulysua": // lưu dữ liệu sửa mới vào db

        // gán dữ liệu từ form

        $sua = new KHUYENMAI();
        $sua->setMaKM($_POST["MaKM"]);
        $sua->setTenKM($_POST["txttenkm"]);
        $sua->setMaLS($_POST["optloaisim"]);
        $sua->setMoTa($_POST["txtmota"]);
        $sua->setHinhAnh($_POST["hinhanh"]);
        $sua->setTrangThai($_POST["txttrangthai"]);
        $sua->setTieuDe($_POST["txttieude"]);
        $sua->setGiaTriKM($_POST["txtgiatri"]);
        $sua->setLoaiKM($_POST["optloai"]);
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
        $ngayht = date("Y-m-d");
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
        // load người dùng
        $khuyenmai = $km->laydanhsachkhuyenmai();
        $loaikhuyenmai = $lkm->laydanhsachloaikhuyenmai();
        $loaisim = $ls->laydanhsachloaisim();
        $ngayht = date("Y-m-d");
        include("khuyenmai.php");
        break;
        //-----------------------------------------------------------------
    case "danhmuc":
        $loai = $lkm->laydanhsachloaikhuyenmai();
        include("loaikhuyenmai.php");
        break;
    case "themloaikm":
        $trangthai = $lkm->laydanhsachloaikhuyenmai();
        include("themloaikm.php");
        break;
    case "xulythemloaikm":
        //xử lý thêm 
        $moi = new LOAIKHUYENMAI();
        $moi->setTenLKM($_POST["txtten"]);
        $moi->setDonViKM($_POST["txtdonvi"]);
        // thêm
        $lkm->themloaikhuyenmai($moi);
        // load người dùng
        $loai = $lkm->laydanhsachloaikhuyenmai();
        include("loaikhuyenmai.php");
        break;
    case "sualoaikm":
        if (isset($_GET["id"])) {
            $loai_ht = $lkm->laydanhsachloaikmtheoid($_GET["id"]);
            include("sualoaikm.php");
        } else {
            $loai = $lkm->laydanhsachloaikhuyenmai();
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
            $km->doitrangthai($id, $trangthai);
        } else {
            $trangthai = 1;
            $km->doitrangthai($id, $trangthai);
        }
        // load người dùng
        $loai = $lkm->laydanhsachloaikhuyenmai();
        include("loaikhuyenmai.php");
        break;
    default:
        break;
}

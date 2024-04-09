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
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
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
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        include("themchuongtrinhkm.php");
        break;
    case "xulythemkm":
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
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        
        include("khuyenmai.php");
        break;
    case "sua":
        if (isset($_GET["id"])) {
            $khuyenmai_ht = $km->laydanhsachkhuyenmaitheoid($_GET["id"]);
            $loaikhuyenmai = $lkm->laydanhsachloaikhuyenmai();
            $loaisim = $ls->laydanhsachloaisim();
            if($khuyenmai_ht == false){
                echo "Không có dữ liệu";
                exit();
            }
            $danhgia = $dg->laydanhsachdanhgia();
            // Đánh giá chưa được phản hồi 
            $luotdg = 0;
            foreach ($danhgia as $dg) {
                if ($dg["TraLoi"] == null) {
                    $luotdg = $luotdg + 1;
                }
            }
            include("suakhuyenmai.php");
        } else {
            $khuyenmai = $km->laydanhsachkhuyenmai();
            $loaikhuyenmai = $lkm->laydanhsachloaikhuyenmai();
            $loaisim = $ls->laydanhsachloaisim();
            $nguoidung = $nd->laydanhsachnguoidung();
            $danhgia = $dg->laydanhsachdanhgia();
            $ngayht = date("Y-m-d");
            // Đánh giá chưa được phản hồi 
            $luotdg = 0;
            foreach ($danhgia as $dg) {
                if ($dg["TraLoi"] == null) {
                    $luotdg = $luotdg + 1;
                }
            }
            
            include("khuyenmai.php");
        }
        break;
    case "xulysua": // lưu dữ liệu sửa mới vào db

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
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
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
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        include("khuyenmai.php");
        break;
        //-----------------------------------------------------------------
    case "danhmuc":
        $loai = $lkm->laydanhsachloaikhuyenmai();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        include("loaikhuyenmai.php");
        break;
    case "themloaikm":
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
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
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($danhgia as $dg) {
            if ($dg["TraLoi"] == null
            ) {
                $luotdg = $luotdg + 1;
            }
        }
        include("loaikhuyenmai.php");
        break;
    case "sualoaikm":
        if (isset($_GET["id"])) {
            $loai_ht = $lkm->laydanhsachloaikmtheoid($_GET["id"]);
            $danhgia = $dg->laydanhsachdanhgia();
            // Đánh giá chưa được phản hồi 
            $luotdg = 0;
            foreach ($danhgia as $dg) {
                if ($dg["TraLoi"] == null) {
                    $luotdg = $luotdg + 1;
                }
            }
            include("sualoaikm.php");
        } else {
            $loai = $lkm->laydanhsachloaikhuyenmai();
            $danhgia = $dg->laydanhsachdanhgia();
            // Đánh giá chưa được phản hồi 
            $luotdg = 0;
            foreach ($danhgia as $dg) {
                if ($dg["TraLoi"] == null) {
                    $luotdg = $luotdg + 1;
                }
            }
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
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
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
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        include("loaikhuyenmai.php");
        break;
    default:
        break;
}

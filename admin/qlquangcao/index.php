<?php 
// session_start();

if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/quangcao.php");
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
$qc = new QUANGCAO();
$dg = new DANHGIA();
$tl = new TRALOIDANHGIA();

switch ($action) {
    case "xem":
        $quangcao = $qc->laydanhsachquangcao();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        include("main.php");
        break;
    case "chuyentrang":
        header("Location:../../public/index.php");
        break;
    case "themqc":
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        include("themquangcao.php");
        break;
    case "xulythemqc":
        //xử lý load ảnh
        $hinhanh = basename($_FILES["fileanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../img/user/" . $hinhanh; //nơi lưu file upload
        move_uploaded_file($_FILES["fileanh"]["tmp_name"], $duongdan);
        //xử lý thêm 
        $quangcaomoi = new QUANGCAO();
        $quangcaomoi->setUrl($_POST["txturl"]);
        $quangcaomoi->setTrangThai($_POST["txttrangthai"]);
        $quangcaomoi->setHinhAnh($hinhanh);
        // thêm
        $qc->themquangcao($quangcaomoi);
        // load người dùng
        $quangcao = $qc->laydanhsachquangcao();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        include("main.php");
        break;
    case "suaqc":
        if (isset($_GET["id"])) {
            $quangcao_ht = $qc->laydanhsachquangcaotheoid($_GET["id"]);
            $danhgia = $dg->laydanhsachdanhgia();
            // Đánh giá chưa được phản hồi 
            $luotdg = 0;
            foreach ($danhgia as $dg) {
                if ($dg["TraLoi"] == null) {
                    $luotdg = $luotdg + 1;
                }
            }
            include("suaquangcao.php");
        } else {
            $quangcao = $qc->laydanhsachquangcao();
            $danhgia = $dg->laydanhsachdanhgia();
            // Đánh giá chưa được phản hồi 
            $luotdg = 0;
            foreach ($danhgia as $dg) {
                if ($dg["TraLoi"] == null) {
                    $luotdg = $luotdg + 1;
                }
            }
            include("main.php");
        }
        break;
    case "xulysuaqc": // lưu dữ liệu sửa mới vào db

        // gán dữ liệu từ form

        $sua = new QUANGCAO();
        $sua->setMaQC($_POST["MaQC"]);
        $sua->setTrangThai($_POST["txttrangthai"]);
        $sua->setHinhAnh($_POST["hinhanh"]);
        $sua->setUrl($_POST["txtduongdan"]);

        if ($_FILES["filehinhanh"]["name"] != "") {
            //xử lý load ảnh
            $hinhanh = basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
            $sua->sethinhanh($hinhanh);
            $duongdan = "../../img/" . $hinhanh; //nơi lưu file upload
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        // sửa
        $qc->suaquangcao($sua);
        // load danh sách
        $quangcao = $qc->laydanhsachquangcao();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        include("main.php");
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
            $qc->doitrangthai($id, $trangthai);
        } else {
            $trangthai = 1;
            $qc->doitrangthai($id, $trangthai);
        }
        // load người dùng
        $quangcao = $qc->laydanhsachquangcao();
        $danhgia = $dg->laydanhsachdanhgia();
        $traloidanhgia = $tl->laydanhsachtraloidanhgia();
        // Đánh giá chưa được phản hồi 
        $luotdg = 0;
        foreach ($traloidanhgia as $tl) {
            if ($tl["TraLoi"] == null) {
                $luotdg = $luotdg + 1;
            }
        }
        include("main.php");
        break;
    default:
        break;
}

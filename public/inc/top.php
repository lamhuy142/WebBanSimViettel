<?php
if (isset($_SESSION["nguoidung"])) {
    $giohang = $gh->laydanhsachgiohang_ct();
    //đếm tổng giỏ hàng
    $tong_gh = 0;
    foreach ($giohang as $g) :
        if ($g["MaND"] == $_SESSION["nguoidung"]["MaND"]) {
            $tong_gh = $tong_gh + 1;
        }
    endforeach;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang Chủ</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/logo/favicon.png" />

    <!--===================================link CSS============================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="/vendor/bootstrap/css/bootstrap.min.css"> wamp\www\WebBanSimViettel\public\assets-->
    <link rel="stylesheet" type="text/css" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/fonts/linearicons-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="./assets/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="./assets/vendor/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="./assets/vendor/MagnificPopup/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="./assets/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/css1.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- FONT CHỮ ---------------------------- -->
    <link href="https://fonts.googleapis.com/css2?family=Tilt+Neon&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../public/assets/css/css2.css">

</head>

<script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
<df-messenger intent="WELCOME" chat-title="Chat" agent-id="e0b0fdf5-4b21-4ad4-a00c-da3b5bdf5c01" language-code="vi"></df-messenger>

<body style="font-family: 'Tilt Neon', sans-serif !important;" class="animsition">

    <!-- Header -->
    <header class="header-v2">
        <!-- Header desktop -->
        <div class="container-menu-desktop trans-03">
            <div class="wrap-menu-desktop">
                <nav style="background-color: #E7E7E7;" class="limiter-menu-desktop p-l-45">

                    <!-- Logo desktop -->
                    <a href="index.php?action=macdinh" class="navbar-brand">
                        <img class="mx-auto d-block" src="../img/logo/theo.png" width="150" height="100" alt="LogoViettel">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu ">
                            <li class="text-active">
                                <a style="font-family: 'Tilt Neon', sans-serif !important;" class="text-active text-decoration-none " id="<?php echo strpos($_SERVER["REQUEST_URI"], "macdinh") !== false ? 'active-mmenu' : ''; ?>" href="index.php?action=macdinh">Trang Chủ</a>
                            </li>

                            <li class=" text-active">
                                <a style="font-family: 'Tilt Neon', sans-serif !important;" class="text-active text-decoration-none " id="<?php echo strpos($_SERVER["REQUEST_URI"], "sim") !== false ? 'active-mmenu' : ''; ?>" href="index.php?action=sim">Sim</a>
                            </li>

                            <li class=" text-active">
                                <a style="font-family: 'Tilt Neon', sans-serif !important;" class="text-active text-decoration-none " id="<?php echo strpos($_SERVER["REQUEST_URI"], "goicuoc") !== false ? 'active-mmenu' : ''; ?>" href="index.php?action=goicuoc">Gói cước</a>
                            </li>

                            <li class="text-active">
                                <a style="font-family: 'Tilt Neon', sans-serif !important;" class="text-active text-decoration-none " id="<?php echo strpos($_SERVER["REQUEST_URI"], "khuyenmai") !== false ? 'active-mmenu' : ''; ?>" href="index.php?action=khuyenmai">Khuyến Mãi</a>
                            </li>

                            <li class="text-active">
                                <a style="font-family: 'Tilt Neon', sans-serif !important;" class="text-active text-decoration-none " id="<?php echo strpos($_SERVER["REQUEST_URI"], "thongtin") !== false ? 'active-mmenu' : ''; ?>" href="index.php?action=thongtin">Thông Tin</a>
                            </li>

                            <li class="text-active">
                                <a style="font-family: 'Tilt Neon', sans-serif !important;" class="text-active text-decoration-none " id="<?php echo strpos($_SERVER["REQUEST_URI"], "lienhe") !== false ? 'active-mmenu' : ''; ?>" href="index.php?action=lienhe">Liên Hệ</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m h-full">

                        <?php if (isset($_SESSION["nguoidung"])) {
                        ?>
                            <!-- Giỏ hàng -->
                            <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                                <div class="icon-header-item cl2 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo $tong_gh ?>">
                                    <i style="color: #EF0033;" class="zmdi zmdi-shopping-cart"></i>
                                </div>
                            </div>
                            <!-- ------- -->
                        <?php } ?>
                        <?php if (isset($_SESSION["nguoidung"]) && !empty($_SESSION["nguoidung"]["HoTen"])) { ?>
                            <nav class="navbar navbar-expand-lg text-decoration-none ">
                                <div class="dropdown">
                                    <button style="color: #44494D;" class=" dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                        Xin chào, <?php echo mb_substr($_SESSION['nguoidung']['HoTen'], 0, 10) . "..."; ?>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <li>
                                            <button style="background-color: #FFFFFF;" class="dropdown-item " type="button">
                                                <a style="color: black;" class="text-active text-decoration-none" href="index.php?action=hoso&id=<?php echo $_SESSION['nguoidung']['MaND']; ?>">
                                                    Hồ sơ người dùng
                                                </a>
                                            </button>
                                        </li>
                                        <li><button style="background-color: #FFFFFF;" class="dropdown-item" type="button">
                                                <a style="color: black;" class="text-active text-decoration-none" href="index.php?action=xemdondamua">
                                                    Đơn hàng đã mua
                                                </a>
                                            </button>
                                        </li>
                                        <?php if ($_SESSION["nguoidung"]["MaQ"] == 1 || $_SESSION["nguoidung"]["MaQ"] == 3) { ?>
                                            <li><button style="background-color: #FFFFFF;" class="dropdown-item" type="button">
                                                    <a style="color: black;" class="text-active text-decoration-none" href="index.php?action=chuyentrang">
                                                        Trang quản trị
                                                    </a>
                                                </button>
                                            </li>
                                        <?php } ?>
                                        <li><button style="background-color: #FFFFFF;" class="dropdown-item" type="button">
                                                <a style="color: black;" class="text-active text-decoration-none" href="index.php?action=dangxuat">
                                                    Đăng xuất
                                                </a>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        <?php } else { ?>
                            <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                                <div class=" icon-header-item cl2 hov-cl1 trans-04 p-lr-11" data-notify="2">
                                    <a href="index.php?action=dangnhap">
                                        <i style="color: #576C9D;" class=" bi bi-person-fill"></i>

                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile" style="background-color: #E7E7E7;  ">
            <!-- Logo moblie -->
            <a href="#" class="navbar-brand">
                <img class="mx-auto d-block" src="../img/logo/logo_home_new.png" width="100" height="40" alt="LogoViettel">
            </a>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
                <div class="flex-c-m h-full p-r-10">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>
                </div>
                <?php if (isset($_SESSION["nguoidung"])) { ?>
                    <div class="flex-c-m h-full p-lr-10 bor5">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo $tong_gh ?>">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="./images/icons/icon-close2.png" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Search...">
                </form>
            </div>
        </div>
    </header>

    <!-- Giỏ Hàng ===========================================================================================================-->
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span style="font-family: 'Tilt Neon', sans-serif !important;" class="mtext-103 cl2">
                    Giỏ Hàng
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    <?php
                    $i = 0;
                    // Kiểm tra nếu giỏ hàng rỗng
                    if (empty($giohang)) {
                        echo '<li class="class="header-cart-item empty-cart">Giỏ hàng rỗng</li>';
                    } else {
                        foreach ($giohang as $gh) :
                            foreach ($sim as $s) :
                                // foreach ($loaisim as $ls) :
                                if ($gh["MaND"] == $_SESSION["nguoidung"]["MaND"] && $s["MaSim"] == $gh["MaS"]) {
                                    $i++; ?>
                                    <li class="header-cart-item flex-w flex-t m-b-12">
                                        <div class="header-cart-item-img">
                                            <span><?php echo $i; ?></span>
                                        </div>
                                        <div class="header-cart-item-txt p-t-8">
                                            <a href="#" style="color:black;" class=" header-cart-item-name m-b-18 text-decoration-none trans-04">
                                                <?php echo $s["SoSim"]; ?>
                                            </a>

                                            <span class="header-cart-item-info">
                                                <?php echo $gh["SL"]; ?> x <?php echo number_format($gh["DonGia"]); ?>đ
                                            </span>
                                        </div>
                                    </li>
                    <?php }
                            endforeach;
                        endforeach;
                    }
                    ?>
                </ul>
                <div class="w-full">
                    <div style="font-family: 'Tilt Neon', sans-serif !important;" class="header-cart-total w-full p-tb-40">
                        Tổng tiền:
                        <?php
                        $tongtien = 0;
                        foreach ($giohang as $gh) :
                            foreach ($sim as $s) :
                                if ($gh["MaND"] == $_SESSION["nguoidung"]["MaND"] && $s["MaSim"] == $gh["MaS"]) {
                                    $tongtien = $tongtien + $gh["DonGia"];
                                }
                            endforeach;
                        endforeach;
                        echo number_format($tongtien) . 'đ';
                        ?>
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php?action=xemgiohang" style="color:white;" class="flex-c-m hov-btn3 stext-101 cl0 size-107 bg3 bor2 text-decoration-none p-lr-15 trans-04 m-r-8 m-b-10">
                            Xem giỏ hàng
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
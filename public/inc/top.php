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



    <!-- Hiển thị đánh giá -->
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Header -->
    <header class="header-v2">
        <!-- Header desktop -->
        <div class="container-menu-desktop trans-03">
            <div class="wrap-menu-desktop">
                <nav style="background-color: #E7E7E7;" class="limiter-menu-desktop p-l-45">

                    <!-- Logo desktop -->
                    <a href="#" class="navbar-brand">
                        <img class="mx-auto d-block" src="../img/logo/theo.png" width="150" height="100" alt="LogoViettel">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu ">
                            <li class="text-active">
                                <a class="text-active text-decoration-none " id="<?php echo strpos($_SERVER["REQUEST_URI"], "macdinh") !== false ? 'active-mmenu' : ''; ?>" href="index.php?action=macdinh">Trang Chủ</a>
                            </li>

                            <li class=" text-active">
                                <a class="text-active text-decoration-none " id="<?php echo strpos($_SERVER["REQUEST_URI"], "sim") !== false ? 'active-mmenu' : ''; ?>" href="index.php?action=sim">Sim</a>
                            </li>

                            <li class=" text-active">
                                <a class="text-active text-decoration-none " id="<?php echo strpos($_SERVER["REQUEST_URI"], "goicuoc") !== false ? 'active-mmenu' : ''; ?>" href="index.php?action=goicuoc">Gói cước</a>
                            </li>

                            <li class="text-active">
                                <a class="text-active text-decoration-none " id="<?php echo strpos($_SERVER["REQUEST_URI"], "khuyenmai") !== false ? 'active-mmenu' : ''; ?>" href="index.php?action=khuyenmai">Khuyến Mãi</a>
                            </li>

                            <li class="text-active">
                                <a class="text-active text-decoration-none " id="<?php echo strpos($_SERVER["REQUEST_URI"], "thongtin") !== false ? 'active-mmenu' : ''; ?>" href="index.php?action=thongtin">Thông Tin</a>
                            </li>

                            <li class="text-active">
                                <a class="text-active text-decoration-none " id="<?php echo strpos($_SERVER["REQUEST_URI"], "lienhe") !== false ? 'active-mmenu' : ''; ?>" href="index.php?action=lienhe">Liên Hệ</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m h-full">
                        <div class="flex-c-m h-full p-r-24">
                            <div class="input-group rounded">
                                <input style="border-color: white;" type="search" class="text-action form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <span class="input-group-text border-0" id="search-addon">
                                    <!-- <i class="bi bi-search mt-n1"></i> -->
                                </span>
                            </div>
                            <!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                                <i style="color: #576C9D;" class="zmdi zmdi-search"></i>
                            </div> -->
                        </div>
                        <?php if (isset($_SESSION["nguoidung"])) {
                        ?>
                            <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                                <div class="icon-header-item cl2 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="<?php echo $tong_gh ?>">
                                    <i style="color: #EF0033;" class="zmdi zmdi-shopping-cart"></i>
                                </div>
                            </div>
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
                                                <a style="color: black;" class="text-active text-decoration-none" href="index.php?action=xemdonhang">
                                                    Đơn hàng đã mua
                                                </a>
                                            </button>
                                        </li>
                                        <?php if($_SESSION["nguoidung"]["MaQ"] == 1 || $_SESSION["nguoidung"]["MaQ"] == 3 ){ ?>
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
                        <div class="flex-c-m h-full p-lr-19">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                                <i style="color: #576C9D;" class="zmdi zmdi-menu"></i>
                            </div>
                        </div>
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


        <!-- Menu Mobile -->
        <div class="menu-mobile" style=" background-color: #FFFFFF; color: black;">
            <ul class="main-menu-m">
                <li>
                    <a href="index.php">Home</a>
                    <!-- <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span> -->
                </li>

                <li>
                    <a href="product.php">Shop</a>
                </li>

                <li>
                    <a href="shoping-cart.php" class="label1 rs1" data-label1="hot">Features</a>
                </li>

                <li>
                    <a href="blog.php">Blog</a>
                </li>

                <li>
                    <a href="about.php">About</a>
                </li>

                <li>
                    <a href="contact.php">Contact</a>
                </li>
            </ul>
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
    <!-- Sidebar -->
    <aside class="wrap-sidebar js-sidebar">
        <div class="s-full js-hide-sidebar"></div>

        <div class="sidebar flex-col-l p-t-22 p-b-25">
            <div class="flex-r w-full p-b-30 p-r-27">
                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
                <ul class="sidebar-link w-full">
                    <li class="p-b-13">
                        <a href="index.php" class="stext-102 cl2 hov-cl1 trans-04">
                            Home
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                            My Wishlist
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                            My Account
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                            Track Oder
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                            Refunds
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                            Help & FAQs
                        </a>
                    </li>
                </ul>

                <div class="sidebar-gallery w-full p-tb-30">
                    <span class="mtext-101 cl5">
                        @ CozaStore
                    </span>

                    <div class="flex-w flex-sb p-t-36 gallery-lb">
                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="../../img/slide/slide1.png" data-lightbox="gallery" style="background-image: url('../../img/slide/slide1.png');"></a>
                        </div>

                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="../../img/slide/slide2.png" data-lightbox="gallery" style="background-image: url('../../img/slide/slide2.png');"></a>
                        </div>
                    </div>
                </div>

                <div class="sidebar-gallery w-full">
                    <span class="mtext-101 cl5">
                        About Us
                    </span>

                    <p class="stext-108 cl6 p-t-27">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur maximus vulputate hendrerit. Praesent faucibus erat vitae rutrum gravida. Vestibulum tempus mi enim, in molestie sem fermentum quis.
                    </p>
                </div>
            </div>
        </div>
    </aside>
    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
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
                    ?>
                </ul>

                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
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
                        <a href="index.php?action=xemgiohang" style="color:white;" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 text-decoration-none p-lr-15 trans-04 m-r-8 m-b-10">
                            Xem giỏ hàng
                        </a>

                        <!-- <a href="shoping-cart.php" style="color:white;" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 text-decoration-none p-lr-15 trans-04 m-b-10">
                            Thanh toán
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../img/logo/favicon.png" />

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
                        <img class="mx-auto d-block" src="../img/logo/logo_home_new.png" width="100" height="40" alt="LogoViettel">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu ">
                            <li class="active-menu <?php if (strpos($_SERVER["REQUEST_URI"], "index") != false) echo "active"; ?>">
                                <a class="" style="color: #576C8F;" href="index.php">Home</a>
                            </li>

                            <li class="<?php if (strpos($_SERVER["REQUEST_URI"], "index") != false) echo "active"; ?>">
                                <a style="color: #576C8F;" href="product.php">Shop</a>
                            </li>

                            <!-- <li class="label1" data-label1="hot">
                                <a style="color: #576C8F;" href="shoping-cart.php">Features</a>
                            </li> -->

                            <li>
                                <a style="color: #576C8F;" href="index.php?action=blog">Blog</a>
                            </li>

                            <li>
                                <a style="color: #576C8F;" href="about.php">About</a>
                            </li>

                            <li>
                                <a style="color: #576C8F;" href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m h-full">
                        <div class="flex-c-m h-full p-r-24">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                                <i style="color: #576C9D;" class="zmdi zmdi-search"></i>
                            </div>
                        </div>

                        <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                            <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="2">
                                <i style="color: #576C8F;" class="zmdi zmdi-shopping-cart"></i>
                            </div>
                        </div>
                        <?php if (isset($_SESSION["nguoidung"]) && !empty($_SESSION["nguoidung"]["HoTen"])) { ?>
                            <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                                <div style="color:#576C8F ;" class=" icon-header-item  hov-cl1 trans-04 p-lr-11 dropdown-toggle" id="navbarDarkDropdownMenuLink" data-notify="2">
                                    <img class="img-profile rounded-circle" style="height:30px; width: 30px; " src="../img/user/<?php echo $_SESSION['nguoidung']['HinhAnh']; ?>" alt="">
                                    <span class="h6"><?php echo $_SESSION["nguoidung"]["HoTen"]; ?></span>
                                </div>
                                <ul class="dropdown-menu dropdown-menu-secondary" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><a class="dropdown-item" href="index.php?action=hoso&id=<?php echo $_SESSION["nguoidung"]["id"] ?>">Profile</a></li>
                                    <li><a class="dropdown-item" href="index.php?action=dangxuat">Logout</a></li>
                                </ul>
                            </div>
                        <?php } else { ?>
                            <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                                <div class=" icon-header-item cl2 hov-cl1 trans-04 p-lr-11" data-notify="2">
                                    <i style="color: #576C9D;" class=" bi bi-person-fill"></i>
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

                <div class="flex-c-m h-full p-lr-10 bor5">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="2">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>
                </div>
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
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
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
                    Your Cart
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="./images/item-cart-01.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                White Shirt Pleat
                            </a>

                            <span class="header-cart-item-info">
                                1 x $19.00
                            </span>
                        </div>
                    </li>

                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="./images/item-cart-02.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                Converse All Star
                            </a>

                            <span class="header-cart-item-info">
                                1 x $39.00
                            </span>
                        </div>
                    </li>

                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="./images/item-cart-03.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                Nixon Porter Leather
                            </a>

                            <span class="header-cart-item-info">
                                1 x $17.00
                            </span>
                        </div>
                    </li>
                </ul>

                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Total: $75.00
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- <php session_start(); ?> -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trang Quản Trị</title>
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/searchpanes/2.3.0/css/searchPanes.bootstrap5.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/2.0.0/css/select.bootstrap5.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../../admin/inc/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    
    <!-- Custom styles for this template-->
    <link href="../../admin/inc/css/sb-admin-2.min.css" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script> 

    <!-- <script src="ckeditor5/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script> -->
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script> --> 


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- bg-gradient-primary -->
        <!-- Sidebar -->
        <ul style="background-color: #E7E7E7;" class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a href="#" class="navbar-brand">
                <img class="mx-auto d-block" src="../../img/logo/logo_home_new.png" width="100" height="40" alt="LogoViettel">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if (strpos($_SERVER["REQUEST_URI"], "ktnguoidung") != false) echo "active"; ?>">
                <a style="color: #576C8F;" class="nav-link" href="../ktnguoidung">
                    <i style="color: #576C8F;" class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Bảng điều khiển</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div style="color: #576C8F;" class="sidebar-heading">
                Quản Lý
            </div>

            <!-- Nav Item - NGUOIDUNG -->
            <li class="nav-item
            <?php if (strpos($_SERVER["REQUEST_URI"], "qlnguoidung") != false) echo "active"; ?>
            ">
                <a style="color: #576C8F;" class="nav-link" href="../qlnguoidung/index.php?action=xem">
                    <i style="color: #576C8F;" class="bi bi-person-badge-fill"></i>
                    <span>Quản lý người dùng</span></a>
            </li>
            <!-- Nav Item - SIM -->
            <li class="nav-item <?php if (strpos($_SERVER["REQUEST_URI"], "sim") != false) echo "active"; ?>">
                <a style="color: #576C8F;" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i style="color: #576C8F;" class="fas fa-fw fa-folder"></i>
                    <span>Quản lý sim</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Login Screens:</h6> -->
                        <a style="color: #576C8F;" class="collapse-item" href="../sim/index.php?action=sim">Sim</a>
                        <a style="color: #576C8F;" class="collapse-item" href="../sim/index.php?action=loaisim">Loại Sim</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - GOICUOC -->
            <li class="nav-item <?php if (strpos($_SERVER["REQUEST_URI"], "goicuoc") != false) echo "active"; ?>">
                <a style="color: #576C8F;" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#goicuoc" aria-expanded="true" aria-controls="goicuoc">
                    <i style="color: #576C8F;" class="fas fa-fw fa-folder"></i>
                    <span>Quản lý gói cước</span>
                </a>
                <div id="goicuoc" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Login Screens:</h6> -->
                        <a style="color: #576C8F;" class="collapse-item" href="../goicuoc/index.php?action=goicuoc">Gói cước</a>
                        <a style="color: #576C8F;" class="collapse-item" href="../goicuoc/index.php?action=loaigoicuoc">Loại gói cước</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - DONHANG -->
            <li class="nav-item
            <?php if (strpos($_SERVER["REQUEST_URI"], "qldonhang") != false) echo "active"; ?>
            ">
                <a style="color: #576C8F;" class="nav-link" href="../qldonhang/index.php?action=xem">
                    <i style="color: #576C8F;" class="bi bi-calendar-check-fill"></i>
                    <span>Quản lý đơn hàng</span></a>
            </li>
            <!-- Nav Item - PHAN HOI TU NGUOI DUNG -->
            <li class="nav-item
            <?php if (strpos($_SERVER["REQUEST_URI"], "phanhoinguoidung") != false) echo "active"; ?>
            ">
                <a style="color: #576C8F;" class="nav-link" href="../phanhoinguoidung/index.php?action=xem">
                    <i style="color: #576C8F;" class="bi bi-chat-left-dots-fill"></i>
                    <span>Phản hồi người dùng</span></a>
            </li>
            <!-- Nav Item - QUANGCAO -->
            <li class="nav-item
            <?php if (strpos($_SERVER["REQUEST_URI"], "qlquangcao") != false) echo "active"; ?>
            ">
                <a style="color: #576C8F;" class="nav-link" href="../qlquangcao/index.php?action=xem">
                    <i style="color: #576C8F;" class="bi bi-badge-ad-fill"></i>
                    <span>Banner quảng cáo</span></a>
            </li>
            <!-- Nav Item - CHUONG TRINH KHUYEN MAI -->
            <li class="nav-item
            <?php if (strpos($_SERVER["REQUEST_URI"], "qlkhuyenmai") != false) echo "active"; ?>
            ">
                <a style="color: #576C8F;" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#khuyenmai" aria-expanded="true" aria-controls="khuyenmai">
                    <i style="color: #576C8F;" class="bi bi-gift-fill"></i>
                    <span>Thông tin khuyến mãi</span></a>
                <div id="khuyenmai" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Login Screens:</h6> -->
                        <a style="color: #576C8F;" class="collapse-item" href="../qlkhuyenmai/index.php?action=xem">Khuyến mãi</a>
                        <a style="color: #576C8F;" class="collapse-item" href="../qlkhuyenmai/index.php?action=danhmuc">Loại khuyến mãi</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav style="background-color: #E7E7E7;" class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo  $_SESSION["nguoidung"]["HoTen"]; ?></span>
                                <img class="img-profile rounded-circle" src="../../img/user/<?php echo  $_SESSION["nguoidung"]["HinhAnh"]; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../ktnguoidung/index.php?action=hoso&id= ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <!-- data-toggle="modal" -->
                                <a class="dropdown-item" href="../ktnguoidung/index.php?action=dangnhap">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
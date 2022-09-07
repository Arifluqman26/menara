<?php
ob_start();
include('../koneksi.php');
session_start();

if (!isset($_SESSION['uname'])) {
    header('Location: login.php');
} ?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Data Menara Telekomunikasi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="../template_admin/assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="../template_admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../template_admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../template_admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../template_admin/assets/css/metisMenu.css">
    <link rel="stylesheet" href="../template_admin/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../template_admin/assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="../template_admin/assets/css/typography.css">
    <link rel="stylesheet" href="../template_admin/assets/css/default-css.css">
    <link rel="stylesheet" href="../template_admin/assets/css/styles.css">
    <link rel="stylesheet" href="../template_admin/assets/css/responsive.css">

    <!-- modernizr css -->
    <script src="../template_admin/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Datatable -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="../template_admin/assets/images/icon/logo.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="index.php">dashboard</a></li>
                                </ul>
                            </li>
                            <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>data menara</span></a>
                                <ul class="collapse">
                                    <li class="active">
                            <li>
                                <a href="tb_desa.php"><i class="fa fa-table"></i> Data Desa/Kelurahan</a>
                            </li>
                            <li>
                                <a href="tb_kecamatan.php"><i class="fa fa-table"></i> Data Kecamatan</a>
                            </li>
                            <li>
                                <a href="tb_menara.php"><i class="fa fa-table"></i> Data Menara</a>
                            </li>
                            <li>
                                <a href="tb_pejabat.php"><i class="fa fa-table"></i> Data Pejabat</a>
                            </li>
                            <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>data retribusi</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="tb_skrd.php"> Data SKRD</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= $_SESSION['uname']?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a href="logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
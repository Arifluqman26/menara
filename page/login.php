
<?php
include "../koneksi.php";
session_start();

if (isset($_SESSION['uname'])) {
    header('Location:index.php');
}
else if(isset($_POST['username'])){

    $uname = mysqli_real_escape_string($kon,$_POST['username']);
    $password = mysqli_real_escape_string($kon,$_POST['password']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from tb_user where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($kon,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location:index.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - Retribusi Menara</title>
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
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST" action="login.php">
                    <div class="login-form-head">
                        <h4>Retribusi Menara</h4>
                        <p>Login</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-group row">
                            <label for="inputusername3" class="col-sm-2 col-form-label">username</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" class="form-control" id="inputusername3" placeholder="username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>

                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="../template_admin/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="../template_admin/assets/js/popper.min.js"></script>
    <script src="../template_admin/assets/js/bootstrap.min.js"></script>
    <script src="../template_admin/assets/js/owl.carousel.min.js"></script>
    <script src="../template_admin/assets/js/metisMenu.min.js"></script>
    <script src="../template_admin/assets/js/jquery.slimscroll.min.js"></script>
    <script src="../template_admin/assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="../template_admin/assets/js/plugins.js"></script>
    <script src="../template_admin/assets/js/scripts.js"></script>
</body>

</html>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Aplikasi Pembelian Mobil</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Header Nya disini -->

    <?php
    include "include/header.php";
    ?>

<!-- Akhir header-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Dashboard</h4>
                </div>
            </div>
            <div class="row">
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <a href="mobil.php"><div class="dashboard-div-wrapper bk-clr-one">
                        <i  class="glyphicon glyphicon-plane dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
  </div>
                           
</div>
<?php 
                        include "koneksi/koneksi.php";
                        $query=mysql_query("SELECT * from mobil ");
                        $a=mysql_num_rows($query);
                         ?>
                         <h5><?php echo $a; ?> Data Mobil </h5>
                    </div></a>
                </div>
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <a href="pembeli.php"><div class="dashboard-div-wrapper bk-clr-two">
                        <i  class="glyphicon glyphicon-user dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
  </div>
                           
</div>
<?php 
                        include "koneksi/koneksi.php";
                        $query=mysql_query("SELECT * from pembeli ");
                        $a=mysql_num_rows($query);
                         ?>
                         <h5><?php echo $a; ?> Data Pembeli</h5>
                    </div></a>
                </div>
                 <div class="col-md-3 col-sm-3 col-xs-6">
                    <a href="kredit.php"><div class="dashboard-div-wrapper bk-clr-three">
                        <i  class="fa fa-cogs dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
  </div>
                           
</div>
<?php 
                        include "koneksi/koneksi.php";
                        $query=mysql_query("SELECT * from paket_kredit ");
                        $a=mysql_num_rows($query);
                         ?>
                         <h5><?php echo $a; ?> Pembeli Kredit</h5>
                    </div></a>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <a href="cash.php"><div class="dashboard-div-wrapper bk-clr-four">
                        <i  class="glyphicon glyphicon-ok dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
  </div>
                           
</div>
<?php 
                        include "koneksi/koneksi.php";
                        $query=mysql_query("SELECT * from beli_cash ");
                        $a=mysql_num_rows($query);
                         ?>
                         <h5><?php echo $a; ?> Pembeli Cash</h5>
                    </div></a>
                </div>

            </div>
           
            <div class="row">
            <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="text-center alert alert-warning">
                        <a href="http://www.facebook.com" class="btn btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>&nbsp; Facebook</a>
                        <a href="http://www.google.com" class="btn btn-social btn-google">
                            <i class="fa fa-google-plus"></i>&nbsp; Google</a>
                        <a href="http://www.twitter.com" class="btn btn-social btn-twitter">
                            <i class="fa fa-twitter"></i>&nbsp; Twitter </a>
                        <a href="http://www.linked.in" class="btn btn-social btn-linkedin">
                            <i class="fa fa-linkedin"></i>&nbsp; Linkedin </a>
                    </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; <?php echo date('Y'); ?> Mobil | By : <a href="http://teknosut.blogspot.com/" target="_blank">Teknosut</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
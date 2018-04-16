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
        <!-- taruh kode di sini -->
            <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="btn btn-success" href="mobil.php"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
                        </div>
                        <div class="panel-body">
                            
<form role="form" method="post" action="mobil-proses-tambah.php?tambah=1" enctype="multipart/form-data">
<div class="form-group">
<label for="exampleInputMerk">Merk</label>
<input type="text" class="form-control" id="exampleInputMerk" placeholder="Merk Mobil" name="merk" required="required">
</div>
<div class="form-group">
<label for="exampleInputTipe">Tipe</label>
<select name="tipe" class="form-control"  required="required">
<option>-- Pilih Tipe Mobil --</option>
<option value="Mobil Keluarga">Mobil Keluarga</option>
<option value="Mobil Sport">Mobil Sport</option>
</select>
</div>
 <div class="form-group">
<label for="exampleInputTipe">Harga</label>
 <input type="text" class="form-control" id="exampleInputMerk" placeholder="Harga Mobil" name="harga"  required="required">
 </div>
 <div class="form-group">
 <label for="gambar">Gambar</label>
 <input type="file" id="gambar" name="gambar"  required="required">
 </div>
 <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
 <button aria-hidden="true" data-dismiss="modal" type="button" class="btn btn-danger" name="close">Close</button>
 </form>
                        </div>
        <!-- akhir kode -->
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
<?php
error_reporting(0);
session_start();
include_once 'koneksi/koneksi.php';

if (!isset($_SESSION['id'])) {
  echo "<script language='javascript'>window.location='login.php'</script>";
}
$res=mysqli_query($koneksi,"SELECT * FROM pembeli WHERE password=".$_SESSION['password']);
$a=mysqli_fetch_array($res, MYSQLI_ASSOC);
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Tugas Aplikasi" />
    <meta name="author" content="Geri adam" />
    <title>Aplikasi Pembelian Mobil</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
<?php
if($_SESSION['id']>1){
    echo '<header>';
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-md-12">';
    echo '<a href="mobil.php" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-home"> Home</a>';
    echo '&nbsp;&nbsp;';
    echo '<a href="bukti.php" class="btn btn-success" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>    Keranjang</a>';
    echo '&nbsp;&nbsp;';
    echo '<a href="logout.php" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-off"> Logout</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</header>';
}
?>
<?php include "header.php"; ?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="btn btn-success" href="mobil.php"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
                </div>
            </div>
            <div class="panel-body">      
                <form role="form" method="post" action="cash-proses-tambah.php?tambah=1" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Bayar</label><br>
                        <input type="text" placeholder="Bayar Mobil" name="bayar" required="required">
                    </div>
                    <?php
                        include "koneksi/koneksi.php";
                        $mobil=$_GET['mobil'];
                        $guak=mysqli_query($koneksi,"SELECT * FROM mobil WHERE kode_mobil='$mobil'");
                        while($a=mysqli_fetch_array($guak, MYSQLI_NUM)){
                        $number=$a[3];
                        $format_indonesia = number_format ($number, 2, ',', '.');
                    ?>
                    <input type="hidden" name="kode_mobil" required="required" value="<?php echo $a[0]; ?>">
                    <input type="hidden" name="harga" required="required" value="<?php echo $a[3]; ?>">
                    <label>Harga</label><br>
                    <input class="form-control" type="text" disabled="disabled" name="b" required="required" value="<?php echo "Rp.".$format_indonesia; ?>">
                    <?php } ?>
                    <label>Tanggal Beli</label><br>
                    <input class="form-control" type="text" disabled="disabled" name="a" required="required" value="<?php echo date('Y-m-d'); ?>"><br>
                    <input type="hidden" name="tanggal" required="required" value="<?php echo date('Y-m-d'); ?>">
                    <input type="hidden" name="id_pembeli" required="required" value="<?php echo $_SESSION['id']; ?>">
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    <button type="reset" class="btn btn-danger" name="reset">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                &copy; <?php echo date('Y'); ?> Mobil | By : Geri adam</a>
            </div>
        </div>
    </div>
</footer>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
</body>
</html>
<?php
error_reporting(0);
session_start();
include_once 'koneksi/koneksi.php';

if (!isset($_SESSION['id'])) {
  echo "<script language='javascript'>window.location='login.php'</script>";
}
$res=mysqli_query($koneksi, "SELECT * FROM pembeli WHERE password=".$_SESSION['password']);
$a=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Aplikasi Pembelian Mobil</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <link href="tanggal/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
<?php include "header.php";?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Pilihan Kredit</h4>
            </div>
        </div>
        <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a class="btn btn-success" href="mobil.php"><span class="glyphicon glyphicon-chevron-left"></span> Back</a>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Merk</th>
                                <th>Harga Mobil</th>
                                <th>Uang Muka</th>
                                <th>11 X</th>
                                <th>23 X</th>
                                <th>47 X</th>
                            </tr>
                        </thead>
                        <?php
                            include "koneksi/koneksi.php";
                            $mobil=$_GET['mobil'];
							$query=mysqli_query($koneksi, "SELECT * FROM mobil WHERE kode_mobil='$mobil'");
                            $no=1;
                            while($a=mysqli_fetch_array($query,MYSQLI_ASSOC)){
                                /* HITUNGAN UNTUK BERAPA BULAN */
                                /*
                                Perhitungan Kredit :

                                - DP (Uang Awal) = 20 % x Harga Mobil
                                - Pokok Kredit (PK) = harga mobil - (DP)
                                - Jumlah Bunga Yang Harus Di Bayar (JB) = PK x (TBxJW/100)
                                			TB = tarif Bunga (8%,6%,7%)
                                			JW = Jangka Waktu Dalam Tahun
                                - Angsuran Per Bulan = (PK+JB)/jw
                                			Jw = Jumlah Bunga Dalam Bulan

                                 */
                                ///////////////  1 tahun  ////////////////////////
                                $harga_mobil=$a['harga_mobil'];
                                $dp=0.2*$harga_mobil;
                                $pk=$harga_mobil-$dp;
                                $jb=$pk*(8*1/100);
                                $apb=($pk+$jb)/12;
                                ///////////////  End  ////////////////////////

                                ///////////////  2 tahun  ////////////////////////
                                $jb1=$pk*(10*2/100);
                                $apb1=($pk+$jb1)/24;
                                ///////////////  End  ////////////////////////

                                ///////////////  4 tahun  ////////////////////////
                                $jb2=$pk*(14*4/100);
                                $apb2=($pk+$jb2)/48;
                                ///////////////  End  ////////////////////////
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $a['merk']; ?></td>
                                <td><?php echo "Rp.".number_format ($harga_mobil, 2, ',', '.'); ?></td>
                                <td><?php echo "Rp.".number_format ($dp, 2, ',', '.'); ?></td>
                                <td><?php echo "Rp.".number_format ($apb, 2, ',', '.'); ?></td>
                                <td><?php echo "Rp.".number_format ($apb1, 2, ',', '.'); ?></td>
                                <td><?php echo "Rp.".number_format ($apb2, 2, ',', '.'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <form action="kredit-proses.php?tambah=1" method="post" role="form">
                    <div class="form-group">
                        <div class="form-input">
                            <select name="apb" class="form-control">-- Pilih Lama Kredit --
                            <option value="<?php echo "11 ".$apb;?>">12 Bulan [ 1 Tahun ]</option>
                            <option value="<?php echo "24 ".$apb1;?>">24 Bulan [ 2 Tahun ]</option>
                            <option value="<?php echo "48 ".$apb2;?>">48 Bulan [ 4 Tahun ]</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="dp" required="required" value="<?php echo $dp; ?>">
                    <input type="hidden" name="id_mobil" required="required" value="<?php echo $a[0]; ?>">
                    <input type="hidden" name="id_pembeli" required="required" value="<?php echo $_SESSION['id']; ?>">
                    <button type="submit" class="btn btn-primary" name="simpan"><span class="glyphicon glyphicon-cog">  Proses</button>
                    <input type="hidden">
                </form>
                <?php } ?>
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
<div aria-hidden="true" aria-labelledby="myModalLabel3" role="dialog" tabindex="-1" id="modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                <h4 class="modal-title">Gambar Mobil</h4>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="tanggal/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="tanggal/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_date').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
</script>
    <script>
        $(function(){
            $(document).on('click','.Open',function(e){
                e.preventDefault();
                $("#modal").modal('show');
                $.get('mobil-detil.php',
                    {mobil:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
                    }   
                );
            });
        });
    </script>
</body>
</html>
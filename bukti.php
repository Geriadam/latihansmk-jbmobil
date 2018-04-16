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
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="Geri adam">
  <meta name="keyword" content="Aplikasi Mobil, Tugas Akhir, APlikasi Pembelian Mobil, PHP & MYSQLI">
  <link rel="shortcut icon" href="img/favicon.png">
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
  <?php include "header1.php"; ?>
    <div class="content-wrapper">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h4 class="page-head-line">Bukti Pembayaran Cash</h4>
                  <small>*Jika Status Masih Di Proses , Harap Kirim Pembayaran Dahulu !</small>
              </div>
          </div>
          <div class="row">
          <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Cash</th>
                                <th>Merk Mobil</th>
                                <th>Tanggal Beli</th>
                                <th>Uang Anda</th>
                                <th>Kembalian Anda</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <?php
                          include "koneksi/koneksi.php";
                          $query=mysqli_query($koneksi, "SELECT A.kode_cash,B.merk,A.cash_tanggal,A.cash_bayar,A.cash_kembalian,A.kode_mobil,A.status FROM beli_cash A , mobil B WHERE A.kode_mobil = B.kode_mobil AND id = ".$_SESSION['id']);
                          $no=1;
                          $jumlah = mysqli_num_rows($query);
                          if ($jumlah > 0) {  
                            while($a=mysqli_fetch_array($query, MYSQLI_ASSOC)){
                              $number=$a['cash_bayar'];
                              $number1=$a['cash_kembalian'];
                              $format_indonesia = number_format ($number, 2, ',', '.');
                              $format_indonesia1 = number_format ($number1, 2, ',', '.');
                                    ?>
                          <tbody>
                            <tr>
                              <td><?php echo $no++; ?></td>
                              <td><?php echo $a['kode_cash']; ?></td>
                              <td>
                                  <a title="Detail Data" class="Open" data-toggle="modal" data-id="<?php echo $a['kode_mobil']; ?>" href="#">
                                  <?php echo $a['merk']; ?></a>
                              </td>
                              <td><?php echo $a['cash_tanggal']; ?></td>
                              <td><?php echo "Rp.".$format_indonesia; ?></td>
                                  <?php $pas=$a['cash_kembalian']; if($pas==0){ ?>
                                    <td><?php echo "Uang Anda Pas , Tidak Ada Kembalian :) "; ?></td>
                                  <?php } else{ echo "<td>Rp.".$format_indonesia1."</td>"; } ?>
                                  <?php $stat=$a['status']; if($stat=='Masih Di Proses'){ ?>
                                    <td><a href="" class="btn btn-danger"><?php echo $stat; ?></a></td>
                                  <?php } else { echo '<td><a href="" class="btn btn-success">'.$stat.'</td>'; } ?>
                            </tr>
                            <?php } } else {  
                              echo '<br>'; 
                              echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span> Maaf, Keranjang Anda Masih Kosong.</div>'; } 
                            ?>
                          </tbody>
                        </table>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <h4 class="page-head-line">Paket Kredit</h4>
                          </div>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                          <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kredit</th>
                                <th>Merk Mobil</th>
                                <th>Uang Muka</th>
                                <th>Angsuran Per Bulan</th>
                                <th>Lama Bulan</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                          </thead>
                          <?php
                            include "koneksi/koneksi.php";
                            $query_kredit=mysqli_query($koneksi, "SELECT A.id_mobil,A.id_pembeli,A.uang_muka,A.angsuran,A.bulan,A.tanggal,B.kode_mobil,B.merk FROM paket_kredit A , mobil B WHERE A.id_mobil = B.kode_mobil AND id_pembeli = ".$_SESSION['id']);
                            $no1=1;
                            $jumlah_kredit = mysqli_num_rows($query_kredit);
                            if ($jumlah_kredit > 0) {  
                              while($ab=mysqli_fetch_array($query_kredit, MYSQLI_ASSOC)){
                                        $number3=$ab['uang_muka'];
                                        $number4=$ab['angsuran'];
                          ?>
                          <tbody>
                            <tr>
                                <td><?php echo $no1++; ?></td>
                                <td><?php echo $ab[0]; ?></td>
                                <td>
                                  <a title="Detail Data" class="Open" data-toggle="modal" data-id="<?php echo $ab['kode_mobil']; ?>" href="#">
                                <?php echo $ab['merk']; ?></a></td>
                                <d><?php echo "Rp.".number_format($number3, 2, ',', '.'); ?></td>
                                <td><?php echo "Rp.".number_format($number4, 2, ',', '.'); ?></td>
                                <td><?php echo $ab['bulan']; ?></td>
                                <td><?php echo $ab['tanggal']; ?></td>
                                <?php
                                  $stat=$a['status'];
                                  $pilihan=$number3*$a['bulan'];
                                  if($pilihan){ ?>
                                  <td><a href="" class="btn btn-success">Kredit Sudah Lunas</a></td>
                                  <?php } else { echo '<td><a href="" class="btn btn-danger">Kredit Belum Lunas</td>'; } ?>
                            </tr>
                            <?php } }else {
                              echo '<br>'; 
                              echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span> Anda Belum Pernah Kredit Mobil.</div>';  } ?>
                          </tbody>
                        </table>
                      </div>
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
                  <h4 class="modal-title">Detail Mobil</h4>
              </div>
              <div class="modal-body">
              </div>
          </div>
      </div>
    </div>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
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
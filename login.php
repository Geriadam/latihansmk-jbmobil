<?php
session_start();
if (isset ($_POST['login'])) {
  error_reporting(0);
  include "koneksi/koneksi.php";
  $tlp=$_POST['telepon'];
  $password=$_POST['password'];
  $qry=mysqli_query($koneksi, "SELECT * FROM pembeli WHERE telp='$tlp' AND password='$password'");
  $jumpa=mysqli_num_rows($qry, MYSQLI_ASSOC);
  if ($jumpa=='1') {
    $r=mysqli_fetch_array($qry, MYSQLI_ASSOC);
    $_SESSION['telepon']= $r['telp'];
    $_SESSION['password']= $r['password'];
    $_SESSION['id']= $r['id'];
    echo "<script language='javascript'>window.location='mobil.php'</script>";
  }
  else {
    echo '<script language="javascript">alert("Userid atau Password Yang anda Masukkan Salah atau Acount Sudah Diblokir");
    window.location="login.php";</script>';
    exit();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>Aplikasi Pembelian Mobil</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
  <header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <a href="home.php" class="btn btn-primary" role="button"><span class="glyphicon glyphicon-home"> Home</a>
            <a href="login.php" class="btn btn-success" role="button"><span class="glyphicon glyphicon-user"> Login</a>
            </div>
        </div>
    </div>
</header>
<?php include "header1.php"; ?>
  <div class="content-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h4 class="page-head-line">Halaman Login</h4>
        </div>
      </div>
      <?php
        if(!empty($_GET['pesan']) && $_GET['pesan']=='sukses'){
          echo '<div class="row">';
          echo '<div class="alert alert-success alert-dismissible" role="alert">';
          echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
          echo '<strong>Berhasil!</strong> Anda Sudah Terdaftar :)</div>';
          echo '</div>';
        }
      ?>
      <div class="row">
        <div class="col-sm-4 col-md-4"></div>
          <div class="col-sm-2 col-md-3">
            <div class="panel panel-default">
              <div class="panel-body">
                <form method="post" role="form" action="">
                  <div class="form-group">
                    <div class="input-group">
                      <label>Telepon</label>
                      <input name="telepon" type="text" class="form-control" placeholder="Telepon" required="required"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <label>Password</label>
                      <input name="password" type="password" class="form-control" placeholder="Password" required="required"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <input name="login" type="submit" class="btn btn-success" value="Login" />
                    <input type="reset" name="login" class="btn btn-primary" value="Reset" />
                  </div>
                </form>
              </div>
              <p style="padding-left: 20px">
                Belum Punya Akun Klik <a href="#ModalTambah" data-toggle="modal"><u>Di sini</u></a>
              </p>
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
    <div aria-hidden="true" aria-labelledby="myModalLabel1" role="dialog" tabindex="-1" id="ModalTambah" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <?php include "pembeli-tambah.php"; ?>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script>
      <?php
      if(!empty($_GET['pesan']) && $_GET['pesan']=='eror'){ ?>
          $('#ModalTambah').modal('show');
      <?php } ?>
    </script>
</body>
</html>
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
                    <h4 class="page-head-line">Data Mobil</h4>
                </div>
            </div>
     <div class="row">
        <!-- taruh kode di sini -->
            <div class="panel panel-default">
                        <div class="panel-heading">
                        <form action="mobil-cari.php" method="post">
                        <input type="text" class="form-input" name="cari" placeholder="Pencarian" size="30" autofocus="autofocus"></input>
                        <a class="btn btn-success" href="mobil-tambah.php"><span class="glyphicon glyphicon-plus"></span>Tambah</a>
                        </form>
                            
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Mobil</th>
                                            <th>Merk</th>
                                            <th>Tipe</th>
                                            <th>Harga Mobil</th>
                                            <th>Pilihan</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $cari=$_POST['cari'];
                                     include "koneksi/koneksi.php";
                                     $query=mysql_query("SELECT * FROM mobil WHERE merk like '%$cari%' or kode_mobil like '%$cari%' ORDER BY merk ASC");
                                     $no=1;
                                      $jumlah = mysql_num_rows($query);
    if ($jumlah > 0) {  
    echo '<p><div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Ada '.$jumlah.' data yang sesuai.</div></p>';
                                     while($a=mysql_fetch_array($query)){
                                        $number=$a[3];
                                        $format_indonesia = number_format ($number, 2, ',', '.');
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $a[0]; ?></td>
                                            <td><?php echo $a[1]; ?></td>
                                            <td><?php echo $a[2]; ?></td>
                                            <td><?php echo "Rp.".$format_indonesia; ?></td>
                                            <td>
<div class="btn-group">
<a title="Detail Data" class="Open btn btn-info" data-toggle="modal" data-id="<?php echo $a[0]; ?>" href="#"><span class="glyphicon glyphicon-play"></span></a>
<a title="Edit Data" class="btn btn-success" href="mobil-edit.php?mobil=<?php echo $a[0]; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
<a title="Hapus Data" class="btn btn-danger" href="mobil-hapus.php?hapus=1&mobil=<?php echo $a[0]; ?>" onClick="return confirm('Yakin Hapus Data ?');"><span class="glyphicon glyphicon-trash"></a>
                                  </div>                                            
                                            </td>
                                        </tr>
<?php
    }
    }
    else {  
    // menampilkan pesan zero data 
    echo '<br>'; 
     echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span> Maaf, hasil pencarian tidak ditemukan.</div>';  
    } 
    ?>
                                    </tbody>
                                </table>
                            </div>
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
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
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
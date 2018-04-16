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
     <link href="tanggal/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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
                    <h4 class="page-head-line">Paket Kredit</h4>
                </div>
            </div>
<div class="row">
  <div class="panel panel-default">
  <div class="panel-heading">
  <form action="kredit-cari.php" method="post">
  <div class="form-group">
                <div class="input-group">
    <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <input name="cari" type="text" class="form-input" id="tanggal" placeholder="Pencarian" size="30">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>   </div></div>                   
  </form>
  </div>
                        <div class="panel-body">
<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Kredit</th>
                                            <th>Nama Pembeli</th>
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
                                     $cari=$_POST['cari'];
$query_kredit=mysql_query("SELECT A.id_mobil,A.id_pembeli,A.uang_muka,A.angsuran,A.bulan,A.tanggal,B.kode_mobil,B.merk,C.id,C.nama_pembeli FROM paket_kredit A , mobil B,pembeli C WHERE A.id_mobil = B.kode_mobil AND A.id_pembeli = C.id and A.tanggal like '%$cari%' order by A.tanggal desc");
                                     $no1=1;
                                    $jumlah_kredit = mysql_num_rows($query_kredit);
                                     if ($jumlah_kredit > 0) {  
                                      echo '<p><div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span> Ada '.$jumlah_kredit.' data yang sesuai.</div></p>';
                                     while($ab=mysql_fetch_array($query_kredit)){
                                        $number3=$ab['uang_muka'];
                                        $number4=$ab['angsuran'];
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $no1++; ?></td>
                                            <td><?php echo $ab[0]; ?></td>
                                            <td><?php echo $ab['nama_pembeli']; ?></td>
                                            <td>
<a title="Detail Data" class="Open" data-toggle="modal" data-id="<?php echo $ab['kode_mobil']; ?>" href="#">
                                            <?php echo $ab['merk']; ?></a></td>
                                            <td><?php echo "Rp.".number_format($number3, 2, ',', '.'); ?></td>
                                            <td><?php echo "Rp.".number_format($number4, 2, ',', '.'); ?></td>
                                            <td><?php echo $ab['bulan']; ?></td>
                                            <td><?php echo $ab['tanggal']; ?></td>
                                            <?php
                                          $stat=$a['status'];
                                          $pilihan=$number3*$a['bulan'];
                                          if($pilihan){
                                          ?>
                                          <td><a href="" class="btn btn-success">Kredit Sudah Lunas</a></td>
                                          <?php
                                            }
                                                else
                                                {
                                                    echo '<td><a href="" class="btn btn-danger">Kredit Belum Lunas</td>';
                                                }
                                          ?>
                                        </tr>
 <?php
    }
    }
    else {  
    // menampilkan pesan zero data 
    echo '<br>'; 
     echo '<div class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span> Anda Belum Pernah Kredit Mobil.</div>';  
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
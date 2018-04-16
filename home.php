<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Tugas Aplikasi" />
    <meta name="author" content="Geri adam" />
    <title>Aplikasi Beli Mobil</title>
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
<?php include "header.php"; ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Dashboard</h4>
                </div>
            </div>
            <div class="row">
                <?php
                    include "koneksi/koneksi.php";
                    $query=mysqli_query($koneksi, "SELECT * FROM mobil ORDER BY rand()");
                    $no=1;
                    while($a=mysqli_fetch_array($query, MYSQLI_NUM)){
                ?>
                <div class="col-sm-2 col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <a title="Detail Data" class="Open" data-toggle="modal" data-id="<?php echo $a[0]; ?>" href="#">
                                <img src="admin/gambar-mobil/<?php echo $a[4]; ?>" width="200" height="150"></a><br>
                        </div>
                        <div class="panel-footer">
                            <p align="center">
                                <a href="cash.php?mobil=<?php echo $a[0]; ?>" class="btn btn-primary" role="button">Cash</a>
                                <a href="kredit.php?mobil=<?php echo $a[0]; ?>" class="btn btn-success" role="button">Kredit</a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php } ?> 
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
<?php
include "koneksi/koneksi.php";
        $id=$_GET['id'];
        $status=$_GET['status'];
        $masuk=mysql_query("Update beli_cash set status='$status' where kode_cash='$id'");
        if($masuk){
            echo "<script language='javascript'>
    window.location='cash.php'
    </script>";
        }else{
            echo "<script type='text/javascript'>alert('Data Gagal di simpan \n Mohon di chek kembali.');</script>";
        }
	?>
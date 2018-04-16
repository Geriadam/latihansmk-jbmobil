<?php
include "koneksi/koneksi.php";
if($_GET['tambah']=='1'){
        $merk=$_POST['merk'];
        $tipe=$_POST['tipe'];
        $harga=$_POST['harga'];
        $gambar=$_FILES['gambar']['name'];
        $folder="gambar-mobil/";
         move_uploaded_file($_FILES['gambar']['tmp_name'],'gambar-mobil/'.$_FILES['gambar']['name']);
        $masuk="INSERT into mobil values ('','$merk','$tipe','$harga','$gambar')";
        $mancep=mysql_query($masuk);
        if($mancep){
            echo "<script language='javascript'>
	window.location='mobil.php'
	</script>";
        }else{
            echo "<script type='text/javascript'>alert('Data Gagal di simpan \n Mohon di chek kembali.');</script>";
        }
    }
	?>
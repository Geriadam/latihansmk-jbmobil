<?php
include "koneksi/koneksi.php";
        $id=$_POST['id'];
        $merk=$_POST['merk'];
        $tipe=$_POST['tipe'];
        $harga=$_POST['harga'];
        $gambar=$_FILES['gambar']['name'];
        $folder="gambar-mobil/";
         move_uploaded_file($_FILES['gambar']['tmp_name'],'gambar-mobil/'.$_FILES['gambar']['name']);
        $masuk=mysql_query("Update mobil.mobil set merk='$merk', tipe='$tipe', harga_mobil='$harga', gambar='$gambar' where kode_mobil='$id'");
        if($masuk){
            echo "<script language='javascript'>
    window.location='mobil.php'
    </script>";
        }else{
            echo "<script type='text/javascript'>alert('Data Gagal di simpan \n Mohon di chek kembali.');</script>";
        }
	?>
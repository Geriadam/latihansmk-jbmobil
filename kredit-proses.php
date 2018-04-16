<?php
include "koneksi/koneksi.php";
if($_GET['tambah']=='1'){
        $combo=$_POST['apb'];
        $array = explode(" ", $combo);
        $dp=$_POST['dp'];
        $id_mobil=$_POST['id_mobil'];
        $id_pembeli=$_POST['id_pembeli'];
        $apb=$array[1];
        $bulan=$array[0];
        $tanggal=date('Y-m-d');
		$masuk=mysqli_query($koneksi, "INSERT into paket_kredit values ('','$id_mobil','$id_pembeli','$dp','$apb','$bulan','$tanggal')");
        if($masuk){
            echo "<script language='javascript'>window.location='mobil.php?pesan=sukses'</script>";
        }else{
            echo "<script type='text/javascript'>alert('Data Gagal di simpan \n Mohon di chek kembali.');</script>";
        }
    }
?>
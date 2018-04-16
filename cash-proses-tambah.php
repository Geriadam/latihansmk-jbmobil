<?php
include "koneksi/koneksi.php";
if($_GET['tambah']=='1'){
        $mobil=$_POST['kode_mobil'];
        $tanggal=$_POST['tanggal'];
        $bayar=$_POST['bayar'];
        $id=$_POST['id_pembeli'];
        $harga=$_POST['harga'];
        $kembalian=$bayar-$harga;
        $status="Masih Di Proses";
        $masuk="INSERT into beli_cash values ('','$mobil','$tanggal','$bayar','$kembalian','$id','$status')";
        $mancep=mysqli_query($koneksi,$masuk);
        if($mancep){
            echo "<script language='javascript'>window.location='mobil.php?pesan=sukses'</script>";
        }else{
            echo "<script type='text/javascript'>alert('Data Gagal di simpan \n Mohon di chek kembali.');</script>";
        }
    }
?>
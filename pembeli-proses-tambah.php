<?php
session_start();
include "koneksi/koneksi.php";
if($_POST['captcha'] == $_SESSION['captcha'])
    {
        if($_GET['tambah']=='1'){
                $ktp=$_POST['ktp'];
                $nama=$_POST['nama'];
                $alamat=$_POST['alamat'];
                $telp=$_POST['telp'];
                $pass=$_POST['pass'];
                $masuk="INSERT into pembeli values ('','$ktp','$nama','$alamat','$telp','$pass')";
                $mancep=mysqli_query($koneksi, $masuk);
                if($mancep){
                    echo "<script language='javascript'>window.location='login.php?pesan=sukses'</script>";
                }else{
                    echo "<script type='text/javascript'>alert('Data Gagal di simpan \n Mohon di chek kembali.');</script>";
                }
            }
    }
else{
        echo "<script type='text/javascript'>alert('Captcha Salah');</script>";
        echo "<script language='javascript'>window.location='login.php?pesan=eror'</script>";
    }
?>
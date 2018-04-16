<?php
include "koneksi/koneksi.php";
if($_GET['hapus']=='1'){
        $mobil=$_GET['mobil'];
        $guak=mysql_query("DELETE FROM mobil WHERE kode_mobil='$mobil'");
        if($guak){
            echo "<script language='javascript'>
	window.location='mobil.php'
	</script>";
        }else{
            echo "<script type='text/javascript'>alert('Buku Gagal di Hapus \n Mohon di chek kembali.');</script>";
        }
    }
	?>
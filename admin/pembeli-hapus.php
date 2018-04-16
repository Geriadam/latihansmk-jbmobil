<?php
include "koneksi/koneksi.php";
if($_GET['hapus']=='1'){
        $id=$_GET['pembeli'];
        $guak=mysql_query("DELETE FROM pembeli WHERE id='$id'");
        if($guak){
            echo "<script language='javascript'>
	window.location='pembeli.php'
	</script>";
        }else{
            echo "<script type='text/javascript'>alert('Data Gagal di Hapus \n Mohon di chek kembali.');</script>";
        }
    }
	?>
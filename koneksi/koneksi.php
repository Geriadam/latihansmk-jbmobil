<?php
$koneksi=mysqli_connect("localhost","root","");
$database=mysqli_select_db($koneksi, "mobil");
	if($database)
		{
			echo "";
		}
	else
		{
			mysqli_error($koneksi);
		}
?>
<?php
error_reporting(0);
include "koneksi/koneksi.php";
$user=$_POST['username'];
$password=$_POST['password'];
$pass=md5($password);
$qry=mysql_query("SELECT * FROM admin WHERE user='$user' AND pass='$pass'");
$jumpa=mysql_num_rows($qry);
$r=mysql_fetch_array($qry);

if ($jumpa > 0) {
	session_start();
	$_SESSION[username]= $r[username];
	$_SESSION[password]= $r[password];
	echo "<script language='javascript'>
	window.location='home.php'
	</script>";
}
else {
	echo '<script language="javascript">
	alert("Userid atau Password Yang anda Masukkan Salah atau Acount Sudah Diblokir");
	window.location="index.php";
	</script>';
	exit();
}
?>
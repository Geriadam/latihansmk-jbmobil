<?php
$conn = mysql_connect("localhost","root","");
if($conn){
echo "";
$db = mysql_select_db("mobil");
if($db){
echo "";
}else{
echo "Error: <b>" . mysql_error() ."</b><br>";
}
}else{
echo "Error : " . mysql_error() ."<br>";
}
?>
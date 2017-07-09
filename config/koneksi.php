<?php
$server = "localhost";
$user = "root"; 
//$password = "ibu"; 
<<<<<<< HEAD
$database = "m_laporan";
=======
$database = "ow_zm2";
>>>>>>> c756019e4cbc14c502fb8fef617bac42b1d1fa99

// Connect Ke Mysql
$connect = mysql_connect($server,$user) or die ("Koneksi Mysql Gagal");
mysql_select_db($database,$connect) or die ("Pilih Database Gagal");
?>

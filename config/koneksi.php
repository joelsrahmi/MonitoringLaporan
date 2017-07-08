<?php
$server = "localhost";
$user = "root"; 
//$password = "ibu"; 
$database = "m_laporan";

// Connect Ke Mysql
$connect = mysql_connect($server,$user) or die ("Koneksi Mysql Gagal");
mysql_select_db($database,$connect) or die ("Pilih Database Gagal");
?>

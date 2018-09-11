<?php
# Konek ke Web Server Lokal
$myHost	= "localhost";
$myUser	= "root";
$myPass	= "";
$myDbs	= "program_tokodb"; // nama database, disesuaikan dengan database di MySQL

# Konek ke Web Server Lokal
$koneksidb	= mysqli_connect($myHost, $myUser, $myPass) or die ("Koneksi MySQL gagal !");

# Memilih database pd MySQL Server
mysqli_select_db($koneksidb, $myDbs) or die ("Database $myDbs tidak ditemukan !");
?>
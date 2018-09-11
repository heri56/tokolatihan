<?php
session_start();
include_once "../library/inc.connection.php";
include_once "../library/inc.library.php";

date_default_timezone_set("Asia/Jakarta");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>TRANSAKSI PENJUALAN - PROGRAM KASIR TOKO</title>
<link href="../styles/style.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="../plugins/tigra_calendar/tcal.css" />

<script type="text/javascript" src="../plugins/tigra_calendar/tcal.js"></script> 
</head>
<body>

<table width="400" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="../images/logo.jpg" width="600"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><a href="?open=Penjualan-Baru" target="_self">Penjualan Baru</a> | 
        <a href="?open=Penjualan-Tampil" target="_self">Tampil Penjualan</a> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

<?php 
# KONTROL MENU PROGRAM
if(isset($_GET['open'])) {
	// Jika mendapatkan variabel URL ?open
	switch($_GET['open']){				
		case 'Penjualan-Baru' :
			if(!file_exists ("penjualan_baru.php")) die ("File tidak ada!"); 
			include "penjualan_baru.php";	break;
		case 'Penjualan-Tampil' : 
			if(!file_exists ("penjualan_tampil.php")) die ("File tidak ada!"); 
			include "penjualan_tampil.php";	break;
		case 'Penjualan-Hapus' : 
			if(!file_exists ("penjualan_hapus.php")) die ("File tidak ada!"); 
			include "penjualan_hapus.php";	break;
	}
}
else {
	include "penjualan_baru.php";
}
?>


</body>
</html>

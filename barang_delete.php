<?php
include_once "library/inc.connection.php";
include_once "library/inc.library.php";

// Membaca data dari URL
$Kode	= $_GET['Kode'];
if(isset($Kode)){
	// Skrip menghapus data dari tabel database
	$mySql = "DELETE FROM barang WHERE kd_barang='$Kode'";
	$myQry = mysql_query($mySql, $koneksidb) or die ("Error query".mysql_error());
	
	// Refresh
	echo "<meta http-equiv='refresh' content='0; url=?open=Barang-Data'>";
}
else {
	echo "Data yang dihapus tidak ada";
}
?>
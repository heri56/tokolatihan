<?php
include_once "library/inc.connection.php";
include_once "library/inc.library.php";

# UNTUK PAGING (PEMBAGIAN HALAMAN)
$baris 		= 50;
$halaman 	= isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql 	= "SELECT * FROM barang";
$pageQry 	= mysqli_query($koneksidb, $pageSql) or die ("Error: ".mysql_error());
$jmlData 	= mysqli_num_rows($pageQry);
$maksData	= ceil($jmlData/$baris);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tampil Data Barang</title>
</head>
<body>
<h2> MANAJEMEN DATA BARANG </h2>
<a href="?open=Barang-Add" target="_self"><img src="images/btn_add_data.png" height="30" border="0" /></a>
<br/><br/>

<table width="750" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td width="25" bgcolor="#CCCCCC"><strong>No</strong></td>
    <td width="49" bgcolor="#CCCCCC"><strong>Kode</strong></td>
    <td width="271" bgcolor="#CCCCCC"><strong>Nama Barang</strong></td>
    <td width="31" bgcolor="#CCCCCC"><strong>Stok</strong></td>
    <td width="60" bgcolor="#CCCCCC"><strong>Satuan</strong></td>
    <td width="85" bgcolor="#CCCCCC"><strong>H Beli(Rp)</strong></td>
    <td width="85" bgcolor="#CCCCCC"><strong>H Jual(Rp)</strong></td>
    <td colspan="2" bgcolor="#CCCCCC"><strong>Tools</strong></td>
  </tr>
  <?php
	// Skrip menampilkan data dari database
	$mySql = "SELECT * FROM barang ORDER BY kd_barang ASC LIMIT $halaman, $baris";
	$myQry = mysqli_query($koneksidb,$mySql)  or die ("Query salah : ".mysql_error());
	$nomor  = 0; 
	while ($myData = mysqli_fetch_array($myQry)) {
		$nomor++;
		$Kode = $myData['kd_barang'];
  ?>
  <tr>
    <td> <?php echo $nomor; ?> </td>
    <td> <?php echo $myData['kd_barang']; ?> </td>
    <td> <?php echo $myData['nm_barang']; ?> </td>
    <td> <?php echo $myData['stok']; ?> </td>
    <td> <?php echo $myData['satuan']; ?> </td>
    <td> <?php echo format_angka($myData['harga_beli']); ?> </td>
    <td> <?php echo format_angka($myData['harga_jual']); ?> </td>
    <td width="40"><a href="?open=Barang-Edit&Kode=<?php echo $Kode; ?>" target="_self" alt="Edit Data">Edit</a></td>
    <td width="40"><a href="?open=Barang-Delete&Kode=<?php echo $Kode; ?>" target="_self">Delete</a></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="3"><strong>Jumlah Data : <?php echo $jmlData; ?></strong></td>
    <td colspan="6" align="right"><strong>Halaman Ke : </strong>
    <?php
	for ($h = 1; $h <= $maksData; $h++) {
		$list[$h] = $baris * $h - $baris;
		echo " <a href='?open=Barang-Data&hal=$list[$h]'>$h</a> ";
	}
	?> </td>
  </tr>
</table>
</body>
</html>

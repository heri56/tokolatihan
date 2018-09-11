<?php
include_once "../library/inc.connection.php";
include_once "../library/inc.library.php";

# UNTUK PAGING (PEMBAGIAN HALAMAN)
$baris 		= 50;
$halaman 	= isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql 	= "SELECT * FROM penjualan";
$pageQry 	= mysql_query($pageSql, $koneksidb) or die ("error paging: ".mysql_error());
$jmlData	= mysql_num_rows($pageQry);
$maksData	= ceil($jmlData/$baris);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Data Transaksi Penjualan</title>
</head>
<body>
<h1> DATA TRANSAKSI PENJUALAN</h1>

<table width="700" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td width="24" bgcolor="#CCCCCC"><strong>No</strong></td>
    <td width="74" bgcolor="#CCCCCC"><strong>No. Nota </strong></td>
    <td width="88" bgcolor="#CCCCCC"><strong>Tgl. Nota </strong></td>
    <td width="160" bgcolor="#CCCCCC"><strong>Pelanggan</strong></td>
    <td width="216" bgcolor="#CCCCCC"><strong>Keterangan</strong></td>
    <td colspan="2" bgcolor="#CCCCCC"><strong>Tools</strong></td>
  </tr>
	<?php
	$mySql = "SELECT * FROM penjualan ORDER BY no_penjualan DESC LIMIT $halaman, $baris";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
	$nomor = 0; 
	while ($myData = mysql_fetch_array($myQry)) {
		$nomor++;
		$Kode = $myData['no_penjualan'];
	?>
  <tr>
    <td><?php echo $nomor; ?></td>
    <td><?php echo IndonesiaTgl($myData['tgl_penjualan']); ?></td>
    <td><?php echo $myData['no_penjualan']; ?></td>
    <td><?php echo $myData['pelanggan']; ?></td>
    <td><?php echo $myData['keterangan']; ?></td>
    <td width="45"><a href="penjualan_nota.php?noNota=<?php echo $Kode; ?>" target="_blank">Nota</a></td>
    <td width="43"><a href="?open=Penjualan-Hapus&Kode=<?php echo $Kode; ?>" target="_self" alt="Delete Data" onClick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PENJUALAN INI ... ?')">Delete</a></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="3"><strong>Jumlah Data :<?php echo $jmlData; ?> </strong></td>
    <td colspan="4" align="right"><strong>Halaman Ke : 
	<?php
	for ($h = 1; $h <= $maksData; $h++) {
		$list[$h] = $baris * $h - $baris;
		echo " <a href='?open=Penjualan-Tampil&hal=$list[$h]'>$h</a> ";
	}
	?></strong></td>
  </tr>
</table>
</body>
</html>

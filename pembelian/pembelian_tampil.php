<?php
include_once "../library/inc.connection.php";
include_once "../library/inc.library.php";

# SKRIP UNTUK PAGING (PEMBAGIAN HALAMAN)
$baris 		= 50;
$halaman 	= isset($_GET['hal']) ? $_GET['hal'] : 0;
$pageSql 	= "SELECT * FROM pembelian";
$pageQry 	= mysqli_query($koneksidb,$pageSql) or die ("Error paging: ".mysql_error());
$jmlData	= mysqli_num_rows($pageQry);
$maksData	= ceil($jmlData/$baris);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Data Transaksi Pembelian</title>
</head>
<body>
<h1> DATA TRANSAKSI PEMBELIAN</h1>
<table width="700" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td width="24" bgcolor="#CCCCCC"><strong>No</strong></td>
    <td width="67" bgcolor="#CCCCCC"><strong>Tgl. Nota </strong></td>
    <td width="67" bgcolor="#CCCCCC"><strong>No. Nota </strong></td>
    <td width="200" bgcolor="#CCCCCC"><strong>Supplier</strong></td>
    <td width="202" bgcolor="#CCCCCC"><strong>Keterangan</strong></td>
    <td colspan="2" bgcolor="#CCCCCC"><strong>Tools</strong></td>
  </tr>
  <?php
	  // Skrip menampilkan data dari database
	$mySql = "SELECT pembelian.*, supplier.nm_supplier FROM pembelian 
			 LEFT JOIN supplier ON pembelian.kd_supplier = supplier.kd_supplier
			 ORDER BY no_pembelian DESC LIMIT $halaman, $baris";
	$myQry = mysqli_query($koneksidb,$mySql)  or die ("Query salah : ".mysql_error());
	$nomor = 0; 
	while ($myData = mysqli_fetch_array($myQry)) {
		$nomor++;
		$Kode = $myData['no_pembelian'];
	?>
  <tr>
    <td><?php echo $nomor; ?></td>
    <td><?php echo IndonesiaTgl($myData['tgl_pembelian']); ?></td>
    <td><?php echo $myData['no_pembelian']; ?></td>
    <td><?php echo $myData['nm_supplier']; ?></td>
    <td><?php echo $myData['keterangan']; ?></td>
    <td align="center" class="table-list"><a href="pembelian_cetak.php?noNota=<?php echo $Kode; ?>" target="_blank">Cetak</a></td>
    <td align="center" class="table-list"><a href="?open=Pembelian-Hapus&amp;Kode=<?php echo $Kode; ?>" target="_self" alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA PEMBELIAN INI ... ?')">Delete</a></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="3"><strong>Jumlah Data : <?php echo $jmlData; ?> </strong></td>
    <td colspan="4" align="right">
	<strong>Halaman Ke : 
	 <?php
	for ($h = 1; $h <= $maksData; $h++) {
		$list[$h] = $baris * $h - $baris;
		echo " <a href='?open=Pembelian-Tampil&hal=$list[$h]'>$h</a> ";
	}
	?>
	</strong></td>
  </tr>
</table>
</body>
</html>

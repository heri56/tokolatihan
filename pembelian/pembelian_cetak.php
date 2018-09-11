<?php
include_once "../library/inc.connection.php";
include_once "../library/inc.library.php";

# SKRIP MEMBACA DATA TRANSAKSI
if($_GET) {
	# Baca variabel URL
	$noNota = $_GET['noNota'];
	
	# Perintah untuk mendapatkan data dari tabel pembelian
	$mySql = "SELECT pembelian.*,  supplier.nm_supplier FROM pembelian 
			  LEFT JOIN supplier ON pembelian.kd_supplier = supplier.kd_supplier
			  WHERE pembelian.no_pembelian='$noNota'";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
	$myData= mysql_fetch_array($myQry);
}
else {
	echo "Nomor Transaksi Tidak Terbaca";
	exit;
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Cetak Pembelian</title>
</head>
<body>
<h2> CETAK PEMBELIAN </h2>

<table width="450" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td width="154"><strong>No. Pembelian </strong></td>
    <td width="10"><strong>:</strong></td>
    <td> <?php echo $myData['no_pembelian']; ?> </td>
  </tr>
  <tr>
    <td><strong>Tgl. Pembelian </strong></td>
    <td><strong>:</strong></td>
    <td> <?php echo IndonesiaTgl($myData['tgl_pembelian']); ?> </td>
  </tr>
  <tr>
    <td><strong>Supplier</strong></td>
    <td><strong>:</strong></td>
    <td> <?php echo $myData['nm_supplier']; ?> </td>
  </tr>
  <tr>
    <td><strong>Keterangan</strong></td>
    <td><strong>:</strong></td>
    <td> <?php echo $myData['keterangan']; ?> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p><strong>DAFTAR BARANG </strong></p>
<table width="700" border="0" cellspacing="1" cellpadding="3">
  <tr class="table-list">
    <td width="27" bgcolor="#CCCCCC"><strong>No</strong></td>
    <td width="70" bgcolor="#CCCCCC"><strong>Kode </strong></td>
    <td width="298" bgcolor="#CCCCCC"><strong>Nama Barang</strong></td>
    <td width="100" bgcolor="#CCCCCC"><strong> Harga (Rp) </strong></td>
    <td width="52" bgcolor="#CCCCCC"><strong> Jumlah </strong></td>
    <td width="110" bgcolor="#CCCCCC"><strong>Subtotal(Rp) </strong></td>
  </tr>
   <?php
  	// Variabel data
	$jumlahHarga	= 0;
	$totalHarga		= 0;
	$totalBarang	= 0;
	
	// SQL menampilkan item barang yang dijual
	$mySql ="SELECT pembelian_item.*,  barang.nm_barang FROM pembelian_item
			  LEFT JOIN barang ON pembelian_item.kd_barang=barang.kd_barang 
			  WHERE pembelian_item.no_pembelian='$noNota'
			  ORDER BY pembelian_item.kd_barang";
	$myQry = mysql_query($mySql, $koneksidb) or die ("Gagal Query Tmp".mysql_error());
	$nomor  = 0;  
	while($myData = mysql_fetch_array($myQry)) {
		$nomor++;
		// Penjumlahan data
		$jumlahHarga 	= $myData['jumlah'] * $myData['harga'];
		$totalHarga		= $totalHarga + $jumlahHarga;
		$totalBarang	= $totalBarang	+ $myData['jumlah'];
	?>
  <tr>
    <td align="center"><?php echo $nomor; ?></td>
    <td><?php echo $myData['kd_barang']; ?></td>
    <td><?php echo $myData['nm_barang']; ?></td>
    <td align="right"><?php echo format_angka($myData['harga']); ?></td>
    <td align="right"><?php echo format_angka($myData['jumlah']); ?></td>
    <td align="right"><?php echo format_angka($jumlahHarga); ?></td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="4" bgcolor="#F5F5F5"><strong>GRAND TOTAL : </strong></td>
    <td bgcolor="#CCCCCC"><strong><?php echo format_angka($totalBarang); ?></strong></td>
    <td bgcolor="#CCCCCC"><strong><?php echo format_angka($totalHarga); ?></strong></td>
  </tr>
</table>
</body>
</html>

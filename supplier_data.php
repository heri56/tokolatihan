<?php
include_once "library/inc.connection.php";
include_once "library/inc.library.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tampil Data Supplier</title>
</head>
<body>
<h2> MANAJEMEN DATA SUPPLIER </h2>
<p><a href="?open=Supplier-Add" target="_self"><img src="images/btn_add_data.png" height="30" border="0" /></a></p>
<table width="650" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td width="34" align="center" bgcolor="#CCCCCC"><strong>No</strong></td>
    <td width="70" bgcolor="#CCCCCC"><strong>Kode</strong></td>
    <td width="170" bgcolor="#CCCCCC"><strong>Nama Supplier </strong></td>
    <td width="242" bgcolor="#CCCCCC"><strong>Alamat</strong></td>
    <td colspan="2" align="center" bgcolor="#CCCCCC"><strong>Tools</strong></td>
  </tr>
  <?php
	// Skrip menampilkan data dari database
	$mySql = "SELECT * FROM supplier ORDER BY kd_supplier ASC";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
	$nomor  = 0; 
	while ($myData = mysql_fetch_array($myQry)) {
		$nomor++;
		$Kode = $myData['kd_supplier'];
	?>
  <tr>
    <td> <?php echo $nomor; ?> </td>
    <td> <?php echo $myData['kd_supplier']; ?> </td>
    <td> <?php echo $myData['nm_supplier']; ?> </td>
    <td> <?php echo $myData['alamat']; ?> </td>
    <td width="43"><a href="?open=Supplier-Edit&Kode=<?php echo $Kode; ?>" target="_self" alt="Edit Data">Edit</a></td>
    <td width="48"> <a href="?open=Supplier-Delete&Kode=<?php echo $Kode; ?>" target="_self">Delete</a> </td>
  </tr>
  <?php } ?>
</table>
</body>
</html>

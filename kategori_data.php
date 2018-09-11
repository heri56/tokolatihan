<?php
include_once "library/inc.connection.php";
include_once "library/inc.library.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tampil Data Kategori</title>
</head>
<body>
<h2> MANAJEMEN DATA KATEGORI </h2>
<a href="?open=Kategori-Add" target="_self"><img src="images/btn_add_data.png" height="30" border="0" /></a>
<br />
<br />
<table width="650" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <th width="30" bgcolor="#CCCCCC"><strong>No</strong></th>
    <th width="60" bgcolor="#CCCCCC"><strong>Kode</strong></th>
    <th width="434" bgcolor="#CCCCCC"><strong>Nama Kategori </strong></th>
    <td colspan="2" bgcolor="#CCCCCC"><strong>Tools</strong></td>
  </tr>
	<?php
	// Skrip menampilkan data dari database
	$mySql = "SELECT * FROM kategori ORDER BY kd_kategori ASC";
	$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
	$nomor = 0; 
	while ($myData = mysql_fetch_array($myQry)) {
		$nomor++;
		$Kode = $myData['kd_kategori'];
	?>
  <tr>
    <td> <?php echo $nomor; ?> </td>
    <td> <?php echo $myData['kd_kategori']; ?> </td>
    <td> <?php echo $myData['nm_kategori']; ?> </td>
    <td align="center" class="table-list"><a href="?open=Kategori-Edit&Kode=<?php echo $Kode; ?>" target="_self">Edit</a></td>
    <td align="center" class="table-list"><a href="?open=Kategori-Delete&Kode=<?php echo $Kode; ?>" target="_self" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA KATEGORI INI ... ?')">Delete</a></td>
  </tr>
  <?php } ?>
</table>
</body>
</html>

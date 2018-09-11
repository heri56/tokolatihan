<?php
include_once "library/inc.connection.php";
include_once "library/inc.library.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Tampil Data Kasir</title>
</head>
<body>
<h2> MANAJEMEN DATA KASIR </h2>
<a href="?open=Kasir-Add" target="_self"><img src="images/btn_add_data.png" height="30" border="0" /></a>
<br /><br />
<table width="700" border="0" cellspacing="1" cellpadding="3">
  <tr class="table-list">
    <td width="30" bgcolor="#CCCCCC"><strong>No</strong></td>
    <td width="75" bgcolor="#CCCCCC"><strong>Kode</strong></td>
    <td width="347" bgcolor="#CCCCCC"><strong>Nama Kasir </strong></td>
    <td width="115" bgcolor="#CCCCCC"><strong>Username</strong></td>
    <td colspan="2" align="center" bgcolor="#CCCCCC"><strong>Tools</strong></td>
  </tr>
	<?php
	// Skrip menampilkan data dari database
	$mySql 	= "SELECT * FROM kasir ORDER BY kd_kasir ASC";
	$myQry 	= mysql_query($mySql, $koneksidb)  or die ("Query  salah : ".mysql_error());
	$nomor  = 0; 
	while ($myData = mysql_fetch_array($myQry)) {
		$nomor++;
		$Kode	= $myData['kd_kasir'];
	?>  
  <tr>
    <td> <?php echo $nomor; ?> </td>
    <td> <?php echo $myData['kd_kasir']; ?> </td>
    <td> <?php echo $myData['nm_kasir']; ?> </td>
    <td> <?php echo $myData['username']; ?> </td>
    <td width="45" align="center"> <a href="?open=Kasir-Edit&Kode=<?php echo $Kode; ?>" target="_self">Edit</a> </td>
    <td width="45" align="center"> <a href="?open=Kasir-Delete&Kode=<?php echo $Kode; ?>" target="_self">Delete</a> </td>
  </tr>
  <?php } ?>
</table>
</body>
</html>

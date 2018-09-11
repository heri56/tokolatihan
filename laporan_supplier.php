<?php
include_once "library/inc.connection.php";
include_once "library/inc.library.php";
?>
<h2> LAPORAN DATA SUPPLIER</h2>
<table width="650" border="0" cellspacing="1" cellpadding="3">
  <tr>
    <td width="25" bgcolor="#CCCCCC"><strong>No</strong></td>
    <td width="50" bgcolor="#CCCCCC"><strong>Kode</strong></td>
    <td width="161" bgcolor="#CCCCCC"><strong>Nama Supplier </strong></td>
    <td width="278" bgcolor="#CCCCCC"><strong>Alamat</strong></td>
    <td width="100" bgcolor="#CCCCCC"><strong>No. Telepon </strong></td>
  </tr>
<?php
// Skrip menampilkan data dari Database
$mySql = "SELECT * FROM supplier ORDER BY nm_supplier ASC";
$myQry = mysql_query($mySql, $koneksidb)  or die ("Query salah : ".mysql_error());
$nomor  = 0; 
while ($myData = mysql_fetch_array($myQry)) {
	$nomor++;
?>
  <tr>
    <td> <?php echo $nomor; ?> </td>
    <td> <?php echo $myData['kd_supplier']; ?> </td>
    <td> <?php echo $myData['nm_supplier']; ?> </td>
    <td> <?php echo $myData['alamat']; ?> </td>
    <td> <?php echo $myData['no_telepon']; ?> </td>
  </tr>
<?php } ?>
</table>

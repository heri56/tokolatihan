<?php
include_once "library/inc.connection.php";
include_once "library/inc.library.php";

# SKRIP SAAT TOMBOL SIMPAN DIKLIK
if(isset($_POST['btnSimpan'])){
	# BACA DATA DALAM FORM 
	$txtNama		= $_POST['txtNama'];
	$txtUsername	= $_POST['txtUsername'];
	$txtPassword	= $_POST['txtPassword'];
	
	# VALIDASI FORM 
	$pesanError = array();
	if (trim($txtNama)=="") {
		$pesanError[] = "Data <b>Nama Kasir</b> tidak boleh kosong !";		
	}
	if (trim($txtUsername)=="") {
		$pesanError[] = "Data <b>Username</b> tidak boleh kosong !";		
	}

	# MENAMPILKAN PESAN JIKA ADA ERROR DARI VALIDASI
	if (count($pesanError)>=1 ){
		echo "<div class='mssgBox'>";
		echo "<img src='images/attention.png'> <br><hr>";
			$noPesan=0;
			foreach ($pesanError as $indeks=>$pesan_tampil) { 
			$noPesan++;
				echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
			} 
		echo "</div> <br>"; 
	}
	else {
		# SIMPAN DATA KE DATABASE. 
		# Cek Password baru
		if (trim($txtPassword)=="") {
			$txtPassLama= $_POST['txtPassLama'];
			
			$sqlSub = " password='$txtPassLama'";
		}
		else {
			$sqlSub = "  password ='".md5($txtPassword)."'";
		}
		
		// Jika tidak menemukan error, simpan data ke database
		$Kode	= $_POST['txtKode'];
		$mySql  = "UPDATE kasir SET nm_kasir='$txtNama', username='$txtUsername', 
					$sqlSub  WHERE kd_kasir='$Kode'";
		$myQry=mysql_query($mySql, $koneksidb) or die ("Gagal query".mysql_error());
		if($myQry){
			echo "<meta http-equiv='refresh' content='0; url=?open=Kasir-Data'>";
		}
		exit;		
	}
}

# TAMPILKAN DATA DARI DATABASE 
$Kode	= $_GET['Kode']; 
$mySql 	= "SELECT * FROM kasir WHERE kd_kasir='$Kode'";
$myQry 	= mysql_query($mySql, $koneksidb)  or die ("Query ambil data salah : ".mysql_error());
$myData	= mysql_fetch_array($myQry);

	// Memasukan data ke dalam Variabel form
	$dataKode		= $myData['kd_kasir'];
	$dataNama		= isset($_POST['txtNama']) ? $_POST['txtNama'] : $myData['nm_kasir'];
	$dataUsername	= isset($_POST['txtUsername']) ? $_POST['txtUsername'] : $myData['username'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ubah Data Kasir</title>
</head>
<body>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="form1" target="_self">
  <table width="600" border="0" cellspacing="1" cellpadding="3">
    <tr>
      <td colspan="3" bgcolor="#CCCCCC"><strong>UBAH  DATA KASIR </strong></td>
    </tr>
    <tr>
      <td width="158"><strong>Kode</strong></td>
      <td width="5"><strong>:</strong></td>
      <td width="415"><input name="textfield" type="text" value="<?php echo $dataKode; ?>" size="10" maxlength="6" readonly="readonly"/>
      <input name="txtKode" type="hidden" value="<?php echo $dataKode; ?>" /></td>
    </tr>
    <tr>
      <td><strong>Nama Kasir </strong></td>
      <td><strong>:</strong></td>
      <td><input name="txtNama" type="text" value="<?php echo $dataNama; ?>" size="60" maxlength="100" /></td>
    </tr>
    <tr>
      <td><strong>Username</strong></td>
      <td><strong>:</strong></td>
      <td><input name="txtUsername" type="text"  value="<?php echo $dataUsername; ?>" size="60" maxlength="20" /></td>
    </tr>
    <tr>
      <td><strong>Password</strong></td>
      <td><strong>:</strong></td>
      <td><input name="txtPassword" type="password" size="60" maxlength="100" />
      <input name="txtPassLama" type="hidden" value="<?php echo $myData['password']; ?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnSimpan" value=" Simpan " /></td>
    </tr>
  </table>
</form>

</body>
</html>

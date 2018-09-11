<?php
if(isset($_SESSION['SES_LOGIN'])){
# JIKA YANG LOGIN LEVEL ADMIN, menu di bawah yang dijalankan
?>
<ul>
	<li><a href='?open' title='Halaman Utama'>Home</a></li>
	<li><a href='?open=Kasir-Data' title='Kasir Login' target="_self">Data Kasir</a></li>
	<li><a href="?open=Kategori-Data" target="_self">Data Kategori</a></li>
	<li><a href="?open=Supplier-Data" target="_self">Data Supplier</a></li>
	<li><a href="?open=Barang-Data" target="_self">Data Barang</a></li>
	<li><a href="pembelian/" target="_blank">Transaksi Pembelian </a></li>
	<li><a href="penjualan/" target="_blank">Transaksi Penjualan </a></li>
	<li><a href="?open=Laporan" target="_self">Laporan</a></li>
	<li><a href='?open=Logout' title='Logout (Exit)'>Logout</a></li>
</ul>
<?php
}
else {
# JIKA BELUM LOGIN (BELUM ADA SESION LEVEL YG DIBACA)
?>
<ul>
	<li><a href='?open=Login' title='Login System'>Login</a></li>	
</ul>
<?php
}
?>
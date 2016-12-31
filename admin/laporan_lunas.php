<?php 
include 'header_admin.php';
 ?>
<style type="text/css">
	a:focus {
		outline: 0;
	}
</style>
<h4>Laporan Sudah Diambil</h4>
<ul class="nav nav-tabs bg-navtab">
	    <!-- <li class="active"><a data-toggle="tab" href="#home">Home</a></li> -->
	    <li class="active"><a data-toggle="tab" href="#satuan">Satuan</a></li>
	    <li><a data-toggle="tab" href="#kiloan">Kiloan</a></li>
</ul>
	<div class="tab-content">
<!-- start of lunas satuan -->
		<div id="satuan" class="tab-pane fade in active">
	<table class='table input-sm'>
		<tr rowspan=2>
			<th>ID</th>
			<th>No. Rak</th>
			<th>Nama Karyawan</th>
			<th>Nama Pelanggan</th>
			<th>Alamat</th>
			<th>Tanggal Masuk</th>
			<th>Tanggal Keluar</th>
			<th>Jenis Cucian</th>
			<th>Harga Satuan</th>
			<th>QTY</th>
			<th>Total Harga</th>
			<th>Ket</th>
		</tr>


<?php
$tb_cucisatuan = mysqli_query($connect, "select * from cucisatuan where ket='Sudah Diambil'");

while ($array_tb_cucisatuan = mysqli_fetch_array($tb_cucisatuan)) {
echo "
		<tr>
			<td>$array_tb_cucisatuan[id]</td>
			<td>$array_tb_cucisatuan[no_rak]</td>
			<td>$array_tb_cucisatuan[nama_karyawan]</td>
			<td>$array_tb_cucisatuan[nama_pelanggan]</td>
			<td>$array_tb_cucisatuan[alamat]</td>
			<td>$array_tb_cucisatuan[tanggal_masuk]</td>
			<td>$array_tb_cucisatuan[tanggal_keluar]</td>
			<td>$array_tb_cucisatuan[jenis_cucian]</td>
			<td>$array_tb_cucisatuan[harga_satuan]</td>
			<td>$array_tb_cucisatuan[qty]</td>
			<td>$array_tb_cucisatuan[total_harga]</td>
			<td>$array_tb_cucisatuan[ket]</td>
		</tr>
";
}

?>

</table>

		</div>
<!-- end of lunas satuan -->











<!-- start of lunas kiloan -->
		<div id="kiloan" class="tab-pane fade">
<table class='table input-sm'>
		<tr rowspan=2>
			<th>ID</th>
			<th>No. Rak</th>
			<th>Nama Karyawan</th>
			<th>Nama Pelanggan</th>
			<th>Alamat</th>
			<th>Tanggal Masuk</th>
			<th>Tanggal Keluar</th>
			<th>Opsi Pencucian</th>
			<th>Berat (kg)</th>
			<th>Harga Perkilo</th>
			<th>Total Harga</th>
			<th>Ket</th>
		</tr>


<?php
$tb_cucikilo = mysqli_query($connect, "select * from cucikilo where ket='Sudah Diambil'");

// require_once('confirm_lunas.php'); // untuk konfirmasi lunas

while ($array_tb_cucikilo = mysqli_fetch_array($tb_cucikilo)) {
echo "
		<tr>
			<td>$array_tb_cucikilo[id]</td>
			<td>$array_tb_cucikilo[no_rak]</td>
			<td>$array_tb_cucikilo[nama_karyawan]</td>
			<td>$array_tb_cucikilo[nama_pelanggan]</td>
			<td>$array_tb_cucikilo[alamat]</td>
			<td>$array_tb_cucikilo[tanggal_masuk]</td>
			<td>$array_tb_cucikilo[tanggal_keluar]</td>
			<td>$array_tb_cucikilo[opsi_pencucian]</td>
			<td>$array_tb_cucikilo[berat]</td>
			<td>$array_tb_cucikilo[harga_perkilo]</td>
			<td>$array_tb_cucikilo[total_harga]</td>
			<td>$array_tb_cucikilo[ket]</td>
		</tr>
";
}
?>

</table>
		</div>

<!-- end of lunas kiloan -->
	</div>
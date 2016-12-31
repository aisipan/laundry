<style type="text/css">
	.nota{
		background-color: #F4f4f4;
		border: solid;
	}
	@media print{
		.print{
			display: none;
		}
	}
</style>
<?php 
include('header_karyawan.php');

if ($_GET["id"]) {
	$tb_cucisatuan = mysqli_query($connect, "select * from cucisatuan where id = '".$_GET["id"]."' ");
	$array_tb_cucisatuan = mysqli_fetch_array($tb_cucisatuan);

	echo "
	<div class='col-md-6 col-md-offset-3 nota' id='print'>
	<strong>No. Nota: ".$array_tb_cucisatuan['id']."</strong> - <i>cuci satuan</i>
	<center><h2>Nota Kilos Laundry</h2></center>
	<table class='table'>
		<tr>
			<td width='40%'>
				<label class='control-label'>Nama Pelanggan:</label>
				".$array_tb_cucisatuan['nama_pelanggan']."
			</td>
			<td width='30%'>
				<label class='control-label'>Tanggal Masuk:</label>
				".$array_tb_cucisatuan['tanggal_masuk']."
			</td>
			<td width='30%'>
				<label class='control-label'>Tanggal Keluar:</label>
				".$array_tb_cucisatuan['tanggal_keluar']."
			</td>
		</tr>
		<tr>
			<td>
				<label class='control-label'>Alamat:</label>
				".$array_tb_cucisatuan['alamat']."
			</td>
			<td></td>
			<td>
				<label class='control-label'>No. Rak:</label>
				".$array_tb_cucisatuan['no_rak']."
			</td>
		</tr>
	</table>
	";
?>

	<center><h3><strong><i>Detail Cucian</i></strong></h3></center>
	<table class='table'>
		<tr>
			<td>Jenis Cucian</td>
			<td>Harga Satuan</td>
			<td>QTY</td>
			<td>Total Harga</td>
		</tr>
	


<?php
$tb_detailcucisatuan = mysqli_query($connect, "select * from cucisatuan where id ='".$_GET["id"]."' ");
while ($array_tb_detailcucisatuan = mysqli_fetch_array($tb_detailcucisatuan)) {
	echo "
		<tr>
			<td>$array_tb_detailcucisatuan[jenis_cucian]</td>
			<td>$array_tb_detailcucisatuan[harga_satuan]</td>
			<td>$array_tb_detailcucisatuan[qty]</td>
			<td>$array_tb_detailcucisatuan[total_harga]</td>
		</tr>
	";
}		
?>
	</table>

<?php
echo "
	

	<div class='col-md-8 col-md-offset-3' align='right'>
		<strong>ttd<br><br><br>
		".$array_tb_cucisatuan['nama_karyawan']."</strong>
	</div>
	
</div>	
";
} // end of GET id
 ?>

<div class="col-md-6 col-md-offset-3">
	<br>
 	<center>
		<form class="print">
			<a href="">
				<button type='button' class='btn btn-success' onclick="window.print();"><span class='glyphicon glyphicon-print'></span> Print</button>
			</a>
		</form>
	</center>
</div>

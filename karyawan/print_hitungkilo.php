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
	$tb_cucikilo = mysqli_query($connect, "select * from cucikilo where id = '".$_GET["id"]."' ");
	$array_tb_cucikilo = mysqli_fetch_array($tb_cucikilo);


	echo "
	<div class='col-md-6 col-md-offset-3 nota' id='print'>
	<strong>No. Nota: ".$array_tb_cucikilo['id']."</strong> - <i>cuci kiloan</i>
	<center><h2>Nota Kilos Laundry</h2></center>
	<table class='table'>
		<tr>
			<td width='40%'>
				<label class='control-label'>Nama Pelanggan:</label>
				".$array_tb_cucikilo['nama_pelanggan']."
			</td>
			<td width='30%'>
				<label class='control-label'>Tanggal Masuk:</label>
				".$array_tb_cucikilo['tanggal_masuk']."
			</td>
			<td width='30%'>
				<label class='control-label'>Tanggal Keluar:</label>
				".$array_tb_cucikilo['tanggal_keluar']."
			</td>
		</tr>
		<tr>
			<td>
				<label class='control-label'>Alamat:</label>
				".$array_tb_cucikilo['alamat']."
			</td>
			<td>
				<label class='control-label'>No. Rak:</label>
				".$array_tb_cucikilo['no_rak']."
			</td>
			<td>
				<label class='control-label'>Opsi Pencucian:</label>
				".$array_tb_cucikilo['opsi_pencucian']."
			</td>
		</tr>
	</table>
	";
?>

	<center><h3><strong><i>Detail Cucian</i></strong></h3></center>
	<table class='table'>
		<tr>
			<td>No</td>
			<td>Jenis Cucian</td>
			<td>QTY</td>
		</tr>
	


<?php
$tb_detailcucikilo = mysqli_query($connect, "select * from detailcucikilo where id_cucikilo ='".$_GET["id"]."' ");
while ($array_tb_detailcucikilo = mysqli_fetch_array($tb_detailcucikilo)) {
	echo "
		<tr>
			<td>$array_tb_detailcucikilo[no]</td>
			<td>$array_tb_detailcucikilo[jenis_cucian]</td>
			<td>$array_tb_detailcucikilo[qty]</td>
		</tr>
	";
}		
?>
	</table>

<?php
echo "
	<table class='table'>
		<tr>
			<td>
				<label class='control-label'>Berat:</label>
				".$array_tb_cucikilo['berat']." kg
			</td>
			<td>
				<label class='control-label'>Harga Perkilo:</label>
				Rp. ".$array_tb_cucikilo['harga_perkilo']."
			</td>
			<td>
				<label class='control-label'>Total Harga:</label>
				Rp. ".$array_tb_cucikilo['total_harga']."
			</td>
		</tr>
	</table>

	<div class='col-md-8 col-md-offset-3' align='right'>
		<strong>ttd<br><br><br>
		".$array_tb_cucikilo['nama_karyawan']."</strong>
	</div>
	
</div>	
";
} // end of GET id
 ?>

<div class="col-md-6 col-md-offset-3">
	<br>
 	<center>
		<form class="print">
			<a href="javascript:printDiv('print');">
				<button type='button' class='btn btn-success' onclick="window.print();"><span class='glyphicon glyphicon-print'></span> Print</button>
			</a>
		</form>
	</center>
</div>

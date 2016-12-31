<?php 
include('header_karyawan.php');
?>

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
			<th colspan="2"><center>Option</center></th>
			<th>Ket</th>
		</tr>


<?php
$tb_cucikilo = mysqli_query($connect, "select * from cucikilo");

require_once('confirm_lunas.php'); // untuk konfirmasi lunas

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
			<td>
				<form>
					<a href='print_hitungkilo.php?id=$array_tb_cucikilo[id]'>
						<button type='button' class='btn btn-success btn-xs'>
							<span class='glyphicon glyphicon-print'></span> Print
						</button>
					</a>
				</form>
			</td>
			<td>
				<form class='form-inline input-sm' method='POST' action='lunas.php?id=$array_tb_cucikilo[id]' accept-charset='UTF-8' style='display:inline'>
					<button class='btn btn-info btn-xs' type='button' data-toggle='modal' data-target='#confirmLunas' data-title='Confirm Lunas' data-message='Apakah anda yakin $array_tb_cucikilo[nama_pelanggan] ingin mengambil cuciannya?'>
						<span class='glyphicon glyphicon-ok-sign'></span> Ambil
					</button>
				</form>
			</td>
			<td>$array_tb_cucikilo[ket]</td>
		</tr>
";
}
?>

</table>


<form>
<a href="hitungkilo.php">
<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-chevron-left"></span> Back to <br> Hitung Kiloan</button>
</a>
</form>


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
			<th>Jenis Cucian</th>
			<th>Harga Satuan</th>
			<th>QTY</th>
			<th>Total Harga</th>
			<th colspan="2" width="10%"><center>Option</center></th>
			<th>Ket</th>
		</tr>


<?php
$tb_cucisatuan = mysqli_query($connect, "select * from cucisatuan");

require_once('confirm_lunas.php'); // untuk konfirmasi lunas

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
			<td>
				<form>
					<a href='print_hitungsatuan.php?id=$array_tb_cucisatuan[id]'>
						<button type='button' class='btn btn-success btn-xs'>
							<span class='glyphicon glyphicon-print'></span> Print
						</button>
					</a>
				</form>
			</td>
			<td>
				<form class='form-inline input-sm' method='POST' action='lunas_satuan.php?id=$array_tb_cucisatuan[id]' accept-charset='UTF-8' style='display:inline'>
					<button class='btn btn-info btn-xs' type='button' data-toggle='modal' data-target='#confirmLunas' data-title='Confirm Lunas' data-message='Apakah anda yakin $array_tb_cucisatuan[nama_pelanggan] ingin mengambil cuciannya?'>
						<span class='glyphicon glyphicon-ok-sign'></span> Ambil
					</button>
				</form>
			</td>
			<td>$array_tb_cucisatuan[ket]</td>
		</tr>
";
}
//dikasih ini biar bisa ngeprint -> onclick='window.print();'
?>

</table>


<form>
<a href="hitungsatuan.php">
<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-chevron-left"></span> Back to <br> Hitung Satuan</button>
</a>
</form>


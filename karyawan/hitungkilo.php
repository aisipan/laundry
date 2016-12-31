<?php 
include('header_karyawan.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hitung Kilo</title>
	<!-- Link CSS datetimepicker -->
  	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-datetimepicker.min.css"> 
  	<!-- End of datetimepicker CSS Link -->
  	<style type="text/css">
  	option:focus {
  		outline: 0;
  	}
  	</style>
</head>
<body>
<center><h2><i>Hitung Kiloan</i></h2></center>



	<div class="col-md-6 col-md-offset-3">
	<form class="form-horizontal" method="post" action="proses_hitungkilo.php">
		<table class="table">
			<tr>
				<td width="40%">
					<label class="control-label input-sm">Nama Pelangggan:</label>
					<input type="text" class="form-control input-sm" name="nama_pelanggan" require>
				</td>
				
				<td width="30%">
					<label class='control-label input-sm' for='tanggal'>Tanggal Masuk:</label>
					<div class="input-group date form_date" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="dd-mm-yyyy">
					    <input class="form-control input-sm" type="text" name="tanggal_masuk" require>
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
				    </div>
				</td>

				<td width="30%">
					<label class='control-label input-sm' for='tanggal'>Tanggal Keluar:</label>
					<div class="input-group date form_date" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="dd-mm-yyyy">
					    <input class="form-control input-sm" type="text" name="tanggal_keluar" require>
						<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
				    </div>
				</td>
			</tr>

			<tr>
				<td width="">
					<label class="control-label input-sm">Alamat:</label>
					<input type="text" class="form-control input-sm" name="alamat" require>
				</td>

				<td width="">
					<label class="control-label input-sm">No. Rak:</label>
					<select class="form-control input-sm" name="no_rak">
						<?php for ($i=1; $i<=30; $i++) { 
						 	echo "<option value='$i'>$i</option>";
						} ?>	
					</select>
				</td>

				<td width="">
					<label class="control-label input-sm">Option:</label>
					<select class="form-control input-sm" name="option" id="option">
						<option>Pilih Jenis Pencucian</option>
						<option id="cuci_kering" attributOption="5800">Cuci Kering</option>
						<option id="setrika" attributOption="6000">Setrika</option>
						<option id="cuci_kering_plus" attributOption="7200">Cuci Kering + Setrika</option>
					</select>
				</td>
			</tr>

		</table>

		<center><h4>Detail Cucian</h4></center>
			<table class="table table-hover">
				<tr align="center" class="input-sm" bgcolor="#b2e8fc">
					<td>No</td>
					<td>Jenis Cucian</td>
					<td>QTY</td>
					<td>Option</td>
				</tr>
				<tr>
					<td width="17%"><input type="text" class="form-control input-sm" id="no" name="no[0]" value="1" require></td>
					<td><input type="text" class="form-control input-sm" name="jenis_cucian[0]" require></td>
					<td><input type="text" class="form-control input-sm" name="qty[0]" require></td>
					<td align="right"><button type="button" class="del btn btn-danger btn-sm">Delete</button></td>
				</tr>
				<tr id="last">
					<td></td>
					<td></td>
					<td></td>
					<td colspan="4" align="right"><button type="button" class="btn btn-info btn-sm" id="addRow">Add</button></td>
				</tr>
				<tr>
					<td>
						<label class='control-label input-sm' for='berat'>Berat:</label>
						<input type='text' onkeyup="hitung()" class='form-control input-sm' id='berat' name='berat' placeholder='berat (kg)' require>
					</td>
					<td>
						<label class='control-label input-sm' for='harga_perkilo'>Harga Perkilo:</label>
						<input type='text' onkeyup="hitung()" class='form-control input-sm' id='harga_perkilo' name='harga_perkilo' require>
					</td>
					<td>
						<label class='control-label input-sm' for='total_harga'>Total Harga:</label>
						<input type='text' class='form-control input-sm' id='total_harga' name='total_harga' require>
					</td>
				<tr>
					<td colspan="4" align="right">
						<input type='submit' name='submit' class='btn btn-success btn-sm' value='Submit'>
					</td>
				</tr>
			</table>
	</form>
		

	</div>

<!-- Script datetimepicker -->
	<script type="text/javascript" src="../bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../bootstrap/js/locales/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
	<script type="text/javascript">
	 $('.form_date').datetimepicker({
	        language:  'id',
	        weekStart: 1,
	        todayBtn:  1,
	  autoclose: 1,
	  todayHighlight: 1,
	  startView: 2,
	  minView: 2,
	  forceParse: 0
	    });
	</script>
<!--  End of datetimepicker script -->

<!-- Script untuk insert dan delete row pada detail cucian -->
<script type="text/javascript" src="../bootstrap/js/jquery162.min.js"></script>
<script type="text/javascript">
var i = 1;
var j = 2;
$(function(){
	$("#addRow").click(function(){
		row = '<tr>'+
		'<td width="17%"><input type="text" class="form-control input-sm" name="no['+i+']" value="'+j+'"></td>'+
		'<td><input type="text" class="form-control input-sm" name="jenis_cucian['+i+']"></input></td>'+
		'<td><input type="text" class="form-control input-sm" name="qty['+i+']"/></td>'+
		'<td align="right"><button type="button" class="del btn btn-danger btn-sm">Delete</button></td>'+
		'</tr>';
		$(row).insertBefore("#last");
		i++;
		j++;
	});
});


	$(".del").live('click', function(){
		$(this).parent().parent().remove();
	});

	function hitung(){
		var berat = $("#berat").val();
		var harga_perkilo = $("#harga_perkilo").val();
		// var keadaan = $("option:selected", this).attr("attributKeadaan");

		if (harga_perkilo <= 6000) {
			if (berat <= 2) {
				total_harga = 1 * harga_perkilo;
			}
			else{
				total_harga = berat * harga_perkilo;
			}
		}
		else{
			total_harga = berat * harga_perkilo;
		}
		$("#total_harga").val(total_harga);

		// if (keadaan = agak_basah) {
		// 	total_harga = total_harga * 0.2;
		// }
		// else if (keadaan = berair) {
		// 	total_harga = total_harga * 0.3;
		// }
		// else{
		// 	total_harga = total_harga;
		// }
	}

$(document).ready(function() {
		$("#option").change(function(){
			var opsi = $("option:selected", this).attr("attributOption");
			$("#harga_perkilo").val(opsi);
			});
		// $("#keadaan").change(function(){
		// 	var situation = $("option:selected", this).attr("attributKeadaan");
		// 	var sebelum = $("#total_harga").val();
		// 	var diskon = situation * sebelum;
		// 	var sesudah = sebelum - diskon;

		// 	if (situation = "a") {
		// 		$("#total_harga").val();	
		// 	}
		// 	else if (situation = "0.3" || situation = "0.4") {
		// 		$("#total_harga").val(sesudah);
		// 	}

		// });

	});

</script>

<!-- End of Script untuk menambah dan delete row pada detail cucian -->
</body>
</html>
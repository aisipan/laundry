<?php 
include('header_karyawan.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Link CSS datetimepicker -->
  	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-datetimepicker.min.css"> 
  	<!-- End of datetimepicker CSS Link -->

</head>
<body>

<div class="col-md-6 col-md-offset-3">
<center><h2><i>Hitung Satuan</i></h2></center>
	<form method="post" action="proses_hitungsatuan.php">
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
				<td width="40%">
					<label class="control-label input-sm">Alamat:</label>
					<input type="text" class="form-control input-sm" name="alamat" require>
				</td>

				<td width="30%"></td>

				<td width="30%">
					<label class="control-label input-sm">No. Rak:</label>
					<select class="form-control input-sm" name="no_rak">
						<?php for ($i=1; $i<=30; $i++) { 
						 	echo "<option value='$i'>$i</option>";
						} ?>	
					</select>
				</td>
			</tr>
		</table>

	<table class="table">
	<center><h4>Detail Cucian</h4></center>
			<tr class="input-sm">
				<td width="35%">Jenis Cucian</td>
				<td>Harga Satuan</td>
				<td width="10%">QTY</td>
				<td>Total Harga</td>
			</tr>	
			<tr>
		    	<td>
		    		<select id="SelectBarang" name="jenis_cucian" class="form-control input-sm">
		    			<option value="0">Pilih Jenis Cucian</option>
		    			<?php
							$wow = mysqli_query($connect, "select * from item order by nama_item asc");
							while($pilih = mysqli_fetch_array($wow)){
								echo "<option value='$pilih[nama_item]' attributHargaSatuan='$pilih[harga_satuan]'>$pilih[nama_item]</option>";
								}
						?>
					</select>
				</td>

				<td><input class="a form-control input-sm" type="text" id="idHargaSatuan" name="harga_satuan"></td>
		    	<td><input class="b form-control input-sm" onkeyup="hitung()" type="text" name="qty"></td>
		    	<td><input class="c form-control input-sm" type="text" name="total_harga" readonly></td>
			</tr>
			<tr>
				<td colspan="4" align="right"><input type="submit" class="btn btn-success" name="submit" value="Submit"></td>
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


<!-- <script type="text/javascript" src="../bootstrap/js/jquery162.min.js"></script> -->
<script type="text/javascript">

	$(document).ready(function() {
		$("#SelectBarang").change(function(){
			var HARGANYA = $("option:selected", this).attr("attributHargaSatuan");
			$("#idHargaSatuan").val(HARGANYA);
			});
		
	});

	function hitung() {
	    var a = $(".a").val();
	    var b = $(".b").val();
	    c = a * b; //a kali b
	    $(".c").val(c);
	}

</script>

</body>
</html>


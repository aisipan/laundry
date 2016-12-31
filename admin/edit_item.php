<?php 
include('header_admin.php');
?>

<center>
	<?php 
	//untuk konek ke database udah di includekan di file header_admin
		error_reporting(0);
		if($_GET["id_item"]){
			$kode=mysqli_query($connect, "SELECT * from item where id_item='" . $_GET["id_item"] . "'");
			$db=mysqli_fetch_array($kode);
			echo "<h2>Edit Item</h2>
				<form class='form-horizontal' method='post'>
						<div class='form-group'>
						  <label class='control-label col-sm-4' for='nama'>Nama:</label>
						  <div class='col-sm-4'>
						    <input type='text' class='form-control' id='nama' name='new_nama_item' value='".$db['nama_item']."'>
						  </div>
						</div>

						<div class='form-group'>
						  <label class='control-label col-sm-4' for='harga_satuan'>Harga Satuan:</label>
						  <div class='col-sm-4'>
						    <input type='text' class='form-control' id='harga_satuan' name='new_hargasatuan' value='".$db['harga_satuan']."'>
						  </div>
						</div>
						
						<div class='form-group'>        
					      <div class='col-sm-offset-2 col-sm-8'>
					        <input type='submit' name='update_item' class='btn btn-default' value='Update'>
					        <input type='submit' name='cancel' class='btn btn-default' value='Cancel'>
					      </div>
					    </div>

				</form>";
		}
		if ($_POST["update_item"]){
		$kode=mysqli_query($connect, "UPDATE item set nama_item='" . $_POST["new_nama_item"] . "', harga_satuan='" . $_POST["new_hargasatuan"] . "' where id_item='" . $_GET["id_item"] . "'");
		header('location:input_item.php?success=1');
		
		}


		if ($_POST["cancel"]) {
			header("location:input_item.php");
		}
	 ?>
</center>
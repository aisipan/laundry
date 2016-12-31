<?php 
include('header_admin.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Input Item</title>
</head>
<body>


<div class="container-fluid" style="height:1000px">


  <div class="col-md-4">

	<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#tambahItem"><span class="glyphicon glyphicon-plus"></span> Tambah Item</button>
  	<div id="tambahItem" class="collapse">
		<h3>Menambah Item Ke Database</h3>
		<form name="formtambah" method="post">
			<table class="table input-sm">
				<tr>
					<td>ID Item:
					<input class="form-control" name="id_item" type="text" size="5" maxlength="5"></td>
				</tr>
				<tr>
					<td>Nama Item:
					<input class="form-control" name="nama_item" type="text" size="20" maxlength="20"></td>
				</tr>
				<tr>
					<td>Harga Satuan:
					<input class="form-control" name="harga_satuan" type="text" size="7" maxlength="7"></td>
				</tr>
				<tr>
					<td colspan="2"><input class="btn btn-primary" name="insert_item" type="submit" value="Simpan">
					</td>
				</tr>
			</table>
		</form>
	</div>
			
			<?php

			// Sintaks untuk INSERT NEW ITEM
			error_reporting(0);
			//untuk konek ke database udah di includekan di file header_admin
			$id_item = $_POST['id_item'];
			$nama_item = $_POST['nama_item'];
			$harga = $_POST['harga_satuan'];
			$tombol = $_POST['insert_item'];

			if($tombol){
				if(!empty($id_item)){
					if(!empty($nama_item)){
						if(!empty($harga)){
						
							$sql=mysqli_query($connect, "INSERT INTO item values('". $id_item ."','". $nama_item ."','". $harga .  "')");
							
							echo "  <div class='alert alert-success fade in'>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<strong>Sukses disimpan ke database</strong>
									</div>";
						}
						else {
							echo "<div class='alert alert-warning fade in'>
									<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
									<strong>Harga belum diisi</strong>
								  </div>";
						}
					}
					else{
						echo "<div class='alert alert-warning fade in'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								<strong>Nama item belum diisi</strong>
							  </div>";
					}
				}
				else {
					echo "<div class='alert alert-warning fade in'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<strong>ID item belum diisi</strong>
						  </div>";
				}
			}

		?>
			

  </div> <!-- End of FORM TAMBAH ITEM -->
	
	<div class="col-md-8">

	<?php 
	
		if ($_GET['success'] == 1) {
			echo "<div class='alert alert-success fade in'>
		                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		                <strong>Data Item Telah Diperbaharui!</strong>
		              </div>";
		}
		if ($_GET['success'] == 2) {
      	echo "<div class='alert alert-success fade in'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Data Item Telah Dihapus!</strong>
                  </div>";
    }  
	
		
	 ?>

		<h3>Tabel Item Pada Database Laundry</h3>
		<table class="table table-hover input-sm">
		<tr>
			<th>#</th>
			<th>ID Item</th>
			<th>Nama Item</th>
			<th>Harga</th>
			<th colspan="2"><center>Aksi</center></th>
		</tr>

			<?php

			// SINTAKS UNTUK READ ITEM
			//untuk konek ke database udah di includekan di file header_admin
			$tampil= mysqli_query($connect, "SELECT * FROM item");

			// buat ngapus item
			require_once ('delete_confirm.php');
				
				$no=1;
				while ($row=mysqli_fetch_array($tampil)) {
					echo "<tr>
			                  <td> $no </td>
			                  <td> $row[id_item] </td>
			                  <td> $row[nama_item] </td>
			                  <td> $row[harga_satuan] </td>
			                  <td width=10%> 
			                       <form>
			                       		<a href='edit_item.php?id_item=$row[id_item]'>
				                          <button class='btn btn-xs btn-info' type='button'>
				                              <i class='glyphicon glyphicon-pencil'></i> Edit
				                          </button>
				                        </a>
			                       </form>
			                  </td>
			                  <td width=10%>
			                       <form method='POST' action='delete_item.php?id_item=$row[id_item]' accept-charset='UTF-8' style='display:inline'>
			                          <button class='btn btn-xs btn-danger' type='button' data-toggle='modal' data-target='#confirmDelete' data-title='Delete Item' data-message='Are you sure you want to delete this item ?'>
			                              <i class='glyphicon glyphicon-trash'></i> Delete
			                          </button>
			                       </form>
			                  </td>
			              </tr>";
				$no++;
				}
			?>
		</table>
	</div>

</div> <!-- end of container fluid class -->

</body>
</html>


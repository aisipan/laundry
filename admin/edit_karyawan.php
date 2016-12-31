<?php 
include('header_admin.php');
?>

<center>
	<?php 
	//untuk konek ke database udah di includekan di file header_admin
		error_reporting(0);
		if($_GET["id_karyawan"]){
			$kode=mysqli_query($connect, "SELECT * from login_karyawan where id_karyawan='" . $_GET["id_karyawan"] . "'");
			$db=mysqli_fetch_array($kode);
			echo "<h2>Edit Karyawan</h2>
				<form class='form-horizontal' method='post'>
						<div class='form-group'>
						  <label class='control-label col-sm-4'>Nama:</label>
						  <div class='col-sm-4'>
						    <input type='text' class='form-control' name='nama_karyawan' value='".$db['nama']."'>
						  </div>
						</div>
						<div class='form-group'>
						  <label class='control-label col-sm-4'>Username:</label>
						  <div class='col-sm-4'>
						    <input type='text' class='form-control' name='user_karyawan' value='".$db['user_karyawan']."'>
						  </div>
						</div>
						<div class='form-group'>
						  <label class='control-label col-sm-4'>Password:</label>
						  <div class='col-sm-4'>
						    <input type='text' class='form-control' name='password_karyawan' value='".$db['pass_karyawan']."'>
						  </div>
						</div>
					    <div class='form-group'>
					      <label class='control-label col-sm-4'>Alamat:</label>
					      <div class='col-sm-4'>          
					        <input type='text' class='form-control' name='alamat_karyawan' value='".$db['alamat']."'>
					      </div>
					    </div>
					    <div class='form-group'>
					      <label class='control-label col-sm-4'>No HP:</label>
					      <div class='col-sm-4'>          
					        <input type='text' class='form-control' name='nohp_karyawan' value='".$db['no_hp']."'>
					      </div>
					    </div>
					    <div class='form-group'>        
					      <div class='col-sm-offset-2 col-sm-8'>
					        <input type='submit' name='update_karyawan' class='btn btn-default' value='Update'>
					      	<input type='submit' name='cancel' class='btn btn-default' value='Cancel'>
					      </div>
					    </div>
				</form>";
		}

		$nama_karyawan = $_POST['nama_karyawan'];
        $user_karyawan = $_POST['user_karyawan'];
        $password_karyawan = $_POST['password_karyawan'];
        $alamat_karyawan = $_POST['alamat_karyawan'];
        $nohp_karyawan = $_POST['nohp_karyawan'];
        $update_karyawan = $_POST['update_karyawan'];

		if ($update_karyawan){
			$kode=mysqli_query($connect, "UPDATE login_karyawan set nama='".$nama_karyawan."', user_karyawan='".$user_karyawan."', pass_karyawan='".$password_karyawan."', alamat='".$alamat_karyawan."', no_hp='".$nohp_karyawan."' where id_karyawan='".$_GET["id_karyawan"]."' ");
			echo "<script>location.href='input_karyawan.php?success=1';</script>";
		}

		if ($_POST["cancel"]){
			echo "<script>location.href='input_karyawan.php';</script>";
		}
	 ?>
</center>



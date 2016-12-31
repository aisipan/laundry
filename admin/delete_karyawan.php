<?php 
	include('../config.php');
	
	if ($_GET["id_karyawan"]) {
		//untuk konek ke database udah di includekan di atas
		mysqli_query($connect, "DELETE FROM login_karyawan WHERE id_karyawan = '".$_GET["id_karyawan"]."' ");
		header('location:input_karyawan.php?success=2');
	}

?>
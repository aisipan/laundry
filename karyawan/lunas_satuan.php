<?php 
	include ('../config.php');

	if ($_GET["id"]) {
		mysqli_query($connect, "UPDATE cucisatuan set ket = 'Sudah Diambil' where id = '".$_GET["id"]."' ");
		header('location:tampil_hitungsatuan.php');
	}


 ?>
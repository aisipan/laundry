<?php 
	include ('../config.php');

	if ($_GET["id"]) {
		mysqli_query($connect, "UPDATE cucikilo set ket = 'Sudah Diambil' where id = '".$_GET["id"]."' ");
		header('location:tampil_hitungkilo.php');
	}


 ?>
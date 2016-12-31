<?php
	include('../config.php');
	
	if ($_GET["id_item"]){
		//untuk konek ke database udah di includekan di atas
		mysqli_query($connect, "DELETE FROM item WHERE id_item = '" . $_GET["id_item"] . "'");
		header('location:input_item.php?success=2');
	}
	
?>
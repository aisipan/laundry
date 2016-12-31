<?php 
session_start();

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['user_admin']) || empty($_SESSION['user_admin'])) {
	//redirect ke halaman index login
	echo "<script>alert('Anda Harus Login Terlebih Dahulu');
	location.href=\"../index.php\";</script>";
}
?>
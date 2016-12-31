<?php
include('../config.php');

session_start();

//tangkap data dari form login
$user_admin = $_POST['user_admin'];
$pass_admin = $_POST['pass_admin'];

//untuk mencegah sql injection
//kita gunakan mysqli_real_escape_string
$user_admin = mysqli_real_escape_string($connect, $user_admin);
$pass_admin = mysqli_real_escape_string($connect, $pass_admin);

//cek data yang dikirim, apakah kosong atau tidak
if (empty($user_admin) && empty($pass_admin)) {
	//kalau username dan password kosong
	header('location:../index.php?error=1');
	break;
} else if (empty($user_admin)) {
	//kalau username saja yang kosong
	header('location:../index.php?error=2');
	break;
} else if (empty($pass_admin)) {
	//kalau password saja yang kosong
	header('location:../index.php?error=3');
	break;
}

$q = mysqli_query($connect, "select * from login_admin where user_admin='$user_admin' and pass_admin='$pass_admin'");

if (mysqli_num_rows($q) == 1) {
	//kalau username dan password sudah terdaftar di database
	//buat session dengan nama username dengan isi nama user yang login
	$_SESSION['user_admin'] = $user_admin;	
	//redirect ke halaman admin
	header('location:index.php');
} else {
	//kalau username ataupun password tidak terdaftar di database
	header('location:../index.php?error=4');
}
?>
<?php
include('../config.php');

session_start();

//tangkap data dari form login
$user_karyawan = $_POST['user_karyawan'];
$pass_karyawan = $_POST['pass_karyawan'];

//untuk mencegah sql injection
//kita gunakan mysqli_real_escape_string
$user_karyawan = mysqli_real_escape_string($connect, $user_karyawan);
$pass_karyawan = mysqli_real_escape_string($connect, $pass_karyawan);

//cek data yang dikirim, apakah kosong atau tidak
if (empty($user_karyawan) && empty($pass_karyawan)) {
	//kalau username dan password kosong
	header('location:../index.php?error=1');
	break;
} else if (empty($user_karyawan)) {
	//kalau username saja yang kosong
	header('location:../index.php?error=2');
	break;
} else if (empty($pass_karyawan)) {
	//kalau password saja yang kosong
	header('location:../index.php?error=3');
	break;
}

$q = mysqli_query($connect, "select * from login_karyawan where user_karyawan='$user_karyawan' and pass_karyawan='$pass_karyawan'");

if (mysqli_num_rows($q) == 1) {
	//kalau username dan password sudah terdaftar di database
	//buat session dengan nama username dengan isi nama user yang login
	$_SESSION['user_karyawan'] = $user_karyawan;	
	//redirect ke halaman_karyawan
	header('location:index.php');
} else {
	//kalau username ataupun password tidak terdaftar di database
	header('location:../index.php?error=4');
}
?>
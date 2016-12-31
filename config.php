<?php
// //host yang digunakan
// //99,9% tidak perlu dirubah
// $host = 'mysql.idhostinger.com'; 
 
// //username untuk login ke host
// //biasanya didapatkan pada email konfirmasi order hosting
// $user = 'u558885978_laund'; 
 
// //jika menggunakan PC sendiri sebagai host,
// //secara default password dikosongkan
// $pass = 'laundryranger';
 
// //isikan nama database sesuai database
// //yang dibuat pada langkah-1
// $dbname = 'u558885978_laund';
 
// //mengubung ke host
// $connect = mysqli_connect($host, $user, $pass, $dbname);

// //cek koneksi
// if (mysqli_connect_errno()){
// 	echo "Failed to connect MySQL: " . mysqli_connect_error();
// }

//host yang digunakan
//99,9% tidak perlu dirubah
$host = 'localhost'; 
 
//username untuk login ke host
//biasanya didapatkan pada email konfirmasi order hosting
$user = 'root'; 
 
//jika menggunakan PC sendiri sebagai host,
//secara default password dikosongkan
$pass = '';
 
//isikan nama database sesuai database
//yang dibuat pada langkah-1
$dbname = 'laundry';
 
//mengubung ke host
$connect = mysqli_connect($host, $user, $pass, $dbname);

//cek koneksi
if (mysqli_connect_errno()){
	echo "Failed to connect MySQL: " . mysqli_connect_error();
}
?>
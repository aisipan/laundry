<?php 
include('header_karyawan.php');


error_reporting(0);


echo "<div class='alert alert-success'>";
echo "Selamat Datang <strong>".$_SESSION['user_karyawan']."</strong>";
echo "</div>";
?>
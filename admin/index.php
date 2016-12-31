<?php 
include('header_admin.php');

error_reporting(0);


echo "<div class='alert alert-success'>";
echo "Selamat Datang <strong>".$_SESSION['user_admin']."</strong>";
echo "</div>";
?>
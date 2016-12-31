<?php 
include('cek-login-karyawan.php');
include('../config.php');
include('../konversi_tgl.php');
?>

<html>
<head>
  <title>Halaman Karyawan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <style type="text/css">
  <link rel="shortcut icon" href="img/logo.png">
  .waktu_login{
    height: 50px;
    border-radius: 7px;
    background-color: #FFF;

  }
  </style>

  <!--
  <style type="text/css">
    body {
      background-image: url(img/bgimage.jpg);
      background-color: #000;
      background-position: 75% 0%;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
  </style>
  -->


</head>
<body>

<div class="page-header">
  <!-- <h1>Welcome to Karyawan Page</h1> -->
</div>



<nav class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="120">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>        
      </button>
      <a href="index.php" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> KL | <small><i> Halaman Karyawan</i></small></a>     
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Hitung <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="hitungsatuan.php">Satuan</a></li>
            <li><a href="hitungkilo.php">Kiloan</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Data <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="tampil_hitungsatuan.php">Satuan</a></li>
            <li><a href="tampil_hitungkilo.php">Kiloan</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li>
            <div class="waktu_login">
            <?php echo "Login Hari Ini: <br> ";
            echo tgl_indo(date("Ymd"));
            echo " | ";
            echo gmdate("H:i:s", time()+ 60*60*7);
             ?>
            </div>
          </li>
         <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user_karyawan'];?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">


  <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

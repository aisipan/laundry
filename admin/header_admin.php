<?php 
include('cek-login-admin.php');
include('../config.php');
include('../konversi_tgl.php');
?>

<html>
<head>
  <title>Halaman Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <link rel="shortcut icon" href="img/logo.png">
  <style type="text/css">
  .waktu_login{
    height: 50px;
    border-radius: 7px;
    background-color: #FFF;

  }
  </style>



</head>
<body>

<div class="page-header">
  <!-- <h1>Welcome to Admin Page</h1> -->
</div>



<nav class="navbar navbar-inverse navbar-fixed-top"> 
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>        
      </button>
      <a href="index.php" class="navbar-brand"><span class="glyphicon glyphicon-home"></span>  KL |<small><i> Halaman Admin</i></small></a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Input <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="input_karyawan.php">Karyawan</a></li>
            <li><a href="input_item.php">Item</a></li>
          </ul>
        </li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Laporan <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="laporan_lunas.php">Sudah Diambil</a></li>
            <li><a href="laporan_belumlunas.php">Belum Diambil</a></li>
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
          <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['user_admin'];?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div> 
</nav>

<div class="container">



  <script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

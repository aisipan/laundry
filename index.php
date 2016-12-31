<html>
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
  <link rel="shortcut icon" href="img/logo.png">
 
 
  <style type="text/css">
    body {
      background-image:;
      background-color: #f4f4f4;
      background-position: 75% 0%;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
  </style>


</head>
<body>

<?php
session_start();

//kalo session nya admin maka masuk halaman admin
if (!empty($_SESSION['user_admin'])) {
  header('location:admin/index.php');
}
//kalo session nya karyawan masuk halaman karyawan
elseif (!empty($_SESSION['user_karyawan'])) {
  header('location:karyawan/index.php');
}
/* Jadi misalkan admin sudah login dan ingin masuk ke halaman karyawan
maka admin harus logout terlebih dahulu, karena jika dipaksa masuk ke halaman karyawan maka otomatis akan redirect ke halaman admin sendiri */

?>


<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>        
      </button>
      <a href="index.php" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> Kilos Laundry</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="contact.php"><span class="glyphicon glyphicon-user"></span> Contact</a></li>
      </ul>
    </div>

  </div>

</nav>




<?php 
//kode php ini kita gunakan untuk menampilkan pesan eror
if (!empty($_GET['error'])) {
  if ($_GET['error'] == 1) {
    echo '<script>
          alert("Username dan Password belum diisi!");</script>';
  } else if ($_GET['error'] == 2) {
    echo '<script>
          alert("Username belum diisi!");</script>';
  } else if ($_GET['error'] == 3) {
    echo '<script>
          alert("Password belum diisi!");</script>';
  } else if ($_GET['error'] == 4) {
    echo '<script>
          alert("Username dan Password tidak terdaftar!");</script>';
  }
}
?>


<br>
<br>
<br>
<div class="container">
  <center><img class="img-responsive" src="img/header_fix.png" width="700" heigth="350"></center>
      <br>
  <div class="row">
    <div class="col-md-3 col-md-offset-3" align="center">
        <div class="thumbnail">
            <img class="img-responsive" src="img/admin.png">
            <br>
      <!-- Trigger the modal with an Admin button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Admin</button>
        </div>
      <!-- Modal Admin -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal Admin content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="modal-title">Login Admin</h3>
            </div>
            <div class="modal-body">
              
              
              <form name="login_admin" action="admin/otentikasi_admin.php" method="post" class="form-horizontal">
              
                  <div class="form-group">
                    <label class="col-md-4 col-md-offset-1">Username:</label>
                    <div class="col-md-5">
                      <input type="text" name="user_admin" placeholder="" class="form-control input-sm">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-4 col-md-offset-1">Password:</label>
                    <div class="col-md-5">
                      <input type="password" name="pass_admin" placeholder="" class="form-control input-sm">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-2 col-md-offset-8">
                      <input type="submit" name="submit_admin" class="btn btn-success" value="Submit">
                    </div>
                  </div>

              </form>
              

            </div>
            <div class="modal-footer">
              
            </div>
          </div>
          
        </div>
      </div>
      
      <!-- End Of Trigger the modal with an Admin button -->
    </div> <!-- End of col-md-6 -->

    
    <div class="col-md-3" align="center">
        <div class="thumbnail">
          <img class="img-responsive" src="img/karyawan.jpg">
            <br>
      <!-- Trigger the modal with a Karyawan button -->
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">Karyawan</button>
        </div>
      <!-- Modal Karyawan -->
      <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal Karyawan content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="modal-title">Login Karyawan</h3>
            </div>
            <div class="modal-body">

                <form name="login_karyawan" action="karyawan/otentikasi_karyawan.php" method="post" class="form-horizontal">
              
                  <div class="form-group">
                    <label class="col-md-4 col-md-offset-1">Username:</label>
                    <div class="col-md-5">
                      <input type="text" name="user_karyawan" placeholder="" class="form-control input-sm">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-4 col-md-offset-1">Password:</label>
                    <div class="col-md-5">
                      <input type="password" name="pass_karyawan" placeholder="" class="form-control input-sm">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-2 col-md-offset-8">
                      <input type="submit" name="submit_karyawan" class="btn btn-success" value="Submit">
                    </div>
                  </div>

              </form>
              
            </div>
            <div class="modal-footer">
              
            </div>
          </div>
          
        </div>
      </div>
      
      <!-- End Of Trigger the modal with a Karyawan button -->
    </div> <!-- End of Admin and Karyawan Button-->
    
  </div><!-- End of Row -->
</div><!-- End of Container -->


  <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

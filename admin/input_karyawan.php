<?php 
include('header_admin.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Karyawan</title>
</head>
<body>


<div class="container-fluid" style="height:1000px">
  <div class="col-md-4">

  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#tambahMember"><span class="glyphicon glyphicon-plus"></span> Tambah Karyawan</button>
  <div id="tambahMember" class="collapse">
    <h3>Menambah Karyawan Ke Database</h3>


      <form name="tambahkaryawan" method="post">

        <table class="table input-sm">
          <tr>
            <td>Nama:
            <input type="text" name="nama_karyawan" class="form-control" size="50" maxlength="50"></td>
          </tr>
          <tr>
            <td>Username:
            <input type="text" name="user_karyawan" class="form-control" size="50" maxlength="50"></td>
          </tr>
          <tr>
            <td>Password:
            <input type="text" name="password_karyawan" class="form-control" size="20" maxlength="20"></td>
          </tr>
          <tr>
            <td>Alamat:
            <input type="text" name="alamat_karyawan" class="form-control" size="255" maxlength="255"></td>
          </tr>
          <tr>
            <td>No. HP:
            <input type="text" name="nohp_karyawan" class="form-control" size="20" maxlength="20"></td>
          </tr>
          <tr>
            <td colspan="2">
              <input class="btn btn-primary" name="insert_karyawan" type="submit" value="Simpan">
            </td>
          </tr>
        </table>

      </form>
  </div>



      <?php 

      // Sintaks untuk INSERT NEW MEMBER

      error_reporting(0);
      //untuk konek ke database udah di includekan di file header_admin
        $nama_karyawan = $_POST['nama_karyawan'];
        $user_karyawan = $_POST['user_karyawan'];
        $password_karyawan = $_POST['password_karyawan'];
        $alamat_karyawan = $_POST['alamat_karyawan'];
        $nohp_karyawan = $_POST['nohp_karyawan'];
        $submit = $_POST["insert_karyawan"];

        if ($submit) {
          if (!empty($nama_karyawan)) {
            if (!empty($user_karyawan)) {
              if (!empty($password_karyawan)) {
                if (!empty($alamat_karyawan)) {
                  if (!empty($nohp_karyawan)) {
                    $sql = mysqli_query($connect, "INSERT INTO login_karyawan(nama, user_karyawan, pass_karyawan, alamat, no_hp) values('".$nama_karyawan."', '".$user_karyawan."','".$password_karyawan."','".$alamat_karyawan."','".$nohp_karyawan."') ");

                    echo "<div class='alert alert-success fade in'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Identitas Karyawan sukses disimpan ke dalam database.</strong>
                          </div>";
                  }
                  else { 
                    echo "<div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Nomor Handphone tidak boleh kosong!</strong>
                            </div>"; }
                }
                else { echo "<div class='alert alert-warning fade in'>
                              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Alamat Karyawan tidak boleh kosong!</strong>
                              </div>"; }
              }
              else { echo "<div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Password Karyawan tidak boleh kosong!<strong>
                            </div>"; }
            }
            else { echo "<div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Username Karyawan tidak boleh kosong!</strong>
                          </div>"; }
          }
          else { echo "<div class='alert alert-warning fade in'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>Nama Karyawan tidak boleh kosong!</strong>
                          </div>"; }
        }
      ?>
  </div> <!-- End of FORM TAMBAH MEMBER -->


<!-- READ MEMBER DARI DATABASE -->

  <div class="col-md-8">

    <?php 
    if ($_GET['success'] == 1) {
      echo "<div class='alert alert-success fade in'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Data Karyawan Telah Diperbaharui!</strong>
                  </div>";
    }
    if ($_GET['success'] == 2) {
      echo "<div class='alert alert-success fade in'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <strong>Data Karyawan Telah Dihapus!</strong>
                  </div>";
    }     
   ?>

    <h3>Daftar Karyawan Kilos Laundry</h3>
    <table class="table table-hover input-sm">
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Password</th>
        <th>Alamat</th>
        <th>No. HP</th>
        <th colspan="2"><center>Aksi</center></th>
      </tr>

      <?php 
      //untuk konek ke database udah di includekan di file header_admin
      $tampil = mysqli_query($connect, "SELECT * FROM login_karyawan");

      // buat ngapus member
      require_once('delete_confirm.php');

        $no=1;
        while ($row=mysqli_fetch_array($tampil)) {
          echo "<tr>
                  <td> $no </td>
                  <td> $row[nama] </td>
                  <td> $row[user_karyawan] </td>
                  <td> $row[pass_karyawan] </td>
                  <td> $row[alamat] </td>
                  <td> $row[no_hp] </td>
                  <td> 
                       <form class='form-inline'>
                       <a href='edit_karyawan.php?id_karyawan=$row[id_karyawan]'>
                          <button class='btn btn-xs btn-info' type='button'>
                              <i class='glyphicon glyphicon-pencil'></i> Edit
                          </button>
                       </a>
                       </form>
                  </td>
                  <td>
                       <form class='form-inline' method='POST' action='delete_karyawan.php?id_karyawan=$row[id_karyawan]' accept-charset='UTF-8' style='display:inline'>
                          <button class='btn btn-xs btn-danger' type='button' data-toggle='modal' data-target='#confirmDelete' data-title='Delete User' data-message='Are you sure you want to delete this user ?'>
                              <i class='glyphicon glyphicon-trash'></i> Delete
                          </button>
                       </form>
                  </td>
                </tr>";
        $no++;
        }

       ?>
    </table>
  </div> <!-- End of READ MEMBER DARI DATABASE -->



</div> <!--End of Container Fluid Class -->




</body>
</html>



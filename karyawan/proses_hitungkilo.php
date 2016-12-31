<?php

include 'cek-login-karyawan.php';

	error_reporting(0);

	if (!$_POST) {
		die('Tidak ada data yang disimpan');
	}
	
	//koneksi ke database
			include('../config.php');
			
	//deklarasi variabel
			
			$no_rak = $_POST['no_rak'];
			$nama_karyawan = $_SESSION['user_karyawan'];
			$nama_pelanggan = $_POST['nama_pelanggan'];
			$tanggal_masuk = $_POST['tanggal_masuk'];
			$tanggal_keluar = $_POST['tanggal_keluar'];
			$opsi_pencucian = $_POST['option'];
			// $keadaan_cucian = $_POST['keadaan'];
			$alamat = $_POST['alamat'];
			$no = $_POST['no'];
			$jenis_cucian = $_POST['jenis_cucian'];
			$qty = $_POST['qty'];
			$berat = $_POST['berat'];
			$harga_perkilo = $_POST['harga_perkilo'];
			$total_harga = $_POST['total_harga'];
			$submit = $_POST['submit'];

	//simpan ke tabel cucikilo
		if (empty($no_rak) || empty($nama_karyawan) || empty($nama_pelanggan) || empty($alamat) || empty($tanggal_masuk) || empty($tanggal_keluar) || empty($opsi_pencucian) || empty($no) || empty($jenis_cucian) || empty($qty) || empty($berat) || empty($harga_perkilo) || empty($total_harga)) {
				echo "<script>alert('Periksa Kembali Isian Anda');
					location.href = \"hitungkilo.php\";</script>";
			}
		else{
			$sql = "insert into cucikilo (no_rak, nama_karyawan, nama_pelanggan, alamat, tanggal_masuk, tanggal_keluar, opsi_pencucian, berat, harga_perkilo, total_harga, ket) values ('{$no_rak}', '{$nama_karyawan}', '{$nama_pelanggan}', '{$alamat}', '{$tanggal_masuk}', '{$tanggal_keluar}', '{$opsi_pencucian}', '{$berat}', '{$harga_perkilo}', '{$total_harga}', 'Belum Diambil')";
			mysqli_query($connect, $sql) or die('Gagal menyimpan cucikilo');


	//mencari id cucikilo
			$sql2 = "select max(id) as id_cucikilo from cucikilo limit 1";
			$row = mysqli_fetch_array(mysqli_query($connect, $sql2));
			$id_cucikilo = $row['id_cucikilo'];

	//menyimpan data ke tabel detailcucikilo
			foreach ($_POST['jenis_cucian'] as $key => $jenis) {
				$sql3 = "insert into detailcucikilo(id_cucikilo,no,jenis_cucian,qty)
				values ('{$id_cucikilo}','{$no[$key]}','{$jenis}','{$qty[$key]}')";
				mysqli_query($connect, $sql3);
			}
			echo "<script>alert('Data Telah Disimpan');
			location.href = 'tampil_hitungkilo.php';</script> ";
		}

?>



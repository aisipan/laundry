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
			$alamat = $_POST['alamat'];
			$jenis_cucian = $_POST['jenis_cucian'];
			$harga_satuan = $_POST['harga_satuan'];
			$qty = $_POST['qty'];
			$total_harga = $_POST['total_harga'];
			$submit = $_POST['submit'];

	//simpan ke tabel cucikilo
		if (empty($no_rak) || empty($nama_karyawan) || empty($nama_pelanggan) || empty($alamat) || empty($tanggal_masuk) || empty($tanggal_keluar) || empty($jenis_cucian) || empty($harga_satuan) || empty($qty) || empty($total_harga)) {
				echo "<script>alert('Periksa Kembali Isian Anda');
					location.href = \"hitungsatuan.php\";</script>";
			}
		else{
			$sql = "insert into cucisatuan (no_rak, nama_karyawan, nama_pelanggan, alamat, tanggal_masuk, tanggal_keluar, jenis_cucian, harga_satuan, qty, total_harga, ket) values ('{$no_rak}', '{$nama_karyawan}', '{$nama_pelanggan}', '{$alamat}', '{$tanggal_masuk}', '{$tanggal_keluar}', '{$jenis_cucian}', '{$harga_satuan}', '{$qty}', '{$total_harga}', 'Belum Diambil')";
			mysqli_query($connect, $sql) or die('Gagal menyimpan cucikilo');

			echo "<script>alert('Data Telah Disimpan');
			location.href = 'tampil_hitungsatuan.php';</script> ";
		}

?>



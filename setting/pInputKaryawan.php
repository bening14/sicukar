<?php
session_start();
include 'set.php';
//ambil data dari form
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$masuk_kerja = $_POST['masuk_kerja'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$email = $_POST['email'];
$jabatan = $_POST['jabatan'];
$pangkat = $_POST['pangkat'];
$departement = $_POST['departement'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$sisa_cuti = $_POST['sisa_cuti'];

//tulis ke tabel karyawan
$insertKaryawan = $mysqli->query("INSERT INTO tbl_karyawan (nik,nama,masuk_kerja,jenis_kelamin,email,pangkat,jabatan,departement,alamat,telp,sisa_cuti) VALUES ('$nik','$nama','$masuk_kerja','$jenis_kelamin','$email','$pangkat','$jabatan','$departement','$alamat','$telp','$sisa_cuti')");

if ($insertKaryawan) {
	//direct ke halaman data karyawan tampilkan pesan sukses
	header('location:../pages/dataKaryawan.php?sukses');
} else {
	//direct ke halaman data karyawan tampilkan pesan error
	header('location:../pages/dataKaryawan.php?error');
}

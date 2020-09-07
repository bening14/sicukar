<?php
session_start();
include 'set.php';
//ambil data dari form
$id=$_POST['id'];
$nik=$_POST['nik'];
$nama=$_POST['nama'];
$masuk_kerja=$_POST['masuk_kerja'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$email=$_POST['email'];
$jabatan=$_POST['jabatan'];
$departement=$_POST['departement'];
$alamat=$_POST['alamat'];
$telp=$_POST['telp'];
$sisa_cuti=$_POST['sisa_cuti'];



//tulis ke tabel karyawan
$updateKaryawan = $mysqli->query("UPDATE tbl_karyawan SET nik='$nik', 
nama='$nama', 
masuk_kerja='$masuk_kerja',
jenis_kelamin='$jenis_kelamin',
email='$email',
jabatan='$jabatan',
departement='$departement',
alamat='$alamat',
telp='$telp',
sisa_cuti='$sisa_cuti' WHERE id='$id'");

if($updateKaryawan){
	//direct ke halaman data karyawan tampilkan pesan sukses
	header('location:../pages/dataKaryawan.php?suksesE'); 
}else{
	//direct ke halaman data karyawan tampilkan pesan error
	header('location:../pages/dataKaryawan.php?errorE');
}
?>
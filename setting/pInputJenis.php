<?php
session_start();
include 'set.php';
//ambil data dari form
$jenis=$_POST['jenis'];

//tulis ke tabel karyawan
$insertJenis = $mysqli->query("INSERT INTO tbl_jenis_cuti (jenis) VALUES ('$jenis')");

if($insertJenis){
	//direct ke halaman data karyawan tampilkan pesan sukses
	header('location:../pages/dataJenisCuti.php?sukses'); 
}else{
	//direct ke halaman data karyawan tampilkan pesan error
	header('location:../pages/dataJenisCuti.php?error');
}
?>
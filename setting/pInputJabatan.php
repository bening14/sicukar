<?php
session_start();
include 'set.php';
//ambil data dari form
$jabatan=$_POST['jabatan'];

//tulis ke tabel karyawan
$insertJabatan = $mysqli->query("INSERT INTO tbl_jabatan (jabatan) VALUES ('$jabatan')");

if($insertJabatan){
	//direct ke halaman data karyawan tampilkan pesan sukses
	header('location:../pages/dataJabatan.php?sukses'); 
}else{
	//direct ke halaman data karyawan tampilkan pesan error
	header('location:../pages/dataJabatan.php?error');
}
?>
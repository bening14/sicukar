<?php
session_start();
include 'set.php';
//ambil data dari form
$id=$_GET['id'];
$status=$_GET['status'];

//tulis ke tabel karyawan
$updateCuti = $mysqli->query("UPDATE tbl_cuti SET status='$status' WHERE id='$id'");

if($updateCuti){
	//direct ke halaman data karyawan tampilkan pesan sukses
	header('location:../pages/dataCuti.php?sukses'); 
}else{
	//direct ke halaman data karyawan tampilkan pesan error
	header('location:../pages/dataCuti.php?error');
}
?>
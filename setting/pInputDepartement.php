<?php
session_start();
include 'set.php';
//ambil data dari form
$departement=$_POST['departement'];

//tulis ke tabel karyawan
$insertDepartement = $mysqli->query("INSERT INTO tbl_departement (dept) VALUES ('$departement')");

if($insertDepartement){
	//direct ke halaman data karyawan tampilkan pesan sukses
	header('location:../pages/dataDepartement.php?sukses'); 
}else{
	//direct ke halaman data karyawan tampilkan pesan error
	header('location:../pages/dataDepartement.php?error');
}
?>
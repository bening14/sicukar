<?php
session_start();
include 'set.php';
//ambil data dari form
$username=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$nama=$_POST['nama'];
$level=$_POST['level'];
$nik=$_POST['nik'];

//cek dulu apakah password 1 dan 2 sama ?
if($password == $password2){
	//tulis ke tabel karyawan
	$insertUser = $mysqli->query("INSERT INTO mst_user (user,psw,nik,nama,level) VALUES ('$username','$password','$nik','$nama','$level')");

	if($insertUser){
		//direct ke halaman data karyawan tampilkan pesan sukses
		header('location:../pages/dataUser.php?sukses'); 
	}else{
		//direct ke halaman data karyawan tampilkan pesan error
		header('location:../pages/dataUser.php?error');
	}
		

}else if($password <> $password2){
	//jika password tidak sama
	header('location:../pages/inputUser.php?wrongPsw');
}
?>
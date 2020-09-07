<?php
session_start();
include 'set.php';

//cek ke tabel mst_user apakah user diijinkan untuk masuk
$getPriv = $mysqli->query("SELECT * FROM mst_user WHERE user='".$_POST['user']."' AND psw='".$_POST['psw']."'");
if($getPriv->num_rows>0){
    foreach ($getPriv as $key) {
	//buat session user agar tidak bolak balik login
	$_SESSION['user'] = $key['user'];
    //cek dulu login sebagai admin atau karyawan ?
    if($key['level']=='admin'){
		//direct ke halaman admin
    	header("location:../pages/admin.php");
    }else if($key['level']=='karyawan'){
		//direct ke halaman karyawan
    	header("location:../pages/karyawan.php");
	}
	}
}else if($getPriv->num_rows==0){
    header("location:../pages/login.php?error");
}
?>
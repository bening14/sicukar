<?php
include 'set.php';

//ambil data get
$id=$_GET['id'];
$hapusUser = $mysqli->query("DELETE FROM mst_user WHERE id='$id'");
if($hapusUser){
    //direct ke halaman data Karyawan dengan pesan sukses
    header('location:../pages/dataUser.php?suksesD'); 
}else{
    //direct ke halaman data Karyawan dengan pesan error
    header('location:../pages/dataUser.php?errorD'); 
}
<?php
include 'set.php';

//ambil data get
$id=$_GET['id'];
$hapusKaryawan = $mysqli->query("DELETE FROM tbl_karyawan WHERE id='$id'");
if($hapusKaryawan){
    //direct ke halaman data Karyawan dengan pesan sukses
    header('location:../pages/dataKaryawan.php?suksesD'); 
}else{
    //direct ke halaman data Karyawan dengan pesan error
    header('location:../pages/dataKaryawan.php?errorD'); 
}
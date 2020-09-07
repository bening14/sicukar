<?php
include 'set.php';

//ambil data get
$id=$_GET['id'];
$hapusJenis = $mysqli->query("DELETE FROM tbl_jenis_cuti WHERE id='$id'");
if($hapusJenis){
    //direct ke halaman data Karyawan dengan pesan sukses
    header('location:../pages/dataJenisCuti.php?suksesD'); 
}else{
    //direct ke halaman data Karyawan dengan pesan error
    header('location:../pages/dataJenisCuti.php?errorD'); 
}
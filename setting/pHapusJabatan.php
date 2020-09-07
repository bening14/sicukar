<?php
include 'set.php';

//ambil data get
$id=$_GET['id'];
$hapusJabatan = $mysqli->query("DELETE FROM tbl_jabatan WHERE id='$id'");
if($hapusJabatan){
    //direct ke halaman data Karyawan dengan pesan sukses
    header('location:../pages/dataJabatan.php?suksesD'); 
}else{
    //direct ke halaman data Karyawan dengan pesan error
    header('location:../pages/dataJabatan.php?errorD'); 
}
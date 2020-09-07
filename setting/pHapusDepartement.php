<?php
include 'set.php';

//ambil data get
$id=$_GET['id'];
$hapusDepartement = $mysqli->query("DELETE FROM tbl_departement WHERE id='$id'");
if($hapusDepartement){
    //direct ke halaman data Karyawan dengan pesan sukses
    header('location:../pages/dataDepartement.php?suksesD'); 
}else{
    //direct ke halaman data Karyawan dengan pesan error
    header('location:../pages/dataDepartement.php?errorD'); 
}
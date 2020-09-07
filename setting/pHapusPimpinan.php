<?php
include 'set.php';

//ambil data get
$id = $_GET['id'];
$hapusPimpinan = $mysqli->query("DELETE FROM tbl_sign WHERE id='$id'");
if ($hapusPimpinan) {
    //direct ke halaman data Karyawan dengan pesan sukses
    header('location:../pages/dataPimpinan.php?suksesD');
} else {
    //direct ke halaman data Karyawan dengan pesan error
    header('location:../pages/dataPimpinan.php?errorD');
}

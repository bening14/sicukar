<?php
session_start();
include 'set.php';
//ambil data dari form
$nama = $_POST['nama'];
$nrp = $_POST['nrp'];
$jabatan = $_POST['jabatan'];


//tulis ke tabel karyawan
$insertPimpinan = $mysqli->query("INSERT INTO tbl_sign (nama,nrp,jabatan) VALUES ('$nama','$nrp','$jabatan')");

if ($insertPimpinan) {
    //direct ke halaman data karyawan tampilkan pesan sukses
    header('location:../pages/dataPimpinan.php?sukses');
} else {
    //direct ke halaman data karyawan tampilkan pesan error
    header('location:../pages/dataPimpinan.php?error');
}

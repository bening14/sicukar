<?php
session_start();
include 'set.php';
//ambil data dari form
$surat_cuti = $_POST['surat_cuti'];
$surat_jalan = $_POST['surat_jalan'];



//tulis ke tabel karyawan
$updateNomor = $mysqli->query("UPDATE tbl_nomor_surat SET surat_cuti='$surat_cuti',surat_jalan='$surat_jalan'");

if ($updateNomor) {
    //direct ke halaman data karyawan tampilkan pesan sukses
    header('location:../pages/editNomorSurat.php?suksesE');
} else {
    //direct ke halaman data karyawan tampilkan pesan error
    header('location:../pages/editNomorSurat.php?errorE');
}

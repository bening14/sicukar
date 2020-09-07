<?php
session_start();
include 'set.php';
//ambil data dari form
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jenis_cuti = $_POST['jenis_cuti']; //tahunan atau khusus
$mulai_cuti = $_POST['tgl_cuti'];
$tujuan = $_POST['tujuan'];
$sign = $_POST['sign'];
//buat logic
if ($jenis_cuti == 'tahunan') {
	$cuti_khusus = 'Cuti Tahunan';
	$tgl_akhir = $_POST['tgl_akhir'];
	$tgl1 = new DateTime($mulai_cuti);
	$tgl2 = new DateTime($tgl_akhir);
	$periode = $tgl2->diff($tgl1)->days;
	$cutiReq = $periode + 1;
	$akhir_cuti = date('Y-m-d', strtotime('+' . $periode . ' days', strtotime($mulai_cuti)));
	//kurangi sisa cuti sebanyak periode
	$getSisaCuti = $mysqli->query("SELECT sisa_cuti FROM tbl_karyawan WHERE nik ='$nik' AND nama='$nama'");
	foreach ($getSisaCuti as $key) {
		$sisa = $key['sisa_cuti'];
	}
	//cek dulu apakah ada sisa cuti yang memadai
	if ($sisa < $cutiReq) {
		header("location:../pages/dataCuti.php?cutiHabis");
		die;
	}
	//kurangi dan update sisa cuti
	$sc = $sisa - $periode - 1;
	$getUpdateSisaCuti = $mysqli->query("UPDATE tbl_karyawan SET sisa_cuti='$sc' WHERE nik='$nik' AND nama='$nama'");
} else if ($jenis_cuti == 'khusus') {
	$akhir_cuti = 'otomatis';
	$a = explode('-', $_POST['cuti_khusus']);
	$cuti_khusus = $a[0];
	$periode = $a[1] - 1;
	$akhir_cuti = date('Y-m-d', strtotime('+' . $periode . ' days', strtotime($mulai_cuti)));
}

$keperluan = $_POST['keperluan'];
$time = $periode + 1;

//ambil nomor
$getNomor = $mysqli->query("SELECT * FROM tbl_nomor_surat");
foreach ($getNomor as $key) {
	$cuti = $key['surat_cuti'];
	$jalan = $key['surat_jalan'];
}
//cacah detil nomor
$c = explode('/', $cuti); //surat cuti
$d = explode('/', $jalan); //surat jalan

$nocut = $c[1] + 1001; //nomor cuti
$nojal = $d[1] + 1001; //nomor jalan

date_default_timezone_set('Asia/Jakarta');
$dino = date("Y-m-d");
$e = explode('-', $dino); //ambil bulan dan tahun

//susun nomor
$nomorCuti = 'SC/' . substr($nocut, 1) . '/' . romawi($dino) . '/KEP' . '/' . $e[0];
$nomorJalan = 'SIJ/' . substr($nojal, 1) . '/' . romawi($dino) . '/KEP' . '/' . $e[0];


//tulis ke tabel karyawan
$insertCuti = $mysqli->query("INSERT INTO tbl_cuti(nik,nama,tgl_cuti,jenis_cuti,jumlah_cuti,tujuan,keperluan,tgl_akhir,surat_cuti,surat_jalan,izin) VALUES ('$nik','$nama','$mulai_cuti','$cuti_khusus','$time','$tujuan','$keperluan','$akhir_cuti','$nomorCuti','$nomorJalan','$sign')");

//update nomor surat
$updateSurat = $mysqli->query("UPDATE tbl_nomor_surat SET surat_cuti='$nomorCuti',surat_jalan='$nomorJalan'");

if ($insertCuti && $updateSurat) {
	//direct ke halaman data karyawan tampilkan pesan sukses
	header('location:../pages/dataCuti.php?sukses');
} else {
	//direct ke halaman data karyawan tampilkan pesan error
	header('location:../pages/dataCuti.php?error');
}

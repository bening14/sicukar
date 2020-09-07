<?php
//setting database
$host = "localhost";
$user = "u1039137_wk";
$pass = "M@lang345";
$db_name = "u1039137_sicukar";
// $user = "root";
// $pass = "";
// $db_name = "db_sicukar";

$mysqli = new mysqli($host, $user, $pass, $db_name);
if ($mysqli->connect_error) {
  echo "Gagal Koneksi ke Database:(" . $mysqli->connect_error . ")";
}
//end setting Database


//buat function konversi bulan tahun
function bulanTahun($x)
{

  $pisah = explode('-', $x);

  //buat penamaan bulan
  if ($pisah[1] == 1) {
    $bln = "Januari";
  } else if ($pisah[1] == 2) {
    $bln = "Februari";
  } else if ($pisah[1] == 3) {
    $bln = "Maret";
  } else if ($pisah[1] == 4) {
    $bln = "April";
  } else if ($pisah[1] == 5) {
    $bln = "Mei";
  } else if ($pisah[1] == 6) {
    $bln = "Juni";
  } else if ($pisah[1] == 7) {
    $bln = "Juli";
  } else if ($pisah[1] == 8) {
    $bln = "Agustus";
  } else if ($pisah[1] == 9) {
    $bln = "September";
  } else if ($pisah[1] == 10) {
    $bln = "October";
  } else if ($pisah[1] == 11) {
    $bln = "November";
  } else if ($pisah[1] == 12) {
    $bln = "Desember";
  }

  $tglIndo = $bln . "-" . $pisah[0];
  return $tglIndo;
}

//buat function konversi Tanggal Indonesia
function tglIndo($x)
{

  $pisah = explode('-', $x);

  //buat penamaan bulan
  if ($pisah[1] == 1) {
    $bln = "Jan";
  } else if ($pisah[1] == 2) {
    $bln = "Feb";
  } else if ($pisah[1] == 3) {
    $bln = "Mar";
  } else if ($pisah[1] == 4) {
    $bln = "Apr";
  } else if ($pisah[1] == 5) {
    $bln = "Mei";
  } else if ($pisah[1] == 6) {
    $bln = "Jun";
  } else if ($pisah[1] == 7) {
    $bln = "Jul";
  } else if ($pisah[1] == 8) {
    $bln = "Agust";
  } else if ($pisah[1] == 9) {
    $bln = "Sep";
  } else if ($pisah[1] == 10) {
    $bln = "Oct";
  } else if ($pisah[1] == 11) {
    $bln = "Nov";
  } else if ($pisah[1] == 12) {
    $bln = "Des";
  }

  $tglIndon = $pisah[2] . "-" . $bln . "-" . $pisah[0];
  return $tglIndon;
}

//buat function konversi Tanggal Indonesia
function tglIndoFull($x)
{

  $pisah = explode('-', $x);

  //buat penamaan bulan
  if ($pisah[1] == 1) {
    $bln = "Januari";
  } else if ($pisah[1] == 2) {
    $bln = "Februari";
  } else if ($pisah[1] == 3) {
    $bln = "Maret";
  } else if ($pisah[1] == 4) {
    $bln = "April";
  } else if ($pisah[1] == 5) {
    $bln = "Mei";
  } else if ($pisah[1] == 6) {
    $bln = "Juni";
  } else if ($pisah[1] == 7) {
    $bln = "Juli";
  } else if ($pisah[1] == 8) {
    $bln = "Agustus";
  } else if ($pisah[1] == 9) {
    $bln = "September";
  } else if ($pisah[1] == 10) {
    $bln = "October";
  } else if ($pisah[1] == 11) {
    $bln = "November";
  } else if ($pisah[1] == 12) {
    $bln = "Desember";
  }

  $tglIndon = $pisah[2] . "-" . $bln . "-" . $pisah[0];
  return $tglIndon;
}

//buat function konversi bulan ke romawi
function romawi($x)
{

  $pisah = explode('-', $x);

  //buat penamaan bulan
  if ($pisah[1] == '01') {
    $bln = "I";
  } else if ($pisah[1] == '02') {
    $bln = "II";
  } else if ($pisah[1] == '03') {
    $bln = "III";
  } else if ($pisah[1] == '04') {
    $bln = "IV";
  } else if ($pisah[1] == '05') {
    $bln = "V";
  } else if ($pisah[1] == '06') {
    $bln = "VI";
  } else if ($pisah[1] == '07') {
    $bln = "VII";
  } else if ($pisah[1] == '08') {
    $bln = "VIII";
  } else if ($pisah[1] == '09') {
    $bln = "IX";
  } else if ($pisah[1] == '10') {
    $bln = "X";
  } else if ($pisah[1] == '11') {
    $bln = "XI";
  } else if ($pisah[1] == '12') {
    $bln = "XII";
  }

  $tglIndon = $bln;
  return $tglIndon;
}

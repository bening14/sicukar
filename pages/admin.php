<?php
session_start();
include '../setting/set.php';

//logic reset
//inisialisasi tanggal hari ini
date_default_timezone_set('Asia/Jakarta');
$dino = date("Y-m-d");
$a = explode('-', $dino);
$tahun_now = $a[0];
//logika reset data
$getTime = $mysqli->query("SELECT * FROM tbl_tahun");
foreach ($getTime as $key) {
  $current = $key['tahun'];
}
$b = explode('-', $current);
$tahun_tbl = $b[0];
//compare hari ini dengan tahun database
if ($dino >= $current && $tahun_now > $tahun_tbl) {
  //update tbl_tahun
  $getUpdate = $mysqli->query("UPDATE tbl_tahun SET tahun='" . $tahun_now . "-01-01.'");
  $getUpdateSisaCuti = $mysqli->query("UPDATE tbl_karyawan SET sisa_cuti='12'");
}
//end reset logic

if (isset($_SESSION['user'])) {
  //Panggil header
  include '../template/header.php';
  //inisialisasi data kalau-kalau tidak ada sama sekali di database
  // $total = 0;
  //ambil data informasi cuti
  $getData = $mysqli->query("SELECT count(*) as total FROM tbl_cuti where jenis_cuti='Cuti Ibadah Haji' AND tgl_akhir > '$dino'");
  if ($getData->num_rows > 0) {
    foreach ($getData as $row) {
      $a1 = $row['total'];
    }
  }
  //ambil data informasi cuti
  $getData = $mysqli->query("SELECT count(*) as total FROM tbl_cuti where jenis_cuti='Cuti Ibadah Haji Khusus' AND tgl_akhir > '$dino'");
  if ($getData->num_rows > 0) {
    foreach ($getData as $row) {
      $a2 = $row['total'];
    }
  }
  //ambil data informasi cuti
  $getData = $mysqli->query("SELECT count(*) as total FROM tbl_cuti where jenis_cuti='Cuti Ibadah Keagamaan Lainnya' AND tgl_akhir > '$dino'");
  if ($getData->num_rows > 0) {
    foreach ($getData as $row) {
      $a3 = $row['total'];
    }
  }
  //ambil data informasi cuti
  $getData = $mysqli->query("SELECT count(*) as total FROM tbl_cuti where jenis_cuti='Cuti Melahirkan' AND tgl_akhir > '$dino'");
  if ($getData->num_rows > 0) {
    foreach ($getData as $row) {
      $a4 = $row['total'];
    }
  }
  //ambil data informasi cuti
  $getData = $mysqli->query("SELECT count(*) as total FROM tbl_cuti where jenis_cuti='Cuti Sakit' AND tgl_akhir > '$dino'");
  if ($getData->num_rows > 0) {
    foreach ($getData as $row) {
      $a5 = $row['total'];
    }
  }
  //ambil data informasi cuti
  $getData = $mysqli->query("SELECT count(*) as total FROM tbl_cuti where jenis_cuti='Cuti Umroh' AND tgl_akhir > '$dino'");
  if ($getData->num_rows > 0) {
    foreach ($getData as $row) {
      $a6 = $row['total'];
    }
  }
  //ambil data informasi cuti
  $getData = $mysqli->query("SELECT count(*) as total FROM tbl_cuti where jenis_cuti='Cuti Tahunan' AND tgl_akhir > '$dino'");
  if ($getData->num_rows > 0) {
    foreach ($getData as $row) {
      $a7 = $row['total'];
    }
  }



?>
  <!-- ----------------------------------- Start Body ------------------------------------ -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 style="font-size: 24px;">Total Cuti</h3>
              <table>
                <tr>
                  <td style="width: 300px;">Cuti Ibadah Haji</td>
                  <td style="width: 20px;">:</td>
                  <td><?= $a1 ?></td>
                </tr>
                <tr>
                  <td>Cuti Ibadah Haji Khusus</td>
                  <td>:</td>
                  <td><?= $a2 ?></td>
                </tr>
                <tr>
                  <td>Cuti Ibadah Keagamaan Lainnya</td>
                  <td>:</td>
                  <td><?= $a3 ?></td>
                </tr>
                <tr>
                  <td>Cuti Melahirkan</td>
                  <td>:</td>
                  <td><?= $a4 ?></td>
                </tr>
                <tr>
                  <td>Cuti Sakit</td>
                  <td>:</td>
                  <td><?= $a5 ?></td>
                </tr>
                <tr>
                  <td>Cuti Umroh</td>
                  <td>:</td>
                  <td><?= $a6 ?></td>
                </tr>
                <tr>
                  <td>Cuti Tahunan</td>
                  <td>:</td>
                  <td><?= $a7 ?></td>
                </tr>
                <tr>
                  <td colspan="3" style="border-bottom: solid 1px white;padding-top:10px;"></td>
                </tr>
                <tr>
                  <td><strong>Total</strong></td>
                  <td>:</td>
                  <td><strong><?= $a7 + $a6 + $a5 + $a4 + $a3 + $a2 + $a1 ?></strong></td>
                </tr>
              </table>
            </div>
            <div class="icon" style="margin-right: 20px;">
              <i class="fa fa-calendar"></i>
              <h4 style="margin-top:-10px;color:white;font-size:14px;font-weight:bold;"><?= bulanTahun($dino) ?></h4>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!---------------------------------------- End Body ---------------------------------------->
<?php
  include '../template/footer.php';
  //jika belum login jangan ijinkan masuk
} else {
  header('location:../index.php');
}

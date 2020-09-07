<?php
session_start();
include '../setting/set.php';

if (isset($_SESSION['user'])) {
  //Panggil header
    include '../template/headerKaryawan.php';
    //inisialisasi data kalau-kalau tidak ada sama sekali di database
    $user=$_SESSION['user'];
    $total=0;
    $approved=0;
    $reject=0;
    //ambil data informasi cuti
    $getData = $mysqli->query("SELECT count(*) as total FROM tbl_cuti WHERE user='$user'");
    if($getData->num_rows>0){
      foreach ($getData as $row) {
        $total = $row['total'];
      }
    }
    //ambil data informasi cuti yang Approved
    $getData = $mysqli->query("SELECT count(*) as approved FROM tbl_cuti WHERE status='Approved' AND user='$user'");
    if($getData->num_rows>0){
      foreach ($getData as $row) {
        $approved = $row['approved'];
      }
    }
    //ambil data informasi cuti yang Reject
    $getData = $mysqli->query("SELECT count(*) as reject FROM tbl_cuti WHERE status='Reject' AND user='$user'");
    if($getData->num_rows>0){
      foreach ($getData as $row) {
        $reject = $row['reject'];
      }
    }
    //ambil data informasi cuti yang Reject
    $getData = $mysqli->query("SELECT count(*) as process FROM tbl_cuti WHERE status='Process' AND user='$user'");
    if($getData->num_rows>0){
      foreach ($getData as $row) {
        $process = $row['process'];
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
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $total ?></h3>
              <p>Total Cuti</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>

        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $approved ?></h3>
              <p>Disetujui</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $reject ?></h3>
              <p>Tidak disetujui</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?= $process ?></h3>
              <p>Proses Pengajuan</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          
        </div>
      </div>
    </section>
  </div>
<!---------------------------------------- End Body ---------------------------------------->
<?php
include '../template/footer.php';
  //jika belum login jangan ijinkan masuk
 }else{
  header('location:../index.php'); 
 }
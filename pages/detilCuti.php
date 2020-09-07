<?php
session_start();
include '../setting/set.php';

if (isset($_SESSION['user'])) {
  //Panggil header
    include '../template/header.php';
    $getCuti = $mysqli->query("SELECT * FROM tbl_cuti WHERE id='".$_GET['id']."'");
    foreach ($getCuti as $key) {
      $nik = $key['nik'];
      $nama = $key['nama'];
      $tgl_cuti = $key['tgl_cuti'];
      $tgl_masuk = $key['tgl_masuk'];
      $jenis_cuti = $key['jenis_cuti'];
      $jumlah_cuti = $key['jumlah_cuti'];
      $keperluan = $key['keperluan'];
      $status = $key['status'];
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
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detil Cuti Karyawan</h3>
              <a href="dataCuti.php" type="button" class="btn btn-sm bg-green pull-right">Back</a>
              <?php
              //buat kondisi, tombol jangan di tampilkan jika sudah approve atau reject
              if($status=='Process'){
                ?>
              <a href="../setting/pApprovalCuti.php?status=Reject&id=<?= $_GET['id'] ?>" type="button" class="btn btn-sm bg-maroon pull-right" style="margin-left: 20px;margin-right:20px;"><i class="fa fa-times-circle"> Reject</i></a>
              <a href="../setting/pApprovalCuti.php?status=Approved&id=<?= $_GET['id'] ?>" type="button" class="btn btn-sm bg-blue pull-right"><i class="fa fa-check"> Approved</i></a>
              <?php
              }
              ?>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
              <div class="input-group">                  
                <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span>
                <input type="text" readonly name="nik" class="form-control" placeholder="NIK" value="<?= $nik ?>">
              </div>
              <br>
              <div class="input-group">                  
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" readonly name="nama" class="form-control" placeholder="Nama" value="<?= $nama ?>">
              </div>
              <br>
              <label>Tanggal Cuti</label>
              <div class="input-group">                  
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" readonly name="tgl_cuti" class="form-control" placeholder="Tanggal Cuti" value="<?= $tgl_cuti ?>">
              </div>
              <br>
              <label>Tanggal Masuk</label>
              <div class="input-group">                  
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" readonly name="tgl_masuk" class="form-control" placeholder="Tanggal Masuk" value="<?= $tgl_masuk ?>">
              </div>
              <br>
              <div class="input-group">                  
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" readonly name="jenis_cuti" class="form-control" placeholder="jenis cuti" value="<?= $jenis_cuti ?>">
              </div>
              <br>
              <div class="input-group">                  
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" readonly name="jumlah_cuti" class="form-control" placeholder="Jumlah Cuti" value="<?= $jumlah_cuti ?>">
              </div>
              <br>
              <div class="input-group">                  
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" readonly name="keperluan" class="form-control" placeholder="Jumlah Cuti" value="<?= $keperluan ?>">
              </div>
              <br>
              </div>
            </form>
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
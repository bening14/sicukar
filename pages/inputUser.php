<?php
session_start();
include '../setting/set.php';

if (isset($_SESSION['user'])) {
  //Panggil header
    include '../template/header.php';
    $getUser = $mysqli->query("SELECT * FROM mst_user");
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
              <h3 class="box-title">Input User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../setting/pInputUser.php" method="POST">
              <div class="box-body">
                <?php 
            // NOTIFIKASI INPUT DATA SUKSES ATAU GAGAL
             if(isset($_GET["wrongPsw"])) { ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Password tidak sama, ulangi pengisian
              </div>
              <?php 
              }
              ?>
              <div class="input-group">                  
                <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span>
                <input type="text" name="nik" class="form-control" placeholder="NIK" required>
              </div>
              <br>
              <div class="input-group">                  
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="email" name="username" class="form-control" placeholder="Username" required>
              </div>
              <br>
              <div class="input-group">                  
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
              </div>
              <br>
              <div class="input-group">                  
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="password" name="password2" class="form-control" placeholder="Password Lagi" required>
              </div>
              <br>
              <div class="input-group">                  
                <span class="input-group-addon"><i class="fa fa-sort-alpha-asc"></i></span>
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
              </div>
              <br>
              <div class="input-group">                  
                <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                <select class="form-control" name="level">
                  <option value="laki-laki">--- Pilih Level ---</option>
                    <option value="admin">Admin</option>
                    <option value="karyawan">Karyawan</option>
                </select>
              </div>
              <br>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
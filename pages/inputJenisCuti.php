<?php
session_start();
include '../setting/set.php';

if (isset($_SESSION['user'])) {
  //Panggil header
    include '../template/header.php';
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
              <h3 class="box-title">Input Jenis Cuti</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../setting/pInputJenis.php" method="POST">
              <div class="box-body">
              <div class="input-group">                  
                <span class="input-group-addon"><i class="fa fa-list"></i></span>
                <input type="text" name="jenis" class="form-control" placeholder="Jenis Cuti" required>
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
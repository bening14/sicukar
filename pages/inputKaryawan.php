<?php
session_start();
include '../setting/set.php';

if (isset($_SESSION['user'])) {
  //Panggil header
  include '../template/header.php';
  $getDept = $mysqli->query("SELECT * FROM tbl_departement");
  $getJabatan = $mysqli->query("SELECT * FROM tbl_jabatan");
  $getJenis = $mysqli->query("SELECT * FROM tbl_jenis");
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
              <h3 class="box-title">Input Data Karyawan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../setting/pInputKaryawan.php" method="POST">
              <div class="box-body">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span>
                  <input type="text" name="nik" class="form-control" placeholder="NIK" required>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                </div>
                <br>
                <label>Masuk Kerja</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="date" name="masuk_kerja" class="form-control" placeholder="Masuk Kerja">
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                  <select class="form-control" name="jenis_kelamin">
                    <option value="laki-laki">--- PIlih Jenis Kelamin ---</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="wanita">Wanita</option>
                  </select>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-black-tie"></i></span>
                  <select class="form-control" name="jabatan">
                    <option value="Manager">--- Pilih Jabatan ---</option>
                    <?php
                    foreach ($getJabatan as $key) {
                      echo '<option value="' . $key['jabatan'] . '">' . $key['jabatan'] . '</option>';
                    }
                    ?>
                  </select>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>
                  <input type="text" name="pangkat" class="form-control" placeholder="Pangkat" required>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-university"></i></span>
                  <select class="form-control" name="departement">
                    <option value="Marketing">--- Pilih Department ---</option>
                    <?php
                    foreach ($getDept as $key) {
                      echo '<option value="' . $key['dept'] . '">' . $key['dept'] . '</option>';
                    }
                    ?>
                  </select>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-home"></i></span>
                  <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-tablet"></i></span>
                  <input type="text" name="telp" class="form-control" placeholder="Telp/Hp" required>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-plus"></i></span>
                  <input type="number" name="sisa_cuti" class="form-control" placeholder="Sisa Cuti" required>
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
} else {
  header('location:../index.php');
}

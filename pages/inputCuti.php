<?php
session_start();
include '../setting/set.php';

if (isset($_SESSION['user'])) {
  //Panggil header
  include '../template/header.php';
  $getJenis = $mysqli->query("SELECT * FROM tbl_jenis_cuti where jenis <> 'Cuti Tahunan' order by id asc");
  $getData = $mysqli->query("SELECT * from mst_user");
  $getSign = $mysqli->query("SELECT nama from tbl_sign");
  foreach ($getData as $key) {
    $nik = $key['nik'];
    $nama = $key['nama'];
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
              <h3 class="box-title">Input Cuti</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="../setting/pInputCuti.php" method="POST">
              <div class="box-body">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span>
                  <input type="text" name="keyword" id="keyword" class="form-control" placeholder="NRP/NIP">
                </div>
                <br>
                <div class="input-group" id="namas">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-list"></i></span>
                  <select class="form-control" name="jenis_cuti" id="jenis_cuti">
                    <option value="-">--- Pilih Jenis Cuti ---</option>
                    <option value="tahunan">Cuti Tahunan</option>
                    <option value="khusus">Cuti Khusus</option>
                  </select>
                </div>
                <br>
                <div class="input-group" id="cuti_khusus">
                  <span class="input-group-addon"><i class="fa fa-list"></i></span>
                  <select class="form-control" name="cuti_khusus">
                    <!-- <option value="-">--- Cuti Khusus ---</option> -->
                    <?php
                    foreach ($getJenis as $key) {
                      echo '<option value="' . $key['jenis'] . '-' . $key['waktu'] . '">' . $key['jenis'] . '&nbsp;&nbsp(' . $key['waktu'] . ' Hari)' . '</option>';
                    }
                    ?>
                  </select>
                </div>
                <br>
                <div id="mulai">
                  <label>Mulai Cuti</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="date" name="tgl_cuti" class="form-control" placeholder="Tanggal Cuti">
                  </div>
                </div>
                <br>
                <div id="akhir">
                  <label>Akhir Cuti</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="date" name="tgl_akhir" class="form-control" placeholder="Tanggal Masuk">
                  </div>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-subway"></i></span>
                  <input type="text" name="tujuan" class="form-control" placeholder="Tujuan" required>
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-subway"></i></span>
                  <input type="text" name="keperluan" class="form-control" placeholder="Keperluan" required>
                </div>
                <br>
                <label>Sign Cuti</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-edit"></i></span>
                  <select class="form-control" name="sign">
                    <!-- <option value="-">--- Cuti Khusus ---</option> -->
                    <?php
                    foreach ($getSign as $key) {
                      echo '<option value="' . $key['nama'] . '">' . $key['nama'] .  '</option>';
                    }
                    ?>
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

  <script src="script.js"></script>
  <script>
    $(document).ready(function() {
      // alert("Document loaded successful!");
      $("#namas").hide();
      $("#cuti_khusus").hide();
      $("#mulai").hide();
      $("#akhir").hide();
    });

    $('#jenis_cuti').change(function() {
      var teks = $("#jenis_cuti").val();
      if (teks == 'khusus') {
        $("#cuti_khusus").show();
        $("#mulai").show();
        $("#mulai").show();
        $("#akhir").hide();
      } else if (teks == 'tahunan') {
        $("#cuti_khusus").hide();
        $("#mulai").hide();
        $("#mulai").show();
        $("#akhir").show();
      }
    });
  </script>

  <!---------------------------------------- End Body ---------------------------------------->
<?php
  include '../template/footer.php';
  //jika belum login jangan ijinkan masuk
} else {
  header('location:../index.php');
}

<?php
session_start();
include '../setting/set.php';

if (isset($_SESSION['user'])) {
  //Panggil header
  include '../template/header.php';
  //ambil data dari tabel karyawan
  $getDataJenis = $mysqli->query("SELECT * FROM tbl_jenis_cuti order by id asc");
?>
  <!-- ----------------------------------- Start Body ------------------------------------ -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Jenis Cuti
        <small>SICUKAR</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pages</a></li>
        <li class="active">Data Jenis Cuti</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title">Data Table With Full Features</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
              // NOTIFIKASI INPUT DATA SUKSES ATAU GAGAL
              if (isset($_GET["error"])) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Gagal input data Jenis Cuti!
                </div>
              <?php
              } else if (isset($_GET["sukses"])) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Sukses input data Jenis Cuti!
                </div>
              <?php
              }
              ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 5%;">No</th>
                    <th>Jenis Cuti</th>
                    <th style="width: 10%;">Waktu</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $r = 1;
                  foreach ($getDataJenis as $row) {
                    echo '<tr>';
                    echo '<td>' . $r . '</td>';
                    echo '<td>' . $row['jenis'] . '</td>';
                    echo '<td>' . $row['waktu'] . ' Hari</td>';
                    echo '</tr>';
                    $r++;
                  }
                  ?>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- -------------------------------------- End Body -------------------------------------- -->

  <script>
    $(document).ready(function() {
      var tableDetailInv = $('#example1').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false,
        dom: 'Bfrtip',
        buttons: [{
          extend: 'excel',
          className: "btn btn-sm bg-green",
          titleAttr: 'Export in Excel',
          text: 'Excel',
          init: function(api, node, config) {
            $(node).removeClass('btn-default')
          }
        }, {
          extend: 'copy',
          className: "btn btn-sm bg-maroon",
          titleAttr: 'Export in Excel',
          text: 'Copy',
          init: function(api, node, config) {
            $(node).removeClass('btn-default')
          }
        }, {
          extend: 'csv',
          className: "btn btn-sm bg-blue",
          titleAttr: 'Export in Excel',
          text: 'Csv',
          init: function(api, node, config) {
            $(node).removeClass('btn-default')
          }
        }]
      })

      $('#searchTable').on('keyup', function() {
        tableDetailInv.search(this.value).draw();
      });
    })
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
  <!---------------------------------------- End Body ---------------------------------------->
<?php
  include '../template/footer.php';
  //jika belum login jangan ijinkan masuk
} else {
  header('location:../index.php');
}

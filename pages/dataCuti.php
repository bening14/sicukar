<?php
session_start();
include '../setting/set.php';

if (isset($_SESSION['user'])) {
  //Panggil header
  include '../template/header.php';
  //ambil data dari tabel karyawan
  $getCuti = $mysqli->query("SELECT * FROM tbl_cuti order by id asc");
?>
  <!-- ----------------------------------- Start Body ------------------------------------ -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Cuti
        <small>SICUKAR</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pages</a></li>
        <li class="active">Data Cuti</li>
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
              //MEnampilkan JIka ada Pesan setelah input data
              if (isset($_GET["error"])) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Gagal melakukan update status cuti!
                </div>
              <?php
              } else if (isset($_GET["sukses"])) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Sukses melakukan update status cuti!
                </div>
              <?php
              } else if (isset($_GET["cutiHabis"])) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Maaf Sisa Cuti Kurang/Habis! , tidak bisa mengambil cuti
                </div>
              <?php
              }
              ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nik</th>
                    <th>Nama</th>
                    <th>Tanggal Cuti</th>
                    <th>Tanggal Masuk</th>
                    <th>Jenis Cuti</th>
                    <th>Tujuan</th>
                    <th>Keperluan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $r = 1;
                  foreach ($getCuti as $row) {
                    $tgl_masuk = date('Y-m-d', strtotime('+1 days', strtotime($row['tgl_akhir'])));
                    echo '<tr>';
                    echo '<td>' . $r . '</td>';
                    echo '<td>' . $row['nik'] . '</td>';
                    echo '<td>' . $row['nama'] . '</td>';
                    echo '<td>' . tglIndo($row['tgl_cuti']) . '</td>';
                    echo '<td>' . tglIndo($tgl_masuk) . '</td>';
                    echo '<td>' . $row['jenis_cuti'] . '</td>';
                    echo '<td>' . $row['tujuan'] . '</td>';
                    echo '<td>' . $row['keperluan'] . '</td>';

                    echo '<td><a href="suratCutiPdf.php?nik=' . $row["nik"] . '" type="button" class="btn btn-xs bg-maroon" data-toggle="tooltip" title="Surat Cuti"> <i class="fa fa-calendar-times-o "></i></a>&nbsp;&nbsp;<a href="suratCutiPdfArsip.php?nik=' . $row["nik"] . '" type="button" class="btn btn-xs bg-green" data-toggle="tooltip" title="Surat Cuti Arsip"> <i class="fa fa-calendar-times-o "></i></a>&nbsp;&nbsp;
                  <a href="suratJalanPdf.php?nik=' . $row["nik"] . '" type="button" class="btn btn-xs bg-orange" data-toggle="tooltip" title="Surat Jalan"> <i class="fa fa-car"></i></a>&nbsp;&nbsp;<a href="suratJalanPdfArsip.php?nik=' . $row["nik"] . '" type="button" class="btn btn-xs bg-blue" data-toggle="tooltip" title="Surat Jalan Arsip"> <i class="fa fa-car"></i></a></td>';
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

<?php
session_start();
include '../setting/set.php';

if (isset($_SESSION['user'])) {
  //Panggil header
  include '../template/header.php';
  //ambil data dari tabel karyawan
  $getKaryawan = $mysqli->query("SELECT * FROM tbl_karyawan order by nik asc");
?>
  <!-- ----------------------------------- Start Body ------------------------------------ -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Karyawan
        <small>SICUKAR</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pages</a></li>
        <li class="active">Data Karyawan</li>
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
                  Gagal input data karyawan!
                </div>
              <?php
              } else if (isset($_GET["sukses"])) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Sukses input data karyawan!
                </div>
              <?php
              } else if (isset($_GET["suksesE"])) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Sukses ubah data karyawan!
                </div>
              <?php
              } else if (isset($_GET["errorE"])) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Sukses ubah data karyawan!
                </div>
              <?php
              } else if (isset($_GET["suksesD"])) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Sukses hapus data karyawan!
                </div>
              <?php
              } else if (isset($_GET["errorD"])) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  Sukses hapus data karyawan!
                </div>
              <?php
              }
              ?>
              <table id="example1" class="table table-bordered table-striped table-responsive" style="width:100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Masuk Kerja</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Departement</th>
                    <th>Alamat</th>
                    <th>Telp/Hp</th>
                    <th>Sisa Cuti</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $r = 1;
                  foreach ($getKaryawan as $row) {
                    echo '<tr>';
                    echo '<td>' . $r . '</td>';
                    echo '<td>' . $row['nik'] . '</td>';
                    echo '<td>' . $row['nama'] . '</td>';
                    echo '<td>' . $row['masuk_kerja'] . '</td>';
                    echo '<td>' . $row['jenis_kelamin'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['jabatan'] . '</td>';
                    echo '<td>' . $row['departement'] . '</td>';
                    echo '<td>' . $row['alamat'] . '</td>';
                    echo '<td>' . $row['telp'] . '</td>';
                    echo '<td>' . $row['sisa_cuti'] . '</td>';
                    echo '<td><a href="editKaryawan.php?id=' . $row['id'] . '" type="button" class="btn btn-xs bg-green" data-toggle="tooltip" title="Edit"> <i class="fa fa-edit"></i></a>&nbsp;&nbsp;<a href="../setting/pHapusKaryawan.php?id=' . $row['id'] . '" type="button" class="btn btn-xs bg-maroon" data-toggle="tooltip" title="Hapus"> <i class="fa fa-trash"></i></a></td>';
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
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true,
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

<?php
session_start();
include '../setting/set.php';

if (isset($_SESSION['user'])) {
  //Panggil header
    include '../template/headerKaryawan.php';
    //ambil data dari tabel karyawan
    $getCuti = $mysqli->query("SELECT * FROM tbl_cuti WHERE user='".$_SESSION['user']."'order by id asc");

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
              if(isset($_GET["error"])) { ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Gagal input Cuti!
              </div>
              <?php 
              }else if(isset($_GET["sukses"])) { ?>
                  <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Sukses input Cuti!
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
                  <th>Status</th>
                </tr>
                </thead>
                <tbody> 
                <?php
                $r=1;
                foreach ($getCuti as $row) {
                echo '<tr>';
                  echo '<td>'.$r.'</td>';
                  echo '<td>'.$row['nik'].'</td>';
                  echo '<td>'.$row['nama'].'</td>';
                  echo '<td>'.$row['tgl_cuti'].'</td>';
                  echo '<td>'.$row['tgl_masuk'].'</td>';
                  echo '<td>'.$row['jenis_cuti'].'</td>';
                  //buat pembeda status
                  if($row['status']=='Approved'){
                  echo '<td><span class="btn btn-sm bg-green">'.$row['status'].'</span></td>';
                  }else if($row['status']=='Reject'){
                    echo '<td><span class="btn btn-sm bg-red">'.$row['status'].'</span></td>';
                  }else if($row['status']=='Process'){
                    echo '<td><span class="btn btn-sm bg-orange">'.$row['status'].'</span></td>';
                  }
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
  $(document).ready(function () {
    var tableDetailInv = $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false,
      dom         : 'Bfrtip',
      buttons     : [{
          extend: 'excel',
          className: "btn btn-sm bg-green",
          titleAttr: 'Export in Excel',
          text: 'Excel',
          init: function(api, node, config) {
             $(node).removeClass('btn-default')
          }
      },{
        extend: 'copy',
          className: "btn btn-sm bg-maroon",
          titleAttr: 'Export in Excel',
          text: 'Copy',
          init: function(api, node, config) {
             $(node).removeClass('btn-default')
          }
      },{
        extend: 'csv',
          className: "btn btn-sm bg-blue",
          titleAttr: 'Export in Excel',
          text: 'Csv',
          init: function(api, node, config) {
             $(node).removeClass('btn-default')
          }
      }
      ]
    })
    
    $('#searchTable').on( 'keyup', function () {
      tableDetailInv.search( this.value ).draw();
    });
  })
  $(function(){
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>
<!---------------------------------------- End Body ---------------------------------------->
<?php
include '../template/footer.php';
  //jika belum login jangan ijinkan masuk
 }else{
  header('location:../index.php'); 
 }
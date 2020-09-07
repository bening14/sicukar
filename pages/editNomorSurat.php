<?php
session_start();
include '../setting/set.php';

if (isset($_SESSION['user'])) {
    //Panggil header
    include '../template/header.php';
    $getSurat = $mysqli->query("SELECT * FROM tbl_nomor_surat");
    foreach ($getSurat as $key) {
        $surat_cuti = $key['surat_cuti'];
        $surat_jalan = $key['surat_jalan'];
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
                            <h3 class="box-title">Edit Nomor Surat Terakhir</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <?php
                            // NOTIFIKASI INPUT DATA SUKSES ATAU GAGAL
                            if (isset($_GET["suksesE"])) { ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    Berhasil Update Nomor Surat
                                </div>
                            <?php
                            } else if (isset($_GET["errorE"])) { ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    Gagal Update Nomor Surat
                                </div>
                            <?php
                            }
                            ?>
                            <form role="form" action="../setting/pEditNomorSurat.php" method="POST">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-sort-numeric-desc"></i></span>
                                    <input type="text" name="surat_cuti" class="form-control" value="<?= $surat_cuti ?>">
                                </div>
                                <br>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" name="surat_jalan" class="form-control" value="<?= $surat_jalan ?>">
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

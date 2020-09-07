<?php
session_start();
include '../setting/set.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Report | Surat Cuti</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="shortcut icon" href="../dist/img/user.png" />
    <!-- Date Picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<script type="text/javascript" src="../dist/dataTables/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../dist/dataTables/buttons.flash.min.js"></script>
<script type="text/javascript" src="../dist/dataTables/jszip.min.js"></script>
<!-- <script type="text/javascript" src="../dist/dataTables/pdfmake.min.js"></script> -->
<script type="text/javascript" src="../dist/dataTables/vfs_fonts.js"></script>
<script type="text/javascript" src="../dist/dataTables/buttons.html5.min.js"></script>
<script type="text/javascript" src="../dist/dataTables/buttons.print.min.js"></script>
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<style type="text/css">
    label {
        font-size: 10px;
        color: black;
        margin: 0px;
    }

    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 7mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    @page {
        size: A4;
        margin: 0;
    }

    @media print {

        html,
        body {
            width: 210mm;
            height: 100vh;
            overflow: initial;
        }

        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: avoid;
            page-break-inside: avoid;
            page-break-before: avoid;
        }
    }

    p {
        font-size: 10px;
        margin-bottom: 2px;
    }

    small {
        font-size: 10px;

    }

    th,
    td {
        font-size: 10px;
        padding-top: 2px !important;
        padding-bottom: 2px !important;
        padding-right: 5px !important;
        padding-left: 5px;
        border-right: 1pt solid black !important;
        border-left: 1pt solid black !important;

    }

    .b-bottom {
        border-bottom: 1pt solid black;
    }

    .b-top {
        border-top: 1pt solid black;
    }

    .confidential {
        font-weight: bold;
        color: red !important;
        border-style: solid;
        border-color: red;
        border-width: 4px;
        margin-left: 40px;
        margin-top: 0px;
        margin-bottom: 0px;
        padding-top: 8px;
        padding-bottom: 8px;
    }

    .purchase-order {
        margin-top: 0px;
        margin-bottom: 0px;
        margin-left: -100px;
        font-weight: bold;
        ;
        font-style: italic;
    }
</style>

<body>

    <section class="page">
        <!-- title row -->
        <div class="row">
            <div class="col-sm-6 text-center" style="border-bottom: 1px solid black;line-height:1.5em;padding-bottom:10px;">KEPOLISIAN NEGARA REPUBLIK INDONESIA<br>
                DAERAH BANTEN<br>
                RESOR LEBAK</div>
        </div>

        <div class="row">
            <div class="col-md-12"><img src="../dist/img/Polri.png" alt="Polri" class="img-responsive" width="15%" height="15%" style="margin:20px auto;"></div>
            <div class="col-md-12 text-center">SURAT CUTI</div>
            <div class="col-md-12 text-center">
                <h4 style="border-top:solid 1px black;text-align:center;width:230px;margin-top:0px;margin:0 auto;">Nomor : SC/001/ IX /KEP/2020</h4>
            </div>
        </div>

        <div class="row" style="margin-top: 40px;">
            <div class="row" style="line-height: 2em;">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    Nama
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    : John Andrean
                </div>
            </div>
            <div class="row" style="line-height: 2em;">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    Pangkat/Gol/NRP/NIP
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    : Brigadir/ 85132466
                </div>
            </div>
            <div class="row" style="line-height: 2em;">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    Jabatan
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    : Ba Sat Reskrim
                </div>
            </div>
            <div class="row" style="line-height: 2em;">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    Kesatuan
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    : Polres Lebak
                </div>
            </div>
            <div class="row" style="line-height: 2em;">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    Diberi izin oleh
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    : Kapolres Lebak
                </div>
            </div>
            <div class="row" style="line-height: 2em;">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    Jenis cuti
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    : Izin
                </div>
            </div>
            <div class="row" style="line-height: 2em;">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    Lama cuti
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    : 3 Hari
                </div>
            </div>
            <div class="row" style="line-height: 2em;">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    Mulai tanggal
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    : 1 September 2020
                </div>
            </div>
            <div class="row" style="line-height: 2em;">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    Sampai dengan tanggal
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    : 3 September 2020
                </div>
            </div>
            <div class="row" style="line-height: 2em;">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    Pergi dari
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    : Rangkasbitung – Kab Lebak
                </div>
            </div>
            <div class="row" style="line-height: 2em;">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    Tujuan ke
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    : Bandung
                </div>
            </div>
            <div class="row" style="line-height: 2em;">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    Transportasi
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    : Pribadi/ Umum
                </div>
            </div>
            <div class="row" style="line-height: 2em;">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    Pengikut
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    : -
                </div>
            </div>
            <div class="row" style="line-height: 2em;">
                <div class="col-sm-4 col-md-4 col-lg-4">
                    Catatan
                </div>
                <div class="col-sm-8 col-md-8 col-lg-8">
                    : 1. Tidak diperkenankan membawa senjata api<br>
                    &nbsp;&nbsp;2. Sanggup mematuhi protokol kesehatan covid-19
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 40px;">
            <div class="col-sm-2 col-md-2 col-lg-2" style="padding-left: 0px;padding-right: 0px;">
                PARAF<br>
                KONSEPTOR<br>
                KABAG SUMDA<br>
                KASIUM<br>
            </div>
            <div class="col-sm-1 col-md-1 col-lg">
                :<br>
                :<br>
                :<br>
                :<br>
            </div>
            <div class="col-sm-9 col-md-9 col-lg-9" style="padding-left: 240px;">
                Dikeluarkan di Rangkasbitung<br>
                Pada Tanggal : 1-September-2020<br>
                A.N KEPALA KEPOLISIAN RESOR LEBAK<br>

            </div>
            <div class="col-sm-9 col-md-9 col-lg-9" style="padding-left: 340px;">
                WAKA
            </div>
        </div>

        <div class="row" style="margin-top: 100px;">
            <div class="col-sm-4 col-md-4 col-lg-4" style="padding-left: 0px;padding-right: 0px;">
                Tembusan :<br>
                1. Kabag Sumda Polres Lebak<br>
                2. Kasi Propam Polres Lebak<br>
                3. Kasi Keuangan Polres Lebak
            </div>
            <div class="col-sm-8 col-md-8 col-lg-8" style="padding-left: 200px;">
                ARI SATMOKO, S.H. S.IK.MM.<br>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-8" style="padding-left: 180px;">
                <h4 style="border-top:solid 1px black;text-align:center;width:250px;margin-top:0px;">KOMISARIS POLISI NRP 80051324</h4>
            </div>
        </div>
    </section>

    <!-- <script type=" text/javascript"> $(document).ready(function() { window.print(); }) </script> -->
</body>

</html>
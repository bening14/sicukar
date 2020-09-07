<?php
// ob_start();
session_start();
include '../setting/set.php';
require_once("../dompdf/autoload.inc.php");

date_default_timezone_set('Asia/Jakarta');
$dino = date("Y-m-d");
$waktu = date('Y-m-d H:i:s');

//ambil data karyawan
$nik = $_GET['nik'];

$getData = $mysqli->query("select a.surat_cuti, a.nama ,a.jenis_cuti, a.jumlah_cuti, a.tgl_cuti, a.tgl_akhir, a.tujuan, a.izin,b.pangkat, b.jabatan from tbl_cuti a join tbl_karyawan b on a.nik=b.nik WHERE a.nik='$nik'");
foreach ($getData as $key) {
    $nomor = $key['surat_cuti'];
    $nama = $key['nama'];
    $jenis = $key['jenis_cuti'];
    $jumlah = $key['jumlah_cuti'];
    $tgl1 = $key['tgl_cuti'];
    $tgl2 = $key['tgl_akhir'];
    $tujuan = $key['tujuan'];
    echo $sign = $key['izin'];
    $pangkat = $key['pangkat'];
    $jabatan = $key['jabatan'];
}
$getSign = $mysqli->query("SELECT * FROM tbl_sign WHERE nama='$sign'");
foreach ($getSign as $row) {
    echo $signJabatan = $row['jabatan'];
    $signNrp = $row['nrp'];
}
//buat kondisi jika surat dikeluarkan oleh kapolres
if ($signJabatan == 'KAPOLRES') {
    $a = '';
    $b = '';
} else {
    $a = 'A.N';
    $b = 'WAKA';
}

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$html = '





<!DOCTYPE html>
<html>

<head>
    <title>Report | Surat Cuti</title>
</head>

<style type="text/css">
    .header {
        width: 45%;
    }

    .header h1 {
        font-weight: normal;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
        border-bottom: 1px solid black;
    }

    .kop {
        text-align: center;
        margin-top: 40px;
    }

    .kop h2 {
        font-weight: normal;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        margin-top: 0px;
        font-weight: bold;
    }

    .kop h2 small {
        font-weight: normal;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
        border-top: 1px solid black;
        font-weight: bold;
    }

    .badan {
        margin-top: 60px;
    }

    .bawah {
        margin-top: 60px;
        width: 100%;
        height: 100px;
    }

    .kiri {
        height: 100px;
        width: 50%;
        float: left;
    }

    .kanan {
        height: 100px;
        width: 50%;
        float: right;
    }

    .akhir {
        margin-top: 100px;
        width: 100%;
        height: 100px;
    }
</style>

<body>
    <div class="header">
        <h1>KEPOLISIAN NEGARA REPUBLIK INDONESIA<br>
            DAERAH BANTEN<br>
            RESOR LEBAK</h1>
    </div>
    <div class="kop">
        <img src="../dist/img/Polri.png" alt="Polri" width="15%" height="15%">
        <h2>SURAT CUTI<br>
            <small>Nomor : ' . $nomor . '</small></h2>
    </div>
    <div class="badan">
        <table border="0">
            <tr>
                <td style="width:200px;">Nama</td>
                <td>:</td>
                <td>' . $nama . '</td>
            </tr>
            <tr>
                <td>Pangkat/Gol/NRP/NIP</td>
                <td>:</td>
                <td>' . $pangkat . '/ ' . $nik . '</td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td>' . $jabatan . '</td>
            </tr>
            <tr>
                <td>Kesatuan</td>
                <td>:</td>
                <td>Polres Lebak</td>
            </tr>
            <tr>
                <td>Diberi izin oleh</td>
                <td>:</td>
                <td>Kapolres Lebak</td>
            </tr>
            <tr>
                <td>Jenis cuti</td>
                <td>:</td>
                <td>' . $jenis . '</td>
            </tr>
            <tr>
                <td>Lama cuti</td>
                <td>:</td>
                <td>' . $jumlah . ' Hari</td>
            </tr>
            <tr>
                <td>Mulai tanggal</td>
                <td>:</td>
                <td>' . tglIndoFull($tgl1) . '</td>
            </tr>
            <tr>
                <td>Sampai dengan tanggal</td>
                <td>:</td>
                <td>' . tglIndoFull($tgl2) . '</td>
            </tr>
            <tr>
                <td>Pergi dari</td>
                <td>:</td>
                <td>Rangkasbitung – Kab Lebak</td>
            </tr>
            <tr>
                <td>Tujuan ke</td>
                <td>:</td>
                <td>' . $tujuan . '</td>
            </tr>
            <tr>
                <td>Transportasi</td>
                <td>:</td>
                <td>Pribadi/ Umum</td>
            </tr>
            <tr>
                <td>Pengikut</td>
                <td>:</td>
                <td>-</td>
            </tr>
            <tr>
                <td>Catatan</td>
                <td>:</td>
                <td>1. Tidak diperkenankan membawa senjata api<br>
                    2. Sanggup mematuhi protokol kesehatan covid-19</td>
            </tr>
        </table>
    </div>
    <div class="bawah">
        <div class="kiri">
            
        </div>
        <div class="kanan">
            <table border="0">
                <tr>
                    <td>Dikeluarkan di</td>
                    <td>:</td>
                    <td>Rangkasbitung</td>
                </tr>
                <tr>
                    <td>Pada tanggal</td>
                    <td>:</td>
                    <td>' . tglIndoFull($dino) . '</td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:center;"><br>' . $a . ' KEPALA KEPOLISIAN RESOR LEBAK</td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:center;">' . $b . '</td>
                </tr>
                <tr>
                    <td colspan="3" style="height:70px;"></td>
                </tr>
                <tr>
                    <td colspan="3"style="text-align:center;">' . $sign . '</td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:center;"><small style="border-top:1px solid black;font-size:16px;">' . $signNrp . '</small></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="akhir">
        <div class="kiri">
            <table border="0">
                <tr>
                    <td style="width:140px;">Tembusan :</td>
                </tr>
                <tr>
                    <td>1. Kabag Sumda Polres Lebak</td>
                </tr>
                <tr>
                    <td>2. Kasi Propam Polres Lebak</td>
                </tr>
                <tr>
                    <td>3. Kasi Keuangan Polres Lebak</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>';

$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Surat_Cuti_Arsip_' . $nama . '_' . $waktu . '.pdf');

<?php

include '../../setting/set.php';
$keyword = $_GET['keyword'];
//ambil data
$getData = $mysqli->query("SELECT * FROM tbl_karyawan where nik like '%$keyword%'");
if ($getData->num_rows > 0) {
    foreach ($getData as $key) {
        $nama = $key['nama'];
        $nik = $key['nik'];
        $pangkat = $key['pangkat'];
        $jabatan = $key['jabatan'];
        $alamat = $key['alamat'];
        $telp = $key['telp'];
    }
    echo '<div class="input-group" id="namas" style="width: 530px;">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="text" readonly name="nama" id="nama" class="form-control" value="' . $nama . '">
    </div><br>
    <div class="input-group" id="namas" style="width: 530px;">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="text" readonly name="nik" id="nik" class="form-control" value="' . $nik . '">
    </div><br>
    <div class="input-group" id="namas" style="width: 530px;">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="text" readonly name="pangkat" id="pangkat" class="form-control" value="' . $pangkat . '">
    </div><br>
    <div class="input-group" id="namas" style="width: 530px;">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="text" readonly name="jabatan" id="jabatan" class="form-control" value="' . $jabatan . '">
    </div><br>
    <div class="input-group" id="namas" style="width: 530px;">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="text" readonly name="alamat" id="alamat" class="form-control" value="' . $alamat . '">
    </div><br>
    <div class="input-group" id="namas" style="width: 530px;">
    <span class="input-group-addon"><i class="fa fa-user"></i></span>
    <input type="text" readonly name="telp" id="telp" class="form-control" value="' . $telp . '">
    </div>';
} else {
    echo '<div class="input-group" id="namas" style="width: 530px;">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input type="text" readonly name="nama" id="nama" class="form-control" value="DATA TIDAK DITEMUKAN">
    </div>';
}

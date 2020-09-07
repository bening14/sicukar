
<?php
session_start();
include 'setting/set.php';
//cek apakah user sudah melakukan login sebelumnya 

if (empty($_SESSION['user'])) {
    //belum Login, maka harus login dulu
	header("location:pages/login.php");
} else if (!empty($_SESSION['user'])) {
    //ambil status
    $getUser = $mysqli->query("SELECT * FROM mst_user WHERE user='".$_SESSION['user']."'");
    if($getUser->num_rows>0){
        foreach ($getUser as $key) {
            //buat kondisi apakah yang login adalah admin atau karyawan
            if($key['level']=='admin'){
                //direct ke halaman admin
                header("location:pages/admin.php");
            }else if($key['level']=='karyawan'){
                //direct ke halaman karyawan
                header("location:pages/karyawan.php");
            }
        }
    }
}
?>


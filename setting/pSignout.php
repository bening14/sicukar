<?php
session_start();
include 'set.php';

//bersihan session dan kemudian direct ke halaman index
unset($_SESSION['user']);
header("location:../index.php");

?>
<?php
include '../koneksi.php';
$user = new koneksi();
$user->deleteUser($_GET['id']);
header("location:admin.php");
?>

<?php
include '../koneksi.php';
$user = new koneksi();

$action = $_GET['action'];
if($action == 'insert')
{
    $nik = $_POST['nik'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $jenis_kelamin = $_POST['jk'];
    $password = md5($_POST['password']);
    $status = $_POST['status'];
    $jabatan = $_POST['jabatan'];
    $email = $_POST['email'];
 
    $user->insertUser($nik,$nama_karyawan,$jenis_kelamin,$password,$status,$jabatan,$email);
    header("location:mainUtama.php");
}

?>

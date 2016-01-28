<?php
include '../koneksi.php';
$insert = new koneksi();

$action = $_GET['action'];

    $nik = $_POST['nik'];
    $tgl_pengajuan = $_POST['tgl_pengajuan'];
    $nm_barang = $_POST['namaBarang'];
    $jumlah = $_POST['jumlah'];
    $ket = $_POST['ket'];
    $kd_pengadaan = $_POST['kd_pengadaan'];
    $status = $_POST['status'];
if($action == 'insert')
{
    $status = 'on process';
    $urut =  mysql_query("SELECT * FROM tb_pengadaan");
    $no_urut = mysql_num_rows($urut);
    if ($no_urut<=999){
        $no_urut++;
        $digit = rand(000,999);
        $kd1 = substr($nik,0,3);
        $kd2 = substr($tgl_pengajuan,2,2);
        
        $kd_pengadaanInsert= $kd1.$kd2.$digit;
    }
    else{
        reset($no_urut);
    }
    $insert->reqBarang($nik, $kd_pengadaanInsert, $nm_barang, $jumlah, $tgl_pengajuan, $status, $ket);
    header("location:mainUtama.php");
}

if($action == 'update'){
    $insert->updateStatusPengadaan($status, $kd_pengadaan);
    header("location:mainUtama.php");
}
?>

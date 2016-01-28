<?php
include '../koneksi.php';
$insert = new koneksi();

$action = $_GET['action'];

$nik = $_POST['nik'];
    $tgl_pinjam = $_POST['tgl_peminjaman'];
    $kd_barang = $_POST['kd_barang'];
    $ket = $_POST['ket'];
  
if($action == 'insert')
{
    $urut =  mysql_query("SELECT * FROM tb_peminjaman");
    $no_urut = mysql_num_rows($urut);
    if ($no_urut<=999){
        $digit = rand(000,999);
        $kd1 = substr($kd_barang,0,3);
        $kd2 = substr($tgl_pinjam,2,2);
        
        $kd_pinjamInsert= $kd1.$kd2.$digit;
    }
    else{
        reset($no_urut);
    }
    $status = 'on process';
    $insert->prosesPeminjaman($nik, $kd_pinjamInsert, $kd_barang, $tgl_pinjam, $status, $ket);
   header("location:mainUtama.php");
}

if($action == 'update'){
    $kd_pinjam = $_POST['kd_pinjam'];
    $stat = $_POST['status'];
    $_SESSION['status'] = $stat;
    if ($stat == 'dipinjam') {
                $insert->updateStatusPeminjaman($_SESSION['status'], $kd_pinjam);
                header("location:mainUtama.php");
    }
    elseif ($stat == 'dikembalikan') {
                $tgl_pengembalian=$_POST['tgl_pengembalian'];
                $kd_pinjam1 = $kd_pinjam;
                $insert->updateDikembalikan($stat, $tgl_pengembalian, $kd_pinjam);
                $insert->deletePeminjaman($kd_pinjam1);
                header("location:mainUtama.php");
                }
    elseif ($stat == 'cancel') {
                $insert->deletePeminjaman($kd_pinjam);
                header("location:mainUtama.php");
                }
            else {
                    header("location:mainUtama.php");
                }    
}
?>

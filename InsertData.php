<?php
include '../koneksi.php';
$insert = new koneksi();

$action = $_GET['action'];
if($action == 'insert')
{
    
    $nm_barang = $_POST['namaBarang'];
    $merk = $_POST['merk'];
    $tipe_barang = $_POST['tipe_barang'];
    $tgl_pembelian = $_POST['tgl_pembelian'];
    $harga_barang = $_POST['harga_barang'];
    $ket = $_POST['ket'];
    $status = 'tersedia';
    
    $urut =  mysql_query("SELECT * FROM tb_barang");
    $no_urut = mysql_num_rows($urut);
    if ($no_urut<=999){
        $no_urut++;
        $kd1 = substr($merk,0,3);
        $kd2 = substr($tgl_pembelian,2,2);
        
        $kd_barang= $kd1.$kd2.sprintf("%03s",$no_urut);
    }
    else{
        reset($no_urut);
    }
    
 
    $insert->insertBarang($kd_barang, $nm_barang, $merk, $tipe_barang, 
                        $tgl_pembelian, $harga_barang, $status, $ket);
    header("location:mainUtama.php");
}

?>
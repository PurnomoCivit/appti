<?php 
session_start();
if ($_GET['id'] == '1')
{
    include "view_inventaris.php";
}
elseif ($_GET['id'] == '2') 
{
    include 'tambahUser.php';
    $base = new tambahUser();
    echo $base->tambah();
    echo $base->tampil();
}
elseif ($_GET['id'] == '3') 
{
    include 'upload_view.php';
    echo '<hr>';
    include 'tambah-barang.php';
}
elseif ($_GET['id'] == '4') 
{
    include 'peminjaman.php';
    echo '<hr>';
    include 'daftarPeminjaman.php';
    echo '<hr>';
    include 'historyPeminjaman.php';
}
elseif ($_GET['id'] == '5') 
{
    include 'pengadaan.php';
    echo '<hr>';
    include 'statusPengadaan.php';
}

?>
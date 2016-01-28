<script type="text/javascript" src="../jquery/load.js"></script>
<?php
include '../excel/excel_reader2.php';
include '../koneksi.php';
$dbase = new koneksi();

$data = new Spreadsheet_Excel_Reader($_FILES['userfile']['tmp_name']);
$baris = $data->rowcount($sheet_index=0);

$sukses = 0;
$gagal = 0;
 
    for($i=2;$i<=$baris;$i++)
    {
        $kd_barang = $data->val($i,2);
        $nm_barang = $data->val($i,3);
        $merk = $data->val($i,4);
        $tipe_barang = $data->val($i,5);
        $tgl_pembelian = $data->val($i,6);
        $harga_barang = $data->val($i,7);
        $status = $data->val($i,8);
        $ket = $data->val($i,9);

        $hasil = $dbase->insertBarang($kd_barang, $nm_barang, $merk, $tipe_barang, 
                    $tgl_pembelian, $harga_barang, $status, $ket);
        
        if($hasil){
            $sukses++;
        }else {
            $gagal++;
        }
        if($i==$baris){
            header("location:it.php");
            echo "<div id='loading'><h3> Proses Import Data Pegawai Selesai</h3>";
            echo "<p>Jumlah data sukses diimport : ".$sukses."<br>";
            echo "Jumlah data gagal diimport : ".$gagal."<p></div>";
        }
    }



?>

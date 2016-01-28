<script type="text/javascript" src="../jquery/load.js"></script>
<link rel="stylesheet" type="text/css" href="../desain/style.css" />
<?php
require '../koneksi.php';
$dbase = new koneksi();
/*require 'halaman.php';


$per_halaman = 20;
$new_halaman = new halaman();


$sql = "select * from tb_barang";
$jmldata = mysql_query($sql);
$jmlBaris = mysql_num_rows($jmldata); 

$new_halaman->kelas_halaman($per_halaman);
$new_halaman->tentukan_total_baris($jmlBaris);
$awal_record = $new_halaman->peroleh_awal_record();
*/
echo "<font color='white'>";$per_halaman = 15;
$halaman = (isset($_GET['halaman']) ? $_GET['halaman'] : '');

if ($halaman == '') {
    $awal_record=0;
    $halaman=1;
}
else {
    $awal_record = ($halaman-1)*$per_halaman;
}
echo "</font>";
?>
    <h2 align='center'>Inventaris Tools IT</h2>
            <form action="'halaman.php?page=" name='inventaris' method='get'>
            <table class='zebra-table'>
                <thead>
                <tr><th>No.</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Merk</th>
                  <th>Type Barang</th>
                  <th>Tanggal Pembelian</th>
                  <th>Harga Barang</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                 <?php
				 echo $awal_record;
                     $no = $awal_record+1;
                     $data=$dbase->TampilData($awal_record,$per_halaman);
                     foreach ($data as $r)
                        {
                        $harga= number_format($r['harga_barang'],2,",",".");
                         
                        echo "<tr>
                                <td>$no</td>
                                <td>$r[kd_barang]</td>
                                <td>$r[nm_barang]</td>
                                <td>$r[merk]</td>
                                <td>$r[tipe_barang]</td>
                                <td>$r[tgl_pembelian]</td>
                                <td>Rp. $harga</td>
                                <td>$r[status]</td>
                                <td>$r[ket]</td>
                              </tr>";
                   $no++; }
                echo "</tbody>
              </table>";
              echo "<div class='halaman'>Halaman : ";
                  $jmldata = mysql_query("select * from tb_barang");
                  $jmldata = mysql_num_rows($jmldata);
                  $jml_halaman = ceil($jmldata/$per_halaman);
                  
                  for($i=1;$i<=$jml_halaman;$i++){
                      if($i!=$jml_halaman){
                          echo "<a href='view_inventaris.php?halaman=$i'>$i</a> | ";
                      }else{
                          echo "<a href='view_inventaris.php?halaman=$i'>$i</a> | </div>";
                      }
                  }
        echo "</form>";
       ?>
                    
    
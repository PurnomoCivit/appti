<script type="text/javascript" src="../jquery/load.js"></script>
<div class='menu'><h2 align="center">
    Daftar Peminjaman Barang
</h2>
<div id="peminjaman">
<form action='' name='pengadaan' method='get'>
            <table class='zebra-table'>
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode Peminjaman</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Tanggal Peminjaman</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Merk</th>
                  <th>Type Barang</th>
                  <th>Status</th>
                  <th>Tanggal Pengembalian</th>
                  <th>Keterangan</th>
                  <?php if(isset($_SESSION['level'])){
                            if($_SESSION['level'] == 'it'){
                                echo "<th>Operasi</th>";}
                  }?>
                </tr>
                </thead>
                <tbody><?php
                    require_once '../koneksi.php';
                    $dbase = new koneksi();
                     
                     if(isset($_SESSION['level'])){
                        if($_SESSION['level'] == "it"){
                            $data=$dbase->daftarPeminjaman();
                            $no=1;
                            foreach ($data as $w)
                            {
                        echo "<tr>
                                <td>$no</td>
                                <td>$w[kd_pinjam]</td>
                                <td>$w[nik]</td>";
                                $nik = $w['nik'];
                                $data1 = $dbase->showUser($nik);
                                foreach ($data1 as $v) {
                                echo "<td>$v[name]</td>
                                <td>$v[jabatan]</td>";
                                }
                               echo "<td>$w[tgl_peminjaman]</td>
                                <td>$w[kd_barang]</td>";
                                $kd_barang = $w['kd_barang'];
                                $data2 = $dbase->getDataBarang($kd_barang);
                                foreach ($data2 as $x) {
                                   echo "<td>$x[nm_barang]</td>
                                        <td>$x[merk]</td>
                                        <td>$x[tipe_barang]</td>"; 
                                }
                                echo "<td>$w[status]</td>
                                <td>$w[tgl_pengembalian]</td>
                                <td>$w[ket]</td>
                                <td><a href='updatePeminjaman.php?kode=$w[kd_pinjam]'>edit</a></td>";
                                $no++;
                           }                               
                        }
                        else if($_SESSION['level'] == "kabag" or $_SESSION['level'] == "staff"){
                            $nm_table = 'tb_peminjaman';
                            $nik = $_SESSION['nik'];
                            $data=$dbase->tampilDataUser($nm_table, $nik);
                            if(!empty($data)){
                            $no=1;
                         foreach ($data as $w)
                        {
                        echo "<tr>
                                <td>$no</td>
                                <td>$w[kd_pinjam]</td>
                                <td>$w[nik]</td>";
                                $nik = $w['nik'];
                                $data1 = $dbase->showUser($nik);
                                foreach ($data1 as $v) {
                                echo "<td>$v[name]</td>
                                <td>$v[jabatan]</td>";
                                }
                                echo "<td>$w[tgl_peminjaman]</td>
                                <td>$w[kd_barang]</td>";
                                $kd_barang = $w['kd_barang'];
                                $data2 = $dbase->getDataBarang($kd_barang);
                                foreach ($data2 as $x) {
                                   echo "<td>$x[nm_barang]</td>
                                        <td>$x[merk]</td>
                                        <td>$x[tipe_barang]</td>"; 
                                }
                                echo "<td>$w[status]</td>
                                <td>$w[tgl_pengembalian]</td>
                                <td>$w[ket]</td>";
                                echo "</tr>";
                              $no++;
                            }
                        }
                        }
                    };?>
                    </tbody>
              </table>
        </form>
    </div>
</div>
    
<script type="text/javascript" src="../jquery/load.js"></script>
<h2 align="center">
    Status Pengajuan Pengadaan
</h2>
    <form action='' name='pengadaan' method='get'>
            <table class='zebra-table'>
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode Pengadaan</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Jabatan</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Status</th>
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
                     $no=1;
                     if(isset($_SESSION['level'])){
                        if($_SESSION['level'] == "it"){
                     $data=$dbase->tampilReq();
                     foreach ($data as $r)
                        {
                        echo "<tr>
                                <td>$no</td>
                                <td>$r[kd_pengadaan]</td>
                                <td>$r[nik]</td>";
                                $nik = $r['nik'];
                                $data1 = $dbase->showUser($nik);
                                foreach ($data1 as $v) {
                                echo "<td>$v[name]</td>
                                <td>$v[jabatan]</td>";
                                }
                                echo "<td>$r[tgl_pengajuan]</td>
                                <td>$r[nm_barang]</td>
                                <td>$r[jml]</td>
                                <td>$r[status]</td>
                                <td>$r[ket]</td>";
                                if(isset($_SESSION['level'])){
                                    if($_SESSION['level'] == 'it'){
                                    echo "<td><div class='menu'><a href='updatePengadaan.php?id=$r[kd_pengadaan]'>edit</a></div></td>";
                                }}
                                echo "</tr>";
                              $no++;
                            }
                        }
                        else if($_SESSION['level'] == "kabag" or $_SESSION['level'] == "staff"){
                            $nm_table = 'tb_pengadaan';
                            $nik = $_SESSION['nik'];
                            $data=$dbase->tampilDataUser($nm_table, $nik);
                            foreach ($data as $r)
                            {
                            echo "<tr>
                                <td>$no</td>
                                <td>$r[kd_pengadaan]</td>
                                <td>$r[nik]</td>";
                                $nik = $r['nik'];
                                $data1 = $dbase->showUser($nik);
                                foreach ($data1 as $v) {
                                echo "<td>$v[name]</td>
                                <td>$v[jabatan]</td>";
                                }
                                echo "<td>$r[tgl_pengajuan]</td>
                                <td>$r[nm_barang]</td>
                                <td>$r[jml]</td>
                                <td>$r[status]</td>
                                <td>$r[ket]</td>";
                                echo "</tr>";
                              $no++;
                            }
                        }}?>
                </tbody>
              </table>
        </form>

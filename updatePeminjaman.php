<link href="../jquery/jquery-ui.css" rel="stylesheet" />
<script type="text/javascript" src="../jquery/jquery.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui.js"></script>
<script type="text/javascript" src="../jquery/load.js"></script>
<?php
include '../koneksi.php';
$dbase = new koneksi();
$kode = $_GET['kode'];
$r = $dbase->tampilUpdatePinjam($kode);
?>
<div class="menu">
<form action='prosesPeminjaman.php?action=update' method='POST' name='updateStatus'>
<table>
    <tr>
        <td><label>Kode Peminjaman</label></td>
        <td><input type='text' name='kd_pinjam' value='<?php echo $r['kd_pinjam'];?>'></td>
    </tr>
    <tr>
        <td><label>NIK</label></td>
        <td><input type='text' name='nik' value='<?php echo $r['nik'];?>'></td>
    </tr>
    <?php $nik = $r['nik']; 
        $w = $dbase->showUser($nik); 
        foreach ($w as $v) {?>
    <tr>
        <td><label>Nama Karyawan</label></td>
        <td><input type='text' name='name' value='<?php echo $v['name'];?>'></td>
    </tr>
    <tr>
        <td><label>Jabatan</label></td>
        <td><input type='text' name='jabatan' value='<?php echo $v['jabatan']; ?>'></td>
    </tr><?php } ?>
    <tr>
        <td><label>Tanggal Peminjaman</label></td>
        <td><input id="datepicker" name="tgl_peminjaman" placeholder="yyyy/mm/dd" value='<?php echo $r['tgl_peminjaman'];?>'></td>
    </tr>
    <tr>
        <td><label>Kode Barang</label></td>
        <td><input type='text' name='kd_barang' value='<?php echo $r['kd_barang'];?>'></td>
    </tr>
    <?php 
    $x = $dbase->getDataBarang($r['kd_barang']); 
    foreach ($x as $y) {?>
    <tr>
        <td><label>Nama Barang</label></td>
        <td><input type='text' name='kd_barang' value='<?php echo $y['nm_barang'];?>'></td>
    </tr>
    <tr>
        <td><label>Merk</label></td>
        <td><input type='text' name='kd_barang' value='<?php echo $y['merk'];?>'></td>
    </tr>
    <tr>
        <td><label>Type</label></td>
        <td><input type='text' name='kd_barang' value='<?php echo $y['tipe_barang'];?>'></td>
    </tr><?php } ?>
    <tr>
        <td><label>Status</label></td>
        <td><select name='status' id='status'>
                    <option value='tersedia'>Tersedia</option>
                    <option value='dipinjam'>Di Pinjam</option>
                    <option value='on process'>On Process</option>
                    <option value='cancel'>Cancel</option>
                    <option value='dikembalikan'>Dikembalikan</option>
            </select>
        </td>
    </tr>
    <tr>
        <td><label>Tanggal Pengembalian</label></td>
        <td><input id="datepicker" name="tgl_pengembalian" placeholder="yyyy/mm/dd"></td>
    </tr>
    <tr>
        <td><label>Keterangan</label></td>
        <td><textarea name='ket' cols='30' row='3'><?php echo $r['ket'];?></textarea></td>
    </tr>
    <tr>
        <td colspan='2' align='center'><button type='reset'>Reset</button>
        <button type='submit' name="submit">Submit</button></td>
    </tr>
</table>
</form>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#datepicker").datepicker({
	  dateFormat : "yy-mm-dd",
	  changeMonth : true,
	  changeYear : true	  
	});
  });
  </script>

<script type="text/javascript" src="../jquery/load.js"></script>
<link href="../jquery/jquery-ui.css" rel="stylesheet" />
<script type="text/javascript" src="../jquery/jquery.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui.js"></script>
<?php
include '../koneksi.php';
$dbase = new koneksi();
$id = $_GET['id'];
$w = $dbase->tampilUpdatePengadaan($id);
?>
    <div class='menu'>
        <form action='prosesPengadaan.php?action=update' method='POST' name='updateStatus'>
        <table>
        <tr>
            <td><label>Kode Pengadaan</label></td>
            <td><input type='text' name='kd_pengadaan' value='<?php echo $w['kd_pengadaan']?>'></td>
        </tr>
         <?php $nik = $w['nik']; 
        $z = $dbase->showUser($nik); 
        foreach ($z as $v) {?>
        <tr>
            <td><label>Nama Karyawan</label></td>
            <td><input type='text' name='name' value='<?php echo $v['name'];?>'></td>
        </tr>
        <tr>
            <td><label>Jabatan</label></td>
            <td><input type='text' name='jabatan' value='<?php echo $v['jabatan']; ?>'></td>
        </tr><?php } ?>
        <tr>
            <td><label>Nama Barang</label></td>
            <td><input type='text' name='nm_barang' value='<?php echo $w['namaBarang']?>'></td>
        </tr>
        <tr>
            <td><label>Jumlah</label></td>
            <td><input type='text' name='jumlah' value='<?php echo $w['jml']?>'></td>
        </tr>
        <tr>
            <td><label>Tanggal Pengajuan</label></td>
            <td><input id='datepicker' name='tgl_pengajuan' placeholder='yyyy/mm/dd' value='<?php echo $w['tgl_pengajuan']?>'></td>
        </tr>
    
        <tr>
            <td><label>Status</label></td>
            <td><select name='status' id='status'>
                    <option value='approve'>Approve</option>
                    <option value='unapprove'>Unapprove</option>
                    <option value='on process'>On Process</option>
                    <option value='cancel'>Cancel</option>
            </select>
        </td>
    </tr>
    <tr>
        <td><label>Keterangan</label></td>
        <td><textarea name='ket' cols='30' row='3'><?php echo $w['ket'];?></textarea></td>
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
 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<link href="../jquery/jquery-ui.css" rel="stylesheet" />
<script type="text/javascript" src="../jquery/jquery.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui.js"></script>

<form action='prosesPengadaan.php?action=insert' method='POST' name="pengadaan">
    <div id="pengadaan1"><table><p style='line-height: 200%;'>
        <tr>
            <td>
                <label>NIK</label>
            </td>
            <td>
                <input type='text' name='nik' value="<?php echo $_SESSION['nik'];?>" required>
            </td>
        </tr>
        <tr>
            <td>
                <label>Nama Karyawan</label>
            </td>
            <td>
                <input type='text' name='name' value="<?php echo $_SESSION['username'];?>" required>
            </td>
        </tr>
        <tr>
            <td>
                <label>Jabatan</label>
            </td>
            <td>
                <input type='text' name='jabatan' value="<?php echo $_SESSION['jabatan'];?>" required>
            </td>
        </tr>
        <tr>
            <td><label>Tanggal Pengajuan</label></td>
            <td><input id="datepicker" name="tgl_pengajuan" placeholder="yyyy/mm/dd" required></td>
        </tr>
        </table>
    </div>
    
    <div class="table-pengadaan">
    <table><p style='line-height: 100%;'>
            <tr>
                <td><label>Nama Barang</label></td>
                <td><input type='text' name='namaBarang' required></td>
            </tr>
            <tr>
                <td><label>Jumlah</label></td>
                <td><input type='text' name='jumlah' required></td>
            </tr>
            <tr>
                <td><label>Keterangan</label></td>
                <td><textarea name='ket' cols='30' row='3'></textarea></td>
            </tr>
        </table>
    </div>
    <table margin="auto" width="100%">
         <tr>
        <td colspan='2' align="center"><button type='reset'>Reset</button>
        <button type='submit'>Tambah</button></td>
        </tr>
    </table>
    </form>



<script type="text/javascript">
  $(document).ready(function(){
    $("#datepicker").datepicker({
	  dateFormat : "yy-mm-dd",
	  changeMonth : true,
	  changeYear : true	  
	});
  });
  </script>
<link href="../jquery/jquery-ui.css" rel="stylesheet" />
<script type="text/javascript" src="../jquery/jquery.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui.js"></script>

<form action='prosesPeminjaman.php?action=insert' method='POST' name="peminjaman">
    <div id="pengadaan1">
        <table><p style='line-height: 100%;'>
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
            <td><label>Tanggal Peminjaman</label></td>
            <td><input id="datepicker" name="tgl_peminjaman" placeholder="yyyy/mm/dd" required></td>
        </tr>
        </table>
    </div>
    <div class="table-pengadaan">
        <table><p style='line-height: 100%;'>
            <tr>
            <td><label>Nama Barang</label></td>
            <td>
                <select name='kd_barang' id='namaBarang' cols="70">
                    <option value='' selected>- Pilih Barang -</option>
                    <?php 
                        include "../koneksi.php";
                        $dbase = new koneksi();
                        $brg=$dbase->barang();
                        $noo=1;
                        foreach ($brg as $w) {
                            echo "<option value='$w[kd_barang]'>$w[nm_barang], $w[merk] </option>";
                     $noo++;} ?>
                </select>
            </td>
            <tr>
                <td><label>Keterangan</label></td>
                <td><textarea name='ket' cols='50' row='3' placeholder="Jelaskan alasan peminjaman?"></textarea></td>
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
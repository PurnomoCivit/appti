<?php 
if (isset($_POST['submit'])) {
    $_SESSION['pesan'] = 'penambahan data berhasil';
    echo '<script>window.location="mainUtama.php"</script>';
}
?>
<link href="../jquery/jquery-ui.css" rel="stylesheet" />
<script type="text/javascript" src="../jquery/jquery.js"></script>
<script type="text/javascript" src="../jquery/jquery-ui.js"></script>
<script type="text/javascript">
function cekData(){
    if(formBarang.merk.value=="")
        {
            alert("Merk harus dipilih");
            formBarang.merk.focus();
            return false;
        }
    
    return true;
}
</script>

<form action='InsertData.php?action=insert' method='POST' name="formBarang" onSubmit="return cekData()">
        <table>
            <p style='line-height: 200%'>
                
        <tr>
            <td>
                <label>Nama Barang</label>
            </td>
            <td>
                <input type='text' name='namaBarang' required>
            </td>
        </tr>
        <tr>
            <td><label>Merk</label></td>
            <td>
                <select name='merk' id='merk'>
                    <option value='' selected>- Pilih Merk Barang -</option>
                    <option value='compaq'>Compaq</option>
                    <option value='hp'>HP</option>
                    <option value='toshiba'>Toshiba</option>
                    <option value='asus'>Asus</option>
                    <option value='lenovo'>lenovo</option>
                    <option value='sandisc'>SanDisc</option>
                    <option value='kingston'>kingston</option>
                </select>  
            </td>
        </tr>      
        <tr>
        <td><label>Type</label></td>
        <td><input type="text" name="tipe_barang" required></td>
        </tr> 
        <tr>
            <td><label>Tanggal Pembelian</label></td>
            <td><input id="datepicker" name="tgl_pembelian" required></td>
        </tr>
        <tr>
            <td><label>Harga Barang</label></td>
            <td><input type="text" name="harga_barang" required></td>
        </tr>
        <tr>
            <td><label>Status</label></td>
            <td>
                <select name='status' id='status'>
                    <option value='tersedia'>Tersedia</option>
                    <option value='dipinjam'>Di Pinjam</option>
                    <option value='on process'>On Process</option>
                    <option value='cancel'>Cancel</option>
                    <option value='dikembalikan'>Dikembalikan</option>
                </select>  
            </td>
        </tr>      
        <tr>
            <td><label>Keterangan</label></td>
            <td><textarea name='ket' cols='50' row='3' required></textarea></td>
        </tr>
        <tr>
        <td colspan='2' align='center'><button type='reset'>Reset</button>
        <button type='submit' name="submit">Tambah</button></td>
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




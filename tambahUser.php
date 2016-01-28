<link rel="stylesheet" type="text/css" href="../desain/style.css" />
<?php
include '../koneksi.php';

class tambahUser{
    function tambah(){
        ?>
            <div id="index">
            <div class="tambah">
                <form action='user.php?action=insert' name='TambahUser' method='POST'>
                <table>
                    <tr>
                        <td><label><h2>NIK</h2></label></td>
                        <td></td>
                        <td>
                        <input type='text' maxlength='8' name='nik' required></td>
                    </tr>
                    <tr>
                        <td><label><h2>Nama Karyawan</h2></label></td>
                        <td>&nbsp;&nbsp;</td>
                        <td><input type='text' name='nama_karyawan' required></td>
                    </tr>
                    <tr>
                        <td><label><h2>Jenis Kelamin</h2></label></td>
                        <td></td>
                        <td>
                            <select name='jk'>
                                <option value='male'>Male</option>
                                <option value='female'>Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label><h2>Password</h2></label></td>
                        <td></td>
                        <td><input type='password' name='password' id='password'></td>
                    </tr>
                    <tr>
                        <td><label><h2>Confirm Password</h2></label></td>
                        <td></td>
                        <td><input type='password' name='confirm' id='confirm'></td>
                    </tr>
                    <tr>
                        <td><label><h2>Status</h2></label></td>
                        <td></td>
                        <td>
                            <select name='status'>
                                <option value='it'>IT</option>
                                <option value='kabag'>Kabag</option>
                                <option value='staff'>Staff</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label><strong><h2>Jabatan</h2></strong></label></td>
                        <td></td>
                        <td><input type='text' name='jabatan'></td>
                    </tr>
                    <tr>
                        <td><label><strong><h2>Email</h2></strong></label></td>
                        <td></td>
                        <td><input type='text' name='email'></td>
                    </tr>
                    <tr>
                        <td colspan='3' align='center'>
                        <button type='reset'>Reset</button>
                        <button type='submit'>Tambah</button>
                        </td>
                    </tr>
                </table>
                </form>            
               
            </div>
                
<?php
}
function tampil(){
     $dbase = new koneksi();
          
    echo "<div class='tampil'>
            <form action='' name='TampilUser' method='get'>
            <table class='zebra-table'>
                <thead>
                <tr>
                  <th><h2>No.</th>
                  <th><h2>NIK</th>
                  <th><h2>Nama Karyawan</th>
                  <th><h2>Jenis Kelamin</th>
                  <th><h2>Status</th>
                  <th><h2>Jabatan</th>
                  <th><h2>Email</th>
                  <th><h2>Action</th>
                </tr>
                </thead>
                <tbody>";
                     $no=1;
                     $data=$dbase->TampilUser();
                     foreach ($data as $r)
                        {
                        echo "<tr>
                                <td>$no</td>
                                <td>$r[nik]</td>
                                <td>$r[name]</td>
                                <td>$r[jenis_kelamin]</td>
                                <td>$r[status]</td>
                                <td>$r[jabatan]</td>
                                <td>$r[email]</td>
                                <td><a href='hapusUser.php?id=$r[nik]'>Hapus</a></td>
                              </tr>";
                              $no++;
                    }
        echo "</tbody>
              </table>
        </form>
        </div>
        </div>";
    
}
}

?>
                
<script type="text/javascript">
window.onload = function () {
document.getElementById('password').onchange = validatePassword;
document.getElementById('confirm').onchange = validatePassword;
}
function validatePassword(){
var pass2=document.getElementById('confirm').value;
var pass1=document.getElementById('password').value;
if(pass1!=pass2)
document.getElementById('confirm').setCustomValidity('Passwords Tidak Sama');
else
document.getElementById('confirm').setCustomValidity('');}
</script>
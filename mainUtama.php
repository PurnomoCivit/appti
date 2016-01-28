<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  session_start();
  if($_SESSION['level']=='')
  {
      header ("location:../index.php");
      
  }
?>
<html>
    <head>
        <title>
        Aplikasi Peminjaman & Pengadaan Barang IT PT. X    
        </title>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
    </head>
    <body>
        <link rel="stylesheet" type="text/css" href="../desain/style.css" />
        <div id="content">
            <div class="header">
                <table>
                    <tr>
                        <td align="center"></td>
                        <td><h1>Aplikasi Peminjaman & Pengadaan Inventaris IT PT. X</h1></td>
                    </tr> 
                    <?php 
                        if(isset($_SESSION['pesan'])&& $_SESSION['pesan']<> ''){
                            echo "<div class='pesan'>".$_SESSION['pesan']."</div>";
                        }
                        
                        $_SESSION['pesan']='';
                    ?>
                </table>
            </div>
          <div id="isi">
              <h3 align="center">Selamat Datang <?php echo $_SESSION['username'];?>
                    <br></br>di<br></br>Aplikasi Peminjaman & Pengadaan Inventaris IT PT. X</h3>
          </div>
           
            <nav id="navigasi">
                <div class="menu">
                    <table id='menu-table'>
                    <tr>
                        <td><a href='content.php?id=1'>Home</a></td>
                    </tr>
                    <?php 
                    if(isset($_SESSION['level']))
                    {
                        if($_SESSION['level'] == "it")
                        {?>
                        <tr>
                            <td><a href='content.php?id=2'>Tambah User</a></td>
                        </tr>
                        <tr>
                            <td><a href='content.php?id=3'>Tambah Data</a></td>
                        </tr>
                        <tr>
                            <td><a href='content.php?id=4'>Peminjaman Barang<span class="bubble" id="jumlah_konfirmasi"></span></a></td>
                        </tr>
                        <tr>
                            <td><a href='content.php?id=5'>Pengadaan Barang<span class="bubble" id="jumlah_konfirmasi"></span></a></td>
                        </tr>
                        <?php } 
                        else if($_SESSION['level'] == "kabag")
                        {?>
                        <tr>
                            <td><a href='content.php?id=4'>Peminjaman Barang<span class="bubble" id="jumlah_konfirmasi"></span></a></td>
                        </tr>
                        <tr>
                            <td><a href='content.php?id=5'>Pengadaan Barang<span class="bubble" id="jumlah_konfirmasi"></span></a></td>
                        </tr>
                        <?php } 
                        else if($_SESSION['level'] == "staff")
                        {?>
                        <tr>
                            <td><a href='content.php?id=4'>Peminjaman Barang<span class="bubble" id="jumlah_konfirmasi"></span></a></td>
                        </tr>
                        <?php }}?>
                    </table>
                </div>
                <table id='menu-table'>
                    <tr>
                    <td><a href="../logOut.php">Keluar</a></td>
                    </tr>
                </table>
            </nav>      
      </div>
        <script type="text/javascript" src="../jquery/jquery-1.11.2.js"></script>
        <script type="text/javascript" src="../jquery/load.js"></script>
        <script type="text/javascript" src="../jquery/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
            setTimeout(function(){$(".pesan").fadeOut('slow');}, 3000);
        </script>
    </body>
</html>

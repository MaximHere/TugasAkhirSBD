<?php
require 'fungsi.php';
if(isset($_POST["submit"])){


    if(tambah_orders($_POST)>0){
        echo "Data Berhasil DiInputkan";
    } else {
        echo "Data Gagal DiInputkan";
        echo "<br>";
        echo mysqli_error($konek);

    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Insert Orders</title>
</head>  


<body>
<h1>Chris Laundry</h1>
<h2>Tambah Data Order</h2>

<form action="" method="post">
     <table>
         <tr>
             <td><li><label for="KodeNota">Kode Nota </label></li></td>
             <td>:</td>
             <td>
             <?php 
            $data = mysqli_query($konek, "SELECT * FROM invoice NATURAL JOIN pelanggan");
            ?>
            <select name="KodeNota">
            
            <?php
            echo"<option value ='' >Pilih KodeNota</option>";
            while ($baris =  mysqli_fetch_assoc($data)){
                $Nota = $baris["KodeNota"]." - ".$baris["NamaPelanggan"];
                echo"<option value ='$Nota'>$Nota</option>";
            } 
            ?> 
             </td>
         </tr>
         <tr>
             <td><li><label for="KodeLayanan">Kode Layanan: </label></li></td>
             <td>:</td>
             <td>
             <?php 
            $data = mysqli_query($konek, "SELECT * FROM layanan");
            ?>
            <select name="KodeLayanan">
            
            <?php
            echo"<option value ='' >Pilih Layanan</option>";
            while ($baris =  mysqli_fetch_assoc($data)){
                $layanan = $baris["KodeLayanan"]." - ".$baris["JenisLayanan"];
                echo"<option value ='$layanan' >$layanan</option>";
            } 
            ?> 
             </td>
         </tr>
         <tr>
             <td><li><label for="KodeLayanan">Qty</label></li></td>
             <td>:</td>
             <td>
                <input type="text" name="KodeLayanan" id="KodeLayanan">
            </td>
         </tr>
         <tr>
             <td></td>
             <td></td>
             <td>
             <button type="submit" name="submit">Tambah Data</button>
            </td>
         </tr>
     </table>
</form>

<p>
    <a id= 'a1' href='index.php'><button>Kembali ke Menu</button></a>
</p>
    
</body>

</html>
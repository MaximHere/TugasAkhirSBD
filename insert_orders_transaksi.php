<?php
require 'fungsi.php';

$id = $_GET["id"];
$quer = query("SELECT MAX(KodeNota) as 'Nota' FROM invoice");
$kodeNota = $quer[0]["Nota"];
if(isset($_POST["lanjut"])){


    if(tambah_orders($_POST)>0){
        echo "Data Berhasil DiInputkan";
    } else {
        echo "Data Gagal DiInputkan";
        echo "<br>";
        echo mysqli_error($konek);

    }
}
elseif(isset($_POST["submit"])){


        if(tambah_orders($_POST)>0){
            echo "Data Berhasil DiInputkan";
            echo "
        <script>
            document.location.href = 'index.php?id=';
        </script>";
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
    <input type="hidden" name="KodeNota" value="<?= $kodeNota;?>">
     <table>
         <tr>
             <td><li><label>Kode Nota </label></li></td>
             <td>:</td>
             <td>
             <?= $kodeNota;
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
            <select name="KodeLayanan" required>
            
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
             <td><li><label for="Qty">Qty</label></li></td>
             <td>:</td>
             <td>
                <input type="text" name="Qty" id="Qty" required>
            </td>
         </tr>
         <tr>
             <td></td>
             <td></td>
             <td>
             <button type="submit" name="submit">Selesai</button> | <button type="lanjut" name="lanjut">Tambah Order Lain</button>
            </td>
         </tr>
     </table>
</form>

<p>
    <a id= 'a1' href='index.php'><button>Kembali ke Menu</button></a>
</p>
    
</body>

</html>
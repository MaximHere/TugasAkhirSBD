<?php
require 'fungsi.php';
if(isset($_POST["submit"])){
    if(tambah_invoice($_POST)>0){
        echo "Data Berhasil DiInputkan";
        echo "
        <script>
            document.location.href = 'insert_orders_transaksi.php?id=';
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
<h2>Tambah Data Invoice</h2>

<form action="" method="post">
     <table>
        <tr>
             <td><li><label for="TanggalNota">Tanggal</label></li></td>
             <td>:</td>
             <td>
                <input type="date" name="TanggalNota" id="TanggalNota" required>
            </td>
         </tr>
         <tr>
             <td><li><label for="PelangganID">ID Pelanggan </label></li></td>
             <td>:</td>
             <td>
             <?php 
            $data = mysqli_query($konek, "SELECT * FROM pelanggan");
            ?>
            <select name="PelangganID" required>
            
            <?php
            echo"<option value ='' >Pilih Pelanggan</option>";
            while ($baris =  mysqli_fetch_assoc($data)){
                $Nota = $baris["PelangganID"]." - ".$baris["NamaPelanggan"];
                echo"<option value ='$Nota'>$Nota</option>";
            } 
            ?> 
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
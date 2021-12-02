<?php
require 'fungsi.php';
if(isset($_POST["submit"])){


    if(tambah_pelanggan($_POST)>0){
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
    <title>Insert Pelanggan</title>
</head>  


<body>
<h1>Chris Laundry</h1>
<h2>Tambah Data Pelanggan</h2>

<form action="" method="post">
    <ul>
        <li>
            <label for="KodeNota">ID Pelanggan: </label>
            
            <?php 
            $data = mysqli_query($konek, "SELECT * FROM pelanggan");
            ?>
            <select name="PelangganID">
            
            <?php
            while ($baris =  mysqli_fetch_assoc($data)){
                $id_pelanggan = $baris["PelangganID"]."".$baris["NamaPelanggan"];
                echo"<option value ='$id_pelanggan'>$id_pelanggan</option>";
            } 
            ?>
            <br>
        </li>
    </ul>
    <ul>
        <li>
            <label for="KodeLayanan">Kode Layanan: </label>
            <input type="text" name="KodeLayanan" id="KodeLayanan">
        </li>
        <li>
            <label for="Qty">Qty : </label>
            <input type="Qty" name="Qty" id="Qty">
        </li>
        <li>
            <button type="submit" name="submit">Simpan Data</button> | <button type="lanjut" name="lanjut">Tambah Order Lain</button>
        </li>
    </ul>
</form>

<p>
    <a id= 'a1' href='index.php'><button>Kembali ke Menu</button></a>
</p>
    
</body>

</html>
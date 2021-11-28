<?php
require 'fungsi.php';
if(isset($_POST["submit"])){


    if(tambah_layanan($_POST)>0){
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
<h2>Tambah Layanan</h2>

<form action="" method="post">
    <ul>
        <li>
            <label for="KodeLayanan">Kode Layanan: </label>
            <input type="text" name="KodeLayanan" id="KodeLayanan"required>
        </li>
        <li>
            <label for="JenisLayanan">Nama Layanan: </label>
            <input type="text" name="JenisLayanan" id="JenisLayanan"required>
        </li>
        <li>
            <label for="HargaLayanan">Harga Layanan: </label>
            <input type="text" name="HargaLayanan" id="HargaLayanan"required>
        </li>
        
        <button type="submit" name="submit">Tambah Data</button>
        
    </ul>
</form>

<p>
    <a id= 'a1' href='index.php'><button>Kembali ke Menu</button></a>
</p>
    
</body>

</html>
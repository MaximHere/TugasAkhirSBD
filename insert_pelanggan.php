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
            <label for="NamaPelanggan">Nama Pelanggan: </label>
            <input type="text" name="NamaPelanggan" id="NamaPelanggan" required>
        </li>
        <li>
            <label for="AlamatPelanggan">Alamat Pelanggan: </label>
            <input type="text" name="AlamatPelanggan" id="AlamatPelanggan" required>
        </li>
        <li>
            <label for="NoTelp">Nomor Telepon: </label>
            <input type="text" name="NoTelp" id="NoTelp" required>
        </li>
        <li>
            <button type="submit" name="submit">Tambah Data</button>
        </li>
    </ul>
</form>

<p>
    <a id= 'a1' href='index.php'><button>Kembali ke Menu</button></a>
</p>
    
</body>

</html>
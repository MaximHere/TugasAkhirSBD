<?php
require 'fungsi.php';
$pelanggan = query("SELECT * FROM pelanggan")
    // var_dump($pelanggan)
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Pelanggan</title>
</head>  


<body>
<h1>Data Pelanggan</h1>
<button onclick="window.location.href='insert_pelanggan.php'">Insert Pelanggan</button>
<br><br>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>PelangganID</th>
        <th>Nama Pelanggan</th>
        <th>Alamat Pelanggan</th>
        <th>No telp</th> 
        <th>Aksi</th>
    </tr>
    <?php $i = 1 ?>
    <?php foreach($pelanggan as $baris): ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $baris["PelangganID"]; ?></td>
        <td><?= $baris["NamaPelanggan"]; ?></td>
        <td><?= $baris["AlamatPelanggan"]; ?></td>
        <td><?= $baris["NoTelp"] ?></td>
        <td>
           <a href='update_pelanggan.php?PelangganID=<?= $baris["PelangganID"]; ?>"'><button>Update</button></a>
            | 
           <a href='delete_pelanggan.php?id=<?= $baris["PelangganID"]; ?>'onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
           <button>Delete</button></a>
        </td>
    </tr> 
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
<p>

</p>
<a id= 'a1' href='index.php'><button> Kembali ke Menu </button> </a>
</body>

</html>
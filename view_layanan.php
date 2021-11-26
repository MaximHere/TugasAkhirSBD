<?php
require 'fungsi.php';
$layanan = query("SELECT * FROM layanan")
    // var_dump($pelanggan)
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Invoice</title>
</head>  


<body>
<h1>Data Layanan</h1>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Kode Layanan</th>
        <th>Nama Layanan</th>
        <th>Harga Layanan</th>
    </tr>
    <?php $i = 1 ?>
    <?php foreach($layanan as $baris): ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $baris["KodeLayanan"]; ?></td>
        <td><?= $baris["JenisLayanan"]; ?></td>
        <td><?= $baris["HargaLayanan"]; ?></td>
    </tr> 
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
<p>

</p>
<a id= 'a1' href='index.php'><button> Kembali ke Menu </button></a>
</body>

</html>
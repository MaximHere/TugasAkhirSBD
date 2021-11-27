<?php
require 'fungsi.php';
$orders = query("SELECT * FROM orders")
    // var_dump($pelanggan)
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Invoice</title>
</head>  


<body>
<h1>Data Invoice</h1>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Kode Nota</th>
        <th>Kode Layanan</th>
        <th>Qty</th>
        <th>Aksi</th>
    </tr>
    <?php $i = 1 ?>
    <?php foreach($orders as $baris): ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $baris["KodeNota"]; ?></td>
        <td><?= $baris["KodeLayanan"]; ?></td>
        <td><?= $baris["Qty"]; ?></td>
        <td>
           <a id= 'a1' href='view_pelanggan.php?id=<?=catch_orders($baris["KodeNota"],$baris["KodeLayanan"])?>'>Update</a>
           
           <a href='delete_layanan.php?id=<?= $baris["KodeLayanan"]; ?>'onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
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
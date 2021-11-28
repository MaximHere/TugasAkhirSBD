<?php
require 'fungsi.php';
$invoice = query("SELECT * FROM invoice")
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
        <th>Tanggal Nota</th>
        <th>ID Pelanggan</th>
        <th>Aksi</th>
    </tr>
    <?php $i = 1 ?>
    <?php foreach($invoice as $baris): ?>
    <tr>
        <td><?= $i; ?></td>
        <td><?= $baris["KodeNota"]; ?></td>
        <td><?= $baris["TanggalNota"]; ?></td>
        <td><?= $baris["PelangganID"]; ?></td>
        <td>
           <a href='update_invoice.php?id=<?= $baris["KodeNota"]; ?>'><button>Update</button></a>
            | 
           <a href='delete_invoice.php?id=<?= $baris["KodeNota"]; ?>'onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
           <button>Delete</button></a>
           |
           <a href='print.php?id=<?= $baris["KodeNota"]; ?>'><button>Cetak</button></a>
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
<?php 

require 'fungsi.php';

$id = $_GET["id"];
$data = explode("_",$id);
$nota = $data[0];
$layanan = $data[1];
// var_dump($id);
$updt = query("SELECT * FROM orders WHERE KodeNota = '" . mysqli_escape_string($konek,$nota) . "' AND
                KodeLayanan = '" . mysqli_escape_string($konek,$layanan) . "'")[0];

if( isset($_POST["submit"])){
    if (update_orders($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diupdate');
                document.location.href = 'view_orders.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diupdate');
                document.location.href = 'view_orders.php';
            </script>
        ";
    }
}
elseif( isset($_GET["back"])){
    echo "
            <script>
                document.location.href = 'view_orders.php';
            </script>
        ";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create</title>
</head>
<body>
    <h1>Update data order</h1>
    <form action="" method="post">
        <input type="hidden" name="target_nota" value="<?= $nota;?>">
        <input type="hidden" name="target_layanan" value="<?= $layanan;?>">
        <ul>
            <li>
                <label for="KodeLayanan">Kode Nota : <?= $nota; ?> </label>
            </li>
            <li>
                <label for="JenisLayanan">Jenis Layanan : <?= $layanan; ?> </label>
            </li>
            <li>
                <label for="Qty">Qty : </label>
                <input type="text" name="Qty" id="Qty"required value="<?= $updt["Qty"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Update</button>
            </li>
        </ul>
    </form>

    <form action="" method="get">
        <button type = "back" name="back">Back</button>
    </form>
       
</body>
</html>
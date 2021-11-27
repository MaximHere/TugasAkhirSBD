<?php 

require 'fungsi.php';

$kode = $_GET["id"];
// var_dump($id);
$updt = query("SELECT * FROM layanan WHERE KodeLayanan = '" . mysqli_escape_string($konek,$kode) . "'")[0];

if( isset($_POST["submit"])){
    if (update_layanan($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diupdate');
                document.location.href = 'view_layanan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diupdate');
                document.location.href = 'view_layanan.php';
            </script>
        ";
    }
}
elseif( isset($_GET["back"])){
    echo "
            <script>
                document.location.href = 'view_layanan.php';
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
    <h1>Update data pelanggan</h1>
    <form action="" method="post">
        <input type="hidden" name="target" value="<?= $updt["KodeLayanan"];?>">
        <ul>
            <li>
                <label for="KodeLayanan">Kode Layanan : </label>
                <input type="text" name="KodeLayanan" id="KodeLayanan"required value="<?= $updt["KodeLayanan"]; ?>">
            </li>
            <li>
                <label for="JenisLayanan">Jenis Layanan : </label>
                <input type="text" name="JenisLayanan" id="JenisLayanan"required value="<?= $updt["JenisLayanan"]; ?>">
            </li>
            <li>
                <label for="HargaLayanan">Harga : </label>
                <input type="text" name="HargaLayanan" id="HargaLayanan"required value="<?= $updt["HargaLayanan"]; ?>">
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
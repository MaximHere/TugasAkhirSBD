<?php 

require 'fungsi.php';

$id = $_GET["PelangganID"];
// var_dump($id);
$updt = query("SELECT * FROM pelanggan WHERE PelangganID = '" . mysqli_escape_string($konek,$id) . "'")[0];

if( isset($_POST["submit"])){
    if (update_pelanggan($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diupdate');
                document.location.href = 'view_pelanggan.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diupdate');
                document.location.href = 'view_pelanggan.php';
            </script>
        ";
    }
}
elseif( isset($_GET["back"])){
    echo "
            <script>
                document.location.href = 'view_pelanggan.php';
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
        <input type="hidden" name="target" value="<?= $updt["PelangganID"];?>">
        <ul>
            <!-- <li>
                <label for="idFDA">idFDA : </label>
                <input type="text" name="idFDA" id="idFDA"required value="<?= $updt["idFDA"]; ?>">
            </li> -->
            <li>
                <label for="NamaPelanggan">Nama Pelanggan : </label>
                <input type="text" name="NamaPelanggan" id="NamaPelanggan"required value="<?= $updt["NamaPelanggan"]; ?>">
            </li>
            <li>
                <label for="AlamatPelanggan">Alamat Pelanggan : </label>
                <input type="text" name="AlamatPelanggan" id="AlamatPelanggan"required value="<?= $updt["AlamatPelanggan"]; ?>">
            </li>
            <li>
                <label for="NoTelp">Nomor Telepon : </label>
                <input type="text" name="NoTelp" id="NoTelp"required value="<?= $updt["NoTelp"]; ?>">
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
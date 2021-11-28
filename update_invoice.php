<?php 

require 'fungsi.php';

$id = $_GET["id"];
// var_dump($id);
$updt = query("SELECT * FROM invoice NATURAL JOIN pelanggan WHERE KodeNota = '" . mysqli_escape_string($konek,$id) . "' ")[0];

if( isset($_POST["submit"])){
    if (update_invoice($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diupdate');
                document.location.href = 'view_invoice.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diupdate');
                document.location.href = 'view_invoice.php';
            </script>
        ";
    }
}
elseif( isset($_GET["back"])){
    echo "
            <script>
                document.location.href = 'view_invoice.php';
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
        <input type="hidden" name="target_nota" value="<?= $id;?>">
        <!-- <table>
            <tr>
                <td><li><label for="KodeLayanan">Kode Nota : </label></li></td>
            </tr>
            <tr>:</tr>
            <tr><?= $id; ?> </tr>
        </table> -->
        <ul>
            <li>
                <label for="KodeNota">Kode Nota : <?= $id; ?> </label>
            </li>
            <li>
                <label for="TanggalNota">Tanggal : </label>
                <input type="date" name="TanggalNota" id="TanggalNota"required value="<?= $updt["TanggalNota"]; ?>" required>
            </li>
            <li>
                <table>
                <label for="PelangganID">PelangganID : </label>
            <?php 
            $data = mysqli_query($konek, "SELECT * FROM pelanggan");
            ?>
            <select name="PelangganID" required>
            
            <?php
            $current = $updt["PelangganID"]." - ".$updt["NamaPelanggan"] ;
            echo"<option value ='$current' >$current</option>";
            while ($baris =  mysqli_fetch_assoc($data)){
                $Nota = $baris["PelangganID"]." - ".$baris["NamaPelanggan"];
                echo"<option value ='$Nota'>$Nota</option>";
            } 
            ?> 
                </table>
            </li>
            <button type="submit" name="submit">Update</button>
        </ul>
        
    </form>

    <form action="" method="get">
        <button type = "back" name="back">Back</button>
    </form>
       
</body>
</html>
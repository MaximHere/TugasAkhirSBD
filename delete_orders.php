<?php
require 'fungsi.php';

$id = $_GET["id"];
$data = explode("_",$id);
$nota = $data[0];
$layanan = $data[1];

if( delete_orders($nota,$layanan) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href = 'view_orders.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal dihapus');
            document.location.href = 'view_orders.php';
        </script>
    ";
}

?>
<?php
require 'fungsi.php';

$data = $_GET["id"];

if( delete_orders($data[0],$data[1]) > 0) {
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
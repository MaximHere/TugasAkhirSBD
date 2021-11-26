<?php
require 'fungsi.php';

$pelanggan_id = $_GET["id"];

if( delete_pelanggan($pelanggan_id) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href = 'view_pelanggan.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal dihapus');
            document.location.href = 'view_pelanggan.php';
        </script>
    ";
}

?>
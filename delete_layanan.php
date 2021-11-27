<?php
require 'fungsi.php';

$kode = $_GET["id"];

if( delete_layanan($kode) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href = 'view_layanan.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal dihapus');
            document.location.href = 'view_layanan.php';
        </script>
    ";
}

?>
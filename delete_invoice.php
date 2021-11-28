<?php
require 'fungsi.php';

$nota = $_GET["id"];

if( delete_invoice($nota) > 0) {
    echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href = 'view_invoice.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('data gagal dihapus');
            document.location.href = 'view_invoice.php';
        </script>
    ";
}

?>
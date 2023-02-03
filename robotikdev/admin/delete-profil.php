<?php
require 'fun-admin.php';

$id = $_GET["id"];

if( hapus_pm($id) > 0 ) {
    echo "
                <script>
                alert('Data berhasil dihapus');
                document.location.href = 'adm-admin.php';
                </script>
            ";
} else {
    echo "
                <script>
                alert('Data gagal dihapus');
                document.location.href = 'adm-admin.php';
                </script>
            ";
}

?>
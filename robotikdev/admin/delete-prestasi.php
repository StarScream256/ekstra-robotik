<?php
require 'fun-admin.php';

$id = $_GET["id"];

if( hapus_pres($id) > 0 ) {
    echo "
                <script>
                alert('Data berhasil dihapus');
                document.location.href = 'adm-prestasi.php';
                </script>
            ";
} else {
    echo "
                <script>
                alert('Data gagal dihapus');
                document.location.href = 'adm-prestasi.php';
                </script>
            ";
}

?>
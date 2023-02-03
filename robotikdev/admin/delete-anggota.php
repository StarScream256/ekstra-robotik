<?php
require 'fun-admin.php';

$id = $_GET["id"];

if( hapus_ag($id) > 0 ) {
    echo "
                <script>
                alert('Data berhasil dihapus');
                document.location.href = 'adm-anggota.php';
                </script>
            ";
} else {
    echo "
                <script>
                alert('Data gagal dihapus');
                document.location.href = 'adm-anggota.php';
                </script>
            ";
}

?>
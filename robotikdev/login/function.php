<?php

use LDAP\Result;

$conn = mysqli_connect("localhost", "root", "", "db_robotik");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data) {
    global $conn;
    $judul = htmlspecialchars($data["judul"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $foto = htmlspecialchars($data["foto"]);

    $query = "INSERT INTO tb_prestasi
            VALUES ('', '$judul', '$keterangan', '$foto')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_prestasi WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $ket = htmlspecialchars($data["keterangan"]);

    $query = "UPDATE tb_prestasi SET
                judul = '$judul', keterangan = '$ket' WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>
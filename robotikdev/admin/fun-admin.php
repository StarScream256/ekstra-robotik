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

// PRESTASI
function tambah_pres($data) {
    global $conn;
    $judul = htmlspecialchars($data["judul"]);
    $keterangan = htmlspecialchars($data["keterangan"]);

    $foto = upload_pres();
    if( !$foto ) {
        return false;
    }

    $query = "INSERT INTO tb_prestasi
            VALUES ('', '$judul', '$keterangan', '$foto')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload_pres() {

    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpFile = $_FILES['foto']['tmp_name'];

    $extensiGambarValid = ['jpg', 'jpeg', 'png'];
    $extensiGambar = explode('.', $namaFile);
    $extensiGambar = strtolower(end($extensiGambar));

    if( !in_array($extensiGambar, $extensiGambarValid) ) {
        echo "
              <script>
              alert('Data gagal ditambahkan, format file salah');
              document.location.href = 'adm-prestasi.php';
              </script>
          ";
          return false;
    }

    if( $ukuranFile > 3000000) {
        echo "
              <script>
              alert('Data gagal ditambahkan, ukuran file terlalu besar');
              document.location.href = 'adm-prestasi.php';
              </script>
          ";
          return false;
    }

    // move up

    move_uploaded_file($tmpFile, '../foto/' . $namaFile);
    return $namaFile;
}

function hapus_pres($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_prestasi WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah_pres() {
    global $conn;

    $id = $_POST["id"];
    $judul = htmlspecialchars($_POST["judul"]);
    $ket = htmlspecialchars($_POST["keterangan"]);

    $foto = upload_pres();

    $query = "UPDATE tb_prestasi SET judul = '$judul', keterangan = '$ket', foto = '$foto' WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari_pres($keyword) {
    $query = "SELECT * FROM tb_prestasi WHERE 
                judul LIKE '%$keyword%' OR
                keterangan LIKE '%$keyword%'
                ";

    return query($query);
}


// PROFIL  //

// ADMIN //
function tambah_adm($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $uname = htmlspecialchars($data["username"]);
    $pw = htmlspecialchars(md5($data["password"]));
    // $foto_pm = htmlspecialchars($data["foto"]);

    $foto_adm = upload_adm();
    if( !$foto_adm ) {
        return false;
    }

    $query = "INSERT INTO tb_admin
            VALUES ('', '$nama', '$uname', '$pw', '$foto_adm')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload_adm() {

    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpFile = $_FILES['foto']['tmp_name'];

    $extensiGambarValid = ['jpg', 'jpeg', 'png'];
    $extensiGambar = explode('.', $namaFile);
    $extensiGambar = strtolower(end($extensiGambar));

    if( !in_array($extensiGambar, $extensiGambarValid) ) {
        echo "
              <script>
              alert('Data gagal ditambahkan, format file salah');
              document.location.href = 'adm-admin.php';
              </script>
          ";
          return false;
    }

    if( $ukuranFile > 3000000) {
        echo "
              <script>
              alert('Data gagal ditambahkan, ukuran file terlalu besar');
              document.location.href = 'adm-admin.php';
              </script>
          ";
          return false;
    }

    // move up

    move_uploaded_file($tmpFile, '../foto/' . $namaFile);
    return $namaFile;
}

function hapus_adm($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_admin WHERE id_admin = $id");

    return mysqli_affected_rows($conn);
}

function cari_adm($keyword) {
    $query = "SELECT * FROM tb_admin WHERE 
                nama LIKE '%$keyword%' OR
                id_admin LIKE '%$keyword%' OR
                username LIKE '%$keyword%'
                ";

    return query($query);
}

// PEMBIMBING //
function tambah_pm($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $status = htmlspecialchars($data["status"]);
    $uname = htmlspecialchars($data["username"]);
    $pw = htmlspecialchars(md5($data["password"]));
    $id_admin = "SELECT id_admin FROM tb_admin WHERE nama = '$nama'";

    $foto_pm = upload_pm();
    if( !$foto_pm ) {
        return false;
    }

    // $query = "INSERT INTO tb_admin VALUES ('', '$nama', '$uname', '$pw', '$foto_pm');";
    // $query .= "INSERT INTO tb_pembimbing VALUES ('', ($id_admin), '$nama', '$status', '$foto_pm')";
    // mysqli_multi_query($conn, $query);

    $sql = "INSERT INTO tb_admin VALUES ('', '$nama', '$uname', '$pw', '$foto_pm');";
    $sql .= "INSERT INTO tb_pembimbing VALUES ('', ($id_admin), '$nama', '$status', '$foto_pm')";

    // Execute multi query
    if (mysqli_multi_query($conn, $sql)) {
    do {
        // Store first result set
        if ($result = mysqli_store_result($conn)) {
        while ($row = mysqli_fetch_row($result)) {
            printf("%s\n", $row[0]);
        }
        mysqli_free_result($result);
        }
        // if there are more result-sets, the print a divider
        if (mysqli_more_results($conn)) {
        printf("\n");
        }
        //Prepare next result set
    } while (mysqli_next_result($conn));
    }
    return mysqli_affected_rows($conn);
}

function upload_pm() {

    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpFile = $_FILES['foto']['tmp_name'];

    $extensiGambarValid = ['jpg', 'jpeg', 'png'];
    $extensiGambar = explode('.', $namaFile);
    $extensiGambar = strtolower(end($extensiGambar));

    if( !in_array($extensiGambar, $extensiGambarValid) ) {
        echo "
              <script>
              alert('Data gagal ditambahkan, format file salah');
              document.location.href = 'adm-admin.php';
              </script>
          ";
          return false;
    }

    if( $ukuranFile > 3000000 ) {
        echo "
              <script>
              alert('Data gagal ditambahkan, file terlalu besar');
              document.location.href = 'adm-admin.php';
              </script>
          ";
          return false;
    }

    // move file to directory
    move_uploaded_file($tmpFile, '../foto/' . $namaFile);
    return $namaFile;
}

function hapus_pm($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_pembimbing WHERE id = $id");

    return mysqli_affected_rows($conn);
}


function cari_pm($keyword) {
    $query = "SELECT * FROM tb_pembimbing WHERE 
                nama LIKE '%$keyword%' OR
                id_admin LIKE '%$keyword%' OR
                status LIKE '%$keyword%'
                ";

    return query($query);
}

// PENGURUS //
function tambah_pn($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $status = htmlspecialchars($data["status"]);
    $uname = htmlspecialchars($data["username"]);
    $pw = htmlspecialchars(md5($data["password"]));
    $id_admin = "SELECT id_admin FROM tb_admin WHERE nama = '$nama'";

    $foto_pn = upload_pn();
    if( !$foto_pn ) {
        return false;
    }

    // $query = "INSERT INTO tb_pengurus VALUES ('', '$nama', '$status', '$foto_pn')";
    // mysqli_query($conn, $query);

    $sql = "INSERT INTO tb_admin VALUES ('', '$nama', '$uname', '$pw', '$foto_pn');";
    $sql .= "INSERT INTO tb_pengurus VALUES ('', ($id_admin), '$nama', '$status', '$foto_pn')";

    // Execute multi query
    if (mysqli_multi_query($conn, $sql)) {
    do {
        // Store first result set
        if ($result = mysqli_store_result($conn)) {
        while ($row = mysqli_fetch_row($result)) {
            printf("%s\n", $row[0]);
        }
        mysqli_free_result($result);
        }
        // if there are more result-sets, the print a divider
        if (mysqli_more_results($conn)) {
        printf("\n");
        }
        //Prepare next result set
    } while (mysqli_next_result($conn));
    }

    return mysqli_affected_rows($conn);
}

function upload_pn() {

    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpFile = $_FILES['foto']['tmp_name'];

    $extensiGambarValid = ['jpg', 'jpeg', 'png'];
    $extensiGambar = explode('.', $namaFile);
    $extensiGambar = strtolower(end($extensiGambar));

    if( !in_array($extensiGambar, $extensiGambarValid) ) {
        echo "
              <script>
              alert('Data gagal ditambahkan, format file salah');
              document.location.href = 'adm-admin.php';
              </script>
          ";
          return false;
    }

    if( $ukuranFile > 3000000) {
        echo "
              <script>
              alert('Data gagal ditambahkan, ukuran file terlalu besar');
              document.location.href = 'adm-admin.php';
              </script>
          ";
          return false;
    }

    // move up

    move_uploaded_file($tmpFile, '../foto/' . $namaFile);
    return $namaFile;
}

function hapus_pn($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_pengurus WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function cari_pn($keyword) {
    $query = "SELECT * FROM tb_pengurus WHERE 
                nama LIKE '%$keyword%' OR
                id_admin LIKE '%$keyword%' OR
                status LIKE '%$keyword%'
                ";

    return query($query);
}

// ANGGOTA //
function tambah_ag($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    // $foto_ag = htmlspecialchars($data["foto"]);

    $foto_ag = upload_ag();
    if( !$foto_ag ) {
        return false;
    }

    $query = "INSERT INTO tb_anggota
            VALUES ('', '$nama', '$kelas', '$foto_ag')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus_ag($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_anggota WHERE id_agt = $id");

    return mysqli_affected_rows($conn);
}


  function upload_ag() {

    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpFile = $_FILES['foto']['tmp_name'];

    $extensiGambarValid = ['jpg', 'jpeg', 'png'];
    $extensiGambar = explode('.', $namaFile);
    $extensiGambar = strtolower(end($extensiGambar));

    if( !in_array($extensiGambar, $extensiGambarValid) ) {
        echo "
              <script>
              alert('Data gagal ditambahkan, format file salah');
              document.location.href = 'adm-anggota.php';
              </script>
          ";
          return false;
    }

    if( $ukuranFile > 3000000) {
        echo "
              <script>
              alert('Data gagal ditambahkan, ukuran file terlalu besar');
              document.location.href = 'adm-anggota.php';
              </script>
          ";
          return false;
    }

    // move up

    move_uploaded_file($tmpFile, '../foto/' . $namaFile);
    return $namaFile;
}

function cari_ag($keyword) {
    $query = "SELECT * FROM tb_anggota WHERE 
                nama_agt LIKE '%$keyword%' OR
                kelas_agt LIKE '%$keyword%'
                ";

    return query($query);
}

// BERITA //
function tambah_br($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $tgl = htmlspecialchars($data["tanggal"]);

    $foto_br = upload_br();
    if( !$foto_br ) {
        return false;
    }

    $query = "INSERT INTO tb_berita
            VALUES ('', '$nama', '$keterangan', '$tgl', '$foto_br', '$kategori')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload_br() {

    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpFile = $_FILES['foto']['tmp_name'];

    $extensiGambarValid = ['jpg', 'jpeg', 'png'];
    $extensiGambar = explode('.', $namaFile);
    $extensiGambar = strtolower(end($extensiGambar));

    if( !in_array($extensiGambar, $extensiGambarValid) ) {
        echo "
              <script>
              alert('Data gagal ditambahkan, format file salah');
              document.location.href = 'adm-berita.php';
              </script>
          ";
          return false;
    }

    if( $ukuranFile > 3000000) {
        echo "
              <script>
              alert('Data gagal ditambahkan, ukuran file terlalu besar');
              document.location.href = 'adm-berita.php';
              </script>
          ";
          return false;
    }

    // move up

    move_uploaded_file($tmpFile, '../foto/' . $namaFile);
    return $namaFile;
}

function hapus_br($id) {
    global $conn;
    $id= $_GET["id"];
    mysqli_query($conn, "DELETE FROM tb_berita WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah_br() {
    global $conn;
  
    $id = $_POST["id_berita"];
    $nama = htmlspecialchars($_POST["nama"]);
    $keterangan = htmlspecialchars($_POST["keterangan"]);
    $kategori = htmlspecialchars($_POST["kategori"]);
    $tgl = htmlspecialchars($_POST["tanggal"]);
  
    $foto_br = upload_br();
  
    $query = "UPDATE tb_berita SET
                judul = '$nama', keterangan = '$keterangan', tanggal = '$tgl', kategori = '$kategori', foto = '$foto_br' WHERE id = $id";
  
    mysqli_query($conn, $query);
  
    return mysqli_affected_rows($conn);
  }

function cari_br($keyword) {
    $query = "SELECT * FROM tb_berita WHERE 
                judul LIKE '%$keyword%' OR
                keterangan LIKE '%$keyword%' OR
                kategori LIKE '%$keyword%' OR
                tanggal LIKE '%$keyword%'
                ";

    return query($query);
}

// GALERI //
function tambah_gl($data) {
    global $conn;
    $keterangan = htmlspecialchars($data["alt"]);

    $foto_gl = upload_gl();
    if( !$foto_gl ) {
        return false;
    }

    $query = "INSERT INTO tb_gallery
            VALUES ('', '$foto_gl', '$keterangan')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload_gl() {

    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpFile = $_FILES['foto']['tmp_name'];

    $extensiGambarValid = ['jpg', 'jpeg', 'png'];
    $extensiGambar = explode('.', $namaFile);
    $extensiGambar = strtolower(end($extensiGambar));

    if( !in_array($extensiGambar, $extensiGambarValid) ) {
        echo "
              <script>
              alert('Data gagal ditambahkan, format file salah');
              document.location.href = 'adm-galeri.php';
              </script>
          ";
          return false;
    }

    if( $ukuranFile > 3000000) {
        echo "
              <script>
              alert('Data gagal ditambahkan, ukuran file terlalu besar');
              document.location.href = 'adm-galeri.php';
              </script>
          ";
          return false;
    }

    // move up

    move_uploaded_file($tmpFile, '../foto/' . $namaFile);
    return $namaFile;
}

function hapus_gl($id) {
    global $conn;
    $id= $_GET["id"];
    mysqli_query($conn, "DELETE FROM tb_gallery WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah_gl() {
    global $conn;
    
    $id = $_POST["id"];
    $alt = htmlspecialchars($_POST["alt"]);
  
    $foto_gl = upload_gl();
  
    $query = "UPDATE tb_gallery SET 
                keterangan = '$alt', foto = '$foto_gl' WHERE id = $id";
  
    mysqli_query($conn, $query);
  
    return mysqli_affected_rows($conn);
  }

function cari_gl($keyword) {
    $query = "SELECT * FROM tb_gallery WHERE 
                keterangan LIKE '%$keyword%'
                ";

    return query($query);
}

// JADWAL //
function tambah_jw($data) {
    global $conn;
    $hari = htmlspecialchars($data["hari"]);
    $jam = htmlspecialchars($data["jam"]);

    $query = "INSERT INTO tb_jadwal
            VALUES ('', '$hari', '$jam')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus_jw($id) {
    global $conn;
    $id= $_GET["id"];
    mysqli_query($conn, "DELETE FROM tb_jadwal WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah_jw() {
    global $conn;
    
    $id = $_POST["id"];
    $hari = htmlspecialchars($_POST["hari"]);
    $jam = htmlspecialchars($_POST["jam"]);
  
  
    $query = "UPDATE tb_jadwal SET 
                hari = '$hari', jam = '$jam' WHERE id = $id";
  
    mysqli_query($conn, $query);
  
    return mysqli_affected_rows($conn);
}

function cari_jw($keyword) {
    $query = "SELECT * FROM tb_jadwal WHERE 
                hari LIKE '%$keyword%'
                ";

    return query($query);
}
?>

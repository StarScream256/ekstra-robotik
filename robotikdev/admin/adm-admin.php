<?php
session_start();
include 'fun-admin.php';
$pembimbing = query("SELECT * FROM tb_pembimbing");
$pengurus = query("SELECT * FROM tb_pengurus");
$admin = query("SELECT * FROM tb_admin");

// CARI
if( isset($_POST["cari-adm"]) ) {
  $admin = cari_adm($_POST["keyword-adm"]);
}

if( isset($_POST["cari-pm"]) ) {
  $pembimbing = cari_pm($_POST["keyword-pm"]);
}

if( isset($_POST["cari-pn"]) ) {
  $pengurus = cari_pn($_POST["keyword-pn"]);
}

// TAMBAH DATA ADMIN
if( isset($_POST['submit-adm'])) {

  // cek berhasil
  if( tambah_adm($_POST) > 0) {
      echo "
              <script>
              alert('Data berhasil ditambahkan');
              document.location.href = 'adm-admin.php';
              </script>
          ";
  } else {
      echo "
              <script>
              alert('Data gagal ditambahkan');
              document.location.href = 'adm-admin.php';
              </script>
          ";
  }
}

if( isset($_POST['edit-adm'])) {

  // cek berhasil
  if( ubah_adm($_POST) > 0) {
      echo "
              <script>
              alert('Data berhasil diubah');
              document.location.href = 'adm-admin.php';
              </script>
          ";
  } else {
      echo "
              <script>
              alert('Data gagal diubah');
              document.location.href = 'adm-admin.php';
              </script>
          ";
  }
}

if( isset($_POST['hapus-adm'])) {
  if( hapus_adm($id) > 0 ) {
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
}

// TAMBAH DATA PEMBIMBING //
if( isset($_POST['submit-pm'])) {

    // cek berhasil
    if( tambah_pm($_POST) > 0) {
        echo "
                <script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'adm-admin.php';
                </script>
            ";
    } else {
        echo "
                <script>
                alert('Data gagal ditambahkan');
                document.location.href = 'adm-admin.php';
                </script>
            ";
    }
}

if( isset($_POST['edit-pm'])) {

  // cek berhasil
  if( ubah_pm($_POST) > 0) {
      echo "
              <script>
              alert('Data berhasil diubah');
              document.location.href = 'adm-admin.php';
              </script>
          ";
  } else {
      echo "
              <script>
              alert('Data gagal diubah');
              document.location.href = 'adm-admin.php';
              </script>
          ";
  }
}

if( isset($_POST['hapus-pm'])) {
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
}

// TAMBAH DATA PENGURUS //
if( isset($_POST['submit-pn'])) {

  // cek berhasil
  if( tambah_pn($_POST) > 0) {
      echo "
              <script>
              alert('Data berhasil ditambahkan');
              document.location.href = 'adm-admin.php';
              </script>
          ";
  } else {
      echo "
              <script>
              alert('Data gagal ditambahkan');
              document.location.href = 'adm-admin.php';
              </script>
          ";
  }
}

if( isset($_POST['edit-pn'])) {

  // cek berhasil
  if( ubah_pn($_POST) > 0) {
      echo "
              <script>
              alert('Data berhasil diubah');
              document.location.href = 'adm-admin.php';
              </script>
          ";
  } else {
      echo "
              <script>
              alert('Data gagal diubah');
              document.location.href = 'adm-admin.php';
              </script>
          ";
  }
}

if( isset($_POST['hapus-pn'])) {
  if( hapus_pn($id) > 0 ) {
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
}

function ubah_pm() {
  global $conn;

  $id_pm = $_POST["id"];
  $nama_pm = htmlspecialchars($_POST["nama"]);
  $status_pm = htmlspecialchars($_POST["status"]);

  $query_pm = "UPDATE tb_pembimbing SET
              nama = '$nama_pm', status = '$status_pm' WHERE id = $id_pm";

  mysqli_query($conn, $query_pm);

  return mysqli_affected_rows($conn);
}

function ubah_adm() {
  global $conn;

  $id_adm = $_POST["id"];
  $nama_adm = htmlspecialchars($_POST["nama"]);
  $uname_adm = htmlspecialchars($_POST["username"]);
  $pw_adm = htmlspecialchars(md5($_POST["password"]));

  $query = "UPDATE tb_admin SET
              nama = '$nama_adm', username = '$uname_adm', password = '$pw_adm' WHERE id_admin = $id_adm";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function ubah_pn() {
  global $conn;

  $id_pn = $_POST["id"];
  $nama_pn = htmlspecialchars($_POST["nama"]);
  $status_pn = htmlspecialchars($_POST["status"]);

  $query_pn = "UPDATE tb_pengurus SET
              nama = '$nama_pn', status = '$status_pn' WHERE id = $id_pn";

  mysqli_query($conn, $query_pn);

  return mysqli_affected_rows($conn);
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="syle.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="asset/logo.ico.ico" type="image/x-icon">
   </head>
<body>
  <div class="sidebar open">
    <div class="logo-details">
      <i class='bx bxs-dashboard icon'></i>
        <div class="logo_name">Dashboard</div>
        <i class='bx bx-menu-alt-right' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="adm-jadwal.php">
          <i class='bx bxs-calendar-event' ></i>
          <span class="links_name">Jadwal</span>
        </a>
         <span class="tooltip">Jadwal</span>
      </li>
      <li>
        <a href="adm-berita.php">
          <i class='bx bxs-news' ></i>
          <span class="links_name">Berita</span>
        </a>
         <span class="tooltip">Berita</span>
      </li>
      <li>
       <a href="adm-prestasi.php">
         <i class='bx bxs-medal' ></i>
         <span class="links_name">Prestasi</span>
       </a>
       <span class="tooltip">Prestasi</span>
      </li>
      <li>
       <a href="adm-galeri.php">
         <i class='bx bx-images' ></i>
         <span class="links_name">Galeri</span>
       </a>
       <span class="tooltip">Galeri</span>
      </li>
      <li>
      <div class="icon-link">
        <a href="adm-admin.php">
          <i class='bx bx-user' ></i>
          <span class="links_name">Admin</span>
        </a>
        <i class='bx bxs-chevron-down arrow'></i>
        <span class="tooltip">Admin</span>
      </div>
      <ul class="sub-menu">
        <li><a href="#">Admin</a></li>
        <li><a href="#">Pembimbing</a></li>
        <li><a href="#">Pengurus</a></li>
      </ul>
      </li>
      <li class="profile">
        <div class="profile-details">
          <?php
          $fg = $_SESSION['username'];
          $er = query("SELECT * FROM tb_admin WHERE username = '$fg'");
          foreach ($er as $rt) : 
          ?>
           <img src="../foto/<?= $rt["foto"]; ?>">
          <?php 
          endforeach;
          ?>
           <div class="name_job">
            <?php
            $fg = $_SESSION['username'];
            $er = query("SELECT * FROM tb_admin WHERE username = '$fg'");
            foreach ($er as $rt) : 
            ?>
             <div class="name"><?= $rt["nama"]; ?></div>
            <?php 
            endforeach;
            ?>
             <div class="job"><?= $_SESSION['username']; ?></div>

           </div>
        </div>
         <a href="logout.php"><i class='bx bx-log-out btn' id="log_out" ></i></a>
      </li>
      <li>
       <a href="adm-anggota.php">
         <i class="fas fa-users" style="font-size: 22px;"></i>
         <span class="links_name">Anggota</span>
       </a>
       <span class="tooltip">Anggota</span>
      </li>
    </ul>
  </div>
  <section class="home-section">
      <div class="text">Admin</div>

    <!-- Edit data admin -->
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="popup" id="edit-adm">
        <div class="popup-content">
          <a class="closepopup" onclick="closepopupe_adm()">X</a>
          <div class="card-body1">
            <input type="hidden" class="form-control" placeholder="Masukkan ID..." name="id" id="id_adm" required><br>
            <label>Nama</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Nama..." name="nama" id="nama" required><br>
            <label>Username</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Username..." name="username" id="keterangan" required><br>
            <label>Password</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Password..." name="password" id="kelas" required><br>
            <input type="file" name="foto" id="foto">
            <hr/>
            <button class="btn" type="submit" name="edit-adm">Edit</button>
          </div>
        </div>
      </div>
    </form>

    <!-- Edit data pembimbing -->
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="popup" id="edit-pm">
        <div class="popup-content">
          <a class="closepopup" onclick="closepopupe_pm()">X</a>
          <div class="card-body1">
            <input type="hidden" class="form-control" placeholder="Masukkan ID..." name="id" id="id_pm" required><br>
            <label>Nama</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Nama..." name="nama" id="nama" required><br>
            <label>Status</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Status..." name="status" id="keterangan" required><br>
            <!-- <label>Username</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Username..." name="username" id="kelas" ><br>
            <label>Password</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Password...." name="password" ><br> -->
            <label>Foto</label><br>
            <input type="file" name="foto" id="foto" >
            <hr/>
            <button class="btn" type="submit" name="edit-pm">Edit</button>
          </div>
        </div>
      </div>
    </form>

    <!-- Edit data pengurus -->
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="popup" id="edit-pn">
        <div class="popup-content">
          <a class="closepopup" onclick="closepopupe_pn()">X</a>
          <div class="card-body1">
            <input type="hidden" class="form-control" placeholder="Masukkan ID..." name="id" id="id_pn" required><br>
            <label>Nama</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Nama..." name="nama" id="nama" required><br>
            <label>Status</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Status..." name="status" id="keterangan" required><br>
            <!-- <label>Username</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Username..." name="username" id="kelas" ><br>
            <label>Password</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Password...." name="password" ><br> -->
            <label>Foto</label><br>
            <input type="file" name="foto" id="foto">
            <hr/>
            <button class="btn" type="submit" name="edit-pn">Edit</button>
          </div>
        </div>
      </div>
    </form>

    <!-- Tambah Admin -->
    <form action="" method="post" enctype="multipart/form-data">
      <div class="popup" id="tambah-adm">
        <div class="popup-content">
          <a class="closepopup" onclick="closepopupt_adm()">X</a>
          <div class="card-body1">
            <label>Nama</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Nama..." name="nama" id="nama" required><br>
            <label>Username</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Username..." name="username" id="keterangan" required><br>
            <label>Password</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Password..." name="password" id="kelas" required><br>
            <input type="file" name="foto" id="foto" required>
            <hr/>
            <button class="btn" type="submit" name="submit-adm">Submit</button>
          </div>
        </div>
      </div>
    </form>

    <!-- Tambah Pembimbing -->
    <form action="" method="post" enctype="multipart/form-data">
      <div class="popup" id="tambah-pm">
        <div class="popup-content">
          <a class="closepopup" onclick="closepopupt_pm()">X</a>
          <div class="card-body1">
            <label>Nama</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Nama..." name="nama" id="nama" required><br>
            <label>Status</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Status..." name="status" id="keterangan" required><br>
            <label>Username</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Ussername..." name="username" id="kelas" required><br>
            <label>Password</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Password...." name="password" required><br>
            <label>Foto</label><br>
            <input type="file" name="foto" id="foto" required>
            <hr/>
            <button class="btn" type="submit" name="submit-pm">Submit</button>
          </div>
        </div>
      </div>
    </form>

    <!-- Tambah Pengurus -->
    <form action="" method="post" enctype="multipart/form-data">
      <div class="popup" id="tambah-pn">
        <div class="popup-content">
          <a class="closepopup" onclick="closepopupt_pn()">X</a>
          <div class="card-body1">
            <label>Nama</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Nama..." name="nama" id="nama" required><br>
            <label>Status</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Status..." name="status" id="keterangan" required><br>
            <label>Username</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Username..." name="username" id="kelas" required><br>
            <label>Password</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Password...." name="password" required><br>
            <label>Foto</label><br>
            <input type="file" name="foto" id="foto" required>
            <hr/>
            <button class="btn" type="submit" name="submit-pn">Submit</button>
          </div>
        </div>
      </div>
    </form>

      <div style="display: flex; width: 95%; justify-content: space-between; margin: auto; margin-bottom: 1.5em; margin-top: 2em;">
        <div style="display: flex; gap: 20px;">
          <h3 class="table-title-pm">Admin</h3>
          <button class="tbh tbh-adm" onclick="openpopupt_adm()">Tambah</button>
        </div>
        <form action="" method="POST" class="search">
          <div class="search-box">
            <a href="" class="refresh"><i class="fas fa-sync-alt"></i></a>
            <button class="btn-search" name="cari-adm"><i class="fas fa-search"></i></button>
            <input type="text" class="input-search" placeholder="Type to Search..." name="keyword-adm" autocomplete="off">
          </div>
        </form>
      </div>
      <div>
        <div class="table_responsive">
          <table>
            <thead>
              <tr>
                <th>Admin ID</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Foto</th>
                <th>Action</th>
              </tr>
            </thead>
      
            <tbody>

              <?php $i = 1;?>
              <?php foreach( $admin as $row ) : ?>
              
              <tr>
                <td><?= $row["id_admin"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["username"]; ?></td>
                <td><?= $row["password"]; ?></td>
                <td><img src="../foto/<?= $row["foto"]; ?>" alt=""></td>
                <td>
                  <span class="action_btn">
                    <a onclick="openpopupe_adm(<?= $row["id_admin"]; ?>)"><i class="bx bx-edit"></i></a>
                    <a href="delete-admin.php?id=<?= $row["id_admin"]; ?>" name="hapus-adm"><i class="bx bx-trash"></i></a>
                  </span>
                </td>
              </tr>
      
              <?php $i++; ?>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
      </div>

      <div style="display: flex; width: 95%; justify-content: space-between; margin: auto; margin-bottom: 1.5em; margin-top: 2em;">
        <div style="display: flex; gap: 20px;">
          <h3 class="table-title-pm">Pembimbing</h3>
          <button class="tbh tbh-adm" onclick="openpopupt_pm()">Tambah</button>
        </div>
        <form action="" method="POST" class="search">
          <div class="search-box">
          <a href="" class="refresh"><i class="fas fa-sync-alt"></i></a>
            <button class="btn-search" name="cari-pm"><i class="fas fa-search"></i></button>
            <input type="text" class="input-search" placeholder="Type to Search..." name="keyword-pm" autocomplete="off">
          </div>
        </form>
      </div>
      <div>
        <div class="table_responsive">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Foto</th>
                <th>Action</th>
              </tr>
            </thead>
      
            <tbody>

              <?php $i = 1;?>
              <?php foreach( $pembimbing as $row ) : ?>
              
              <tr>
                <td><?= $row["id"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["status"]; ?></td>
                <td><img src="../foto/<?= $row["foto"]; ?>" alt=""></td>
                <td>
                  <span class="action_btn">
                    <a onclick="openpopupe_pm(<?= $row["id"]; ?>)"><i class="bx bx-edit"></i></a>
                    <a href="delete-pembimbing.php?id=<?= $row["id"]; ?>" name="hapus"><i class="bx bx-trash"></i></a>
                  </span>
                </td>
              </tr>
      
              <?php $i++; ?>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
      </div>
      
      <div style="display: flex; width: 95%; justify-content: space-between; margin: auto; margin-bottom: 1.5em; margin-top: 2em;">
        <div style="display: flex; gap: 20px;">
          <h3 class="table-title-pm">Pengurus</h3>
          <button class="tbh tbh-adm" onclick="openpopupt_pn()">Tambah</button>
        </div>
        <form action="" method="POST" class="search">
          <div class="search-box">
          <a href="" class="refresh"><i class="fas fa-sync-alt"></i></a>
            <button class="btn-search" name="cari-pn"><i class="fas fa-search"></i></button>
            <input type="text" class="input-search" placeholder="Type to Search..." name="keyword-pn" autocomplete="off">
          </div>
        </form>
      </div>
      <div>
        <div class="table_responsive">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Foto</th>
                <th>Action</th>
              </tr>
            </thead>
      
            <tbody>

              <?php $i = 1;?>
              <?php foreach( $pengurus as $row ) : ?>
              
              <tr>
                <td><?= $row["id"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["status"]; ?></td>
                <td><img src="../foto/<?= $row["foto"]; ?>" alt=""></td>
                <td>
                  <span class="action_btn">
                    <a onclick="openpopupe_pn(<?= $row["id"]; ?>)"><i class="bx bx-edit"></i></a>
                    <a href="delete-pengurus.php?id=<?= $row["id"]; ?>" name="hapus"><i class="bx bx-trash"></i></a>
                  </span>
                </td>
              </tr>
      
              <?php $i++; ?>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
      </div>
  </section>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");

  function openpopupt_adm(){
    document.getElementById("tambah-adm").style.display = "block";
  }
  function closepopupt_adm(){
    document.getElementById("tambah-adm").style.display = "none";
  }
  function openpopupe_adm(id, nama){
    document.getElementById('id_adm').value=id;
    document.getElementById("edit-adm").style.display = "block";
  }
  function closepopupe_adm(){
    document.getElementById("edit-adm").style.display = "none";
  }

  function openpopupt_pm(){
    document.getElementById("tambah-pm").style.display = "block";
  }
  function closepopupt_pm(){
    document.getElementById("tambah-pm").style.display = "none";
  }
  function openpopupe_pm(id){
    document.getElementById('id_pm').value=id;
    document.getElementById("edit-pm").style.display = "block";
  }
  function closepopupe_pm(){
    document.getElementById("edit-pm").style.display = "none";
  }

  function openpopupt_pn(){
    document.getElementById("tambah-pn").style.display = "block";
  }
  function closepopupt_pn(){
    document.getElementById("tambah-pn").style.display = "none";
  }
  function openpopupe_pn(id){
    document.getElementById('id_pn').value=id;
    document.getElementById("edit-pn").style.display = "block";
  }
  function closepopupe_pn(){
    document.getElementById("edit-pn").style.display = "none";
  }

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();
  });

  function menuBtnChange() {
   if(sidebar.classList.contains("sidebar")){
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu-alt-left");
   }else {
     closeBtn.classList.replace("bx-menu-alt-left","bx-menu-alt-right");
   }
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu-alt-left", "bx-menu-alt-right");
   }else {
     closeBtn.classList.replace("bx-menu-alt-right", "bx-menu-alt-left");
   }
  }

  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;
   arrowParent.classList.toggle("showMenu");
    });
  }
  </script>
</body>
</html>
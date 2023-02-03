<?php
session_start();
include 'fun-admin.php';
$berita = query("SELECT * FROM tb_berita");

// CARI
if( isset($_POST["cari-br"]) ) {
  $berita = cari_br($_POST["keyword-br"]);
}

// Tambah data Berita
if( isset($_POST['tambah'])) {

  // cek berhasil
  if( tambah_br($_POST) > 0) {
      echo "
              <script>
              alert('Data berhasil ditambahkan');
              document.location.href = 'adm-berita.php';
              </script>
          ";
  } else {
      echo "
              <script>
              alert('Data gagal ditambahkan');
              document.location.href = 'adm-berita.php';
              </script>
          ";
  }
}

// Edit berita
if( isset($_POST['edit'])) {

  // cek berhasil
  if( ubah_br($_POST) > 0) {
      echo "
              <script>
              alert('Data berhasil diubah');
              document.location.href = 'adm-berita.php';
              </script>
          ";
  } else {
      echo "
              <script>
              alert('Data gagal diubah');
              document.location.href = 'adm-berita.php';
              </script>
          ";
  }
}

if( isset($_POST['hapus'])) {
if( hapus_br($id) > 0 ) {
  echo "
              <script>
              alert('Data berhasil dihapus');
              document.location.href = 'indexx.php';
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
    <link rel="shortcut icon" href="../asset/logo.ico.ico" type="image/x-icon">
   </head>
<body>
  <div class="sidebar open">
    <div class="logo-details">
      <i class='bx bxs-dashboard icon'></i>
        <div class="logo_name">Dashboard</div>
        <i class='bx bx-menu' id="btn" ></i>
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
      <div class="text">Berita</div>
      <div style="display: flex; justify-content: space-between; width: 95%; margin: 2em auto;">
      <button class="tbh" style="margin: 0;" onclick="openpopupt()">Tambah</button>
      <form action="" method="POST" class="search">
          <div class="search-box">
            
          <a href="" class="refresh"><i class="fas fa-sync-alt"></i></a>
            <button class="btn-search" name="cari-br"><i class="fas fa-search"></i></button>
            <input type="text" class="input-search" placeholder="Type to Search..." name="keyword-br" autocomplete="off">
          </div>
      </form>
      </div>

    

    <form action="" method="post" enctype="multipart/form-data">
      <div class="popup" id="tambah">
        <div class="popup-content">
          <a class="closepopup" onclick="closepopupt()">X</a>
          <div class="card-body1">
            <label>Nama</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Nama..." name="nama" id="nama" required><br>
            <label>Keterangan</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Keterangan..." name="keterangan" id="keterangan" required><br>
            <label>Kategori</label><br>
            <input type="text" class="form-control" placeholder="Masukkan Kategori..." name="kategori" id="kelas" required><br>
            <label>Tanggal</label><br>
            <input type="date" class="form-control" placeholder="Masukkan Tanggal...." name="tanggal" required><br>
            <label>Foto</label><br>
            <input type="file" name="foto" id="foto" required>
            <hr/>
            <button class="btn" type="submit" name="tambah">Submit</button>
          </div>
        </div>
      </div>
    </form>

      <div>
        <div class="table_responsive">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Foto</th>
                <th>Action</th>
              </tr>
            </thead>
      
            <tbody>

              <?php $i = 1;?>
              <?php foreach( $berita as $row ) : ?>
              
              <tr>
                <td><?= $row["id"]; ?></td>
                <td><?= $row["judul"]; ?></td>
                <td><?= $row["kategori"]; ?></td>
                <td class="ktg"><?= $row["keterangan"]; ?></td>
                <td><?= $row["tanggal"]; ?></td>
                <td><img src="../foto/<?= $row["foto"]; ?>" alt=""></td>
                <td>
                  <span class="action_btn">
                    <a onclick="openpopupe(<?= $row["id"]; ?>)"><i class="bx bx-edit"></i></a>
                    <a href="delete-berita.php?id=<?= $row["id"]; ?>" name="hapus"><i class="bx bx-trash"></i></a>
                  </span>
                </td>
              </tr>
                
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="popup" id="edit">
                  <div class="popup-content">
                    <a class="closepopup" onclick="closepopupe()">X</a>
                    <div class="card-body1">
                      <label>id</label><br>
                      <input type="text" class="form-control" name="id_berita" id="id_berita" value="" required disabled><br>
                      <label>Nama</label><br>
                      <input type="text" class="form-control" placeholder="Masukkan Nama..." name="nama" id="nama" required><br>
                      <label>Keterangan</label><br>
                      <input type="text" class="form-control" placeholder="Masukkan Keterangan..." name="keterangan" id="kelas" required><br>
                      <label>Kategori</label><br>
                      <input type="text" class="form-control" placeholder="Masukkan Kategori..." name="kategori" id="kelas" required><br>
                      <label>Tanggal</label><br>
                      <input type="date" class="form-control" placeholder="Masukkan Tanggal...." name="tanggal" required>
                      <label>Foto</label><br>
                      <input type="file" name="foto" id="foto" required>
                      <hr/>
                      <button type="submit" name="edit"><a class="btn" >Edit</a></button>
                    </div>
                  </div>
                </div>
              </form>

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

  function openpopupt(){
    document.getElementById("tambah").style.display = "block";
  }
  function closepopupt(){
    document.getElementById("tambah").style.display = "none";
  }

  function openpopupe(id){
    document.getElementById("edit").style.display = "block";
    document.getElementById("id_berita").value = id;
  }
  function closepopupe(){
    document.getElementById("edit").style.display = "none";
  }

  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();
  });

  function menuBtnChange() {
   if(sidebar.classList.contains("sidebar")){
     closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
   }else {
     closeBtn.classList.replace("bx-menu","bx-menu-alt-right");
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
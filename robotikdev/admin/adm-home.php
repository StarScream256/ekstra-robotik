<?php
session_start();
include 'fun-admin.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="admin.css">
    <title>Admin</title>
    <link rel="shortcut icon" href="../asset/logo.ico.ico" type="image/x-icon">
</head>
<body>
    <div class="home">
        <div class="home-wrapper">
            <div class="content-title">
                <div class="content-title-wrap">
                    
                    <div class="content-title-main">
                        <?php
                        $fg = $_SESSION['username'];
                        $er = query("SELECT * FROM tb_admin WHERE username = '$fg'");
                        foreach ($er as $rt) : 
                        ?>
                        <img src="../foto/<?= $rt["foto"]; ?>" alt=""  style="width: 100px;height: 100px; margin-right: 30px; border-radius: 50%;">
                        <?php 
                        endforeach;
                        ?>
                        <p class="">W </p>
                        <p class="">e </p>
                        <p class="">l </p>
                        <p class="">c </p>
                        <p class="">o </p>
                        <p class="">m </p>
                        <p class="">e,</p>
                        <?php
                        $fg = $_SESSION['username'];
                        $er = query("SELECT * FROM tb_admin WHERE username = '$fg'");
                        foreach ($er as $rt) : 
                        ?>
                        <p class="admin-name"><?= $rt["nama"]; ?></p>
                        <?php 
                        endforeach;
                        ?>
                    </div>
                </div>
                <a href="logout.php" class="card-logout">
                    <i class="fas fa-sign-out-alt logout-icon"></i>
                    <p class="logout-title">Log out</p>
                </a>
            </div>
            <div class="content">
                <a class="maincard jadwal-card" href="adm-jadwal.php">
                    <i class="fas fa-calendar-day card-icon"></i>
                    <p class="card-title">Jadwal</p>
                </a>
                <a class="maincard berita-card" href="adm-berita.php">
                    <i class="far fa-newspaper card-icon"></i>
                    <p class="card-title">Berita</p>
                </a>
                <a class="maincard pres-card" href="adm-prestasi.php">
                    <i class="fas fa-medal card-icon"></i>
                    <p class="card-title">Prestasi</p>
                </a>
            </div>
            <div class="content">
                <a class="maincard galeri-card" href="adm-galeri.php">
                    <i class="fas fa-images card-icon"></i>
                    <p class="card-title">Galeri</p>
                </a>
                <a class="maincard admin-card" href="adm-admin.php">
                    <i class="fas fa-user-cog card-icon"></i>
                    <p class="card-title">Admin</p>
                </a>
                <a class="maincard agt-card" href="adm-anggota.php">
                    <i class="fas fa-users card-icon"></i>
                    <p class="card-title">Anggota</p>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    require 'login/function.php';
    $prestasi = query("SELECT * FROM tb_prestasi ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- Css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="index.css">

    <!-- js -->
    <script src="js/main.js"></script>
</head>
<body>
    <nav class="">
        <div class="logo">
            <img class="logo-img" src="asset/1661611491162.png">
            <div class="logo-title">
                <div class="logo-title2">SMK NEGERI 1</div>
                <div class="logo-title1">BANTUL</div>
            </div>
        </div>
        <div style="height: 40px; display: flex;">
            <ul class="nav-links" style="margin-bottom: 0px;">
                <li class="center"><a href="index.php">Home</a></li>
            </ul>
            <a class="btn btn-primary-gradient" href="login/login.php" role="button" id="login1">Login</a>
        </div>
        
    </nav>

    <div class="container-xxl py-5" id="feature">
        <div class="container py-5 px-lg-5">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="text-primary-gradient fw-medium">Daftar</h5>
                <h1 class="mb-5" style="color: white;">Prestasi</h1>
            </div>
            <div class="row g-4">
                
                <?php $i = 1;?>
                <?php foreach( $prestasi as $row ) : ?>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="feature-item bg-light rounded p-4">
                        <img src="foto/<?= $row["foto"]; ?>" alt="" class="pres-all-foto">
                        <!-- <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle mb-4" style="width: 60px; height: 60px;">
                            <i class="fa fa-medal text-white fs-4"></i>
                        </div> -->
                        <h5 class="mb-3"><b><?= $row["judul"]; ?></b></h5>
                        <p class="m-0"><?= $row["keterangan"]; ?></p>
                    </div>
                </div>
                
                <?php $i++; ?>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</body>
</html>
<?php
    require 'login/function.php';
    $prestasi = query("SELECT * FROM tb_prestasi");
    $anggota = query("SELECT * FROM tb_anggota");
    $pengurus = query("SELECT * FROM tb_pengurus");
    $pembimbing = query("SELECT * FROM tb_pembimbing");
    $gallery = query("SELECT * FROM tb_gallery");
    $berita = query("SELECT * FROM tb_berita ORDER BY id DESC LIMIT 2");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Jost:wght@500;600;700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nova+Square&display=swap" rel="stylesheet">
    
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <title>Robotika</title>
    <link rel="shortcut icon" href="asset/logo.ico.ico" type="image/x-icon">

    <link rel="stylesheet" href="index.css">

</head>
<body>
    <!-- Start Home -->
    <div class="home parallax">
        <div class="homex"></div>
        <nav class="">
            <div class="logo">
                <img class="logo-img" src="asset/1661611491162.png">
                <div class="logo-title">
                    <div class="logo-title2">SMK NEGERI 1</div>
                    <div class="logo-title1">BANTUL</div>
                </div>
            </div>
            <ul class="nav-links" style="margin-bottom: 0px;" id="navbarCollapse">
                <li class="center"><a href="#">Home</a></li>
                <li class="center"><a href="#about">About</a></li>
                <li class="center"><a href="#prestasi">Prestasi</a></li>
                <li class="center"><a href="#gallery">Gallery</a></li>
                <li class="center"><a href="#profile">Profile</a></li>

                <a class="btn btn-primary-gradient" href="login/login.php" role="button" id="login1">Login</a>
            </ul>
            
            <div class="navbar-toggler">
                <input type="checkbox">
                <span class=""></span>
                <span class=""></span>
                <span class=""></span>
            </div>
        </nav>
        <!-- navbar responsive end -->

        <div class="content">
            <div class="content-sub">
                <div class="content-sub-sub">
                    <div class="content-title">
                        <!-- <h1 class="content-title2 text-primary-gradient">A Walking<br>Work of Art</h1> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Home -->

    <!-- About start -->
    <div class="parallax" id="about">
        <div class="container py-5 px-lg-5">
            <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="text-primary-gradient" style="color: white;">TENTANG</h1>
                <div class="about-underline"></div>
            </div>
            <div class="about-top-wrapper">

                <!-- berita -->
                <div class="berita wow fadeInUp" data-wow-delay="0.1s">
                    <div class="berita-title">
                        <h4 class="text-primary-gradient">Berita Terkini</h4>
                    </div>
                    <div class="berita-wrapper-content">

                    <?php $i = 1;?>
                    <?php foreach( $berita as $row ) : ?>

                        <div class="berita-content">
                            <div class="berita-content-bg">
                                <img src="foto/<?= $row["foto"]; ?>" alt="">
                                <div class="berita-content-sub">
                                    <?= $row["judul"]; ?>
                                    <a href="berita.php" class="baca">Baca selengkapnya</a>
                                </div>
                            </div>
                        </div>

                    <?php $i++; ?>
                    <?php endforeach; ?>
                        
                    </div>
                </div>

                <!-- jadwal -->
                <div class="jadwal wow fadeInUp" data-wow-delay="0.1s">
                    <div class="jadwal-title">
                        <h4 class="text-primary-gradient">Jadwal Kegiatan</h4>
                        <!-- <div class="berita-underline"></div> -->
                    </div>
                    <?php
                    $jadwal_hari = query("SELECT hari FROM tb_jadwal ORDER BY id DESC LIMIT 1");
                    foreach ($jadwal_hari as $row):
                    ?>
                    <div class="jadwal-wrapper-content">
                        <h3 class="jadwal-hari" ><?= $row["hari"]; ?></h3>
                        <?php
                        $jadwal_jam = query("SELECT jam FROM tb_jadwal ORDER BY id DESC LIMIT 1");
                        foreach ($jadwal_jam as $jam):
                        ?>
                        <div class="jadwal-jam">
                            <p><?= $jam["jam"]; ?></p>
                        </div>
                        <?php
                        endforeach
                        ?>
                    </div>
                    <?php
                    endforeach
                    ?>
                </div>
            </div>

            <!--visi misi tujuan  -->
            <div class="row gy-5 gx-4 justify-content-center about-content">

                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s" >
                    <div class="position-relative pt-5 pb-4 px-4 vmt-card">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-eye fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4 mb-3"><b>Visi</b></h5>
                        <p class="mb-0">Mewujudkan generasi siswa SMK Negeri 1 Bantul yang unggul, berintelektual dan terbuka namun tetap kritis dengan teknologi.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="position-relative pt-5 pb-4 px-4 vmt-card">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary-gradient rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-check fa-3x text-white"></i>
                        </div>
                        <h5 class="mt-4 mb-3"><b>Misi</b></h5>
                        <p class="mb-0">
                            <ul  style="text-align: left;">
                                <li>Mengembangkan kreatifitas dan imajinasi siswa.</li>
                                <li>Melatih kekompakan dan kerjasama dalam kelompok</li>
                                <li>Mengikuti kompetisi Robotika</li>
                            </ul>
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="position-relative pt-5 pb-4 px-4 vmt-card">
                        <div class="d-inline-flex align-items-center justify-content-center bg-secondary-gradient rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                            <i class="fa fa-address-card fa-3x fa-thumbtack" style="color: white;"></i>
                        </div>
                        <h5 class="mt-4 mb-3"><b>Tujuan</b></h5>
                        <p class="mb-0">Ekstrakurikuler Robotik bertujan untuk memberikan bekal kepada siswa di masa mendatang dengan pengetahuan keterampilan dasar tentang dunia robotik.</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- About end -->

    <!-- Prestasi start -->
    <div class="" id="prestasi">
        <div class="container py-5 px-lg-10" style="width: 100%;">
            <div class="row g-5 align-items-center prestasi-wrapper">
                <div class="col-lg-6 wow fadeInUp prestasi-content" data-wow-delay="0.1s">
                    <h1 class="text-primary-gradient" style="color: black;">PRESTASI</h1>
                    <div class="prestasi-underline"></div>
                    
                    <!-- Mobile Image Swiper -->
                    <div class="swiper pres-mob-swiper">
                        <div class="swiper-wrapper pres-mob-wrap">

                            <?php $i = 1;?>
                            <?php foreach( $prestasi as $row ) : ?>

                            <div class="swiper-slide pres-mob-slide">
                                <img src="foto/<?= $row["foto"]; ?>" alt="">
                            </div>

                            <?php $i++; ?>
                            <?php endforeach; ?>

                        </div>
                    </div>

                    <p class="">Sejak pertama kali dibentuk pada, ekstrakurikuler Robotika SMK Negeri 1 Bantul telah mendapatkan berbagai gelar kejuaraan bergengsi, baik di tingkat Daerah maupun Nasional</p>
                    <div class="row g-4 mb-4" style="display: flex;">
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex">
                                <i class="fa fa-medal fa-2x text-primary-gradient flex-shrink-0 mt-1"></i>
                                <div class="ms-3">
                                    <h2 class="mb-0" data-toggle="counter-up" style="color: black;">10</h2>
                                    <p class="text-primary-gradient mb-0" style="color: black;">Tingkat Provinsi</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 wow fadeIn" data-wow-delay="0.4s">
                            <div class="d-flex">
                                <i class="fa fa-trophy fa-2x text-secondary-gradient flex-shrink-0 mt-1"></i>
                                <div class="ms-3">
                                    <h2 class="mb-0" data-toggle="counter-up" style="color: black;">3</h2>
                                    <p class="text-secondary-gradient mb-0" style="color: white;">Tingkat Nasional</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <a href="prestasi-all.php" class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill mt-3">Lihat Semua Prestasi</a>  
                </div>
                    <!-- foto prestasi -->
                <div class="swiper pres-swiper wow fadeInUp" data-wow-delay="0.1s">
                    <div class="swiper-wrapper pres-swiper-wrapper">

                        <?php $i = 1;?>
                        <?php foreach( $prestasi as $row ) : ?>

                        <div class="swiper-slide pres-swiper-slide">
                            <img src="foto/<?= $row["foto"]; ?>" alt="" class="swiper-img pres-swiper-img"></div>
                        
                        <?php $i++; ?>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Prestasi end -->

    <!-- Gallery start -->
    <div class="swiper-container" id="gallery">
        <div class="mb-1 swiper-title wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="text-primary-gradient">GALLERY</h1>
            <div class="gallery-underline"></div>
        </div>
        <div class="swiper gallery-swiper wow fadeInUp" data-wow-delay="0.1s">
            <div class="swiper-wrapper gallery-swiper-wrapper">

                <?php $i = 1;?>
                <?php foreach( $gallery as $row ) : ?>

                <div class="swiper-slide gallery-swiper-slide">
                    <div class="swiper-img gallery-swiper-img">
                        <img src="foto/<?= $row["foto"]; ?>" alt="">
                        <p class="gallery-img-caption"><?= $row["keterangan"]; ?></p>
                    </div>
                </div>

                <?php $i++; ?>
                <?php endforeach; ?>

            </div>
          
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <!-- Gallery end -->

    <!-- Profil start -->
    <section id="profile">

        <div class="profile-title">
            <h1 class="text-primary-gradient">PROFIL</h1>
        </div>
        <div class="profil-underline"></div>

        <div class="container-big">

            <!-- Pembimbing -->
            <div class="container-pro dahlah container-pemb">
                <h4 class="text-primary-gradient">Pembimbing</h4>
                <div class="content-pro">

                <?php $i = 1;?>
                <?php foreach( $pembimbing as $row ) : ?>

                    <div class="card-pro">
                        <div class="card-content-pro">
                            <div class="img-pro">
                                <!-- <img src="asset/img/features-1.jpg" alt="" class="img-content"> -->
                            </div>
                            <div class="media-icons">
                                <i class="fab fa-facebook"></i>
                                <i class="fab fa-instagram"></i>
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div class="name-pro">
                                <span class="name-org"><?= $row["nama"]; ?></span>
                                <span class="desc-org"><?= $row["status"]; ?></span>
                            </div>
                        </div>
                    </div>

                <?php $i++; ?>
                <?php endforeach; ?>
                </div>

            </div>

            <!-- Pengurus -->
            <div class="swiper mySwiper container-pro dahlah">
            <h4 class="text-primary-gradient">Pengurus</h4>
                <div class="swiper-wrapper content-pro">

                <?php $i = 1;?>
                <?php foreach( $pengurus as $row ) : ?>

                    <div class="swiper-slide card-pro">
                        <div class="card-content-pro">
                            <div class="img-pro">
                                <!-- <img src="asset/img/features-1.jpg" alt="" class="img-content"> -->
                            </div>
                            <div class="media-icons">
                                <i class="fab fa-facebook"></i>
                                <i class="fab fa-instagram"></i>
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div class="name-pro">
                                <span class="name-org"><?= $row["nama"]; ?></span>
                                <span class="desc-org"><?= $row["status"]; ?></span>
                            </div>
                        </div>
                    </div>

                <?php $i++; ?>
                <?php endforeach; ?>
                </div> 

                <div class="swiper-button-next pro-nav"></div>
                <div class="swiper-button-prev pro-nav"></div>

            </div>

            <!-- Amggota -->
            <div class="swiper mySwiper container-pro dahlah">
            <h4 class="text-primary-gradient">Anggota</h4>
                <div class="swiper-wrapper content-pro">

                <?php $i = 1;?>
                <?php foreach( $anggota as $row ) : ?>

                    <div class="swiper-slide card-pro">
                        <div class="card-content-pro">
                            <div class="img-pro">
                                <!-- <img src="asset/img/features-1.jpg" alt="" class="img-content"> -->
                            </div>
                            <div class="media-icons">
                                <i class="fab fa-facebook"></i>
                                <i class="fab fa-instagram"></i>
                                <i class="fab fa-whatsapp"></i>
                            </div>
                            <div class="name-pro">
                                <span class="name-org"><?= $row["nama_agt"]; ?></span>
                                <span class="desc-org"><?= $row["kelas_agt"]; ?></span>
                            </div>
                        </div>
                    </div>

                <?php $i++; ?>
                <?php endforeach; ?>
                </div> 

                <div class="swiper-button-next pro-nav"></div>
                <div class="swiper-button-prev pro-nav"></div>

            </div>
        </div>
    </section>
    <!-- Profil end -->

    <!-- footer start -->
    <div class="footer-container">
        <div class="footer-wrapper">
        
            <div class="footer-item1">
                <div class="footer-image">
                    <img src="asset/1661611491162.png" alt="" class="footer-image-item1">
                    <img src="asset/logosmk.png" alt="" class="footer-image-item2">
                </div>
                <h3 class="mt-4 footer-item-title" style="color: rgba(248, 248, 255, 0.89);">ROBOTIKA</h3>
                <p class="footer-item-sub">"We're not going to rule the world, <br>We're just having fun."</p>
            </div>
            <div class="footer-group-item">
                <div class="footer-item2">
                    <h3 class="" style="color: white;">Navigation</h3>
                    <ul>
                        <li><a href="" style="color: rgba(248, 248, 255, 0.7);">Home</a></li>
                        <li><a href="#about" style="color: rgba(248, 248, 255, 0.7);">About</a></li>
                        <li><a href="#prestasi" style="color: rgba(248, 248, 255, 0.7);">Prestasi</a></li>
                        <li><a href="#gallery" style="color: rgba(248, 248, 255, 0.7);">Gallery</a></li>
                        <li><a href="#profile" style="color: rgba(248, 248, 255, 0.7);">Profile</a></li>
                    </ul>
                </div>
                <div class="footer-item3">
                    <h3 class="" style="color: white;">Contact Us</h3>
                    <ul>
                        <li><a href="mailto:smeanbtl@yahoo.com" style="color: rgba(248, 248, 255, 0.7);">e-Mail</a></li>
                        <li><a href="tel:0274367156" style="color: rgba(248, 248, 255, 0.7);">Telepon</a></li>
                    </ul>
                </div>
            </div>
            <div class="address">
                <h3 class="address-title" style="color: white;">Address</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.0532123097637!2d110.35340531421129!3d-7.889502080666534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7b00889ad8f84d%3A0x2e0009ca7815eaf0!2sSMK%20Negeri%201%20Bantul!5e0!3m2!1sid!2sid!4v1664673984257!5m2!1sid!2sid" class="address-map" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="footer-item4">
                <h3 class="" style="color: white;">Social</h3>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="https://twitter.com/bantul_smkn1"><i class="fab fa-twitter soclink"></i></a>
                    <a class="btn btn-outline-light btn-social" href="https://m.facebook.com/100063760491478/"><i class="fab fa-facebook-f soclink"></i></a>
                    <a class="btn btn-outline-light btn-social" href="https://instagram.com/smkn1bantul?igshid=YmMyMTA2M2Y="><i class="fab fa-instagram soclink"></i></a>
                    <a class="btn btn-outline-light btn-social" href="https://youtube.com/c/officialsmkn1bantul"><i class="fab fa-youtube soclink"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-end-wrapper">
            <div class="footer-end-line"></div>
            <div class="footer-end-item">
                <i class="fa fa-copyright"></i>
                <p> 2022 SMK Negeri 1 Bantul</p>
            </div>
        </div>
    </div>
    <!-- footer end -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up text-white"></i></a>
    </div>

        <!-- JAVASCRIPT -->

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

        <script>
            // prestasi swiper
            const pres = new Swiper('.pres-swiper', {
                autoplay: {
                    delay: 3000,
                    disablOnInteraction: false,
                },
                loop: true,

                navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
                },
            });

            // gallery slider
            const swiper = new Swiper('.swiper', {
                autoplay: {
                    delay: 3000,
                    disablOnInteraction: false,
                },
                loop: true,

                pagination: {
                el: '.swiper-pagination',
                clickable: true,
                },

                navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
                },
            });

            // profil slider
            var dahlah = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 0,
            slidesPerGroup: 1,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },
            });

            // navbar menu
            const menuToggle = document.querySelector('.navbar-toggler input');
            const nav = document.querySelector('.nav-links');

            menuToggle.addEventListener('click', function () {
                nav.classList.toggle('slide');
            });

            $(window).scroll(function () {
            if ($(window).scrollTop() > 70) {
                $(".home").addClass("blur");
            } else {
                $(".home").removeClass("blur");
            }
            });
        </script>
    
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
</body>
</html>

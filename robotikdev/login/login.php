<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

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
    
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">


    <link rel="stylesheet" href="login.css">

    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1 class="text-primary-gradient title">Login</h1>
            <form action="cek-login.php" method="POST">

                <div class="input-container">
                    <input type="text" name="username" id="label" required="required"/>
                    <label for="#label">Username</label>
                    <div class="bar"></div>
                </div>
                <div class="input-container bot">
                    <input type="password" name="password" id="label" required="required"/>
                    <label for="#label">Password</label>
                    <div class="bar"></div>
                </div>
                <div class="button-container">
                    <button type="submit"><span>Go</span></button>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>
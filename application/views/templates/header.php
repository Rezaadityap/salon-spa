<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?php echo base_url() ?>/assets/img/amberlee.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Oswald:wght@600&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url() ?>/assetss/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assetss/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url() ?>/assetss/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url() ?>/assetss/css/style.css" rel="stylesheet">
</head>
<body>
    
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="<?php echo base_url('welcome')?>" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="mb-0 text-primary text-uppercase"><i class="fa fa-spa me-3"></i><?php echo $title ?></h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?php echo base_url('welcome')?>" class="nav-item nav-link active">Home</a>
                <a href="<?php echo base_url('amberlee/about')?>" class="nav-item nav-link">Tentang kami</a>
                <a href="<?php echo base_url('amberlee/produk')?>" class="nav-item nav-link">Produk</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Lainnya</a>
                    <div class="dropdown-menu m-0">
                        <a href="<?php echo base_url('amberlee/harga')?>" class="dropdown-item">Daftar Harga</a>
                        <a href="<?php echo base_url('amberlee/tim')?>" class="dropdown-item">Team Kami</a>
                        <a href="<?php echo base_url('amberlee/JamKerja')?>" class="dropdown-item">Jam Kerja</a>
                    </div>
                </div>
                <a href="<?php echo base_url('amberlee/kontak')?>" class="nav-item nav-link">Kontak</a>
                <a href="<?php echo base_url('login')?>" class="nav-item nav-link">Login<i class="fas fa-sign-in-alt ms-3"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
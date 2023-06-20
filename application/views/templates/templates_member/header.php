
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php echo $amberlee ?></title>
        <!-- Favicon-->
        <link href="<?php echo base_url() ?>/assets/img/amberlee.png" rel="icon">
        <link href="<?php echo base_url() ?>/assets/img/amberlee.png" rel="amberlee">        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo base_url() ?>/assetss/shop/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="<?php echo base_url('member/dashboard')?>"><?php echo $amberlee ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo base_url('member/dashboard') ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url('member/tentangKami')?>">Tentang Kami</a></li>
                    </ul>  
                        <a class="btn btn-outline-dark" style="margin-right: 5px" href="<?php echo base_url('member/detailPesan/dataPesan')?>">
                            <i class="bi-cart-fill me-1"></i>
                            Pesanan 
                        </a>
                        <a class="btn btn-outline-danger ml-2"  onclick = "return confirm('Yakin ingin keluar?')" href="<?php echo base_url('login/logout')?>">
                            <i class="bi bi-box-arrow-right"></i>
                            Logout
                        </a>
                </div>
            </div>
        </nav>
        <!-- Header-->
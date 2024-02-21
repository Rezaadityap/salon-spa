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
    <link href="<?php echo base_url() ?>/assets/img/amberlee.png" rel="amberlee">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo base_url() ?>/assets/member/shop/css/styles.css" rel="stylesheet" />
    <!-- sweet alert -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/js/sweetalert2.min.css">
    <!-- Rateyo -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="<?php echo base_url('member/dashboard')?>"><?php echo $amberlee ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page"
                            href="<?php echo base_url('member/dashboard') ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('member/tentangKami')?>">Tentang
                            Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('member/profil')?>">Profil</a>
                    </li>
                </ul>
                <?php 
                            $keranjang = $this->cart->contents();
                            $jml_brg = 0;
                            foreach ($keranjang as $k){
                                $jml_brg = $jml_brg + $k['qty'];
                        } ?>
                <a class="btn btn-success" style="margin-right: 5px"
                    href="<?php echo base_url('member/pesan/keranjang')?>">
                    <i class="bi-cart-fill me-1"></i>
                    Keranjang <span class="badge badge-light"><?php echo $jml_brg ?></span>
                </a>
                <a class="btn btn-dark" style="margin-right: 5px"
                    href="<?php echo base_url('member/pesan/dataPesan')?>">
                    <i class="bi bi-bag-check-fill me-1"></i>
                    Pesanan
                </a>
                <a class="btn btn-danger ml-2 tombol-keluar" href="<?php echo base_url('login/logout')?>">
                    <i class="bi bi-box-arrow-right"></i>
                    Logout
                </a>
            </div>
        </div>
    </nav>
    <!-- Header-->
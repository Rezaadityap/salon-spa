<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>
        <?php echo $title ?>
    </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?php echo base_url() ?>/assets/img/amberlee.png" rel="icon">
    <link href="<?php echo base_url() ?>/assets/img/amberlee.png" rel="amberlee">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url() ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url() ?>/assets/css/style.css" rel="stylesheet">
    <!-- Sweet alert -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/js/sweetalert2.min.css">

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?php echo base_url('admin/dashboard') ?>" class="logo d-flex align-items-center">
                <img src="<?php echo base_url() ?>/assets/img/amberlee.png" alt="">
                <span class="d-none d-lg-block">Amberlee <sup>salon&spa</sup></span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown">
                    <?php
                    $notifikasi = $this->db->query("SELECT * FROM pesan WHERE status = 2")->num_rows();
                    $pesanan = $this->db->query("SELECT * FROM pesan, detail_pesan WHERE pesan.id_pesan = detail_pesan.id_pesan AND pesan.status = 2")->result();
                    ?>

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">
                            <?php echo $notifikasi ?>
                        </span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <?php if (empty($notifikasi)) { ?>
                            <li class="dropdown-header">
                                Tidak ada notifikasi!
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        <?php } else { ?>
                            <li class="dropdown-header">
                                ada
                                <?php echo $notifikasi ?> pesanan yang belum dibaca
                                <a href="<?php echo base_url('admin/pesanan') ?>"><span
                                        class="badge rounded-pill bg-primary p-2 ms-2">Lihat</span></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <?php foreach ($pesanan as $p): ?>
                                <li class="notification-item">
                                    <i class="bi bi-exclamation-circle text-warning"></i>
                                    <div>
                                        <h4>
                                            <?php echo $p->nama ?>
                                        </h4>
                                        <p>
                                            <?php echo $p->nama_treatment ?>
                                        </p>
                                        <p>
                                            <?php echo $p->tanggal ?>
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            <?php endforeach; ?>

                        <?php } ?>
                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="<?php echo base_url('assets/photo/') . $this->session->userdata('photo') ?>"
                            alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">Selamat Datang,
                            <?php echo $this->session->userdata('nama_karyawan') ?>
                        </span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>
                                <?php echo $this->session->userdata('nama_karyawan') ?>
                            </h6>
                            <span>Admin</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center"
                                href="<?php echo base_url('admin/profil') ?>">
                                <i class="bi bi-person"></i>
                                <span>Profil Saya</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center tombol-keluar"
                                href="<?php echo base_url('admin/login/logout') ?>">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="<?php echo base_url() ?>/assetss/img/salon.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center justify-content-center text-start">
                        <div class="mx-sm-5 px-5" style="max-width: 900px;">
                            <h1 class="display-2 text-white text-uppercase mb-4 animated slideInDown">Amberlee Salon & Spa</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="<?php echo base_url() ?>/assetss/img/salon.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center justify-content-center text-start">
                        <div class="mx-sm-5 px-5" style="max-width: 900px;">
                            <h1 class="display-2 text-white text-uppercase mb-4 animated slideInDown">Kami siap melayani anda</h1>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown"><i class="fa fa-map-marker-alt text-primary me-3"></i>Jl. Pakuncen, Ruko, Jl. Anggrek No.6, Sukaharja, Telukjambe Timur, Karawang, Jawa Barat 41361</h4>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown"><i class="fa fa-phone-alt text-primary me-3"></i>0815-8558-6085</h4>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- About Start -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid w-75 align-self-end" src="<?php echo base_url() ?>/assets/photo/produk/fullbody.jfif" alt="">
                        <div class="w-50 bg-secondary p-5" style="margin-top: -25%;">
                            <h1 class="text-uppercase text-primary mb-3">Grand Opening</h1>
                            <h2 class="text-uppercase mb-0">18 Februari 2023</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="d-inline-block bg-secondary text-primary py-1 px-4">Tentang Kami</p>
                    <h1 class="text-uppercase mb-4">Amberlee Salon & Spa</h1>
                    <p>Salon Kecantikan pada Amberlee beauty salon and spa merupakan suatu tempat yang meyediakan pelayanan jasa kecantikan.</p>
                    <p class="mb-4">Salon Kecantikan pada disini menangani beberapa pelayanan seperti Creambath, Hair spa, Body spa, Reflexi, Totok wajah, Facial glow, Acne, Detox, Menicure Pedicure dan lain sebagainya.</p>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h3 class="text-uppercase mb-3">Since 2023</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Service Start -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block bg-secondary text-primary py-1 px-4">Produk</p>
                <h1 class="text-uppercase">Produk kami</h1>
            </div>
            <div class="row">
            <?php foreach($treatment as $t) : ?>
                <div class="col-lg-4 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                        <div class="bg-dark d-flex flex-shrink-0 align-items-center" style="width: 60px; height: 60px;">
                            <img class="img-fluid" src="<?php echo base_url('assets/photo/produk/'.$t->photo) ?>" alt="">
                        </div>
                        <div class="ps-4">
                            <h3 class="text-uppercase mb-3"><?php echo $t->nama_treatment ?></h3>
                            <h5 class="text-uppercase mb-3"><?php echo $t->tipe ?></h5>
                            <p><?php echo $t->deskripsi ?></p>
                            <span class="text-uppercase text-primary">Rp. <?php echo number_format($t->harga,0,',','.') ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach ; ?>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->
<!-- Price Start -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-secondary h-100 d-flex flex-column justify-content-center p-5">
                        <p class="d-inline-flex bg-dark text-primary py-1 px-4 me-auto">Daftar Harga</p>
                        <h1 class="text-uppercase mb-4">Silahkan lihat daftar harga yang tertera</h1>
                        <div>
                            <?php foreach($treatment as $t) : ?>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <h6 class="text-uppercase mb-0"><?php echo $t->nama_treatment ?>&nbsp;<?php echo $t->tipe ?></h6>
                                <span class="text-uppercase text-primary">Rp. <?php echo number_format($t->harga,0,',','.') ?></span>
                            </div>
                            <?php endforeach ; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100">
                        <img class="img-fluid h-100" src="<?php echo base_url() ?>/assets/photo/harga.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Price End -->
     <!-- Team Start -->
 <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block bg-secondary text-primary py-1 px-4">Tim Kami</p>
                <h1 class="text-uppercase">Daftar Therapist</h1>
            </div>
            <div class="row g-4">
                <?php foreach($karyawan as $k) : ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid" src="<?php echo base_url().'assets/photo/'.$k->photo ?>" width="600px" height="300px" alt="">
                            <div class="team-social">
                                <a class="btn btn-square" href="https://id-id.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href="https://www.whatsapp.com/"><i class="fab fa-whatsapp"></i></a>
                                <a class="btn btn-square" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="bg-secondary text-center p-4">
                            <h5 class="text-uppercase"><?php echo $k->nama_karyawan ?></h5>
                            <span class="text-primary"><?php echo $k->nama_jabatan ?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach ; ?>
            </div>
        </div>
    </div>
    <!-- Team End -->
    <!-- Working Hours Start -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="h-100">
                        <img class="img-fluid h-100" src="<?php echo base_url() ?>/assets/photo/jam.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-secondary h-100 d-flex flex-column justify-content-center p-5">
                        <p class="d-inline-flex bg-dark text-primary py-1 px-4 me-auto">Jam Kerja</p>
                        <h1 class="text-uppercase mb-4">Jam Kerja Salon & Spa Amberlee </h1>
                        <div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <h6 class="text-uppercase mb-0">Senin</h6>
                                <span class="text-uppercase">09:00 WIB - 20:00 WIB</span>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <h6 class="text-uppercase mb-0">Selasa</h6>
                                <span class="text-uppercase">09:00 WIB - 20:00 WIB</span>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <h6 class="text-uppercase mb-0">Rabu</h6>
                                <span class="text-uppercase">09:00 WIB - 20:00 WIB</span>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <h6 class="text-uppercase mb-0">Kamis</h6>
                                <span class="text-uppercase">09:00 WIB - 20:00 WIB</span>
                            </div>
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <h6 class="text-uppercase mb-0">Jum'at</h6>
                                <span class="text-uppercase">09:00 WIB - 20:00 WIB</span>
                            </div>
                            <div class="d-flex justify-content-between py-2">
                                <h6 class="text-uppercase mb-0">Sabtu/Minggu</h6>
                                <span class="text-uppercase text-primary">08:00 WIB - 21:00 WIB</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Working Hours End -->
    
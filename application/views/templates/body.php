<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="<?php echo base_url() ?>/assets/member/img/salon.jpg" alt="Image">
                <div class="carousel-caption d-flex align-items-center justify-content-center text-start">
                    <div class="mx-sm-5 px-5" style="max-width: 900px;">
                        <h1 class="display-2 text-white text-uppercase mb-4 animated slideInDown">Amberlee Salon & Spa
                        </h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="<?php echo base_url() ?>/assetss/img/salon.jpg" alt="Image">
                <div class="carousel-caption d-flex align-items-center justify-content-center text-start">
                    <div class="mx-sm-5 px-5" style="max-width: 900px;">
                        <h1 class="display-2 text-white text-uppercase mb-4 animated slideInDown">Kami siap melayani
                            anda</h1>
                        <h4 class="text-white text-uppercase mb-4 animated slideInDown"><i
                                class="fa fa-map-marker-alt text-primary me-3"></i>Jl. Pakuncen, Ruko, Jl. Anggrek No.6,
                            Sukaharja, Telukjambe Timur, Karawang, Jawa Barat 41361</h4>
                        <h4 class="text-white text-uppercase mb-4 animated slideInDown"><i
                                class="fa fa-phone-alt text-primary me-3"></i>0815-8558-6085</h4>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
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
                    <img class="img-fluid w-75 align-self-end"
                        src="<?php echo base_url() ?>/assets/photo/produk/fullbody.jfif" alt="">
                    <div class="w-50 bg-secondary p-5" style="margin-top: -25%;">
                        <h1 class="text-uppercase text-primary mb-3">Grand Opening</h1>
                        <h2 class="text-uppercase mb-0">18 Februari 2023</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <p class="d-inline-block bg-secondary text-primary py-1 px-4">Tentang Kami</p>
                <h1 class="text-uppercase mb-4">Amberlee Salon & Spa</h1>
                <p>Salon Kecantikan pada Amberlee beauty salon and spa merupakan suatu tempat yang meyediakan pelayanan
                    jasa kecantikan.</p>
                <p class="mb-4">Salon Kecantikan pada disini menangani beberapa pelayanan seperti Creambath, Hair spa,
                    Body spa, Reflexi, Totok wajah, Facial glow, Acne, Detox, Menicure Pedicure dan lain sebagainya.</p>
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
<!-- Rating Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="d-inline-block bg-secondary text-primary py-1 px-4">Ulasan</p>
            <h1 class="text-uppercase">Rating dan Komentar</h1>
        </div>
        <?php foreach ($ulasan as $u): ?>
            <div class="row">
                <div class="col-lg-12 col-md-6 mb-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                        <div class="ps-4">
                            <h5>
                                <?php echo $u->nama ?>
                            </h5>
                            <h6>
                                <?php echo $u->nama_treatment ?>
                            </h6>
                            <p>
                                <?php echo $u->tipe ?>
                            </p>
                            <?php if ($u->nilai == '1') { ?>
                                <i class="bi bi-star-fill" style="color:yellow"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            <?php } ?>
                            <?php if ($u->nilai == '2') { ?>
                                <i class="bi bi-star-fill" style="color:yellow"></i>
                                <i class="bi bi-star-fill" style="color:yellow"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            <?php } ?>
                            <?php if ($u->nilai == '3') { ?>
                                <i class="bi bi-star-fill" style="color:yellow"></i>
                                <i class="bi bi-star-fill" style="color:yellow"></i>
                                <i class="bi bi-star-fill" style="color:yellow"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            <?php } ?>
                            <?php if ($u->nilai == '4') { ?>
                                <i class="bi bi-star-fill" style="color:yellow"></i>
                                <i class="bi bi-star-fill" style="color:yellow"></i>
                                <i class="bi bi-star-fill" style="color:yellow"></i>
                                <i class="bi bi-star-fill" style="color:yellow"></i>
                                <i class="bi bi-star-fill"></i>
                            <?php } ?>
                            <?php if ($u->nilai == '5') { ?>
                                <i class="bi bi-star-fill" style="color:yellow"></i>
                                <i class="bi bi-star-fill" style="color:yellow"></i>
                                <i class="bi bi-star-fill" style="color:yellow"></i>
                                <i class="bi bi-star-fill" style="color:yellow"></i>
                                <i class="bi bi-star-fill" style="color:yellow"></i>
                            <?php } ?>
                            <p>
                                <?php echo $u->komentar ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
<!-- Rating End -->
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
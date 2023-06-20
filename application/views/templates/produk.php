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
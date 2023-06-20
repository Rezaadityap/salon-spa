            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?php echo base_url() ?>/assetss/img/salon.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo base_url() ?>/assetss/img/salon.jpg" alt="Second slide">
                    </div>
                </div>
            </div>
        <!-- Section-->
        <section class="py-5">
            <div class="container">
            <?php echo $this->session->flashdata('pesan') ?>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
                    <?php foreach($produk as $p) : ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="<?php echo base_url('assets/photo/produk/'.$p->photo) ?>" style="width: 100%; height:200px">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $p->nama_treatment ?></h5>
                                    <h6><?php echo $p->tipe ?></h6>
                                    <!-- Product price-->
                                    Rp. <?php echo number_format($p->harga,0,',','.') ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="<?php echo base_url('member/dashboard/detail/').$p->id_treatment ?>">Lihat detail</a></div>
                                <?php 
                                    if($p->status == '0'){
                                        echo anchor('member/pesan/tambahPesan/'.$p->id_treatment,'<center><span class="btn btn-outline-success mt-2">Pesan</span></center>');
                                    } else {
                                        echo anchor('member/detailPesan/detail/'.$p->id_treatment,'<center><span class="btn btn-outline-warning mt-2">Detail Pembayaran</span></center>');
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ; ?>
                </div>
            </div>
        </section>
        

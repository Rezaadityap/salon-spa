<!-- Carousel -->
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
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4">
        <?php foreach($produk as $p) : ?>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Gambar produk -->
                    <img class="card-img-top" src="<?php echo base_url('assets/photo/produk/'.$p->photo) ?>" style="width: 100%; height:200px">
                    <!-- Tambah produk ke keranjang -->
                    <?php 
                        echo form_open ('member/pesan/add');
                        echo form_hidden('id',$p->id_treatment);
                        echo form_hidden('qty', 1);
                        echo form_hidden('price', $p->harga);
                        echo form_hidden('name', $p->nama_treatment);
                    ?>
                    <div class="card-body p-4" style="height: 150px">
                        <div class="text-center">
                            <!-- Nama & tipe produk-->
                            <h5 class="fw-bolder"><?php echo $p->nama_treatment ?></h5>
                            <h6><?php echo $p->tipe ?></h6>
                            <!-- Harga produk-->
                            Rp. <?php echo number_format($p->harga,0,',','.') ?>
                        </div>
                    </div>
                    <!-- Aksi -->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto mb-2" href="<?php echo base_url('member/dashboard/detail/').$p->id_treatment ?>">Lihat detail</a></div>
                        <div class="text-center"><button type="submit" class="btn btn-outline-success">Pesan</button></div>
                    </div>
                    <?php echo form_close() ; ?>
                </div>
            </div>
        <?php endforeach ; ?>
        </div>
    </div>
</section>
        

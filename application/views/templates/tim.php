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
                            <img class="img-fluid" src="<?php echo base_url().'assets/photo/'.$k->photo ?>" style="width: 100%; height: 300px" alt="">
                            <div class="team-social">
                                <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
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
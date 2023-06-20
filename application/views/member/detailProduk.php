<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-body">
            <div class="row">
            <?php foreach($detail as $d) : ?>
                <div class="col">
                    <center><img src="<?php echo base_url('assets/photo/produk/'.$d->photo)?>" style="width: 100%; height:310px"></center><br>
                </div>
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr><b><center><h4><?php echo $title ?></h4></center></b></tr>
                                <tr>
                                    <td><b>Nama Treatment </b></td>
                                    <td><?php echo $d->nama_treatment ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tipe </b></td>
                                    <td><?php echo $d->tipe ?></td>
                                </tr>
                                <tr>
                                    <td><b>Harga </b></td>
                                    <td>Rp. <?php echo number_format($d->harga,0,',','.') ?></td>
                                </tr>
                                <tr>
                                    <td><b>Deskripsi </b></td>
                                    <td><?php echo $d->deskripsi ?></td>
                                </tr>
                            </thead>
                        </table>
                        <?php 
                            if($d->status == '0'){
                                echo anchor('member/pesan/tambahPesan/'.$d->id_treatment,'<center><span class="btn btn-success mt-2">Pesan</span></center>');
                            } else {
                                echo anchor('member/detailPesan/detail/'.$d->id_treatment,'<center><span class="btn btn-warning mt-2">Detail Pembayaran</span></center>');
                            }
                        ?>
                        <center><a href="<?php echo base_url('member/dashboard')?>">
                            <button class="btn btn-secondary mt-2">Kembali</button>
                        </a></center>
                    </div>
                </div>
                <?php endforeach ; ?>
            </div>
        </div>
    </div>
</div>
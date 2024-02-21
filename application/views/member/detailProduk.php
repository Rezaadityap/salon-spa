<div class="container mt-5 mb-5">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <?php foreach($detail as $d) : ?>
                <div class="col">
                    <center><img class="img-fluid" src="<?php echo base_url('assets/photo/produk/'.$d->photo)?>"
                            style="width: 100%; height:310px"></center><br>
                </div>
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr><b>
                                        <center>
                                            <h4><?php echo $title ?></h4>
                                        </center>
                                    </b></tr>
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
                                <tr>
                            </thead>
                        </table>
                        <?php 
                            echo form_open ('member/pesan/add');
                            echo form_hidden('id',$d->id_treatment);
                            echo form_hidden('qty', 1);
                            echo form_hidden('price', $d->harga);
                            echo form_hidden('name', $d->nama_treatment);
                        ?>
                        <center>
                            <button type="submit" class="btn btn-primary mt-2 tombol-pesan"><i class="bi bi-cart">
                                    Pesan</i></button>
                            <a href="<?php echo base_url('member/dashboard')?>" class="btn btn-secondary mt-2">
                                Kembali</a>
                        </center>
                        <?php echo form_close() ; ?>
                    </div>
                </div>
                <?php endforeach ; ?>
            </div>
        </div>
    </div>
</div>
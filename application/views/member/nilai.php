<div class="container-fluid" style="margin-bottom: 100px">
    <!-- Card with header and footer -->
    <div class="card mt-2">
        <div class="card-header text-center">
            <b>
                <?php echo $title ?>
            </b>
        </div>
        <div class="card-body">
            <form action="<?php echo base_url('member/pesan/nilaiAksi') ?>" method="post">
                <?php foreach ($nilai as $d): ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <center><img class="img-fluid mt-4"
                                        src="<?php echo base_url() . 'assets/photo/produk/' . $d->photo ?>"
                                        width="200px">
                                </center>
                            </tr>
                            <tr>
                                <td><b>Nama Treatment </b></td>
                                <td>:</td>
                                <td>
                                    <?php echo $d->nama_treatment ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Tipe Treatment </b></td>
                                <td>:</td>
                                <td>
                                    <?php echo $d->tipe ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Nilai</b></td>
                                <td>:</td>
                                <td>
                                    <div id="rateYo"></div>
                                </td>
                                <input type="hidden" name="nilai" id="nilai">
                            </tr>
                            <tr>
                                <td><b>Komentar</b></td>
                                <td>:</td>
                                <td><textarea class="form-control" name="komentar" id="" cols="40s" rows="5"></textarea>
                                </td>
                                <input type="hidden" value="<?php echo $d->id_detail ?>" name="id_detail">
                                <input type="hidden" value="<?php echo $d->id_treatment ?>" name="id_treatment">
                            </tr>
                        </thead>
                    </table>
                </div>
        </div>
        <div class="card-footer text-center">
            <a href="<?php echo base_url('member/pesan/dataPesan')?>" class="btn btn-secondary"> Kembali</a>
            <button type="submit" class="btn btn-primary"> Kirim</button>
        </div>
        </form>
        <?php endforeach; ?>
    </div>
</div>
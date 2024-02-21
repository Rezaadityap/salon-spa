<div class="container" style="margin-bottom: 100px">
    <div class="card">
        <div class="card-body">
            <?php foreach ($cetak as $c): ?>
                <h5 class="card-title text-center">
                    <?php echo $title ?>
                </h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td><b>Nama Pemesan</b></td>
                                <td>:</td>
                                <td>
                                    <?php echo $c->nama ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Pesan</b></td>
                                <td>:</td>
                                <td>
                                    <?php echo $c->tanggal ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Jam Pesan </b></td>
                                <td>:</td>
                                <td>
                                    <?php echo $c->jam ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Tipe Pesan </b></td>
                                <td>:</td>
                                <td>
                                    <?php echo $c->tipe_pesan ?>
                                </td>
                                <?php if ($c->tipe_pesan == 'Homecare') { ?>
                                <tr>
                                    <td><b>Biaya Tambahan</b></td>
                                    <td>:</td>
                                    <td>Rp. 0</td>
                                </tr>
                            <?php } ?>
                            </tr>
                            <tr>
                                <td><b>Jumlah Pembayaran</b></td>
                                <td>:</td>
                                <td><b> Rp.
                                        <?php echo number_format((int) $c->total_bayar, 0, ',', '.') ?>
                                    </b></td>
                            </tr>
                            <tr>
                                <td><b>Status Pembayaran</b></td>
                                <td>:</td>
                                <td>
                                    <?php if ($c->status == '1') { ?>
                                        <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Belum
                                            Bayar</span>
                                    <?php } elseif ($c->status == '0') { ?>
                                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Pembayaran
                                            Sukses</span>
                                    <?php } else { ?>
                                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                                            Proses</span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: black"></td>
                                <td style="background-color: black"></td>
                                <td style="background-color: black"></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php foreach ($detail as $d): ?>
                            <tr>
                                <td><b>Nama Treatment</b></td>
                                <td>:</td>
                                <td>
                                    <?php echo $d->nama_treatment ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Tipe Treatment</b></td>
                                <td>:</td>
                                <td>
                                    <?php echo $d->tipe ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Harga</b></td>
                                <td>:</td>
                                <td><b> Rp.
                                        <?php echo number_format((int) $d->harga, 0, ',', '.') ?>
                                    </b></td>
                            </tr>
                            <tr>
                                <td style="background-color: black"></td>
                                <td style="background-color: black"></td>
                                <td style="background-color: black"></td>
                            </tr>
                        <?php endforeach; ?>
                    </thead>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <i class="bi bi-exclamation-triangle me-1"> Simpan invoice pembayaran anda, sebagai bukti!</i><br>
            <i class="bi bi-heart-fill mt-2"> Terimakasih sudah memesan.</i>
        </div>
    </div>
</div>
<script>
    window.print();
</script>
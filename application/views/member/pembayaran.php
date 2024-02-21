<div class="container mt-5 mb-5">
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>
    <div class="row">
        <div class="col-md-8">
            <?php foreach ($rincian as $r): ?>
                <div class="card">
                    <div class="card-header alert alert-primary text-center">
                        <b>Rincian Pesanan Anda</b>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Nama Pemesan</th>
                                <td>:</td>
                                <td>
                                    <?php echo $r->nama ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Tanggal Pesan</th>
                                <td>:</td>
                                <td>
                                    <?php echo $r->tanggal ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Tipe Pesan</th>
                                <td>:</td>
                                <td>
                                    <?php echo $r->tipe_pesan ?>
                                </td>
                            </tr>
                            <?php if ($r->tipe_pesan == "Homecare") { ?>
                                <tr>
                                    <th>Biaya tambahan</th>
                                    <td>:</td>
                                    <td>Rp. 0</td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <th>Jam</th>
                                <td>:</td>
                                <td>
                                    <?php echo $r->jam ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Status Pembayaran</th>
                                <td>:</td>
                                <td>
                                    <?php if ($r->status == '1') { ?>
                                        <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Belum
                                            Bayar</span>
                                    <?php } elseif ($r->status == '0') { ?>
                                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Pembayaran
                                            Sukses</span>
                                    <?php } else { ?>
                                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                                            Proses</span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <th><b>Total Pembayaran</b></th>
                                <td>:</td>
                                <td>
                                    Rp.
                                    <?php echo number_format($r->total_bayar, 0, ',', '.') ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header alert alert-primary text-center">
                    <b>Informasi Pembayaran</b>
                </div>
                <div class="card-body">
                    <p class="text-success">Silahkan lakukan pembayaran melalui nomor rekening dibawah ini :</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Bank Permata : 0041-7808-7601</li>
                        <li class="list-group-item">Bank BRI : 5221-8420-7778-2029</li>
                        <li class="list-group-item">Bank BCA : 8907-0765-6543-9843</li>
                    </ul>
                </div>
                <center><button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#basicModal">
                        Upload Bukti Pembayaran
                    </button></center>
                <div class="modal fade" id="basicModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Upload Bukti Pembayaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="<?php echo base_url('member/pesan/pembayaran') ?>"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group mb-2">
                                        <input type="file" name="bukti_bayar" class=form-control>
                                        <?php echo form_error('bukti_bayar', '<div class = "text-small text-danger"></div>') ?>
                                        <input type="hidden" name="id_pesan" class=form-control
                                            value="<?php echo $r->id_pesan ?>">
                                    </div>
                                </div>

                                <div class=" modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($detail as $d): ?>
        <div class="card mt-4">
            <div class="card-header alert alert-success text-center">
                <b>Detail Pesanan Anda</b>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Nama Treatment</th>
                        <td>:</td>
                        <td>
                            <?php echo $d->nama_treatment ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Tipe Treatment</th>
                        <td>:</td>
                        <td>
                            <?php echo $d->tipe ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>:</td>
                        <td>
                            Rp.
                            <?php echo number_format($d->harga, 0, ',', '.') ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    <?php endforeach; ?>
</div>
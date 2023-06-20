<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header alert alert-success">
                    <b>Detail Pembayaran Anda</b>
                </div>
                <div class="card-body">
                    <table class="table">
                    <?php foreach ($detail as $dt) : ?>
                    <?php echo $this->session->flashdata('pesan') ?>
                    <form method="POST" action="<?php echo base_url('member/detailPesan/bayar')?>" enctype= "multipart/form-data">
                        <tr><input type="hidden" name="id_treatment" class=form-control value="<?php echo $dt->id_treatment ?>"></tr>
                        <tr><input type="hidden" name="id_pesan" class=form-control value="<?php echo $dt->id_pesan ?>"></tr>
                            <th>Nama Customer</th>
                            <td>:</td>
                            <td><?php echo $dt->nama ?></td>
                        </tr>
                        <tr>
                            <th>Nama Treatment</th>
                            <td>:</td>
                            <td><?php echo $dt->nama_treatment ?></td>
                        </tr>
                        <tr>
                            <th>Tipe</th>
                            <td>:</td>
                            <td><?php echo $dt->tipe ?></td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td>:</td>
                            <td>Rp. <?php echo number_format($dt->harga,0,',','.') ?></td>
                        </tr>
                        <tr>
                            <th>Diskon</th>
                            <td>:</td>
                            <td><?php if($dt->hak_akses == '3'){ ?>
                                    <?php echo "20%";
                                    $diskon = (($dt->harga*20)/100); ?>                    
                                <?php }  else { ?>
                                    <?php echo $diskon = 0; ?>
                                <?php } ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>:</td>
                            <td><?php echo $dt->tanggal?></td>
                        </tr>
                        <tr>
                            <th>Jam</th>
                            <td>:</td>
                            <td><?php echo $dt->jam ?></td>
                        </tr>
                        <tr>
                            <th>Tipe Pesan</th>
                            <td>:</td>
                            <td><?php echo $dt->tipe_pesan ?></td>
                        </tr>
                        <tr>
                            <th>Status Pembayaran</th>
                            <td>:</td>
                            <td><?php if($dt->status == '1'){ ?>
                                    <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Belum Bayar</span>                       
                                <?php } elseif($dt->status == '0') { ?>
                                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Pembayaran Sukses</span>
                                <?php }  else { ?>
                                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Proses</span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Jumlah Pembayaran</th>
                            <td>:</td>
                            <td><b>Rp. <?php echo number_format($dt->harga - $diskon,0,',','.') ?></b></td>
                        </tr>
                    <?php endforeach ; ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header alert alert-primary">
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
                <center><button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#basicModal">
                        Upload Bukti Pembayaran
                        </button></center>
                            <div class="modal fade" id="basicModal" tabindex="-1">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title">Upload Bukti Pembayaran</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group mb-2">
                                            <input type="file" name="bukti_bayar" class=form-control>
                                        </div>                                    
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </div>
                            </div>
                            </div><!-- End Basic Modal-->
                    </form>

            </div>
        </div>
    </div>
</div>
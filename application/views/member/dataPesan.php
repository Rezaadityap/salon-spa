<?php if (empty($datapesan)) { ?>
    <div class="dataFlash" data-flashdata="<?php echo $this->session->flashdata('massage'); ?>"></div>
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>
    <center>
        <img src="<?php echo base_url('assets/img/error.png') ?>" class="img-fluid mt-4" width="400px"><br>
        <a href="<?php echo base_url('member/dashboard') ?>" class="btn btn-danger mt-2"> Buat Pesanan Sekarang</a>
    </center>
<?php } else { ?>
    <div class="container" style="margin-bottom: 100%">
        <div class="dataFlash" data-flashdata="<?php echo $this->session->flashdata('massage'); ?>"></div>
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>
        <div class="card-header mt-5">
            <center>
                <h3>Data Pesanan Anda</h3>
            </center>
        </div>
        <div class="card-body mt-5">
            <div class="table">
                <table class="table table-bordered table-striped mt-2">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Pemesan</th>
                        <th class="text-center">Tipe</th>
                        <th class="text-center">Tanggal pesan</th>
                        <th class="text-center">Total Bayar</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($datapesan as $dp): ?>
                        <tr>
                            <td>
                                <?php echo $no++ ?>
                            </td>
                            <td>
                                <?php echo $dp->nama ?>
                            </td>
                            <td>
                                <?php echo $dp->tipe_pesan ?>
                            </td>
                            <td>
                                <?php echo $dp->tanggal ?>
                            </td>
                            <td>
                                Rp.
                                <?php echo number_format((int) $dp->total_bayar, 0, ',', '.') ?>
                            </td>
                            </td>
                            <td>
                                <?php if ($dp->status == '1') { ?>
                                    <center><span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Belum
                                            Bayar</span></center>
                                <?php } elseif ($dp->status == '0') { ?>
                                    <center><span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Pesanan
                                            Diterima</span></center>
                                <?php } else { ?>
                                    <center><span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                                            Proses Admin</span></center>
                                <?php } ?>
                            </td>
                            <td>
                                <center>
                                    <a class="btn btn-sm btn-info"
                                        href="<?php echo base_url('member/pesan/detailPesan/' . $dp->id_pesan) ?>"><i
                                            class="bi bi-eye"></i></a>
                                    <a class="btn btn-sm btn-warning"
                                        href="<?php echo base_url('member/pesan/cetak/' . $dp->id_pesan) ?>"><i
                                            class="bi bi-printer"></i></a>
                                    <a class="btn btn-sm btn-danger tombol-hapus"
                                        href="<?php echo base_url('member/pesan/deleteData/' . $dp->id_pesan) ?>"><i
                                            class="bi bi-trash"></i></a>
                                </center>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
<?php } ?>
</div>
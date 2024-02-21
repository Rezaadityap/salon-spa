<div class="container" style="margin-bottom: 100px">
    <!-- Card with header and footer -->
    <div class="card-header mt-5 text-center">
        <h3>Detail Pesanan</h3>
    </div>
    <div class="card-body mt-5">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class=" text-primary">
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Nama Treatment</th>
                    <th class="text-center">Tipe Pesan</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($detail as $d): ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $no++ ?>
                            </td>
                            <td class="text-center">
                                <?php echo $pesanan->nama ?>
                            </td>
                            <td class="text-center">
                                <?php echo $d->nama_treatment ?>
                            </td>
                            <td class="text-center">
                                <?php echo $pesanan->tipe_pesan ?>
                            </td>
                            <td class="text-center">
                                <?php echo $pesanan->tanggal ?>
                            </td>
                            <td class="text-center">
                                Rp.
                                <?php echo number_format($d->harga, 0, ',', '.') ?>
                            </td>
                            <td class="text-center">
                                <?php if ($pesanan->status == '0') { ?>
                                    <span class="badge bg-success">
                                        Selesai</span>
                                <?php } else { ?>
                                    <span class="badge bg-warning">
                                        Proses</span>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <center>
                                    <a href="<?php echo base_url('member/pesan/nilai/' . $d->id_detail) ?>"
                                        class="btn btn-sm btn-primary"><i class="bi bi-chat-left-quote"></i>
                                    </a>
                                </center>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <center>
            <button onclick="history.back()" class="btn btn-secondary">Kembali</button>
        </center>
    </div>
</div>
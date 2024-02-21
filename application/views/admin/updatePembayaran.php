<main id="main" class="main">
    <div class="container-fluid" style="margin-bottom: 100px">
        <div class="pagetitle">
            <h1>
                <?php echo $title ?>
            </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/pesanan/pembayaran') ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?php echo $title ?>
                    </li>
                </ol>
            </nav>
        </div>
        <?php foreach ($pembayaran as $pmb): ?>
        <div class="card">
            <div class="card-header">
                <b>Konfirmasi pembayaran</b>
            </div>
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('admin/pesanan/cekPembayaran') ?>">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td><b>Nama Customer </b></td>
                                    <td>
                                        <?php echo $pmb->nama ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal </b></td>
                                    <td>
                                        <?php echo $pmb->tanggal ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Jam </b></td>
                                    <td>
                                        <?php echo $pmb->jam ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Tipe Pesan </b></td>
                                    <td>
                                        <?php echo $pmb->tipe_pesan ?>
                                    </td>
                                </tr>
                                <?php if ($pmb->tipe_pesan == "Homecare") { ?>
                                <tr>
                                    <td><b>Biaya tambahan</b></td>
                                    <td>
                                        Rp. 0
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td><b>Status </b></td>
                                    <td>
                                        <?php if ($pmb->status == '0') { ?>
                                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>
                                            Lunas</span>
                                        <?php } ?>
                                        <?php if ($pmb->status == '2') { ?>
                                        <span class="badge bg-warning"><i class="bi bi-exclamation-triangle me-1"></i>
                                            Proses</span>
                                        <?php } ?>
                                        <?php if ($pmb->status == '1') { ?>
                                        <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i>
                                            Belum lunas</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Jumlah Pembayaran </b></td>
                                    <td><b>Rp.
                                            <?php echo number_format($pmb->total_bayar, 0, ',', '.') ?>
                                        </b>
                                    </td>
                                </tr>
                            </thead>
                        </table>
                    </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php foreach ($detail as $d): ?>
        <div class="card">
            <div class="card-header">
                <b>Rincian Pesanan</b>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <th>
                            <tr>
                                <td><b>Nama Treatment</b></td>
                                <td>
                                    <?php echo $d->nama_treatment ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Tipe Treatment</b></td>
                                <td>
                                    <?php echo $d->tipe ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Harga</b></td>
                                <td><b>Rp.
                                        <?php echo number_format($d->harga, 0, ',', '.') ?>
                                    </b>
                                </td>
                            </tr>
                        </th>
                    </table>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <a class="btn btn-sm btn-success"
            href="<?php echo base_url('admin/pesanan/download_pembayaran/' . $pmb->id_pesan) ?>"><i
                class="fas fa-eye"></i>
            Lihat bukti pembayaran</a>
        <div class="form-check form-switch mt-3">
            <input class="form-check-input" type="hidden" role="switch" id="flexSwitchCheckDefault"
                value="<?php echo $pmb->id_pesan ?>" name="id_pesan">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="0"
                name="status">
            <label class="form-check-label" for="flexSwitchCheckDefault">Konfirmasi</label>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo base_url('admin/pesanan') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    </div>
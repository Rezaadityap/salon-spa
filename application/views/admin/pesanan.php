<main id="main" class="main">
    <div class="container-fluid" style="margin-bottom: 100px">
        <div class="pagetitle">
            <h1>
                <?php echo $title ?>
            </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/pesanan/pesan') ?>">Home</a></li>
                    <li class="breadcrumb-item active">
                        <?php echo $title ?>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>
        <div class="row-mt-3">
            <div class="colmd-6">
                <form action="" method="post">
                    <div class="input-group mb-3" style="width: 50%;">
                        <input type="text" class="form-control" placeholder="Cari data" name="keyword">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php if (empty($pesanan)) { ?>
            <center><img src="<?php echo base_url() . '/assets/img/nodata.png' ?>" class="img-fluid" width="300px" alt="">
            <?php } else { ?>
                <table class="table table-bordered table-striped mt-2">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Customer</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php
                    foreach ($pesanan as $p): ?>
                        <tr>
                            <td>
                                <?php echo $p->id_pesan ?>
                            </td>
                            <td>
                                <?php echo $p->nama ?>
                            </td>
                            <td>
                                <?php echo $p->tanggal ?>
                            </td>
                            <td>
                                <center>
                                    <?php if ($p->status == '1') { ?>
                                        <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Belum
                                            Bayar</span>
                                    <?php } elseif ($p->status == '0') { ?>
                                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Selesai</span>
                                    <?php } else { ?>
                                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>
                                            Proses</span>
                                    <?php } ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a class="btn btn-sm btn-info"
                                        href="<?php echo base_url('admin/pesanan/pembayaran/' . $p->id_pesan) ?>"><i
                                            class="fas fa-eye"></i></a>
                                    <a class="btn btn-sm btn-danger tombol-hapus"
                                        href="<?php echo base_url('admin/pesanan/deleteData/' . $p->id_pesan) ?>"><i
                                            class="fas fa-trash"></i></a>
                                </center>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php } ?>
    </div>
<main class="main" id="main">
    <div class="container-fluid">
        <?php if (empty($laporan)) { ?>
        <center><img src="<?php echo base_url() . '/assets/img/nopes.png' ?>" class="img-fluid" width="400px" alt="">
        </center>
        <center><a href="<?php echo base_url('admin/laporanPesanan') ?>" class="btn btn-sm btn-secondary">Kembali</a>
        </center>
        <?php } else { ?>
        <div id="ui-view" data-select2-id="ui-view">
            <div>
                <div class="card">
                    <div class="card-header">Invoice
                        <strong>
                            <?php echo $title ?>
                        </strong>
                        <?php
                            echo form_open('admin/laporanPesanan/excelHari');
                            echo form_hidden('tanggal', $tanggal);
                            echo form_hidden('bulan', $bulan);
                            echo form_hidden('tahun', $tahun);
                            ?>
                        <small class="float-right mr-4">
                            <?php echo $tanggal ?> /
                            <?php echo $bulan ?> /
                            <?php echo $tahun ?>
                        </small>
                        <a class="btn btn-sm btn-primary float-right mr-1 d-print-none" href="#"
                            onclick="javascript:window.print();" data-abc="true">
                            <i class="fa fa-print"></i> Print</a>
                        <button type="submit" class="btn btn-sm btn-success d-print-none"><i class="fa fa-download"></i>
                            Excel</button>
                    </div>
                    <?php echo form_close(); ?>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Nama Pemesan</th>
                                        <th>Nama Treatment</th>
                                        <th class="center">Tipe</th>
                                        <th class="right">Jumlah Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                        $semua = 0;
                                        foreach ($laporan as $l):
                                            $semua = $semua + $l->harga; ?>
                                    <tr>
                                        <td class="center">
                                            <?php echo $no++ ?>
                                        </td>
                                        <td class="left">
                                            <?php echo $l->nama ?>
                                        </td>
                                        <td class="left">
                                            <?php echo $l->nama_treatment ?>
                                        </td>
                                        <td class="center">
                                            <?php echo $l->tipe ?>
                                        </td>
                                        <td class="right">Rp.
                                            <?php echo number_format($l->harga, 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <b>Total Pendapatan : Rp.
                                <?php echo number_format($semua, 0, ',', '.') ?>
                            </b>
                            <center><a href="<?php echo base_url('admin/laporanPesanan') ?>"
                                    class="btn btn-secondary d-print-none">Kembali</a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</main>
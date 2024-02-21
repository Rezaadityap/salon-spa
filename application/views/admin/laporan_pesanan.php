<main id="main" class="main">
    <div class="container-fluid">
        <div class="pagetitle">
            <h1>
                <?php echo $title ?>
            </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/laporanPesanan') ?>">Home</a></li>
                    <li class="breadcrumb-item active">
                        <?php echo $title ?>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h5>Laporan Harian</h5>
                    </div>
                    <div class="card-body">
                        <!-- No Labels Form -->
                        <form class="row g-3 mt-2" method="post"
                            action="<?php echo base_url('admin/laporanPesanan/laporanHarian') ?>">
                            <div class="col-sm-4">
                                <label><b>Tanggal</b></label>
                                <select id="inputState" class="form-select" name="tanggal">
                                    <option>Tanggal</option>
                                    <?php
                                    $mulai = 1;
                                    for ($i = $mulai; $i < $mulai + 31; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    } ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label><b>Bulan</b></label>
                                <select id="inputState" class="form-select" name="bulan">
                                    <option selected>Bulan</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label><b>Tahun</b></label>
                                <select id="inputState" class="form-select" name="tahun">
                                    <option selected>Tahun</option>
                                    <?php $tahun = date('Y');
                                    for ($i = 2020; $i < $tahun + 5; $i++) { ?>
                                    <option value="<?php echo $i ?>">
                                        <?php echo $i ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h5>Laporan Bulanan</h5>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 mt-2" method="post"
                            action="<?php echo base_url('admin/laporanPesanan/laporanBulanan') ?>">
                            <div class="col-sm-6">
                                <label><b>Bulan</b></label>
                                <select id="inputState" class="form-select" name="bulan">
                                    <option selected>Bulan</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label><b>Tahun</b></label>
                                <select id="inputState" class="form-select" name="tahun">
                                    <option selected>Tahun</option>
                                    <?php $tahun = date('Y');
                                    for ($i = 2020; $i < $tahun + 5; $i++) { ?>
                                    <option value="<?php echo $i ?>">
                                        <?php echo $i ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h5>Laporan Tahunan</h5>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 mt-2" method="post"
                            action="<?php echo base_url('admin/laporanPesanan/laporanTahunan') ?>">
                            <div class="col-sm-12">
                                <label><b>Tahun</b></label>
                                <select id="inputState" class="form-select" name="tahun">
                                    <option selected>Tahun</option>
                                    <?php $tahun = date('Y');
                                    for ($i = 2020; $i < $tahun + 5; $i++) { ?>
                                    <option value="<?php echo $i ?>">
                                        <?php echo $i ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Cetak Laporan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
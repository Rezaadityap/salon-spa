<main id="main" class="main">
    <div class="container-fluid" style="margin-bottom: 100px">
        <div class="pagetitle">
            <h1><?php echo $title ?></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dataGaji')?>">Home</a></li>
                    <li class="breadcrumb-item active"><?php echo $title ?></li>
                </ol>
            </nav>
        </div>
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                Filter Data Gaji
            </div>
            <div class="card-body">
                <form class="form-inline">
                    <div class="form-group mb-2">
                        <label for="staticEMail2">Bulan :</label>
                        <select name="bulan" class="form-control ml-2">
                            <option value="">-- Pilih Bulan --</option>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="form-group mb-2 ml-5">
                        <label for="staticEMail2">Tahun :</label>
                        <select name="tahun" class="form-control ml-2">
                            <option value="">-- Pilih Tahun --</option>
                            <?php $tahun = date('Y');
                    for($i=2020; $i<$tahun+5; $i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <?php 
                if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
                    $bulan = $_GET['bulan'];
                    $tahun = $_GET['tahun'];
                    $bulantahun = $bulan.$tahun;
                } else {
                    $bulan = date('m');
                    $tahun = date('Y');
                    $bulantahun = $bulan.$tahun;
                } 
                ?>
                    <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan
                        Data</button>
                    <?php if(count($gaji)>0){ ?>
                    <a href="<?php echo base_url('admin/DataGaji/cetakGaji?bulan='.$bulan),'&tahun='.$tahun?>"
                        class="btn btn-success mb-2 ml-2"><i class="fas fa-print"></i> Cetak Daftar Gaji</a>
                    <?php }else{ ?>
                    <button type="button" class="btn btn-success mb-2 ml-2" data-toggle="modal"
                        data-target="#myModal"><i class="fas fa-print"></i> Cetak Daftar Gaji</button>
                    <?php } ?>
                </form>
            </div>
        </div>
        <?php 
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }
    ?>
        <div class="alert alert-info">
            Menampilkan Data Gaji Karyawan Bulan : <span class="font-weight-bold"><?php echo $bulan ?></span> Tahun :
            <span class="font-weight-bold"><?php echo $tahun ?></span>
        </div>
        <?php 
        $jml_data = count($gaji);
        if($jml_data > 0){  
    ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">NIK</th>
                    <th class="text-center">Nama Karyawan</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">Gaji Pokok</th>
                    <th class="text-center">Uang Makan</th>
                    <th class="text-center">Potongan</th>
                    <th class="text-center">Total Gaji</th>
                </tr>
                <?php foreach ($setting_gaji as $s){
                $alfa = $s->nominal;
            } ?>
                <?php $no=1; foreach($gaji as $g ) : ?>
                <?php $setGaji = $g->alfa * $alfa ?>
                <tr>
                    <td><?php echo $no ++ ?></td>
                    <td><?php echo $g->nik ?></td>
                    <td><?php echo $g->nama_karyawan ?></td>
                    <td><?php echo $g->jenis_kelamin ?></td>
                    <td><?php echo $g->nama_jabatan ?></td>
                    <td>Rp.<?php echo number_format ($g->gaji_pokok,0,',','.') ?></td>
                    <td>Rp.<?php echo number_format ($g->uang_makan,0,',','.') ?></td>
                    <td>Rp.<?php echo number_format ($setGaji,0,',','.') ?></td>
                    <td>Rp.<?php echo number_format ($g->gaji_pokok + $g->uang_makan - $setGaji,0,',','.') ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php } else{ ?>
        <span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data masih kosong, silahkan input data
            absensi pada bulan dan tahun yang anda pilih</span>
        <?php } ?>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Informasi</h4>
                </div>
                <div class="modal-body">
                    <p>Data yang anda pilih belum diinput, segera input dulu!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
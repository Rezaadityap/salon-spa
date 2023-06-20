<main id="main" class="main">
<div class="container-fluid" style="margin-bottom: 100px">
<div class="pagetitle">
  <h1><?php echo $title ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('karyawan/dataGaji')?>">Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
  </nav>
</div>

<div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tr>
                <th class="text-center">Bulan/Tahun</th>
                <th class="text-center">Gaji Pokok</th>
                <th class="text-center">Uang Makan</th>
                <th class="text-center">Potongan</th>
                <th class="text-center">Total Gaji</th>
                <th class="text-center">Cetak Slip</th>
            </tr>
            <?php foreach ($setting_gaji as $s){
                $alfa = $s->nominal;
            } ?>
            <?php $no=1; foreach($gaji as $g ) : ?>   
                <?php $setGaji = $g->alfa * $alfa ?>
            <tr>
                <td><?php echo $g->bulan ?></td>
                <td>Rp. <?php echo number_format($g->gaji_pokok,0,',','.') ?></td>
                <td>Rp. <?php echo number_format($g->uang_makan,0,',','.') ?></td>
                <td>Rp. <?php echo number_format($setGaji,0,',','.') ?></td>
                <td>Rp. <?php echo number_format($g->gaji_pokok + $g->uang_makan - $setGaji,0,',','.') ?></td>
                <td>
                    <center>
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('karyawan/DataGaji/cetakSlip/'.$g->id_absensi)?>"><i class="fas fa-print"></i></a>
                    </center>
                </td>
            </tr>
            <?php endforeach ; ?>
        </table>
    </div>
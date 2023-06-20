<main id="main" class="main">
<div class="container-fluid" style="margin-bottom: 100px">
<div class="pagetitle">
  <h1><?php echo $title ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('karyawan/jadwalKerja')?>">Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
  </nav>
</div>
    <div class="table">
    <table class = "table table-bordered table-striped mt-2">
        <tr>
            <th class = "text-center">No</th>
            <th class = "text-center">Nama Karyawan</th>
            <th class = "text-center">Hari</th>
            <th class = "text-center">Tanggal</th>
            <th class = "text-center">Status</th>
        </tr>   
        <?php $no=1; foreach($jadwal as $j) : ?>  
            <tr>
                <td><?php echo $no ++ ?></td>
                <td><?php echo $j->nama_karyawan ?></td>
                <td><?php echo $j->hari ?></td>
                <td><?php echo $j->tanggal ?></td>
                <td>
                    <?php if($j->status == '0'){ ?>
                        <center>
                            <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Libur</span>
                        </center>                        <?php } else { ?>
                            <center>
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Masuk</span>
                            </center>
                            <?php } ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
        </div>
    </div>
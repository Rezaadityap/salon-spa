<main id="main" class="main">
<div class="container-fluid" style="margin-bottom: 100px">
<div class="pagetitle">
  <h1><?php echo $title ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('karyawan/formIzin/halamanIzin')?>">Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
  </nav>
</div>
<div class="card" style="width: 50%; margin-bottom: 100px">
    <div class="card-body mt-2">
        <div class="panel-heading">
            <center><h3 class="panel-title">Data izin</h3></center>
        </div>
<?php foreach($izin as $l) : ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td><b>Nama Karyawan </b></td>
                            <td><?php echo $l->nama_karyawan ?></td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Izin </b></td>
                            <td><?php echo $l->tanggal ?></td>
                        </tr>
                        <tr>
                            <td><b>Keterangan </b></td>
                            <td><?php echo $l->ket ?></td>
                        </tr>
                        <tr>
                            <td><b>Status </b></td>
                            <td>
                                <?php if($l->status == '0'){ ?>
                                    <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Pending</span>
                                <?php } ?>                       
                                <?php if($l->status == '1') { ?>
                                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Diterima</span>
                                <?php } ?> 
                                <?php if($l->status == '2') { ?>
                                    <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Ditolak</span>
                                <?php } ?>           
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
<?php endforeach ; ?>
</div>
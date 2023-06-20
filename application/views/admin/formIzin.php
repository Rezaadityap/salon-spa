<main id="main" class="main">
<div class="container-fluid" style="margin-bottom: 100px">
<div class="pagetitle">
  <h1><?php echo $title ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/formIzin')?>">Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
  </nav>
</div>
<?php echo $this->session->flashdata('pesan') ?>
    <table class = "table table-bordered table-striped mt-2">
        <tr>
            <th class = "text-center">No</th>
            <th class = "text-center">Nama Karyawan</th>
            <th class = "text-center">Tanggal</th>
            <th class = "text-center">Keterangan</th>
            <th class = "text-center">Status</th>
            <th class = "text-center">Action</th>
        </tr>   
        <?php $no=1; foreach($izin as $i) : ?>  
        <tr>
            <td><?php echo $no ++ ?></td>
            <td><?php echo $i->nama_karyawan ?></td>
            <td><?php echo $i->tanggal ?></td>
            <td><?php echo $i->ket ?></td>
            <td>
                <?php if($i->status == '0'){ ?>
                    <center><span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Pending</span></center>
                <?php } ?>                       
                <?php if($i->status == '1') { ?>
                    <center><span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Diterima</span></center>
                <?php } ?> 
                <?php if($i->status == '2') { ?>
                    <center><span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Ditolak</span></center>
                <?php } ?>           
            </td>
            <td>
                <center>
                    <a class = "btn btn-sm btn-primary" href = "<?php echo base_url('admin/formIzin/updateData/'.$i->id_izin) ?>"><i class="fas fa-edit"></i></a>
                    <a onclick = "return confirm('Yakin ingin menghapus?')"class = "btn btn-sm btn-danger" href = "<?php echo base_url('admin/formIzin/deleteData/'.$i->id_izin) ?>"><i class="fas fa-trash"></i></a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
</div>
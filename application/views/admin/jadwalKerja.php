<main id="main" class="main">
<div class="container-fluid" style="margin-bottom: 100px">
<div class="pagetitle">
  <h1><?php echo $title ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/jadwalKerja')?>">Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
  </nav>
</div>
<?php echo $this->session->flashdata('pesan') ?>
<a class = "btn btn-sm btn-success mb-3" href = "<?php echo base_url('admin/jadwalKerja/tambahData/') ?>"><i class = "fas fa-plus"></i> Tambah Data</a>
<a onclick = "return confirm('Yakin ingin menghapus semua data?')"class = "btn btn-sm btn-danger mb-3" href = "<?php echo base_url('admin/jadwalKerja/deleteAll/') ?>"><i class = "fas fa-trash"></i> Hapus Semua Data</a>
<?php if (empty($jadwal)) : ?> 
    <div class="alert alert-danger" role="alert">
        <i class="fas fa-info-circle"></i> Data tidak ditemukan!</span>
    </div>
<?php endif ; ?>
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
    <div class="table">
    <table class = "table table-bordered table-striped mt-2">
        <tr>
            <th class = "text-center">No</th>
            <th class = "text-center">Nama Karyawan</th>
            <th class = "text-center">Hari</th>
            <th class = "text-center">Tanggal</th>
            <th class = "text-center">Status</th>
            <th class = "text-center">Action</th>
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
                <td>
                    <center>
                        <a onclick = "return confirm('Yakin ingin menghapus?')"class = "btn btn-sm btn-danger" href = "<?php echo base_url('admin/jadwalKerja/deleteData/'.$j->id_jadwal) ?>"><i class="fas fa-trash"></i></a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
        </div>
    </div>
<main id="main" class="main">
<div class="container-fluid" style="margin-bottom: 100px">
<div class="pagetitle">
  <h1><?php echo $title ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dataTreatment')?>">Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
  </nav>
</div>
    <a class = "btn btn-sm btn-success mb-3" href = "<?php echo base_url('admin/DataTreatment/tambahData/') ?>"><i class = "fas fa-plus"></i> Tambah Data</a>    
    <?php echo $this->session->flashdata('pesan') ?>
    <table class = "table table-bordered table-striped mt-2">
        <tr>
            <th class = "text-center">No</th>
            <th class = "text-center">Nama Treatment</th>
            <th class = "text-center">Harga</th>
            <th class = "text-center">Tipe</th>
            <th class = "text-center">Photo</th>
            <th class = "text-center">Action</th>
        </tr>   
        <?php $no=1; foreach($treatment as $t) : ?>  
        <tr>
            <td><?php echo $no ++ ?></td>
            <td><?php echo $t->nama_treatment ?></td>
            <td>Rp. <?php echo number_format($t->harga,0,',','.')?></td>
            <td><?php echo $t->tipe ?></td>
            <td><center><img src="<?php echo base_url().'assets/photo/produk/'.$t->photo ?>" width = "50px"></center></td>
            <td>
                <center>
                    <a class = "btn btn-sm btn-primary" href = "<?php echo base_url('admin/dataTreatment/updateData/'.$t->id_treatment) ?>"><i class="fas fa-edit"></i></a>
                    <a onclick = "return confirm('Yakin ingin menghapus?')"class = "btn btn-sm btn-danger" href = "<?php echo base_url('admin/dataTreatment/deleteData/'.$t->id_treatment) ?>"><i class="fas fa-trash"></i></a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
</div>
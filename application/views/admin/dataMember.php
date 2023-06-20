<main id="main" class="main">
<div class="container-fluid" style="margin-bottom: 100px">
<div class="pagetitle">
  <h1><?php echo $title ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dataMember')?>">Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
  </nav>
</div>
    <?php echo $this->session->flashdata('pesan') ?>
    <table class = "table table-bordered table-striped mt-2">
        <tr>
            <th class = "text-center">No</th>
            <th class = "text-center">Nama Member</th>
            <th class = "text-center">Email</th>
            <th class = "text-center">No. Hp</th>
            <th class = "text-center">Alamat</th>
            <th class = "text-center">Action</th>
        </tr>   
        <?php $no=1; foreach($member as $m) : ?>  
            <tr>
                <td><?php echo $no ++ ?></td>
                <td><?php echo $m->nama ?></td>
                <td><?php echo $m->email ?></td>
                <td><?php echo $m->no_hp ?></td>
                <td><?php echo $m->alamat ?></td>
                <td>
                    <center>
                        <a class = "btn btn-sm btn-primary" href = "<?php echo base_url('admin/dataMember/updateData/'.$m->id_member) ?>"><i class="fas fa-edit"></i></a>
                        <a onclick = "return confirm('Yakin ingin menghapus?')"class = "btn btn-sm btn-danger" href = "<?php echo base_url('admin/dataMember/deleteData/'.$m->id_member) ?>"><i class="fas fa-trash"></i></a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </div>
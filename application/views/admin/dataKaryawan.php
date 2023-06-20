<main id="main" class="main">
<div class="container-fluid" style="margin-bottom: 100px">
<div class="pagetitle">
  <h1><?php echo $title ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dataKaryawan')?>">Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
  </nav>
</div>
    <a class = "btn btn-sm btn-success mb-3" href = "<?php echo base_url('admin/DataKaryawan/tambahData/') ?>"><i class = "fas fa-plus"></i> Tambah Data Karyawan</a>  
    <?php echo $this->session->flashdata('pesan') ?>
    <table class = "table table-bordered table-striped mt-2">
        <tr>
            <th class = "text-center">No</th>
            <th class = "text-center">NIK</th>
            <th class = "text-center">Nama Karyawan</th>
            <th class = "text-center">Tanggal lahir</th>
            <th class = "text-center">Jenis Kelamin</th>
            <th class = "text-center">Alamat</th>
            <th class = "text-center">Nama Jabatan</th>
            <th class = "text-center">Photo</th>
            <th class = "text-center">Hak Akses</th>
            <th class = "text-center">Action</th>
        </tr>   
        <?php $no=1; foreach($karyawan as $k) : ?>  
            <tr>
                <td><?php echo $no ++ ?></td>
                <td><?php echo $k->nik ?></td>
                <td><?php echo $k->nama_karyawan ?></td>
                <td><?php echo $k->tgl_lahir ?></td>
                <td><?php echo $k->jenis_kelamin ?></td>
                <td><?php echo $k->alamat ?></td>
                <td><?php echo $k->nama_jabatan ?></td>
                <td><img src="<?php echo base_url().'assets/photo/'.$k->photo ?>" width = "50px"></td>
                <?php if($k->hak_akses == '1'){ ?>
                        <td>Admin</td>
                        <?php } else { ?>
                            <td>Karyawan</td>
                            <?php } ?>
                <td>
                    <center>
                        <a class = "btn btn-sm btn-primary" href = "<?php echo base_url('admin/dataKaryawan/updateData/'.$k->id_karyawan) ?>"><i class="fas fa-edit"></i></a>
                        <a onclick = "return confirm('Yakin ingin menghapus?')"class = "btn btn-sm btn-danger" href = "<?php echo base_url('admin/dataKaryawan/deleteData/'.$k->id_karyawan) ?>"><i class="fas fa-trash"></i></a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </div>
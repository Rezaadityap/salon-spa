<main id="main" class="main">
<div class="container-fluid" style="margin-bottom: 100px">
<div class="pagetitle">
  <h1><?php echo $title ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/settingGaji')?>">Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
  </nav>
</div>
<?php echo $this->session->flashdata('pesan') ?>

    <a class="btn btn-sm btn-success mb-2 mt-2" href="<?php echo base_url('admin/settingGaji/tambahData') ?> "><i class="fas fa-plus"></i> Tambah Data</a>
    <table class="table table-bordered table-striped">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Jenis </th>
            <th class="text-center">Nominal</th>
            <th class="text-center">Action</th>
        </tr>

        <?php $no=1; foreach($setGaji as $s) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $s->setting_gaji?></td>
                <td>Rp. <?php echo number_format($s->nominal,0,',','.') ?></td>
                <td>
                    <center>
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/SettingGaji/updateData/'.$s->id) ?> "><i class="fas fa-edit"></i></a>
                        <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/SettingGaji/deleteData/'.$s->id) ?> "><i class="fas fa-trash"></i></a>
                    </center>
                </td>
            </tr>
            <?php endforeach; ?>
    </table>

</div>
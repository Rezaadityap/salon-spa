<main id="main" class="main">
<div class="container-fluid" style="margin-bottom: 100px">
<div class="pagetitle">
  <h1><?php echo $title ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dataJabatan')?>">Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
  </nav>
</div>
<div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body mt-2">
            <?php foreach ($jabatan as $j): ?>
            <form method="POST" action="<?php echo base_url('admin/DataJabatan/updateDataAksi')?>">
                <div class="form-group mb-2">
                    <label>Nama Jabatan</label>
                    <input type="hidden" name="id_jabatan" class=form-control value="<?php echo $j->id_jabatan ?>">
                    <input type="text" name="nama_jabatan" class=form-control value="<?php echo $j->nama_jabatan ?>">
                    <?php echo form_error('nama_jabatan','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                    <label>Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" class=form-control value="<?php echo $j->gaji_pokok ?>">
                    <?php echo form_error('gaji_pokok','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                    <label>Uang Makan</label>
                    <input type="number" name="uang_makan" class=form-control value="<?php echo $j->uang_makan ?>">
                    <?php echo form_error('uang_makan','<div class = "text-small text-danger"></div>')?>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        <?php endforeach; ?>
        </div>
    </div>
</div>
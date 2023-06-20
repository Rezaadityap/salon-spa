<main id="main" class="main">
<div class="container-fluid" style="margin-bottom: 100px">
<div class="pagetitle">
  <h1><?php echo $title ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/potonganGaji')?>">Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
  </nav>
</div>
<div class="card" style="width: 60%">
        <div class="card-body mt-2">
            <form method="POST" action="<?php echo base_url('admin/SettingGaji/tambahDataAksi') ?>">
                <div class="form-group mb-2">
                    <label>Jenis</label>
                    <input type="text" name="setting_gaji" class="form-control">
                    <?php echo form_error('setting_gaji') ?>
                </div>
                <div class="form-group mb-2">
                    <label>Jumlah Nominal</label>
                    <input type="number" name="nominal" class="form-control">
                    <?php echo form_error('nominal') ?>
                </div>
                <button type="submit" class="btn btn-primary">simpan</button>
            </form>
        </div>
    </div>

</div>
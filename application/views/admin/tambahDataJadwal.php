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
<div class="card" style="width: 80%; margin-bottom: 100px">
        <div class="card-body mt-2">
            <form method="POST" action="<?php echo base_url('admin/jadwalKerja/tambahDataAksi')?>" enctype= "multipart/form-data">
            <div class="form-group mb-2">
                    <label>Nama Karyawan</label>
                    <select name="nama_karyawan" class=form-control>
                        <option value="">-- Pilih Karyawan --</option>
                        <?php foreach($karyawan as $k) : ?>
                        <option value="<?php echo $k->nama_karyawan ?>"> <?php echo $k->nama_karyawan ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('nama_karyawan','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                    <label>Hari</label>
                    <select name="hari" class=form-control>
                        <option value="">-- Pilih Hari --</option>
                        <option value="Senin"> Senin</option>
                        <option value="Selasa"> Selasa</option>
                        <option value="Rabu"> Rabu</option>
                        <option value="Kamis"> Kamis</option>
                        <option value="Jum'at"> Jum'at</option>
                        <option value="Sabtu"> Sabtu</option>
                        <option value="Minggu"> Minggu</option>
                    </select>
                    <?php echo form_error('hari','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class=form-control>
                    <?php echo form_error('tanggal','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                    <label>Status</label>
                    <select name="status" class=form-control>
                        <option value="">-- Pilih Status --</option>
                        <option value="0"> Libur</option>
                        <option value="1"> Masuk</option>
                    </select>
                    <?php echo form_error('status','<div class = "text-small text-danger"></div>')?>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
        </div>
    </div>
</div>
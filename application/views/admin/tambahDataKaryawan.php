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
<div class="card" style="width: 80%; margin-bottom: 100px">
        <div class="card-body mt-2">
            <form method="POST" action="<?php echo base_url('admin/DataKaryawan/tambahDataAksi')?>" enctype= "multipart/form-data">
                <div class="form-group mb-2">
                    <label>NIK</label>
                    <input type="number" name="nik" class=form-control>
                    <?php echo form_error('nik','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                    <label>Nama Karyawan</label>
                    <input type="text" name="nama_karyawan" class=form-control>
                    <?php echo form_error('nama_karyawan','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                    <label>Tanggal lahir</label>
                    <input type="date" name="tgl_lahir" class=form-control>
                    <?php echo form_error('tgl_lahir','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class=form-control>
                    <?php echo form_error('alamat','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class=form-control>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki"> Laki - laki</option>
                        <option value="perempuan"> Perempuan</option>
                    </select>
                    <?php echo form_error('jenis_kelamin','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                    <label>Nama Jabatan</label>
                    <select name="nama_jabatan" class=form-control>
                        <option value="">-- Pilih Jabatan --</option>
                        <?php foreach($jabatan as $j) : ?>
                        <option value="<?php echo $j->nama_jabatan ?>"> <?php echo $j->nama_jabatan ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('jabatan','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                    <label>Photo</label>
                    <input type="file" name="photo" class=form-control>
                </div>
                <div class="form-group">
                <label>Username</label>
                    <input type="text" name="username" class=form-control>
                    <?php echo form_error('username','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class=form-control>
                    <?php echo form_error('password','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group">
                    <label>Hak Akses</label>
                    <select name="hak_akses" class="form-control">
                        <option value="">-- Pilih Hak Akses --</option>
                        <option value="1">Admin</option>
                        <option value="2">Karyawan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
        </div>
    </div>
</div>
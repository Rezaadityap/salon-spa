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
        <?php foreach ($karyawan as $k): ?>
            <form method="POST" action="<?php echo base_url('admin/DataKaryawan/updateDataAksi')?>" enctype= "multipart/form-data">
                <div class="form-group mb-2">
                    <label>NIK</label>
                    <input type="hidden" name="id_karyawan" class=form-control value="<?php echo $k->id_karyawan ?>">
                    <input type="number" name="nik" class=form-control value="<?php echo $k->nik ?>">
                    <?php echo form_error('nik','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                    <label>Nama Karyawan</label>
                    <input type="text" name="nama_karyawan" class=form-control value="<?php echo $k->nama_karyawan ?>">
                    <?php echo form_error('nama_karyawan','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                <label>Tanggal lahir</label>
                    <input type="text" name="tgl_lahir" class=form-control value="<?php echo $k->tgl_lahir ?>">
                    <?php echo form_error('tgl_lahir','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class=form-control value="<?php echo $k->alamat ?>">
                    <?php echo form_error('password','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class=form-control>
                        <option value="<?php echo $k->jenis_kelamin ?>"><?php echo $k->jenis_kelamin ?></option>
                        <option value="Laki-laki"> Laki - laki</option>
                        <option value="perempuan"> Perempuan</option>
                    </select>
                    <?php echo form_error('jenis_kelamin','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                    <label>Nama Jabatan</label>
                    <select name="nama_jabatan" class=form-control>
                        <option value="<?php echo $k->nama_jabatan ?>"><?php echo $k->nama_jabatan ?></option>
                        <?php foreach($jabatan as $j) : ?>
                        <option value="<?php echo $j->nama_jabatan ?>"> <?php echo $j->nama_jabatan ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('nama_jabatan','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group">
                <label>Username</label>
                    <input type="text" name="username" class=form-control value="<?php echo $k->username ?>">
                    <?php echo form_error('username','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class=form-control value="<?php echo $k->password ?>">
                    <?php echo form_error('password','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group">
                    <label>Hak Akses</label>
                    <select name="hak_akses" class="form-control">
                        <option value="<?php echo $k->hak_akses ?>">
                        <?php if ($k->hak_akses == '1'){
                            echo "Admin";
                        } else {
                            echo "Karyawan";
                        } ?></option>
                        <option value="1">Admin</option>
                        <option value="2">Karyawan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <?php endforeach; ?>
        </div>
    </div>
</div>
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
<div class="card" style="width: 80%; margin-bottom: 100px">
        <div class="card-body mt-2">
        <?php foreach ($member as $m): ?>
            <form method="POST" action="<?php echo base_url('admin/DataMember/updateDataAksi')?>" enctype= "multipart/form-data">
                <div class="form-group mb-2">
                    <label>Nama</label>
                    <input type="hidden" name="id_member" class=form-control value="<?php echo $m->id_member ?>">
                    <input type="text" name="nama" class=form-control value="<?php echo $m->nama ?>">
                    <?php echo form_error('nama','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                    <label>Email</label>
                    <input type="text" name="email" class=form-control value="<?php echo $m->email ?>">
                    <?php echo form_error('email','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                <label>Password</label>
                    <input type="password" name="password" class=form-control value="<?php echo $m->password ?>">
                    <?php echo form_error('tgl_lahir','<div class = "text-small text-danger"></div>')?>
                </div>
                <div class="form-group mb-2">
                    <label>No. Hp</label>
                    <input type="text" name="no_hp" class=form-control value="<?php echo $m->no_hp ?>">
                    <?php echo form_error('no_hp','<div class = "text-small text-danger"></div>')?>
                </div> 
                <div class="form-group mb-2">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class=form-control value="<?php echo $m->alamat ?>">
                    <?php echo form_error('alamat','<div class = "text-small text-danger"></div>')?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <?php endforeach; ?>
        </div>
    </div>
</div>
<main id="main" class="main">
  <div class="container-fluid" style="margin-bottom: 100px">
    <div class="pagetitle">
      <h1>
        <?php echo $title ?>
      </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('admin/formIzin/updateData') ?>">Home</a>
          </li>
          <li class="breadcrumb-item active">
            <?php echo $title ?>
          </li>
        </ol>
      </nav>
    </div>
    <div class="card" style="width: 60%; margin-bottom: 100px">
      <div class="card-body mt-2">
        <?php foreach ($izin as $i): ?>
          <form method="POST" action="<?php echo base_url('admin/formIzin/updateDataAksi') ?>">
            <div class="form-group mb-2">
              <label>Status</label><br>
              <input type="hidden" name="id_izin" class=form-control value="<?php echo $i->id_izin ?>">
              <input type="radio" name="status" value="1"> Diterima
              <input type="radio" name="status" value="2"> Ditolak
              <?php echo form_error('status', '<div class = "text-small text-danger"></div>') ?>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
          </form>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
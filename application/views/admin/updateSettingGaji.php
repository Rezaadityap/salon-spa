<main id="main" class="main">
    <div class="container-fluid" style="margin-bottom: 100px">
        <div class="pagetitle">
            <h1>
                <?php echo $title ?>
            </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/SettingGaji') ?>">Home</a></li>
                    <li class="breadcrumb-item active">
                        <?php echo $title ?>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card" style="width: 60%; margin-bottom: 100px">
            <div class="card-body mt-2">
                <?php foreach ($setGaji as $s): ?>
                <form method="POST" action="<?php echo base_url('admin/SettingGaji/updateDataAksi') ?>">
                    <div class="form-group mb-2">
                        <label>Jenis</label>
                        <input type="hidden" name="id" class=form-control value="<?php echo $s->id ?>">
                        <input type="text" name="setting_gaji" class=form-control
                            value="<?php echo $s->setting_gaji ?>">
                        <?php echo form_error('setting_gaji', '<div class = "text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group mb-2">
                        <label>Jumlah Nominal</label>
                        <input type="number" name="nominal" class=form-control value="<?php echo $s->nominal ?>">
                        <?php echo form_error('nominal', '<div class = "text-small text-danger"></div>') ?>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<main id="main" class="main">
    <div class="container-fluid" style="margin-bottom: 100px">
        <div class="pagetitle">
            <h1>
                <?php echo $title ?>
            </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dataTreatment') ?>">Home</a></li>
                    <li class="breadcrumb-item active">
                        <?php echo $title ?>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="card" style="width: 60%; margin-bottom: 100px">
            <div class="card-body mt-2">
                <?php foreach ($treatment as $t): ?>
                    <form method="POST" action="<?php echo base_url('admin/DataTreatment/updateDataAksi') ?>">
                        <div class="form-group mb-2">
                            <label>Nama Treatment</label>
                            <input type="hidden" name="id_treatment" class=form-control
                                value="<?php echo $t->id_treatment ?>">
                            <input type="text" name="nama_treatment" class=form-control
                                value="<?php echo $t->nama_treatment ?>">
                            <?php echo form_error('nama_treatment', '<div class = "text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group mb-2">
                            <label>Harga</label>
                            <input type="number" name="harga" class=form-control value="<?php echo $t->harga ?>">
                            <?php echo form_error('harga', '<div class = "text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group mb-2">
                            <label>Tipe Produk</label>
                            <select name="tipe" class=form-control>
                                <option value="<?php echo $t->tipe ?>">
                                    <?php echo $t->tipe ?>
                                </option>
                                <option value="Mathatilaar"> Marthatilaar</option>
                                <option value="Angelina"> Angelina</option>
                                <option value="Loreal"> Loreal</option>
                                <option value=""> tidak ada</option>
                            </select>
                            <?php echo form_error('tipe', '<div class = "text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group mb-2">
                            <label>Deskripsi</label>
                            <input type="textarea" name="deskripsi" class=form-control value="<?php echo $t->deskripsi ?>">
                            <?php echo form_error('deskripsi', '<div class = "text-small text-danger"></div>') ?>
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
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
        <div class="card" style="width: 80%; margin-bottom: 100px">
            <div class="card-body mt-2">
                <form method="POST" action="<?php echo base_url('admin/DataTreatment/tambahDataAksi') ?>"
                    enctype="multipart/form-data">
                    <div class="form-group mb-2">
                        <label>Nama Treatment</label>
                        <input type="text" name="nama_treatment" class=form-control>
                        <?php echo form_error('nama_treatment', '<div class = "text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group mb-2">
                        <label>Harga</label>
                        <input type="text" name="harga" class=form-control>
                        <?php echo form_error('harga', '<div class = "text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group mb-2">
                        <label>Tipe</label>
                        <select name="tipe" class=form-control>
                            <option value="">-- Pilih Tipe Produk --</option>
                            <option value="Marthatilaar"> Marthatilaar</option>
                            <option value="Angelina"> Angelina</option>
                            <option value="Loreal"> Loreal</option>
                            <option value=""> Tidak ada</option>
                        </select>
                        <?php echo form_error('tipe', '<div class = "text-small text-danger"></div>') ?>
                    </div>
                    <div class="form-group mb-2">
                        <label>Photo</label>
                        <input type="file" name="photo" class=form-control>
                    </div>
                    <div class="form-group mb-2">
                        <label>Deskripsi</label>
                        <input type="textarea" name="deskripsi" class=form-control>
                        <?php echo form_error('deskripsi', '<div class = "text-small text-danger"></div>') ?>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
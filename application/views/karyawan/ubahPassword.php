<!-- Begin Page Content -->
<main id="main" class="main">
    <div class="container-fluid" style="margin-bottom: 100px">
        <div class="pagetitle">
            <h1>
                <?php echo $title ?>
            </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('karyawan/profil/ubahPassword') ?>">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <?php echo $title ?>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="container-fluid" style="margin-bottom: 100px">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <?php echo $title ?>
                </h1>
            </div>

            <div class="card" style="width: 50%">
                <div class="card-body mt-2">
                    <form method="POST" action="<?php echo base_url('karyawan/profil/ubahPasswordAksi') ?>">
                        <div class="form-group mb-2">
                            <label>Password Baru</label>
                            <input type="password" name="passBaru" class="form-control">
                            <?php echo form_error('passBaru', '<div class = "text-small text-danger"></div>') ?>
                        </div>
                        <div class="form-group mb-2">
                            <label>Ulangi Password Baru</label>
                            <input type="password" name="ulangPass" class="form-control">
                            <?php echo form_error('ulangPass', '<div class = "text-small text-danger"></div>') ?>
                        </div>
                        <button type="submit" class="btn btn-success" value="simpan">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
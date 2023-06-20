<main id="main" class="main">
<div class="container-fluid" style="margin-bottom: 100px">
<div class="pagetitle">
  <h1><?php echo $title ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/profil')?>">Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
  </nav>
</div>
    <div class="panel-heading">
        <center><h3 class="panel-title"><i class="fa fa-user"></i> Profil Admin</h3></center>
    </div>
        <div class="panel-body" align="center">
        <?php foreach($karyawan as $k) : ?>
            <img src="<?php echo base_url('assets/photo/'.$k->photo)?>" align="center" class="img-circle" width="250px">
                <p style="font-size: 20px";><br><i><b><?php echo $k->nama_karyawan ?></b></i></p>

            </div>
            <div class="panel-heading">
                <center><h3 class="panel-title">Data Admin</h3></center>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td><b>NIK</b></td>
                                <td><?php echo $k->nik ?></td>
                            </tr>
                            <tr>
                                <td><b>Nama Admin</b></td>
                                <td><?php echo $k->nama_karyawan ?></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Lahir</b></td>
                                <td><?php echo $k->tgl_lahir ?></td>
                            </tr>
                            <tr>
                                <td><b>Alamat</b></td>
                                <td><?php echo $k->alamat ?></td>
                            </tr> 
                            <tr>
                                <td><b>Jenis Kelamin</b></td>
                                <td><?php echo $k->jenis_kelamin ?></td>
                            </tr>
                        </thead>
                    </table>
                    <a class = "btn btn-sm btn-secondary mb-3" href = "<?php echo base_url('admin/profil/ubahPassword') ?>"><i class = "fas fa-cog"></i> Ubah Password</a>
                </div>
            </div>
        </div>
    <?php endforeach ; ?>
</div>


                                
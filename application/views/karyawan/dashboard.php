<main id="main" class="main">
<div class="container-fluid" style="margin-bottom: 100px">
<div class="pagetitle">
  <h1><?php echo $title ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('karyawan/dashboard')?>">Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
  </nav>
</div>
<div class="alert alert-success font-weight-bold mb-4" style="width: 65%">
    Selamat Datang, Anda login sebagai karyawan.
</div>
<?php foreach($karyawan as $k) : ?>
<div class="card" style="margin-bottom: 120px; width: 65%">
    <div class="card-header font-weight-bold bg-primary text-white mb-3">
        Data Karyawan
    </div>
    <div class="card-body">
        <div class="row">
        <div class="col-md-5">
            <img style="width: 170px" src="<?php echo base_url('assets/photo/'.$k->photo) ?>">
        </div>
        <div class="col-md-7">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td><b>NIK</b></td>
                            <td><?php echo $k->nik ?></td>
                        </tr>
                        <tr>
                            <td><b>Nama Karyawan</b></td>
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
            </div>
        </div>
    </div>
    </div>
    <?php endforeach ; ?>
</div>
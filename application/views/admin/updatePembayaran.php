<main id="main" class="main">
<div class="container-fluid" style="margin-bottom: 100px">
<div class="pagetitle">
  <h1><?php echo $title ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/pesanan/pembayaran')?>">Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
  </nav>
</div>
<div class="card">
  <div class="card-header">
    <b>Konfirmasi pembayaran</b>
  </div>
  <div class="card-body">
    <form method="POST" action="<?php echo base_url('admin/pesanan/cekPembayaran')?>">
      <?php foreach($pembayaran as $pmb) : ?>
        <?php $diskon = (($pmb->harga*20)/100); ?>
        <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td><b>Nama Customer </b></td>
                            <td><?php echo $pmb->nama ?></td>
                        </tr>
                        <tr>
                            <td><b>Nama Treatment </b></td>
                            <td><?php echo $pmb->nama_treatment ?></td>
                        </tr>
                        <tr>
                            <td><b>Tipe </b></td>
                            <td><?php echo $pmb->tipe ?></td>
                        </tr>
                        <tr>
                            <td><b>Harga </b></td>
                            <td>Rp. <?php echo number_format($pmb->harga,0,',','.') ?></td>
                        </tr>
                        <tr>
                            <td><b>Diskon </b></td>
                            <td><?php echo "20%" ?></td>
                        </tr>
                        <tr>
                            <td><b>Tanggal </b></td>
                            <td><?php echo $pmb->tanggal ?></td>
                        </tr>
                        <tr>
                            <td><b>Jam </b></td>
                            <td><?php echo $pmb->jam ?></td>
                        </tr>
                        <tr>
                            <td><b>Tipe Pesan </b></td>
                            <td><?php echo $pmb->tipe_pesan ?></td>
                        </tr>
                        <tr>
                            <td><b>Status </b></td>
                            <td>
                                <?php if($pmb->status == '0'){ ?>
                                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Lunas</span>
                                <?php } ?>                       
                                <?php if($pmb->status == '2') { ?>
                                    <span class="badge bg-warning"><i class="bi bi-exclamation-triangle me-1"></i> Proses</span>
                                <?php } ?>   
                                <?php if($pmb->status == '1') { ?>
                                    <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Belum lunas</span>
                                <?php } ?>   
                            </td>
                        </tr>
                        <tr>
                            <td><b>Jumlah Pembayaran </b></td>
                            <td><b>Rp. <?php echo number_format($pmb->harga - $diskon,0,',','.') ?></b></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
          <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/pesanan/download_pembayaran/'.$pmb->id_pesan)?>"><i class="fas fa-eye"></i> Lihat bukti pembayaran</a>
          <div class="form-check form-switch mt-3">
            <input class="form-check-input" type="hidden" role="switch" id="flexSwitchCheckDefault" value="<?php echo $pmb->id_treatment ?>" name="id_treatment">
            <input class="form-check-input" type="hidden" role="switch" id="flexSwitchCheckDefault" value="<?php echo $pmb->id_pesan ?>" name="id_pesan">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="0" name="status">
            <label class="form-check-label" for="flexSwitchCheckDefault">Konfirmasi</label>
          </div>
          <hr>
          <button type="submit" class="btn btn-primary">Simpan</button>
        <?php endforeach ; ?>
    </form>
  </div>
</div>
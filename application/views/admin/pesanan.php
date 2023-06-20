<main id="main" class="main">
<div class="container-fluid" style="margin-bottom: 100px">
<div class="pagetitle">
  <h1><?php echo $title ?></h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url('admin/pesanan/pesan')?>">Home</a></li>
      <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ol>
  </nav>
</div>
<?php echo $this->session->flashdata('pesan') ?>
    <table class = "table table-bordered table-striped mt-2">
        <tr>
            <th class = "text-center">No</th>
            <th class = "text-center">Nama Customer</th>
            <th class = "text-center">Nama Treatment</th>
            <th class = "text-center">Tipe Pesan</th>
            <th class = "text-center">Tanggal</th>
            <th class = "text-center">Jam</th>
            <th class = "text-center">Jumlah Bayar</th>
            <th class = "text-center">Status</th>
            <th class = "text-center">Action</th>
        </tr>   
        <?php $no=1; foreach($pesanan as $p) : ?>  
            <tr>
            <?php $diskon = (($p->harga*20)/100); ?>
                <td><?php echo $no ++ ?></td>
                <td><?php echo $p->nama ?></td>
                <td><?php echo $p->nama_treatment ?></td>
                <td><?php echo $p->tipe_pesan ?></td>
                <td><?php echo $p->tanggal ?></td>
                <td><?php echo $p->jam ?></td>
                <td>Rp. <?php echo number_format($p->harga - $diskon,0,',','.') ?></td>
                <td><?php if($p->status == '1'){ ?>
                                    <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Belum Bayar</span>                       
                                <?php } elseif($p->status == '0') { ?>
                                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Transaksi Selesai</span>
                                <?php }  else { ?>
                                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Proses</span>
                                <?php } ?>
                            </td>
                <td>
                    <center>
                        <a class = "btn btn-sm btn-info" href = "<?php echo base_url('admin/pesanan/pembayaran/'.$p->id_pesan) ?>"><i class="fas fa-eye"></i></a>
                        <a onclick = "return confirm('Yakin ingin menghapus?')"class = "btn btn-sm btn-danger" href = "<?php echo base_url('admin/pesanan/deleteData/'.$p->id_pesan) ?>"><i class="fas fa-trash"></i></a>
                    </center>
                </td>
            </tr>
        <?php endforeach; ?>
    </div>
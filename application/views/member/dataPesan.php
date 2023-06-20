<div class="container" style="margin-bottom: 100%">
        <div class="card-header mt-5"> 
            <center><h3>Data Pesanan Anda</h3></center>
        </div>
        <div class="card-body mt-5">
            <div class="table">
                <table class = "table table-bordered table-striped mt-2">
                    <tr>
                        <th class = "text-center">No</th>
                        <th class = "text-center">Nama Treatment</th>
                        <th class = "text-center">Tanggal</th>
                        <th class = "text-center">Status</th>
                        <th class = "text-center">Cetak bukti Pembayaran</th>
                    </tr>   
                    <?php $no=1; foreach($datapesan as $dp) : ?>  
                        <tr>
                            <td><?php echo $no ++ ?></td>
                            <td><?php echo $dp->nama_treatment ?></td>
                            <td><?php echo $dp->tanggal ?></td>
                            <td><?php if($dp->status == '1'){ ?>
                                    <center><span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Belum Bayar</span></center>                      
                                <?php } elseif($dp->status == '0') { ?>
                                    <center><span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Pesanan Diterima</span></center>
                                <?php }  else { ?>
                                    <center><span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Proses Admin</span></center>
                                <?php } ?>
                            </td>
                        <td>
                        <center>
                        <a class="btn btn-sm btn-info" href="<?php echo base_url('member/detailPesan/cetak/'.$dp->id_pesan)?>">Cetak</a>
                        </center>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
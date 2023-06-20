<table class="table">
    <h1>Invoice Pembayaran Anda</h1>
    <?php foreach ($cetak as $ct) : ?>
            <tr>
                <th>Nama Customer</th>
                <td>:</td>
                <td><?php echo $ct->nama ?></td>
            </tr>
            <tr>
                <th>Nama Treatment</th>
                <td>:</td>
                <td><?php echo $ct->nama_treatment ?></td>
            </tr>
            <tr>
                <th>Tipe</th>
                <td>:</td>
                <td><?php echo $ct->tipe ?></td>
            </tr>
            <tr>
                <th>Harga</th>
                <td>:</td>
                <td>Rp. <?php echo number_format($ct->harga,0,',','.') ?></td>
            </tr>
            <tr>
                <th>Diskon</th>
                <td>:</td>
                <td><?php if($ct->hak_akses == '3'){ ?>
                    <?php echo "20%";
                    $diskon = (($ct->harga*20)/100); ?>                    
                    <?php }  else { ?>
                        <?php echo $diskon = 0; ?>
                    <?php } ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>:</td>
                <td><?php echo $ct->tanggal?></td>
            </tr>
            <tr>
                <th>Jam</th>
                <td>:</td>
                <td><?php echo $ct->jam ?></td>
            </tr>
            <tr>
                <th>Tipe Pesan</th>
                <td>:</td>
                <td><?php echo $ct->tipe_pesan ?></td>
            </tr>
            <tr>
                <th>Status Pembayaran</th>
                <td>:</td>
                <td><?php if($ct->status == '1'){ ?>
                    <span class="badge bg-danger"><i class="bi bi-exclamation-octagon me-1"></i> Belum Bayar</span>                       
                    <?php } elseif($ct->status == '0') { ?>
                        <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Lunas</span>
                    <?php }  else { ?>
                        <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Proses</span>
                    <?php } ?>
                </td>
            </tr>
            <tr>
                <th>Jumlah Pembayaran</th>
                <td>:</td>
                <td><b>Rp. <?php echo number_format($ct->harga - $diskon,0,',','.') ?></b></td>
            </tr>
            <?php endforeach ; ?>
        </table>
        <script type="text/javascript">
            window.print();
        </script>
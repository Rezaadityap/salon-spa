<?php if (empty($this->cart->contents())) { ?>
<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>
<center>
    <img src="<?php echo base_url('assets/img/keranjang.png') ?>" class="img-fluid mt-4" width="400px"><br>
    <a href="<?php echo base_url('member/dashboard') ?>" class="btn btn-primary mt-2"> Buat Pesanan Sekarang</a>
</center>
<?php } else { ?>
<div class="card card-solid">
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>
    <h2 style="text-align: center; margin: 7px">
        <?php echo $title ?>
    </h2>
    <div class="card-body pb-0">
        <div class="row">
            <?php echo form_open('path/to/controller/update/method'); ?>

            <table cellpadding="6" cellspacing="1" style="width:100%" border="0">
                <tr>
                    <th>QTY</th>
                    <th>Nama Treatment</th>
                    <th calss="text-center">Harga</th>
                    <th class="text-center">Action</th>
                </tr>
                <?php $i = 1; ?>
                <?php foreach ($this->cart->contents() as $items): ?>

                <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>

                <tr>
                    <td>    
                        <?php echo form_input(array('name' => $i . '[qty]', 'type' => 'number', 'value' => $items['qty'], 'maxlength' => '3', 'min' => '0', 'size' => '5')); ?>
                    </td>
                    <td>
                        <?php echo $items['name']; ?>
                    </td>
                    <td>Rp.
                        <?php echo $this->cart->format_number($items['price']); ?>
                    </td>   
                    <td class="text-center">
                        <a href="<?php echo base_url('member/pesan/hapus/' . $items['rowid']) ?>"
                            class="btn btn-danger tombol-hapus"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>


                <?php $i++; ?>

                <tr>
                    <td colspan="2"> </td>
                    <td><strong>Total</strong></td>
                    <td>Rp.
                        <?php echo $this->cart->format_number($this->cart->total()); ?>
                    </td>
                </tr>


            </table>
        </div>
        <div class="row mb-3 mt-2">
            <div class="col align-self-end">
                <a href="<?php echo base_url('member/dashboard') ?>" class="btn btn-danger"><i
                        class="bi bi-arrow-left-circle"> Tambah Pesanan</i></a>
                <a href="<?php echo base_url('member/pesan/transaksi') ?>" class="btn btn-success"><i
                        class="bi bi-cart">
                        Buat Pesanan</i></a>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>
<?php } ?>
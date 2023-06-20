<table class="table">
    <h1>Bukti Pembayaran</h1>
    <?php foreach ($cetak as $ct) : ?>
            <tr>
                <img src="<?php echo base_url().'assets/photo/bukti_bayar/'.$ct->bukti_bayar ?>">
            </tr>
            <?php endforeach ; ?>
        </table>
        <script type="text/javascript">
            window.print();
        </script>
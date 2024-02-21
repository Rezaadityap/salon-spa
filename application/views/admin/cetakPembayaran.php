<table class="table">
    <center><h1>Bukti Pembayaran</h1></center>
    <?php foreach ($cetak as $ct) : ?>
        <tr>
            <center><img src="<?php echo base_url().'assets/photo/bukti_bayar/'.$ct->bukti_bayar ?>" class="img-fluid" width="300px"></center>
        </tr>
    <?php endforeach ; ?>
</table>
<script type="text/javascript">
    window.print();
</script>
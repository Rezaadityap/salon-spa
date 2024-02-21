<div class="container" style="margin-bottom: 100px">
    <div class="card mt-4">
        <div class="card-header text-center bg-success text-white">Rincian Pesanan</div>
        <div class="card-body">
            <form method="post" action="<?php echo base_url('member/pesan/rincian') ?>">
                <?php foreach ($this->cart->contents() as $items): ?>
                <div class="form-group mb-2">
                    <label>Nama Pemesan</label>
                    <input type="text" name="nama" value="<?php echo $this->session->userdata('nama') ?>"
                        class="form-control" readonly>
                </div>
                <div class="form-group mb-2">
                    <label>Nama Treatment</label>
                    <input type="text" name="nama_treatment" value="<?php echo $items['name'] ?>" class="form-control"
                        readonly>
                </div>
                <div class="form-group mb-2">
                    <label>Harga</label>
                    <input type="text" name="harga"
                        value="Rp. <?php echo $this->cart->format_number($items['price']) ?>" class="form-control"
                        readonly>
                </div>
                <hr>
                <?php endforeach; ?>
                <div class="form-group mb-2">
                    <label><b>Total Bayar</b></label>
                    <span class="input-group-text form-control">Rp.
                        <?php echo $this->cart->format_number($this->cart->total()); ?>
                    </span>
                    <input type="hidden" name="total_bayar" value="<?php echo $this->cart->total(); ?>"
                        class="form-control" readonly>
                </div>
        </div>
    </div>


    <div class="card mt-4">
        <div class="card-header text-center text-white bg-primary">
            Input Pengajuan Pesanan
        </div>
        <div class="card-body">
            <input type="hidden" name="id_member" value="<?php echo $this->session->userdata('id_member') ?>"
                class="form-control" id="">
            <div class="form-group mb-2">
                <label>Tanggal Pesan <span style="color: red">*</span></label>
                <input type="date" name="tanggal" class="form-control">
                <?php echo form_error('tanggal', '<div class = "text-small text-danger"></div>') ?>
            </div>
            <div class="form-group mb-2">
                <label>Tipe Pesan<span style="color: red">*</span></label>
                <select name="tipe_pesan" class="form-control">
                    <option value="">-- Pilih Tipe --</option>
                    <option value="Homecare">Homecare</option>
                    <option value="Booking">Booking</option>
                </select>
                <?php echo form_error('tipe_pesan', '<div class = "text-small text-danger"></div>') ?>
            </div>
            <div class="form-group mb-2">
                <label>Jam Pesan<span style="color: red">*</span></label>
                <input type="time" name="jam" class="form-control">
                <?php echo form_error('jam', '<div class = "text-small text-danger"></div>') ?>
            </div>
            <span style="color: red; font-size: 10px">Note : Mohon isi sesuai dengan kebutuhan anda!</span>
            <center><button type="submit" class="btn btn-primary mt-2">Ajukan</button></center>
        </div>
    </div>
    </form>
</div>
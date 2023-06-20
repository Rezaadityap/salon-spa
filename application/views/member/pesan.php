<div class="container">
    <div class="card" style="margin-top: 100px; margin-bottom: 100px">
        <div class="card-header bg-dark text-white">
            <b>Form Pesanan</b>
        </div>
        <div class="card-body">
            <?php foreach($pesan as $p) : ?>
                <form method="POST" action="<?php echo base_url('member/pesan/tambahAksi')?>" enctype= "multipart/form-data">
                    <div class="form-group mb-2">
                        <label><b>Nama Treatment</b></label>
                        <input type="hidden" name="id_treatment" value="<?php echo $p->id_treatment ?>">
                        <input type="text" name="nama_treatment" class="form-control" value="<?php echo $p->nama_treatment ?>"readonly>
                    </div>
                    <div class="form-group mb-2">
                        <label><b>Tipe</b></label>
                        <input type="text" name="tipe" class="form-control" value="<?php echo $p->tipe ?>"readonly>
                    </div>
                    <div class="form-group mb-2">
                        <label><b>Harga</b></label>
                        <input type="text" name="harga" class="form-control" value="Rp. <?php echo number_format($p->harga,0,',','.') ?>"readonly>
                    </div>
                    <div class="form-group mb-2">
                        <label><b>Tanggal Pesan</b></label>
                        <input type="date" name="tanggal" class="form-control">
                        <?php echo form_error('tanggal','<div class = "text-small text-danger"></div>')?>
                    </div>
                    <div class="form-group mb-2">
                        <label><b>Jam Pesan</b></label>
                        <input type="time" name="jam" class="form-control">
                        <?php echo form_error('jam','<div class = "text-small text-danger"></div>')?>
                    </div>
                    <div class="form-group mb-2">
                        <label><b>Tipe Pesanan</b></label>
                        <select name="tipe_pesan" class="form-control">
                            <option value="">-- Pilih Tipe --</option>
                            <option value="booking">Booking</option>
                            <option value="homecare">Homecare</option>
                        </select>
                        <?php echo form_error('tipe_pesan','<div class = "text-small text-danger"></div>')?>
                    </div>
                    <div class="form-group mb-2">
                        <label><b>Alamat</b></label>
                        <input type="text" name="alamat" class="form-control">
                        <?php echo form_error('alamat','<div class = "text-small text-danger"></div>')?>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Pesan</button>
                    <a href="<?php echo base_url('member/dashboard')?>">
                        <button type = "button" class="btn btn-danger mt-2">Batal</button>
                    </a>
                </form>
                <?php endforeach ; ?>
        </div>
    </div>
</div>
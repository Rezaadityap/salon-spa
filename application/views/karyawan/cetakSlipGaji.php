<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <style type="text/css">
        body{
            font-family: Arial;
            color: black;
        }
    </style>
</head>
<body>
<center>
        <h1>Amberlee Salon & Spa</h1>
        <h2>Slip Gaji Karyawan : </h2>
        <hr style="width: 50%; border-width: 5px; color: black;">
    </center>

    <?php foreach($setting_gaji as $s)  {
            $potongan = $s->nominal;
            $ovt = $s->nominal;
        }?>
    
    <?php foreach ($print_slip as $ps) : ?>   
        <?php $potonganGaji = $ps->alfa * $potongan; ?> 
     <table style="width: 100%">
            <tr>
                <td style="width: 20%">NIK</td>
                <td style="width: 2%">:</td>
                <td><?php echo $ps->nik ?></td>
            </tr>
            <tr>
                <td>Nama Karyawan</td>
                <td>:</td>
                <td><?php echo $ps->nama_karyawan ?></td>
            </tr>
            <tr>
                <td>Nama Jabatan</td>
                <td>:</td>
                <td><?php echo $ps->nama_jabatan ?></td>
            </tr>
            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?php echo substr($ps->bulan, 0,2) ?></td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?php echo substr($ps->bulan, 2,4) ?></td>
            </tr>
    </table>
    <table class="table table-bordered table-striped mt-3">
            <tr>
                <th class="text-center" width="5%">NO</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Jumlah</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Gaji Pokok</td>
                <td>Rp.<?php echo number_format ($ps->gaji_pokok,0,',','.') ?></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Uang Makan</td>
                <td>Rp.<?php echo number_format ($ps->uang_makan,0,',','.') ?></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Potongan</td>
                <td>Rp.<?php echo number_format ($potonganGaji,0,',','.') ?></td>
            </tr>
                <th colspan="2" style="text-align: right;">Total Gaji</th>
                <th>Rp.<?php echo number_format ($ps->gaji_pokok+$ps->uang_makan-$potonganGaji,0,',','.') ?></th>
            </tr>
    </table>
    <table width="100%">
        <tr>
            <td>
                <p>Karyawan</p>
                <br>
                <br>
                <p class="font-weight-bold"><?php echo $ps->nama_karyawan ?></p>
            </td>
            <td width="200px">
                <p>Karawang, <?php echo date("d M Y") ?><br>Finance,</p>
                <br>
                <br>
                <p>__________________</p>
            </td>
        </tr>
    </table>
    <?php endforeach; ?>    
</body>
</html>
<script>
    window.print();
</script>
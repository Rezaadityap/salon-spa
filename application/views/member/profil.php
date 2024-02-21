<main id="main" class="main">
    <div class="container-fluid" style="margin-bottom: 100px">
        <div class="panel-body mt-4" align="center">
            <?php foreach ($member as $k): ?>
                <img src="<?php echo base_url('assets/img/member.png') ?>" align="center" class="img-circle" width="250px">
            </div>
            <div class="panel-heading">
                <center>
                    <h3 class="panel-title">Data Member</h3>
                </center>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td><b>Nama</b></td>
                                <td>
                                    <?php echo $k->nama ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td>
                                    <?php echo $k->email ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Alamat</b></td>
                                <td>
                                    <?php echo $k->alamat ?>
                                </td>
                            </tr>
                            <tr>
                                <td><b>No HP</b></td>
                                <td>
                                    <?php echo $k->no_hp ?>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
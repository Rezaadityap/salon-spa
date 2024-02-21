<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url() ?>/assets/img/amberlee.png">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/login/css/main.css">
<!--===============================================================================================-->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/js/sweetalert2.min.css">

</head>
<body>
<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
        <div class="dataFlash" data-flashdata="<?php echo $this->session->flashdata('massage'); ?>"></div>
		<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan'); ?>"></div>					
            <span class="login100-form-title p-b-26">
				<?php echo $title ?>
			</span>
			<form class="user" method="POST" action="<?php echo base_url('register/registerAksi') ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user"
                    placeholder="Masukkan Nama" name="nama" value="<?php echo set_value('nama') ?>">
                    <?php echo form_error('nama','<small class = "text-danger">','</small>')?>
                </div>
				<div class="form-group">
                    <input type="text" class="form-control form-control-user"
                    placeholder="Masukkan Email" name="email" value="<?php echo set_value('email') ?>">
                    <?php echo form_error('email','<small class = "text-danger">','</small>')?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user"
                    placeholder="Masukkan Password" name="password" id="password">
                    <?php echo form_error('password','<small class = "text-danger">','</small>')?>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user"
                    placeholder="Ulangi Password" name="password2" id="password2">
                </div>
				<div class="form-group">
                    <input type="number" class="form-control form-control-user"
                    placeholder="Masukkan No. HP" name="no_hp" value="<?php echo set_value('no_hp') ?>">
                    <?php echo form_error('no_hp','<small class = "text-danger">','</small>')?>
                </div>
				<div class="form-group">
                    <input type="textarea" class="form-control form-control-user"
                    placeholder="Masukkan Alamat" name="alamat" value="<?php echo set_value('alamat') ?>">
                    <?php echo form_error('alamat','<small class = "text-danger">','</small>')?>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary btn-user btn-block mb-2">Daftar</button>
				<a href="<?php echo base_url('login')?>" class="btn btn-secondary btn-user btn-block mb-2">Kembali</a>
            </form>
			<center><p> © Copyright by Amberlee</p></center>
            <!-- JQuery -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <!-- SWAL -->
            <script src="<?php echo base_url() ?>assets/js/sweetalert2.all.min.js"></script>
            <script src="<?php echo base_url() ?>assets/js/sweetalert2.min.js"></script>
            <script src="<?php echo base_url() ?>assets/js/myscript.js"></script>
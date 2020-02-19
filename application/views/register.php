<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url();?>assets/login/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="margin-top: 200px;">
				<form class="login100-form validate-form" method="post" action="<?php echo base_url();?>index.php/auth/register">
					<span class="login100-form-title p-b-15">
						Pendaftaran
					</span>
					<hr/>
					<?php if($this->session->flashdata('result')==TRUE):?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
 							<?php echo $this->session->flashdata('result');?>
 							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    							<span aria-hidden="true">&times;</span>
  							</button>
						</div>
						<?php endif; ?>
					
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Nama Lengkap Harus Di Isi">
						<span class="label-input100">Nama Lengkap</span>
						<input class="input100" type="text" name="nama" placeholder="Tulis nama kamu">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Email Harus Di Isi">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Tulis nama kamu">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-23" data-validate = "Nomor Telpom Harus Di Isi">
						<span class="label-input100">No Telepon</span>
						<input class="input100" type="text" name="tlp" placeholder="Tulis Nomor Telepon kamu">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password Harus Di Isi">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Tulis password kamu">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ulangi Password" data-validate-match="password">
						<span class="label-input100">Ulangi Password</span>
						<input class="input100" type="password" name="c_password" placeholder="Ulangi">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<span class="label-input100">Daftar Sebagai</span>
						<select class="input100" name="level">
							<option value="2" <?php if($this->input->get('l')=="pencari"){echo "selected";}?>>Pencari</option>
							<option value="1" <?php if($this->input->get('l')=="pemilik"){echo "selected";}?>>Pemilik</option>
						</select>
					</div>
					<div class="container-login100-form-btn">
						<p>Sudah Punya Akun ?? Masuk <a href="<?php echo base_url();?>index.php/auth/">Disini!!</a></p>
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit" value="simpan">
								Daftar
							</button>
						</div>
					</div>

					

									</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/login/js/main.js"></script>

</body>
</html>
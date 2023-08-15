<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title; ?></title>
	<!-- Custom fonts for this template-->
	<link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
	<link rel="shortcut icon" href="<?= base_url('assets/img/logo2.png'); ?>" type="image/x-icon">

	<!-- Custom styles for this template-->
	<link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet" />

</head>

<body style="background-image: url(<?= base_url('assets/img/sekolah.jpg'); ?>); object-fit: cover; background-size: cover;">
	<div class="container-fluid">
		<div class="row justify-content-center align-items-center" style="min-height: 100vh;">
			<div class="col col-md-12 text-center p-3  align-content-center text-uppercase">
				<img src="<?= base_url('assets/img/logo2.png'); ?>" width="100" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} mb-3" alt="">
				<h1 class=" font-weight-bold " style="color: #ffff;">Sistem Informasi Raport</h1>
				<h4 class="font-weight-bold text-white">SMP NEGERI 1 ELELIM</h4>
				<a name="" id="" class="btn btn-outline-light" href="<?= site_url('auth'); ?>" role="button">Login</a>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
</body>

</html>
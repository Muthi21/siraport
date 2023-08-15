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
            <div class="col col-md-4 p-3 card  align-content-center shadow-lg border-0 bg-red">
                <div class="card-body text-center">
                    <img src="<?= base_url('assets/img/logo2.png'); ?>" width="100" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} " alt="">
                    <h5 class="text-center"><span class="text-primary font-weight-bold">Raport</span> Online</h5>
                    <?= $this->session->flashdata('pesan'); ?>
                    <?= form_open('auth'); ?>
                    <div class="form-group text-left">
                        <label for="my-input">Username</label>
                        <input id="my-input" class="form-control  bg-transparent" type="text" name="username" placeholder="Username" autocomplete="off" value="<?= set_value('username'); ?>">
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group text-left">
                        <label for="my-input">Password</label>
                        <input id="my-input" class="form-control bg-transparent" type="password" name="password" placeholder="Password" autocomplete="off" value="<?= set_value('password'); ?>">
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group text-left">
                        <label for="my-select">Rule (Guru,Siswa)</label>
                        <select id="my-select" class="form-control" name="level">
                            <option value="Admin">-Pilih-</option>
                            <option value="Guru">Guru</option>
                            <option value="Siswa">Siswa</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-block btn-sm mb-2">Masuk</button>
                    <div class="small d-flex">
                        <span class=" ml-2 mt-md-2">Kembali ke halaman utama, klik <a name="" id="" href="<?= site_url('welcome'); ?>" role="button">disini</a></span>
                    </div>
                    <?= form_close(); ?>
                </div>
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
<?= form_open('auth/prosesupdate/' . $akun['id_user']); ?>
<h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
<?= $this->session->flashdata('pesan');
?>
<div class="card mb-4 border-0">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="d-flex float-right">
                    <a name="" id="" class="btn btn-outline-danger btn-sm" href="<?= site_url('auth/register'); ?>" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="my-input">Username</label>
            <input id="my-input" class="form-control" type="text" name="username" placeholder="Username" autocomplete="off" value="<?= $akun['username']; ?>">
        </div>
        <div class="form-group">
            <label for="my-select">Hak Akses</label>
            <select id="my-select" class="form-control" name="hak_akses">
                <option selected>-Pilih-</option>
                <option value="Admin" <?= ($akun['hak_akses'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                <option value="Guru" <?= ($akun['hak_akses'] == 'Guru') ? 'selected' : ''; ?>>Guru</option>
                <option value="Siswa" <?= ($akun['hak_akses'] == 'Siswa') ? 'selected' : ''; ?>>Siswa</option>
            </select>
        </div>
        <hr>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-sm d-flex float-right">Update</button>
            <button type="reset" class="btn btn-outline-danger btn-sm d-flex float-right mx-2">Reset</button>
        </div>
    </div>
</div>
<?= form_close(); ?>
<?= form_open('auth/prosesupdatepass/' . $user['id_user']); ?>
<h1 class="h5 mb-4 text-gray-800">Ubah Password</h1>
<div class="card mb-4 border-0">
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="my-input">Password Baru</label>
                <input id="my-input" class="form-control" type="password" name="password" placeholder="Password" autocomplete="off">
                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group col-md-6">
                <label for="my-input">Konfirmasi Password</label>
                <input id="my-input" class="form-control" type="password" name="konfir_password" placeholder="Konfirmasi password" autocomplete="off">
            </div>
        </div>
        <hr>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-sm d-flex float-right">Update</button>
            <button type="reset" class="btn btn-outline-danger btn-sm d-flex float-right mx-2">Reset</button>
        </div>
    </div>
</div>
<?= form_close(); ?>
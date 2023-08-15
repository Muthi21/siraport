<h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
<?= $this->session->flashdata('pesan'); ?>
<div class="card border-0">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="d-flex float-right">
                    <a name="" id="" class="btn btn-outline-primary btn-sm" href="#" role="button" data-toggle="modal" data-target="#daftarakun"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Akun</a>
                </div>
            </div>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Hak Akses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($akun as $key) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center"><?= $key['username']; ?></td>
                            <td class="text-center"><?= $key['hak_akses']; ?></td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Button group">
                                    <a name="" id="" class="btn btn-outline-danger" href="<?= site_url('auth/delete/' . $key['id_user']); ?>" role="button"><i class="fa fa-times" aria-hidden="true"></i> Hapus</a>
                                    <a name="" id="" class="btn btn-outline-primary" href="<?= site_url('auth/detail/' . $key['id_user']) ?>" role="button"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= form_open('auth/prosesregister'); ?>
<div id="daftarakun" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered fixed-top" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <p class="h5 text-gray-800 font-weight-bold">Daftar <span class="text-primary">Akun</span>
                </p>
                <div class="form-group">
                    <label for="my-input">Username</label>
                    <input id="my-input" class="form-control" type="text" name="username" placeholder="Username" autocomplete="off" value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="my-input">Password</label>
                        <input id="my-input" class="form-control" type="password" name="password" placeholder="Password" autocomplete="off">
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="my-input">Konfirmasi Password</label>
                        <input id="my-input" class="form-control" type="password" name="konfir_password" placeholder="Konfirmasi password" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label for="my-select">Hak Akses</label>
                    <select id="my-select" class="form-control" name="hak_akses">
                        <option selected>-Pilih-</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary btn-sm d-flex float-right">Daftar</button>
                    <button type="button" class="btn btn-outline-danger btn-sm d-flex float-right mx-2" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>
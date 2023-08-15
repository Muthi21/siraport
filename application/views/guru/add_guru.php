<?= form_open('guru/add') ?>
<h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
<?= $this->session->flashdata('pesan'); ?>
<div class="card border-0 mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="d-md-flex float-right d-none">
                    <a name="" id="" class="btn btn-outline-danger btn-sm" href="<?= site_url('guru'); ?>" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Kode Guru</label>
                <input type="text" name="kode_guru" id="" class="form-control text-uppercase" placeholder="gur000" autocomplete="off" value="<?= $this->input->post('kode_guru', true) ? $this->input->post('kode_guru', true) : 'GUR001' ?>">
                <?= form_error('kode_guru', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group col-md-6">
                <label for="">Nama</label>
                <input type="text" name="nama_guru" id="" class="form-control" placeholder="Nama lengkap" autocomplete="off" value="<?= set_value('nama_guru'); ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="" class="form-control" placeholder="Tempat lahir" autocomplete="off" value="<?= set_value('tempat_lahir'); ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="" class="form-control" placeholder="Tanggal lahir" autocomplete="off" value="<?= set_value('tanggal_lahir'); ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="my-select">Jenis Kelamin</label>
                <select id="my-select" class="form-control" name="jenis_kelamin">
                    <option value="-">-Pilih-</option>
                    <option value="Laki - laki">Laki - laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="my-select">Agama</label>
                <select id="my-select" class="form-control" name="agama">
                    <option selected>-Pilih-</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="">No. Telepon</label>
                <input type="number" name="no_tlp" id="" class="form-control" placeholder="xxxxxxxxxxxxx" autocomplete="off" value="<?= set_value('no_tlp'); ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" name="alamat" id="" class="form-control" placeholder="Alamat" autocomplete="off" value="<?= set_value('alamat'); ?>">
        </div>
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

        <hr class="my-3">
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-sm">Simpan</button>
        </div>
    </div>
</div>
<?= form_close(); ?>
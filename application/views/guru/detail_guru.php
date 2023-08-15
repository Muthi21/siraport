<?= form_open('guru/detail/' . $list['id_guru']); ?>
<h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
<?= $this->session->flashdata('pesan'); ?>
<div class="card border-0 mb-4">
    <div class="d-md-block d-none">
        <a name="" id="" class="btn btn-outline-danger btn-sm float-right mr-4 mt-3" href="<?= site_url('guru'); ?>" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
    </div>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Kode Guru</label>
                <input type="text" name="kode_guru" id="" class="form-control text-uppercase" placeholder="gur000" autocomplete="off" value="<?= $list['kode_guru']; ?>">
                <?= form_error('kode_guru', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group col-md-6">
                <label for="">Nama</label>
                <input type="text" name="nama_guru" id="" class="form-control" placeholder="Nama lengkap" autocomplete="off" value="<?= $list['nama_guru']; ?>">
                <?= form_error('nama_guru', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="" class="form-control" placeholder="Tempat lahir" autocomplete="off" value="<?= $list['tempat_lahir']; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="" class="form-control" placeholder="Tanggal lahir" autocomplete="off" value="<?= $list['tanggal_lahir']; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="my-select">Jenis Kelamin</label>
                <select id="my-select" class="form-control" name="jenis_kelamin">
                    <option selected>-Pilih-</option>
                    <option value="Laki - laki" <?= ($list['jenis_kelamin'] == 'Laki - laki') ? 'selected' : ''; ?>>Laki - laki</option>
                    <option value="Perempuan" <?= ($list['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="my-select">Agama</label>
                <select id="my-select" class="form-control" name="agama">
                    <option selected>-Pilih-</option>
                    <option value="Islam" <?= ($list['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                    <option value="Kristen" <?= ($list['agama'] == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                    <option value="Katolik" <?= ($list['agama'] == 'Katolik') ? 'selected' : ''; ?>>Katolik</option>
                    <option value="Hindu" <?= ($list['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                    <option value="Budha" <?= ($list['agama'] == 'Budha') ? 'selected' : ''; ?>>Budha</option>
                    <option value="Konghucu" <?= ($list['agama'] == 'Konghucu') ? 'selected' : ''; ?>>Konghucu</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="">No. Telepon</label>
                <input type="number" name="no_tlp" id="" class="form-control" placeholder="xxxxxxxxxxxxx" autocomplete="off" value="<?= $list['no_tlp']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" name="alamat" id="" class="form-control" placeholder="Alamat" autocomplete="off" value="<?= $list['alamat']; ?>">
        </div>
        <div class="form-group">
            <label for="my-input">Username</label>
            <input id="my-input" class="form-control" type="text" name="username" placeholder="Username" autocomplete="off" value="<?= set_value('username') ? set_value('username') : $list['username'] ?>">
            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
        </div>
        <hr class="my-3">
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
        </div>
    </div>
</div>
<?= form_close() ?>
<?= form_open('guru/proses_updatePassword/' . $list['id_guru']); ?>
<div class="card mb-4 border-0">
    <div class="card-body">
        <h1 class="text-gray-800 h5">Update Password</h1>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="my-input">Password Baru</label>
                <input id="my-input" class="form-control" type="password" name="password" placeholder="Password" autocomplete="off">
                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group col-md-6">
                <label for="my-input">Konfirmasi Password Baru</label>
                <input id="my-input" class="form-control" type="password" name="konfir_password" placeholder="Konfirmasi password" autocomplete="off">
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
        </div>
    </div>
</div>
<?= form_close(); ?>
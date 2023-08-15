<?= form_open('siswa/detail/' . $join['id_siswa']); ?>
<h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
<?= $this->session->flashdata('pesan'); ?>
<div class="card border-0 mb-4">
    <div class="d-md-block d-none">
        <a name="" id="" class="btn btn-outline-danger btn-sm float-right mr-4 mt-3" href="<?= site_url('siswa'); ?>" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
    </div>

    <div class="card-body">
        <div class="form-group">
            <label for="">NIS</label>
            <input type="number" name="nis" id="" class="form-control" placeholder="" value="<?= $join['nis']; ?>" autocomplete="off">
            <?= form_error('nis', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="">Nama Siswa</label>
            <input type="text" name="nama_siswa" id="" class="form-control text-capitalize" placeholder="" value="<?= $join['nama_siswa']; ?>" autocomplete="off">
            <?= form_error('nama_siswa', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="my-select">Kelas</label>
            <select id="my-select" class="form-control" name="kelas">
                <option value="-" selected>-Pilih-</option>
                <?php foreach ($kelas as $key) : ?>
                    <option class="text-uppercase" value="<?= $key['id_kelas']; ?>" <?= ($join['id_kelas'] == $key['id_kelas']) ? 'selected' : ''; ?>><?= $key['kelas']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="my-input">Tempat Lahir</label>
                <input id="my-input" class="form-control text-capitalize" type="text" name="tempat_lahir" placeholder="Tempat lahir" value="<?= $join['tempat_lahir']; ?>" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
                <label for="my-input">Tanggal Lahir</label>
                <input id="my-input" class="form-control" type="date" name="tanggal_lahir" value="<?= $join['tanggal_lahir']; ?>" autocomplete="off">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="my-select">Jenis Kelamin</label>
                <select id="my-select" class="form-control" name="jenis_kelamin" value="<?= set_value('jenis_kelamin'); ?>">
                    <option value="">-Pilih-</option>
                    <option value="Laki - laki" <?= ($join['jenis_kelamin'] == 'Laki - laki') ? 'selected' : ''; ?>>Laki - laki</option>
                    <option value="Perempuan" <?= ($join['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="my-select">Agama</label>
                <select id="my-select" class="form-control" name="agama">
                    <option selected>-Pilih-</option>
                    <option value="Islam" <?= ($join['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
                    <option value="Kristen" <?= ($join['agama'] == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
                    <option value="Katolik" <?= ($join['agama'] == 'Katolik') ? 'selected' : ''; ?>>Katolik</option>
                    <option value="Hindu" <?= ($join['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
                    <option value="Budha" <?= ($join['agama'] == 'Budha') ? 'selected' : ''; ?>>Budha</option>
                    <option value="Konghucu" <?= ($join['agama'] == 'Konghucu') ? 'selected' : ''; ?>>Konghucu</option>
                </select>
            </div>
        </div>
        <div class="form-group mb-4">
            <label for="my-input">Alamat</label>
            <input id="my-input" class="form-control" type="text" name="alamat" value="<?= $join['alamat']; ?>" placeholder="Alamat" autocomplete="off">
        </div>
        <h5 class="text-gray-800">Data Sekolah</h5>
        <div class="form-row mb-4">
            <div class="form-group col-md-6">
                <label for="my-input">Tanggal Masuk</label>
                <input id="my-input" class="form-control" type="date" name="tanggal_masuk" placeholder="Tanggal masuk" value="<?= $join['tanggal_masuk']; ?>" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
                <label for="my-input">Asal Sekolah</label>
                <input id="my-input" class="form-control text-capitalize" type="text" name="asal_sekolah" placeholder="Asal sekolah" value="<?= $join['asal_sekolah']; ?>" autocomplete="off">
            </div>
        </div>
        <h5 class="text-gray-800">Data Orang Tua</h5>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="my-input">Nama Ayah</label>
                <input id="my-input" class="form-control text-capitalize" type="text" name="nama_ayah" placeholder="Nama ayah" value="<?= $join['nama_ayah']; ?>" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
                <label for="my-input">Pekerjaan Ayah</label>
                <input id="my-input" class="form-control" type="text" name="pekerjaan_ayah" placeholder="Pekerjaan ayah" value="<?= $join['pekerjaan_ayah']; ?>" autocomplete="off">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="my-input">Nama Ibu</label>
                <input id="my-input" class="form-control" type="text" name="nama_ibu" placeholder="Nama ibu" value="<?= $join['nama_ibu']; ?>" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
                <label for="my-input">Pekerjaan Ibu</label>
                <input id="my-input" class="form-control" type="text" name="pekerjaan_ibu" placeholder="Pekerjaan ibu" value="<?= $join['pekerjaan_ibu']; ?>" autocomplete="off">
            </div>
        </div>
        <div class="form-group mb-4">
            <label for="my-input">No. Telepon</label>
            <input id="my-input" class="form-control" type="number" name="no_tlportu" placeholder="xxxxxxxxxxxxx" value="<?= $join['no_tlportu']; ?>" autocomplete="off">
        </div>
        <h1 class="h5 text-gray-800 mt-3">Data Wali</h1>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="my-input">Nama Wali</label>
                <input id="my-input" class="form-control" type="text" name="nama_wali" placeholder="Nama wali" value="<?= $join['nama_wali']; ?>" autocomplete="off">
            </div>
            <div class="form-group col-md-6">
                <label for="my-input">Pekerjaan Wali</label>
                <input id="my-input" class="form-control" type="text" name="pekerjaan_wali" placeholder="Pekerjaan wali" value="<?= $join['pekerjaan_wali']; ?>" autocomplete="off">
            </div>
        </div>
        <h1 class="h5 text-gray-800 mt-3">Account</h1>
        <div class="form-group">
            <label for="my-input">Username</label>
            <input id="my-input" class="form-control" type="text" name="username" placeholder="Username" autocomplete="off" value="<?= set_value('username') ? set_value('username') : $join['username'] ?>">
            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
        </div>
        <hr>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
        </div>
    </div>
</div>
<?= form_close(); ?>
<?= form_open('siswa/proses_updatePassword/' . $join['id_siswa']); ?>
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
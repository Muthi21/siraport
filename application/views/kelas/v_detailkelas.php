<?= form_open('kelas/prosesupdate/' . $join['id_kelas']); ?>
<h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
<?= $this->session->flashdata('pesan');
?>
<div class="card border-0 mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="d-md-flex float-right d-none">
                    <a name="" id="" class="btn btn-outline-danger btn-sm" href="<?= site_url('kelas'); ?>" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Kode Kelas</label>
                <input type="text" name="kode_kelas" id="" class="form-control text-uppercase" placeholder="" autocomplete="off" value="<?= $join['kode_kelas']; ?>">
                <?= form_error('kode_kelas', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group col-md-6">
                <label for="">Nama Kelas</label>
                <input type="text" name="nama_kelas" id="" class="form-control text-uppercase" placeholder="" autocomplete="off" value="<?= $join['kelas']; ?>">
                <?= form_error('nama_kelas', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="my-select">Wali Kelas</label>
                <select id="my-select" class="form-control" name="walkes">
                    <option selected>-Pilih-</option>
                    <?php foreach ($walkes as $key) : ?>
                        <option value="<?= $key['id_guru']; ?>" <?= ($join['walkes'] == $key['id_guru']) ? 'selected' : ''; ?>><?= $key['nama_guru']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="">Semester</label>
                <input type="text" name="semester" id="" class="form-control" placeholder="" autocomplete="off" value="<?= $join['semester']; ?>" disabled>
            </div>
        </div>
        <hr class="my-3">
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
        </div>
    </div>
</div>
<?= form_close(); ?>
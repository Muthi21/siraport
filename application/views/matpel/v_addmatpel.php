<?= form_open('matpel/add'); ?>
<h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
<?= $this->session->flashdata('pesan'); ?>
<div class="card border-0 mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="d-md-flex float-right d-none">
                    <a name="" id="" class="btn btn-outline-danger btn-sm" href="<?= site_url('matpel'); ?>" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
                </div>
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="form-group col-md-4">
                <label for="my-input">Kode Mata Pelajaran</label>
                <input id="my-input" class="form-control text-uppercase" type="text" name="kode_matpel" value="<?= $this->input->post('kode_matpel', true) ? $this->input->post('kode_matpel', true) : 'MP001' ?>" autocomplete="off" placeholder="mp000">
                <?= form_error('kode_matpel', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group col-md-4">
                <label for="my-input">Mata Pelajaran</label>
                <input id="my-input" class="form-control" type="text" name="matpel" value="<?= set_value('matpel'); ?>" autocomplete="off" placeholder="Mata pelajaran">
                <?= form_error('matpel', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group col-md-4">
                <label for="my-input">Kategori</label>
                <input id="my-input" class="form-control" type="text" name="kategori" value="<?= set_value('kategori'); ?>" autocomplete="off" placeholder="Pengetahuan atau Ketrampilan">
                <?= form_error('kategori', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-sm">Simpan</button>
        </div>
    </div>
</div>
<?= form_close(); ?>
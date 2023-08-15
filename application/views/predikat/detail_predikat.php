<?= form_open('predikat/proses_update/' . $list['id_predikat']); ?>
<h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
<?= $this->session->flashdata('pesan'); ?>
<div class="card border-0 mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="d-md-flex float-right d-none">
                    <a name="" id="" class="btn btn-outline-danger btn-sm" href="<?= site_url('predikat'); ?>" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="my-input">Nilai Atas</label>
            <input id="my-input" class="form-control" type="number" name="nilai_atas" autocomplete="off" value="<?= $list['nilai_atas']; ?>" placeholder="0">
        </div>
        <div class="form-group">
            <label for="my-input">Nilai Bawah</label>
            <input id="my-input" class="form-control" type="number" name="nilai_bawah" autocomplete="off" value="<?= $list['nilai_bawah']; ?>" placeholder="0">
        </div>
        <div class="form-group">
            <label for="my-input">Huruf</label>
            <input id="my-input" class="form-control text-uppercase" type="text" name="huruf" autocomplete="off" value="<?= $list['huruf']; ?>" placeholder="A,B,C,D">
            <?= form_error('huruf', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="my-input">Predikat</label>
            <input id="my-input" class="form-control text-capitalize" type="text" name="predikat" autocomplete="off" value="<?= $list['predikat']; ?>" placeholder="Sangat Baik, Baik, Cukup, Kurang">
            <?= form_error('predikat', '<small class="text-danger">', '</small>'); ?>
        </div>
        <hr>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
        </div>
    </div>
</div>
<?= form_close(); ?>
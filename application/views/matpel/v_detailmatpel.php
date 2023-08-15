<?= form_open('matpel/prosesupdate/' . $matpel['id_matpel']); ?>
<h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
<?= $this->session->flashdata('pesan');
?>
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
                <input id="my-input" class="form-control text-uppercase" type="text" name="kode_matpel" value="<?= $matpel['kode_matpel']; ?>" autocomplete="off" placeholder="mtp000">
            </div>
            <div class="form-group col-md-4">
                <label for="my-input">Mata Pelajaran</label>
                <input id="my-input" class="form-control text-capitalize" type="text" name="matpel" value="<?= $matpel['nama_matpel']; ?>" autocomplete="off" placeholder="Mata pelajaran">
            </div>
            <div class="form-group col-md-4">
                <label for="my-input">Kategori</label>
                <input id="my-input" class="form-control text-capitalize" type="text" name="kategori" value="<?= $matpel['kategori_matpel']; ?>" autocomplete="off" placeholder="Pengetahuan atau ketrampilan">
            </div>
        </div>
        <hr>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-sm">Update</button>
        </div>
    </div>
</div>
<?= form_close(); ?>
<?= form_open('kelas/add'); ?>
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
                <input type="text" name="kode_kelas" id="" class="form-control text-uppercase" placeholder="kk000" autocomplete="off" value="<?= set_value('kode_kelas') ? $this->input->post('kode_kelas', true) : 'KK001' ?>">
                <?= form_error('kode_kelas', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group col-md-6">
                <label for="">Nama Kelas</label>
                <input type="text" name="nama_kelas" id="" class="form-control" placeholder="Kelas" autocomplete="off" value="<?= set_value('nama_kelas'); ?>">
                <?= form_error('nama_kelas', '<small class="text-danger">', '</small>'); ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="my-select">Wali Kelas</label>
                <select id="my-select" class="form-control" name="walkes">
                    <option selected>-Pilih-</option>
                    <?php foreach ($walkes as $key) : ?>
                        <option value="<?= $key['id_guru']; ?>"><?= $key['kode_guru']; ?> - <?= $key['nama_guru']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <?php
            $bulansaatini = date('m');
            $tahunsaatini = date('Y');
            if (
                $bulansaatini == '6' || $bulansaatini == '7' || $bulansaatini == '8' || $bulansaatini == '9' || $bulansaatini == '10' || $bulansaatini == '11' || $bulansaatini == '12'
            ) {
                $tahun = $tahunsaatini . '/' . date('Y', strtotime('+1 year', strtotime($tahunsaatini)));
                $semester = 1;
                $text = 'Ganjil';
            } else {
                $tahun = date('Y', strtotime('-1 year', strtotime($tahunsaatini))) . '/' . $tahunsaatini;
                $semester = 2;
                $text = 'Genap';
            }
            ?>

            <div class="form-group col-md-6">
                <label for="">Semester</label>
                <input type="text" name="semester" id="" class="form-control" placeholder="Semester" autocomplete="off" value="<?= $semester . ' - ' . $text; ?>" readonly>
            </div>
        </div>
        <hr class="my-3">
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-sm">Simpan</button>
        </div>
    </div>
</div>
<?= form_close(); ?>
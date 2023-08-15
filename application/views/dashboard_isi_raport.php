<h1 class="h5 text-gray-800 mb-4"><?= $title; ?></h1>
<?= form_open(site_url() . 'raport/list_siswa_isi_raport'); ?>
<div class="card border-0 mb-4">
    <div class="card-body">
        <div class="form-group">
            <label>Kelas:</label>
            <select name="kelas" class="form-control" required>
                <option value="">-Pilih-</option>
                <?php foreach ($kelas->result() as $kelas) { ?>
                    <option class="text-uppercase" value="<?= $kelas->id_kelas ?>"><?= $kelas->kode_kelas ?> - <?= $kelas->kelas ?></option>
                <?php } ?>
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
            $text = 'ganjil';
        } else {
            $tahun = date('Y', strtotime('-1 year', strtotime($tahunsaatini))) . '/' . $tahunsaatini;
            $semester = 2;
            $text = 'ganjil';
        }
        ?>
        <div class="form-group">
            <label>Tahun Ajaran:</label>
            <input type="text" name="ta" class="form-control" value="<?= $tahun ?>" required readonly />
        </div>
        <div class="form-group">
            <label>Semester:</label>
            <input type="text" name="semester" class="form-control" value="<?= $semester . ' - ' . $text ?>" required readonly />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-arrow-circle-right"></i> Selanjutnya</button>
        </div>
    </div>
</div>
<?= form_close(); ?>
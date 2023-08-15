<?= form_open('nilai/siswa_kelas'); ?>
<h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
<div class="card mb-4 border-0">
    <div class="card-body">
        <div class="form-group">
            <label>Kelas</label>
            <select name="kelas" class="form-control" required>
                <option value="">-Pilih-</option>
                <?php foreach ($kelas as $key) : ?>
                    <option class="text-uppercase" value="<?= $key['id_kelas'] ?>"><?= $key['kode_kelas'] ?> - <?= $key['kelas'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="my-select">Mata Pelajaran</label>
            <select id="my-select" class="form-control" name="matpel">
                <option value="">-Pilih-</option>
                <?php foreach ($matpel as $key) : ?>
                    <option value="<?= $key['id_matpel'] ?>"><?= $key['kode_matpel'] ?> - <?= $key['nama_matpel'] ?></option>
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
        <div class="form-group">
            <label>Tahun Ajaran:</label>
            <input type="text" name="ta" class="form-control" value="<?= $tahun ?>" required readonly />
        </div>
        <div class="form-group">
            <label>Semester:</label>
            <input type="text" name="semester" class="form-control" value="<?= $semester . ' - ' . $text ?>" required readonly />
        </div>
        <hr>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Selanjutnya</button>
        </div>

    </div>
</div>
<?= form_close(); ?>
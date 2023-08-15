<h1 class="text-gray-800 h5 mb-4"><?= $title; ?></h1>
<div class="card mb-4 border-0">
    <div class="card-body">
        <form action="<?= site_url() ?>raport/list_siswa_lihat_raport" method="POST">
            <div class="form-group">
                <label>Pilih kelas terlebih dahulu:</label>
                <select name="kelas" class="form-control" required>
                    <option value="">-Pilih-</option>
                    <?php foreach ($kelas->result() as $kelas) { ?>
                        <option class="text-uppercase" value="<?= $kelas->id_kelas ?>"><?= $kelas->kode_kelas ?> - <?= $kelas->kelas ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-arrow-circle-right"></i> Selanjutnya</button>
        </form>
    </div>
</div>
<h1 class="text-gray-800 h5 mb-4"><?= $title; ?></h1>
<div class="card mb-4 border-0">
    <div class="card-body">
        <form action="<?= base_url() ?>riwayat/list_siswa" method="POST">
            <div class="form-group">
                <label>Silahkan pilih kelas terlebih dahulu:</label>
                <select name="kelas" class="form-control" required>
                    <option value="">-Pilih-</option>
                    <?php foreach ($kelas->result() as $kelas) { ?>
                        <option class="text-uppercase" value="<?= $kelas->id_kelas ?>"><?= $kelas->kode_kelas ?> - <?= $kelas->kelas ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i> Selanjutnya</button>
        </form>
    </div>
</div>
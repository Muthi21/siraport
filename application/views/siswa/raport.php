<h1 class="h5 text-gray-800 mb-4"><?= $title; ?></h1>
<div class="card border-0 mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data->result() as $row) { ?>
                        <tr>
                            <td class="text-center" style="width: 10px;"><?= $no++ ?></td>
                            <td class="text-center"><?= $row->tahun_ajaran ?></td>
                            <td class="text-center"><?= $row->semester ?></td>
                            <td class="text-center">
                                <a href="<?= base_url() ?>siswa_user/cetak_raport_siswa?idsiswa=<?= $siswa->row()->id_siswa ?>&idkelas=<?= $kelas->row()->id_kelas ?>&semester=<?= $row->semester ?>&ta=<?= $row->tahun_ajaran ?>" target="_blank" class="btn btn-sm btn-outline-danger"><i class="fa fa-eye"></i> Lihat </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<h1 class="text-gray-800 h5 mb-4"><?= $title; ?></h1>
<div class="card border-0 mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td>Nama Peserta Didik</td>
                    <td>:</td>
                    <td><?= $siswa->row()->nama_siswa ?></td>
                </tr>
                <tr>
                    <td>Nomor Induk Siswa</td>
                    <td>:</td>
                    <td><?= $siswa->row()->nis ?></td>
                </tr>
                <tr>
                    <td>Kelas/Semester</td>
                    <td>:</td>
                    <td><span class="text-uppercase"><?= $kelas->row()->kelas ?></span> / <?php if ($kelas->row()->semester == 1) {
                                                                                                echo '1 (Satu)';
                                                                                            } else if ($kelas->row()->semester == 2) {
                                                                                                echo '2 (Dua)';
                                                                                            } else if ($kelas->row()->semester == 3) {
                                                                                                echo '3 (Tiga)';
                                                                                            } else if ($kelas->row()->semester == 4) {
                                                                                                echo '4 (Empat)';
                                                                                            } else if ($kelas->row()->semester == 5) {
                                                                                                echo '5 (Lima)';
                                                                                            } else if ($kelas->row()->semester == 6) {
                                                                                                echo '6 (Enam)';
                                                                                            } else if ($kelas->row()->semester == 7) {
                                                                                                echo '7 (Tujuh)';
                                                                                            } else if ($kelas->row()->semester == 8) {
                                                                                                echo '8 (Delapan)';
                                                                                            } ?>

                    </td>
                </tr>
            </table>
            <hr>
        </div>
        <div class="table-responsive mt-2">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tahun Ajaran</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data->result() as $row) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $row->tahun_ajaran ?></td>
                            <td><?= $row->semester ?></td>
                            <td>
                                <a href="<?= site_url() ?>raport/preview_raport_siswa?idsiswa=<?= $idsiswa ?>&idkelas=<?= $kelas->row()->id_kelas ?>&semester=<?= $row->semester ?>&ta=<?= $row->tahun_ajaran ?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i> Lihat </a>
                                <a href="<?= site_url() ?>raport/cetak_raport_siswa?idsiswa=<?= $idsiswa ?>&idkelas=<?= $kelas->row()->id_kelas ?>&semester=<?= $row->semester ?>&ta=<?= $row->tahun_ajaran ?>" target="_blank" class="btn btn-sm btn-outline-danger"><i class="fa fa-print"></i> Cetak </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
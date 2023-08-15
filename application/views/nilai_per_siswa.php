<h1 class="text-gray-800 h5 mb-4"><?= $title; ?></h1>
<div class="card mb-4 border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td>Nama Peserta Didik</td>
                    <td>:</td>
                    <td class="text-capitalize"><?= $siswa->row()->nama_siswa ?></td>
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
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Tahun Ajaran </th>
                        <th>Semester </th>
                        <th>Mata Pelajaran </th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data_nilai->result() as $data_nilai) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data_nilai->tahun_ajaran ?></td>
                            <td><?= $data_nilai->semester ?></td>
                            <td><?= $data_nilai->kode_matpel ?> - <?= $data_nilai->nama_matpel ?></td>
                            <td>
                                <a href="<?= base_url() ?>nilai/lihat_nilai_siswa?id_siswa=<?= $siswa->row()->id_siswa ?>&id_kelas=<?= $kelas->row()->id_kelas ?>&idmapel=<?= $data_nilai->id_matpel ?>&ta=<?= $data_nilai->tahun_ajaran ?>&semester=<?= $data_nilai->semester ?>" class="btn btn-sm btn-outline-danger" target="_blank"><i class="fa fa-search"></i> Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
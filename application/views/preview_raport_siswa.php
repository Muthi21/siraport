<h1 class="text-gray-800 mb-4 h5"><?= $title; ?></h1>
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
                <tr>
                    <td>Tahun Ajaran</td>
                    <td>:</td>
                    <td><?= $ta ?> - <?= $semester ?></td>
                </tr>
            </table>
        </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Penilaian Hasil Belajar</button>
                <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Catatan Akhir Semester</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active mt-4 mb-4" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <?= $this->session->flashdata('msg'); ?>
                <h1 class="text-gray-800 h5 font-weight-bold text-uppercase">A. Pengetahuan</h1>
                <div class="table-responsive mb-4">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>KKM</th>
                                <th>Nilai</th>
                                <th>Predikat</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($nilai_pengetahuan->num_rows() == 0) { ?>
                                <tr>
                                    <td>1.</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            <?php } else { ?>
                                <?php $no = 1; ?>
                                <?php foreach ($nilai_pengetahuan->result() as $key) { ?>
                                    <?php
                                    $nilai = array($key->sk7, $key->sk8, $key->sk9, $key->sk10, $key->uts, $key->us);
                                    $jml_nilai = count($nilai);
                                    $sum_nilai = array_sum($nilai);
                                    $rata2 = $sum_nilai / $jml_nilai;
                                    ?>

                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <th><?= $key->nama_matpel; ?></th>
                                        <th><?= $key->kkm; ?></th>
                                        <th><?= number_format($rata2) ?></th>
                                        <th class="text-uppercase">
                                            <?= $this->Model_admin->cek_predikat($this->session->userdata('id_guru'), $rata2); ?>
                                        </th>
                                        <th><?= $key->deskripsi; ?></th>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <h1 class="text-gray-800 h5 font-weight-bold text-uppercase">B. Ketrampilan</h1>
                <div class="table-responsive mb-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>KKM</th>
                                <th>Nilai</th>
                                <th>Predikat</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($nilai_ketrampilan->num_rows() == 0) { ?>
                                <tr>
                                    <td>1.</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            <?php } else { ?>
                                <?php $no = 1; ?>
                                <?php foreach ($nilai_ketrampilan->result() as $key) { ?>
                                    <?php
                                    $nilai = array($key->sk7, $key->sk8, $key->sk9, $key->sk10, $key->uts, $key->us);
                                    $jml_nilai = count($nilai);
                                    $sum_nilai = array_sum($nilai);
                                    $rata2 = $sum_nilai / $jml_nilai;
                                    ?>

                                    <tr>
                                        <th><?= $no++; ?></th>
                                        <th><?= $key->nama_matpel; ?></th>
                                        <th><?= $key->kkm; ?></th>
                                        <th><?= number_format($rata2) ?></th>
                                        <th class="text-uppercase">
                                            <?= $this->Model_admin->cek_predikat($this->session->userdata('id_guru'), $rata2); ?>
                                        </th>
                                        <th><?= $key->deskripsi; ?></th>

                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <h1 class="text-gray-800 h5 mt-4 font-weight-bold text-uppercase">C. Pengembangan Diri</h1>
                <table class="table ">
                    <tr>
                        <th>No.</th>
                        <th>Komponen</th>
                        <th>Predikat</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($pengembangan_diri->result() as $pengembangan_diri) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $pengembangan_diri->komponen ?></td>
                            <td><?= $pengembangan_diri->predikat ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <hr>
                <h1 class="text-gray-800 h5 mt-4 font-weight-bold text-uppercase">D. Ketidakhadiran</h1>
                <table class="table">
                    <tr>
                        <th>No.</th>
                        <th>Jenis </th>
                        <th>Jumlah</th>
                    </tr>
                    <?php $no = 1;
                    foreach ($presensi->result() as $presensi) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $presensi->jenis ?></td>
                            <td><?= $presensi->jumlah ?> Hari</td>
                        </tr>
                    <?php } ?>
                </table>

                <hr />
                <h1 class="text-gray-800 h5 mt-4 font-weight-bold text-uppercase">E. Catatan Untuk Perhatian Orang Tua Wali</h1>
                <?php if ($catatan->num_rows() != 0) { ?>
                    <table class="table">
                        <tr>
                            <td><?= $catatan->row()->catatan ?></td>
                        </tr>
                    </table>
                <?php } else { ?>
                    <table class="table">
                        <tr>
                            <td>-</td>
                        </tr>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<h1 class="h5 text-gray-800 mb-4"><?= $title; ?></h1>
<div class="card border-0 mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td>Nama Sekolah</td>
                    <td>:</td>
                    <td>SMP NEGERI 1 ELELIM</td>
                </tr>
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
        <hr>
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
                        <th></th>
                    </tr>
                    <form action="<?= site_url() ?>raport/simpan_pengembangan_diri" method="POST">
                        <tr>
                            <td>#.</td>
                            <td>
                                <input type="hidden" name="nis" value="<?= $siswa->row()->nis ?>" />
                                <input type="hidden" name="idsiswa" value="<?= $siswa->row()->id_siswa ?>" />
                                <input type="hidden" name="idkelas" value="<?= $kelas->row()->id_kelas ?>" />
                                <input type="hidden" name="ta" value="<?= $ta ?>" />
                                <input type="hidden" name="semester" value="<?= $semester ?>" />
                                <select name="komponen" class="form-control input-sm" required>
                                    <option value="">-Pilih-</option>
                                    <option value="OSIS">OSIS</option>
                                    <option value="Sepak Bola">Sepak Bola</option>
                                    <option value="Pramuka">Pramuka</option>
                                </select>
                            </td>
                            <td><input type="text" name="predikat" class="form-control text-uppercase" placeholder="A,B,C,D,E" autocomplete="off" required /></td>
                            <td><button type="submit" class="btn btn-sm btn-outline-primary">Simpan</button></td>
                        </tr>
                    </form>
                    <?php $no = 1;
                    foreach ($pengembangan_diri->result() as $pengembangan_diri) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $pengembangan_diri->komponen ?></td>
                            <td><?= $pengembangan_diri->predikat ?></td>
                            <td><a href="<?= base_url() ?>raport/hapus_pengembangan_diri?idkepribadian=<?= $pengembangan_diri->id ?>&idsiswa=<?= $siswa->row()->id_siswa ?>&idkelas=<?= $kelas->row()->id_kelas ?>&ta=<?= $ta ?>&semester=<?= $semester ?>&page=cas" class="btn btn-sm btn-outline-danger" onclick="return confirm('yakin akan menghapus data ini?')"><i class="fa fa-remove"></i> Hapus </a></td>
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
                        <th></th>
                    </tr>
                    <form action="<?= site_url() ?>raport/simpan_presensi" method="POST">
                        <tr>
                            <td>#.</td>
                            <td>
                                <input type="hidden" name="nis" value="<?= $siswa->row()->nis ?>" />
                                <input type="hidden" name="idsiswa" value="<?= $siswa->row()->id_siswa ?>" />
                                <input type="hidden" name="idkelas" value="<?= $kelas->row()->id_kelas ?>" />
                                <input type="hidden" name="ta" value="<?= $ta ?>" />
                                <input type="hidden" name="semester" value="<?= $semester ?>" />
                                <select name="jenis" class="form-control input-sm" required>
                                    <option value="">-Pilih-</option>
                                    <option value="Sakit">Sakit</option>
                                    <option value="Izin">Izin</option>
                                    <option value="Tanpa Keterangan">Tanpa Keterangan</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" name="jumlah" class="form-control" required autocomplete="off" />
                            </td>
                            <td>
                                <button type="submit" class="btn btn-sm btn-outline-primary btn-sm">Simpan</button>
                            </td>
                        </tr>
                    </form>
                    <?php $no = 1;
                    foreach ($presensi->result() as $presensi) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $presensi->jenis ?></td>
                            <td><?= $presensi->jumlah ?> Hari</td>
                            <td>
                                <a href="<?= site_url() ?>raport/hapus_presensi?idpresensi=<?= $presensi->id ?>&idsiswa=<?= $siswa->row()->id_siswa ?>&idkelas=<?= $kelas->row()->id_kelas ?>&ta=<?= $ta ?>&semester=<?= $semester ?>&page=cas" class="btn btn-sm btn-outline-danger" onclick="return confirm('yakin akan menghapus data ini?')"><i class="fa fa-remove"></i> Hapus </a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

                <hr />
                <h1 class="text-gray-800 h5 mt-4 font-weight-bold text-uppercase">E. Catatan Untuk Perhatian Orang Tua Wali</h1>
                <?php if ($catatan->num_rows() != 0) { ?>
                    <table class="table">
                        <tr>
                            <td><?= $catatan->row()->catatan ?></td>
                            <td>
                                <a href="<?= base_url() ?>raport/hapus_catatan?idcatatan=<?= $catatan->row()->id ?>&idsiswa=<?= $siswa->row()->id_siswa ?>&idkelas=<?= $kelas->row()->id_kelas ?>&ta=<?= $ta ?>&semester=<?= $semester ?>&page=cas" class="btn btn-sm btn-outline-danger btn-sm" onclick="return confirm('yakin akan menghapus data ini?')"><i class="fa fa-remove"></i> Hapus </a>
                            </td>
                        </tr>
                    </table>
                <?php } else { ?>
                    <form action="<?= site_url() ?>raport/simpan_catatan" method="POST">
                        <input type="hidden" name="nis" value="<?= $siswa->row()->nis ?>" />
                        <input type="hidden" name="idsiswa" value="<?= $siswa->row()->id_siswa ?>" />
                        <input type="hidden" name="idkelas" value="<?= $kelas->row()->id_kelas ?>" />
                        <input type="hidden" name="ta" value="<?= $ta ?>" />
                        <input type="hidden" name="semester" value="<?= $semester ?>" />
                        <div class="form-group">
                            <textarea class="form-control input-sm" name="catatan" style="resize: none"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
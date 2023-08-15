<h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
<?php if ($jml_siswa->num_rows() == 0) { ?>
    <div class="card border-0 mb-4">
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <td style="width: 50vh;">Nomor Induk Siswa</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td style="width: 50vh;">Nama</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td style="width: 50vh;">Tempat, Tangal Lahir</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td style="width: 50vh;">Jenis Kelamin</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td style="width: 50vh;">Agama</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td style="width: 50vh;">Tanggal Masuk</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td style="width: 50vh;">Asal Sekolah</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td style="width: 50vh;">Alamat</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td style="width: 50vh;">No. Telepon (Ayah atau Ibu)</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td style="width: 50vh;">Nama Ayah</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td style="width: 50vh;">Nama Ibu</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td style="width: 50vh;">Nama Wali</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td style="width: 50vh;">Pekerjaan Ayah</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td style="width: 50vh;">Pekerjaan Ibu</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td style="width: 50vh;">Pekerjaan Wali</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<?php } else { ?>
    <div class="card border-0 mb-4">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <div class="d-flex float-right">
                        <a name="" id="" class="btn btn-outline-primary btn-sm" href="<?= site_url('siswa/detail/' . $siswa['id_siswa']); ?>" role="button"><i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 50vh;">Nomor Induk Siswa</td>
                            <td>:</td>
                            <td><?= $siswa['nis'] ? $siswa['nis'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Nama</td>
                            <td>:</td>
                            <td><?= $siswa['nama_siswa'] ? $siswa['nama_siswa'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Tempat, Tangal Lahir</td>
                            <td>:</td>
                            <td><?= $siswa['tempat_lahir'] ? $siswa['tempat_lahir'] : '- , ' . $siswa['tanggal_lahir']; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Jenis Kelamin</td>
                            <td>:</td>
                            <td><?= $siswa['jenis_kelamin'] ? $siswa['jenis_kelamin'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Agama</td>
                            <td>:</td>
                            <td><?= $siswa['agama'] ? $siswa['agama'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Tanggal Masuk</td>
                            <td>:</td>
                            <td><?= $siswa['tanggal_masuk'] ? $siswa['tanggal_masuk'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Asal Sekolah</td>
                            <td>:</td>
                            <td><?= $siswa['asal_sekolah'] ? $siswa['asal_sekolah'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Alamat</td>
                            <td>:</td>
                            <td><?= $siswa['alamat'] ? $siswa['alamat'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">No. Telepon (Ayah atau Ibu)</td>
                            <td>:</td>
                            <td><?= $siswa['no_tlportu'] ? $siswa['no_tlportu'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Nama Ayah</td>
                            <td>:</td>
                            <td><?= $siswa['nama_ayah'] ? $siswa['nama_ayah'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Nama Ibu</td>
                            <td>:</td>
                            <td><?= $siswa['nama_ibu'] ? $siswa['nama_ibu'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Nama Wali</td>
                            <td>:</td>
                            <td><?= $siswa['nama_wali'] ? $siswa['nama_wali'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Pekerjaan Ayah</td>
                            <td>:</td>
                            <td><?= $siswa['pekerjaan_ayah'] ? $siswa['pekerjaan_ayah'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Pekerjaan Ibu</td>
                            <td>:</td>
                            <td><?= $siswa['pekerjaan_ibu'] ? $siswa['pekerjaan_ibu'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Pekerjaan Wali</td>
                            <td>:</td>
                            <td><?= $siswa['pekerjaan_wali'] ? $siswa['pekerjaan_wali'] : '-'; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>
<h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
<div class="card border-0 mb-4" style="background-color: #1E7DC0;">
    <div class="card-body text-white">
        <h5 class="card-title">Helo, <?= $this->session->userdata('username'); ?></h5>
        <p class="card-text mb-0">Selamat datang di aplikasi Sistem Informasi Raport.
        </p>
        <span class="small">Anda sekarang login sebagai <?= $this->session->userdata('level'); ?></span>
    </div>
</div>
<?php if ($this->session->userdata('level') == 'Guru') : ?>
    <div class="card mb-4 border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 50vh;">Kode Guru</td>
                            <td>:</td>
                            <td><?= $guru['kode_guru'] ? $guru['kode_guru'] : 'GUR000 ,'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Nama</td>
                            <td>:</td>
                            <td><?= $guru['nama_guru'] ? $guru['nama_guru'] : '- ,'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Tempat, Tangal Lahir</td>
                            <td>:</td>
                            <td><?= $guru['tempat_lahir'] . ', ' . $guru['tanggal_lahir'] ? $guru['tempat_lahir'] . ', ' . $guru['tanggal_lahir'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Jenis Kelamin</td>
                            <td>:</td>
                            <td><?= $guru['jenis_kelamin'] ? $guru['jenis_kelamin'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Agama</td>
                            <td>:</td>
                            <td><?= $guru['agama'] ? $guru['agama'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">No. Telepon</td>
                            <td>:</td>
                            <td><?= $guru['no_tlp'] ? $guru['no_tlp'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Alamat</td>
                            <td>:</td>
                            <td><?= $guru['alamat'] ? $guru['alamat'] : '-'; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($this->session->userdata('level') == 'Siswa') : ?>
    <div class="card mb-4 border-0">
        <div class="card-body">
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
                            <td><?= $siswa['nama_siswa'] ? $siswa['nama_siswa'] : '- ,'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Tempat, Tangal Lahir</td>
                            <td>:</td>
                            <td><?= $siswa['tempat_lahir'] . ', ' . $siswa['tanggal_lahir'] ? $siswa['tempat_lahir'] . ', ' . $siswa['tanggal_lahir'] : '-'; ?></td>
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
                            <td style="width: 50vh;">Tanggal Masuk</td>
                            <td>:</td>
                            <td><?= $siswa['tanggal_masuk'] ? $siswa['tanggal_masuk'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Nama Ayah</td>
                            <td>:</td>
                            <td><?= $siswa['nama_ayah'] ? $siswa['nama_ayah'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Pekerjaan Ayah</td>
                            <td>:</td>
                            <td><?= $siswa['pekerjaan_ayah'] ? $siswa['pekerjaan_ayah'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Nama Ibu</td>
                            <td>:</td>
                            <td><?= $siswa['nama_ibu'] ? $siswa['nama_ibu'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">Pekerjaan Ibu</td>
                            <td>:</td>
                            <td><?= $siswa['pekerjaan_ibu'] ? $siswa['pekerjaan_ibu'] : '-'; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50vh;">No. Telepon</td>
                            <td>:</td>
                            <td><?= $siswa['no_tlportu'] ? $siswa['no_tlportu'] : '-'; ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php endif; ?>
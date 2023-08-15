<h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
<?php if ($jml_guru->num_rows() == 0) { ?>
    <div class="card border-0 mb-4">
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <td style="width: 50vh;">Kode Guru</td>
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
                        <td style="width: 50vh;">No. Telepon</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td style="width: 50vh;">Alamat</td>
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
                        <a name="" id="" class="btn btn-outline-primary btn-sm" href="<?= site_url('guru/detail/' . $guru['id_guru']); ?>" role="button"><i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td style="width: 50vh;">Kode Guru</td>
                            <td>:</td>
                            <td><?= $guru['kode_guru'] ? $guru['kode_guru'] : 'GUR00 ,'; ?></td>
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
<?php } ?>
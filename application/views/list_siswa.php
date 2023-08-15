<h1 class="text-gray-800 h5 mb-4"><?= $title; ?></h1>
<div class="card mb-4 border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td>Kode Kelas</td>
                    <td>:</td>
                    <td><?= $kelas->row()->kode_kelas ?></td>
                </tr>
                <tr>
                    <td>Nama Kelas</td>
                    <td>:</td>
                    <td class="text-uppercase"><?= $kelas->row()->kelas ?></td>
                </tr>
            </table>
        </div>
        <hr>
        <div class="table-responsive">
            <?= $this->session->flashdata('msg') ?>
            <table class="table table-border" id="dataTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($siswa->result() as $row) {
                        # code...
                    ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $row->nis ?></td>
                            <td class="text-capitalize"><?= $row->nama_siswa ?></td>
                            <td>
                                <a href="<?= base_url() ?>riwayat/nilai_per_siswa?idsiswa=<?= $row->id_siswa ?>" target="_blank" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i> Cek</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
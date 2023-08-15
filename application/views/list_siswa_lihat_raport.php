<h1 class="text-gray-800 mb-4 h5"><?= $title; ?></h1>
<div class="card border-0 mb-4">
    <div class="card-body">
        <div class="table-responsive mb-3">
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
            <hr>
        </div>
        <div class="table-responsive">
            <?= $this->session->flashdata('msg') ?>
            <table class="table" id="dataTable">
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
                            <td><?= $row->nama_siswa ?></td>
                            <td>
                                <a href="<?= site_url() ?>raport/lihat_raport_siswa?idsiswa=<?= $row->id_siswa ?>&idkelas=<?= $kelas->row()->id_kelas ?>" target="_blank" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i> Pilih </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<h1 class="mb-4 text-gray-800 h5"><?= $title; ?></h1>
<div class="card border-0 mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <td>Kode Kelas</td>
                    <td>:</td>
                    <td><?= $kelas->row()->kode_kelas; ?></td>
                </tr>
                <tr>
                    <td>Nama Kelas</td>
                    <td>:</td>
                    <td class="text-uppercase"><?= $kelas->row()->kelas; ?></td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td>:</td>
                    <td><?= $ta; ?></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>:</td>
                    <td><?= $semester; ?></td>
                </tr>
            </table>
        </div>
        <hr>
        <div class="table-responsive mt-4">
            <?= $this->session->flashdata('msg') ?>
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($siswa->result() as $row) : ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $row->nis ?></td>
                            <td class="text-capitalize"><?= $row->nama_siswa ?></td>
                            <td>
                                <a href="<?= base_url() ?>raport/isi_raport_siswa?idsiswa=<?= $row->id_siswa ?>&ta=<?= $ta ?>&semester=<?= $semester ?>&idkelas=<?= $kelas->row()->id_kelas ?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-pencil"></i> Isi Raport </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
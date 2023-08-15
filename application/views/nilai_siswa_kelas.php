<h1 class="text-gray-800 h5 mb-4"><?= $title; ?></h1>
<div class="card border-0 mb-4">
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
                <tr>
                    <td>Mata Pelajaran</td>
                    <td>:</td>
                    <td><?= $mapel->row()->kode_matpel . ' - ' . $mapel->row()->nama_matpel ?></td>
                </tr>
                <tr>
                    <td>Tahun Ajaran</td>
                    <td>:</td>
                    <td><?= $tahunajaran ?></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>:</td>
                    <td><?= $semester ?></td>
                </tr>
            </table>
            <hr>
            <?= $this->session->flashdata('pesan') ?>
            <div class="table-responsive">
                <table class="table  table-hover" id="dataTable">
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
                                    <?php
                                    $cek_niliai = $this->db->get_where('tb_nilai', array('nis' => $row->nis, 'kode_matpel' => $mapel->row()->kode_matpel, 'tahun_ajaran' => $tahunajaran, 'semester' => $semester));
                                    if ($cek_niliai->num_rows() != 0) {
                                    ?>

                                        <a href="<?= base_url() ?>nilai/lihat_nilai_siswa?id_siswa=<?= $row->id_siswa ?>&id_kelas=<?= $kelas->row()->id_kelas ?>&idmapel=<?= $mapel->row()->id_matpel ?>&ta=<?= $tahunajaran ?>&semester=<?= $semester ?>" target="_blank" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i> Lihat Nilai </a>
                                    <?php } else { ?>
                                        <a href="<?= base_url() ?>nilai/isi_nilai_siswa?id_siswa=<?= $row->id_siswa ?>&id_kelas=<?= $kelas->row()->id_kelas ?>&idmapel=<?= $mapel->row()->id_matpel ?>&ta=<?= $tahunajaran ?>&semester=<?= $semester ?>" target="_blank" class="btn btn-sm btn-outline-danger"><i class="fa fa-pencil"></i> Isi Nilai </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
<?= $this->session->flashdata('pesan'); ?>
<div class="card border-0 mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="d-flex float-right">
                    <a name="" id="" class="btn btn-outline-primary btn-sm" href="<?= site_url('matpel/add'); ?>" role="button"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Mata Pelajaran</a>
                </div>
            </div>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Kode Mata Pelajaran</th>
                        <th>Mata Pelajaran</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($matpel as $key) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center text-uppercase"><?= $key['kode_matpel']; ?></td>
                            <td class="text-center text-capitalize"><?= $key['nama_matpel']; ?></td>
                            <td class="text-center text-capitalize"><?= $key['kategori_matpel']; ?></td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Button group">
                                    <a name="" id="" class="btn btn-outline-danger" href="<?= site_url('matpel/delete/' . $key['id_matpel']) ?>" role="button"><i class="fa fa-times" aria-hidden="true"></i> Hapus</a>
                                    <a name="" id="" class="btn btn-outline-primary" href="<?= site_url('matpel/detail/' . $key['id_matpel']) ?>" role="button"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
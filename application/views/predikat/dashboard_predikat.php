<h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
<?= $this->session->flashdata('pesan'); ?>
<div class="card border-0 mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="d-flex float-right">
                    <a name="" id="" class="btn btn-outline-primary btn-sm" href="<?= site_url('predikat/add'); ?>" role="button"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Predikat</a>
                </div>
            </div>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nilai Atas</th>
                        <th>Nilai Bawah</th>
                        <th>Huruf</th>
                        <th>Predikat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    <?php $no = 1; ?>
                    <?php foreach ($list as $key) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $key['nilai_atas']; ?></td>
                            <td><?= $key['nilai_bawah']; ?></td>
                            <td class="text-uppercase"><?= $key['huruf']; ?></td>
                            <td class="text-capitalize"><?= $key['predikat']; ?></td>
                            <td class="">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Button group">
                                    <a name="" id="" class="btn btn-outline-danger" href="<?= site_url('predikat/delete/' . $key['id_predikat']); ?>" role="button"><i class="fa fa-times" aria-hidden="true"></i> Hapus</a>
                                    <a name="" id="" class="btn btn-outline-primary" href="<?= site_url('predikat/detail/' . $key['id_predikat']) ?>" role="button"><i class="fa fa-eye" aria-hidden="true"></i> Lihat</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
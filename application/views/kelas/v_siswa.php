<h1 class="h5 mb-4 text-gray-800"><?= $title; ?></h1>
<div class="card mb-4 border-0">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="d-md-flex float-right d-none">
                    <a name="" id="" class="btn btn-outline-danger btn-sm" href="<?= site_url('kelas'); ?>" role="button"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Kembali</a>
                </div>
            </div>
        </div>
        <div class="table-responsive mt-3">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($join as $key) : ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td class="text-center text-uppercase"><a name="" id="" class="nav-link" href="<?= site_url('siswa/detail/' . $key['id_siswa']); ?>"> <?= $key['nis']; ?></a></td>
                            <td class="text-center text-uppercase"><?= $key['kelas']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
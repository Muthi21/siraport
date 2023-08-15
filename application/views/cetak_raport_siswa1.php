<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url('assets/img/logo2.png'); ?>" type="image/x-icon">
    <title>Raport SMP NEGERI 1 ELELIM | Cetak Raport</title>
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        /* @page {
            size: A4;
            margin: 0mm;
        } */

        /* @media all {
            .page-break {
                display: none;
            }
        } */

        /* @media print {
            .page-break {
                display: block;
                page-break-before: always;
            }
        } */

        html {
            background-color: #FFFFFF;
            margin: 0px;
            /* this affects the margin on the html before sending to printer */
        }

        body {
            font-size: 12pt;
            margin: 15mm 15mm 15mm 15mm;
            /* margin you want for the content */
        }
    </style>
    <script type="text/javascript">
        // window.onload = function() {
        //     self.print();
        // }
    </script>
</head>

<body>
    <div class="container" style="color: black;">
        <center>
            <img style="width: 15rem;" src="<?= base_url() ?>assets/img/garuda2.png" />
            <br /><br />
            <h1><b>RAPORT<br>SEKOLAH MENENGAH PERTAMA (SMP)<br>SMP NEGERI 1 ELELIM</b></h1>
        </center>
        <br><br><br><br>
        <center>
            <img style="width: 15rem;" src="<?= base_url() ?>assets/img/logo2.png" />
        </center>
        <h2>
            <div class="text-center mt-5">
                NAMA PESERTA DIDIK
                <br>
                <span class="font-weight-bold"><?= $siswa->row()->nama_siswa ?></span>
                <br><br><br>
                NOMOR INDUK SISWA<br>
                <span><?= $siswa->row()->nis ?></span>
            </div>
            <div class="text-center" style="margin-top: 10rem;">
                <h1>
                    <b>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN<br>REPUBLIK INDONESIA</b>
                </h1>
            </div>
        </h2>
        <div class="row page-break">
            <div class="row container-fluid">
                <div class="col-md-12">
                    <br /><br />
                    <table width="100%">
                        <tr>
                            <td>Nama Sekolah</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td width="50%" class="font-weight-bold">SMP NEGERI 1 ELELIM</td>
                            <td>Kelas</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td><span class="text-uppercase"><?= $kelas->row()->kelas ?></span> </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td width="50%">Jln. Ohoam Km 132 Elelim Kab.Yalimo Papua</td>
                            <td>Semester</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td><span class="text-uppercase"><?php if ($kelas->row()->semester == 1) {
                                                                    echo '1 (Satu)';
                                                                } else if ($kelas->row()->semester == 2) {
                                                                    echo '2 (Dua)';
                                                                } else if ($kelas->row()->semester == 3) {
                                                                    echo '3 (Tiga)';
                                                                } else if ($kelas->row()->semester == 4) {
                                                                    echo '4 (Empat)';
                                                                } else if ($kelas->row()->semester == 5) {
                                                                    echo '5 (Lima)';
                                                                } else if ($kelas->row()->semester == 6) {
                                                                    echo '6 (Enam)';
                                                                } else if ($kelas->row()->semester == 7) {
                                                                    echo '7 (Tujuh)';
                                                                } else if ($kelas->row()->semester == 8) {
                                                                    echo '8 (Delapan)';
                                                                } ?> </td>
                        </tr>
                        <tr>
                            <td>Nama Peserta Didik</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td width="50%" class="font-weight-bold text-capitalize"><?= $siswa->row()->nama_siswa ?></td>
                            <td>Tahun Ajaran</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td><?= $ta ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Induk Siswa</td>
                            <td>&nbsp;&nbsp;&nbsp;:</td>
                            <td class="font-weight-bold"><?= $siswa->row()->nis ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="container-fluid row mt-4">
                <div class="col">
                    <h3 class="mb-3 h5 font-weight-bold mt-4">A. PENGETAHUAN</h3>
                    <table class="table table-bordered" style="color: black;">
                        <tr>
                            <th>No.</th>
                            <th>Mata Pelajaran</th>
                            <th>KKM</th>
                            <th>Nilai</th>
                            <th>Predikat</th>
                            <th>Deskripsi</th>
                        </tr>
                        <?php if ($nilai_normatif->num_rows() == 0) {
                            for ($i = 1; $i <= 10; $i++) {
                        ?>
                                <tr>
                                    <td><?= $i ?>.</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>

                            <?php }
                        } else {
                            $no = 1;
                            $hitung = count($nilai_normatif->result());
                            foreach ($nilai_normatif->result() as $key) { ?>
                                <?php
                                $nilai = array($key->sk7, $key->sk8, $key->sk9, $key->sk10, $key->uts, $key->us);
                                $jml_nilai = count($nilai);
                                $sum_nilai = array_sum($nilai);
                                $rata2 = $sum_nilai / $jml_nilai;
                                ?>

                                <tr>
                                    <td class="text-center"><?= $no++ ?>.</td>
                                    <td class="text-capitalize"><?= $key->nama_matpel ?></td>
                                    <td class="text-center"><?= $key->kkm ?></td>
                                    <td class="text-center"><?= number_format($rata2) ?></td>
                                    <td class="text-uppercase text-center">
                                        <?= $this->Model_admin->cek_predikat($guru->row()->id_guru, $rata2); ?>
                                    </td>
                                    <td><?= $key->deskripsi ?></td>
                                </tr>
                            <?php }
                            if ($hitung == 1) {
                                $tot_looping = 10;
                            }
                            if ($hitung == 2) {
                                $tot_looping = 9;
                            }
                            if ($hitung == 3) {
                                $tot_looping = 8;
                            }
                            if ($hitung == 4) {
                                $tot_looping = 7;
                            }
                            if ($hitung == 5) {
                                $tot_looping = 6;
                            }
                            if ($hitung == 6) {
                                $tot_looping = 5;
                            }
                            if ($hitung == 7) {
                                $tot_looping = 4;
                            }
                            if ($hitung == 8) {
                                $tot_looping = 3;
                            }
                            if ($hitung == 9) {
                                $tot_looping = 2;
                            }
                            if ($hitung == 10) {
                                $tot_looping = 1;
                            }
                            for ($i = 0; $i < $tot_looping; $i++) {
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?>.</td>
                                    <td>-</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                    <td>-</td>
                                </tr>

                        <?php }
                        } ?>
                    </table>
                    <br /><br />
                    <h3 class="font-weight-bold h5 text-uppercase mt-2">B. Ketrampilan</h3>
                    <table class="table table-bordered" style="color: black;">
                        <tr class="text-center">
                            <th class="text-center">No.</th>
                            <th>Mata Pelajaran</th>
                            <th>KKM</th>
                            <th>Nilai</th>
                            <th>Predikat</th>
                            <th>Deskripsi</th>
                        </tr>
                        <?php if ($nilai_adaptif->num_rows() == 0) {
                            for ($j = 1; $j <= 10; $j++) {
                        ?>
                                <tr>
                                    <td><?= $j ?>.</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                </tr>
                            <?php }
                        } else {
                            $no = 1;
                            $hitung_adaptif = count($nilai_adaptif->result());
                            foreach ($nilai_adaptif->result() as $key) { ?>
                                <?php
                                $nilai = array($key->sk7, $key->sk8, $key->sk9, $key->sk10, $key->uts, $key->us);
                                $jml_nilai = count($nilai);
                                $sum_nilai = array_sum($nilai);
                                $rata2 = $sum_nilai / $jml_nilai;
                                ?>
                                <tr>
                                    <td style="width: 10px;" class="text-center"><?= $no++ ?>.</td>
                                    <td style="width: 250px;" class="text-capitalize"><?= $key->nama_matpel ?></td>
                                    <td class="text-center" style="width: 10px;"><?= $key->kkm ?></td>
                                    <td class="text-center" style="width: 10px;"><?= number_format($rata2) ?></td>
                                    <td class="text-uppercase text-center" style="width: 10px;">
                                        <?= $this->Model_admin->cek_predikat($guru->row()->id_guru, $rata2); ?>
                                    </td>
                                    <td><?= $key->deskripsi ?></td>
                                </tr>
                            <?php }
                            if ($hitung_adaptif == 1) {
                                $tot_looping1 = 10;
                            }
                            if ($hitung_adaptif == 2) {
                                $tot_looping1 = 9;
                            }
                            if ($hitung_adaptif == 3) {
                                $tot_looping1 = 8;
                            }
                            if ($hitung_adaptif == 4) {
                                $tot_looping1 = 7;
                            }
                            if ($hitung_adaptif == 5) {
                                $tot_looping1 = 6;
                            }
                            if ($hitung_adaptif == 6) {
                                $tot_looping1 = 5;
                            }
                            if ($hitung_adaptif == 7) {
                                $tot_looping1 = 4;
                            }
                            if ($hitung_adaptif == 8) {
                                $tot_looping1 = 3;
                            }
                            if ($hitung_adaptif == 9) {
                                $tot_looping1 = 2;
                            }
                            if ($hitung_adaptif == 10) {
                                $tot_looping1 = 1;
                            }
                            for ($i = 0; $i < $tot_looping1; $i++) {
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?>.</td>
                                    <td>-</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                    <td class="text-center">-</td>
                                    <td>-</td>
                                </tr>
                        <?php }
                        } ?>
                    </table>
                </div>

            </div>
        </div>

        <div class="row page-break">
            <br />
            <div class="row container-fluid">
                <h3 class="font-weight-bold text-uppercase mb-4 mt-5">Catatan Akhir Semester</h3>
                <div class="col-md-12">
                    <h3 class="font-weight-bold h5 text-uppercase mt-4">C. Pengembangan Diri</h3>
                    <table class="table table-bordered" style="color: black;">
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Komponen</th>
                            <th>Predikat</th>
                        </tr>
                        <?php $no = 1;
                        foreach ($pengembangan_diri->result() as $pengembangan_diri) { ?>
                            <tr>
                                <td style="width: 10px;" class="text-center"><?= $no++ ?>.</td>
                                <td><?= $pengembangan_diri->komponen ?></td>
                                <td style="width: 150px;" class="text-center"><?= $pengembangan_diri->predikat ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="col-md-12">
                    <h3 class="font-weight-bold h5 text-uppercase mt-4">D. Ketidakhadiran</h3>
                    <table class="table table-bordered" style="color: black;">
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Jenis </th>
                            <th>Jumlah</th>
                        </tr>
                        <?php $no = 1;
                        foreach ($presensi->result() as $presensi) { ?>
                            <tr>
                                <td style="width: 10px;" class="text-center"><?= $no++ ?>.</td>
                                <td><?= $presensi->jenis ?></td>
                                <td style="width: 150px;" class="text-center"><?= $presensi->jumlah ?> Hari</td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <div class="col-md-12">
                    <h3 class="h5 font-weight-bold text-uppercase mt-4">E. Catatan Untuk Perhatian Orang Tua Wali</h3>
                    <?php if ($catatan->num_rows() != 0) { ?>
                        <table class="table table-bordered" style="color: black;">
                            <tr>
                                <td><?= $catatan->row()->catatan ?></td>

                            </tr>
                        </table>
                    <?php } else { ?>
                        <table class="table table-bordered" style="color: black;">
                            <tr>
                                <td>-</td>
                            </tr>
                        </table>
                    <?php } ?>
                </div>
            </div>

            <table width="100%" class="text-center" style="color: black;">
                <tr>
                    <td class="text-center">Mengetahui</td>
                    <td></td>
                    <td width="50%" class="text-center">Papua, <?= date('d-M-Y') ?></td>
                </tr>
                <tr>
                    <td class="text-center">Orang Tua/Wali</td>
                    <td></td>
                    <td width="50%" class="text-center">Wali Kelas</td>
                </tr>
            </table>
            <br><br><br><br><br><br>
            <table width="100%" class="font-weight-bold">
                <tr>
                    <td>
                        <center></center>
                    </td>
                    <td></td>
                    <td width="50%">
                        <center></center>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center>........................................</center>
                    </td>
                    <td></td>
                    <td width="50%">
                        <center><?= $guru->row()->nama_guru ?></center>
                    </td>
                </tr>
            </table>
            <br><br><br><br>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td>
                            <center style="color: black;">Mengetahui</center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center style="color: black;">Kepala Sekolah</center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center></center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center></center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center class="font-weight-bold" style="color: black;">Rum Salak S.Pd</center>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<!-- Sidebar -->
<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #1E7DC0;">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('home'); ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('assets/img/logo2.png'); ?>" width="50" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Raport</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('home'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Heading -->

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Utilities Collapse Menu -->

    <!-- Divider -->

    <!-- Heading -->

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Charts -->
    <?php if ($this->session->userdata('level') == 'Admin') : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('guru'); ?>">
                <i class="fas fa-user-graduate fa-fw"></i>
                <span>Guru</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('siswa'); ?>">
                <i class="fas fa-user-alt fa-fw"></i>
                <span>Siswa</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('kelas'); ?>">
                <i class="fas fa-university fa-fw"></i>
                <span>Kelas</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('matpel'); ?>">
                <i class="fas fa-fw fa-folder-open"></i>
                <span>Mata Pelajaran</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('auth/register'); ?>">
                <i class="fas fa-fw fa-folder-open"></i>
                <span>Data Akun</span></a>
        </li>
    <?php endif; ?>
    <?php if ($this->session->userdata('level') == 'Guru') : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('predikat'); ?>">
                <i class="far fa-newspaper fa-fw"></i>
                <span>Predikat</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('nilai'); ?>">
                <i class="fas fa-pencil-alt fa-fw"></i>
                <span>Isi Nilai</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('riwayat'); ?>">
                <i class="fas fa-newspaper fa-fw"></i>
                <span>Riwayat Nilai</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('raport'); ?>">
                <i class=" fas fa-book fa-fw"></i>
                <span>Isi Raport</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('raport/lihat_raport'); ?>">
                <i class=" fas fa-eye fa-fw"></i>
                <span>Cetak & Lihat Raport</span></a>
        </li>
    <?php endif; ?>
    <?php if ($this->session->userdata('level') == 'Siswa') : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('siswa_user/raport'); ?>">
                <i class="fas fa-eye fa-fw"></i>
                <span>Raport</span></a>
        </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block" />

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
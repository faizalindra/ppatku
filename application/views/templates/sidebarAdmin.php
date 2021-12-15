
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('admin'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Berkas
            </div>

            <!-- Nav Item - Berkas Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Berkas');?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Berkas</span></a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBerkas"
                    aria-expanded="true" aria-controls="collapseBerkas">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Berkas</span>
                </a>
                <div id="collapseBerkas" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manajemen Berkas</h6>
                        <a class="collapse-item" href="<?= base_url('Berkas'); ?>">Daftar Berkas</a>
                        <a class="collapse-item" href="<?= base_url('Berkas/berkasProses');?>">Berkas Dalam Proses</a>
                        <a class="collapse-item" href="##">Berkas Belum Lengkap</a>
                        <a class="collapse-item" href="<?= base_url('Berkas/berkasSelesai'); ?>">Berkas Selesai</a>
                    </div>
                </div>
            </li> -->



            <!-- Nav Item - Sertipikat Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('sertipikat');?>">
                    <i class="fas fas fa-fw fa-book"></i>
                    <span>Sertipikat</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Non-Berkas
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('user/manajemenUser');?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
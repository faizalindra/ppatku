<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-text mx-3">
                <?php if ($this->session->userdata('role_id') == 2) {
                    echo 'Staff';
                } else if ($this->session->userdata('role_id') == 1) {
                    echo 'Admin';
                } else if ($this->session->userdata('role_id') == 0) {
                    echo 'Notaris';
                } ?>
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <?php if ($this->session->userdata('role_id') == 2) {
                $url = base_url('staff');
            } else if ($this->session->userdata('role_id') == 1) {
                $url = base_url('admin');
            } else if ($this->session->userdata('role_id') == 0) {
                $url = base_url('notaris');
            } ?>
            <a class="nav-link" href="<?= $url; ?>">
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
            <a class="nav-link" href="<?= base_url('berkas'); ?>">
                <i class="fas fa-fw fa-folder"></i>
                <span>Berkas</span></a>
        </li>

        <!-- Nav Item - Sertipikat Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('sertipikat'); ?>">
                <i class="fas fas fa-fw fa-book"></i>
                <span>Sertipikat</span></a>
        </li>

        <!-- Nav Item - Proses BPN Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('bpn'); ?>">
                <i class="fas fas fa-fw fa-cogs"></i>
                <span>Proses BPN</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Non-Berkas
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('catatan'); ?>">
                <i class="fas fa-fw fa-bookmark"></i>
                <span>Catatan</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <?php if ($this->session->userdata('role_id') != 2) { ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Lainnya</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header bg-primary" style="color:white ">Menu:</h6>
                        <a class="collapse-item" href="<?= base_url('berkas/cabut_berkas'); ?>">Pencabutan Berkas</a>
                        <a class="collapse-item" href="<?= base_url('user/manajemenUser'); ?>">User</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        <?php } ?>


        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
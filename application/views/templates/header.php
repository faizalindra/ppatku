<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="PPATku">
    <meta name="author" content="Indra Faizal Amri">
    <link rel="icon" type="text/css" href="<?= base_url('assets/vendor/font/nunito.css') ?>">

    <title>PPatku - <?= $judul ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/icon.png') ?>">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.cs') ?>s" rel="stylesheet">
    <script src="<?= base_url('assets/vendor/jquery/jquery.js') ?>"></script>
    <div id="roleid" data="<?= $this->session->userdata('role_id') ?>"></div>
    <div id="cari_data" data="<?= $this->session->flashdata('cari_data') ?>"></div>
    <script src="<?= base_url('assets/vendor/custom-js/lain.js') ?>"></script>
</head>
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon">
                <img style="max-height: 40px;" src="<?=base_url('assets/img/icon.png')?>"></img>
            </div>
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

        <body id="page-top" class="sidebar-toggled">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>svvvvC
            </button> -->

                    <div class="nav-item">
                        <div id="tanggal"></div>
                        <div id="clock"></div>
                    </div>
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search justify-content-center" action="<?= base_url('cari'); ?>" method="post">
                        <div class="input-group">
                            <input name="cari" id="cari" type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a> -->

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "Halo, <b>" . $this->session->userdata('nama'); ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/default.jpg'); ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('user/profile') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('autentifikasi/logout') ?>">
                                    <i class="fas glyphicon-log-out fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
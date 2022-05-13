<!-- Begin Page Content -->
<script type="text/javascript" src="<?php base_url() ?>assets/vendor/jquery/jquery-ui.min.js"></script>
<link href="<?= base_url() ?>assets/vendor/jquery/jquery-ui.min.css" rel="stylesheet" type="text/css">
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="col">

        <div class="row">
            <div class="col-xl-6 col-md-4 mb-4">
                <div class="card border-left-danger shadow h-100 py-2 bg-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Berkas Terdaftar</div>
                                <div class="h1 mb-0 font-weight-bold text-white"><?= $this->ModelBerkas->getBerkas()->num_rows(); ?></div>
                                <div class="text-white">Proses &nbsp; :</div>
                                <div class="text-white">Selesai &nbsp; :</div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('berkas'); ?>"><i class="fas fa-book fa-3x text-warning"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-4 mb-4">
                <div class="card border-left-danger shadow h-100 py-2 bg-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">Jumlah Sertipikat Terdaftar</div>
                                <div class="h1 mb-0 font-weight-bold text-white"><?= $this->ModelSertipikat->cekSertipikat()->num_rows() - 1; ?></div>
                                <div class="text-white">Proses &nbsp; :</div>
                                <div class="text-white">Selesai &nbsp; :</div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('berkas'); ?>"><i class="fas fa-certificate fa-3x text-warning"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Berkas Belum Selesai</h6>
            </div>
            <div class="card-body">

                <div class="row">
                    <?php
                    $a = 0;
                    foreach ($berkas as $b) {
                        $a++; ?>
                        <div class="col-lg-3 mb-4">
                            <div class="card bg-success font-weight-bold text-white shadow text-decoration-underline">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-left">
                                            <?= $b['nama_penjual']; ?>
                                            <div class="text-white-50 small font-weight-bold">
                                                <?= $b['no_sertipikat']; ?> / <?= $b['desa']; ?><br>
                                                <?= $b['kecamatan']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <?= $b['jenis_berkas']; ?>
                                            <p><?= $b['nama_pembeli']; ?></p>
                                            <div class="text-white-50 font-weight-bold"></div>
                                        </div>
                                    </div>
                                    <p></p>
                                    <div>Ket :
                                        <div class="text-white-50 small font-weight-bold"><?= $b['keterangan']; ?></div>
                                    </div>
                                    <!-- <div class="text-center">
                                            <a href="<?= base_url('berkas'); ?>">
                                                <button type="button" class="btn btn-info btn-sm">Lihat Proses
                                                    <i class="fas fa-search" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        </div> -->
                                </div>
                            </div>
                        </div>
                    <?php if ($a >= 8) {
                            break;
                        }
                    } ?>
                </div>

            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Proses BPN</h6>
            </div>
            <div class="card-body">
                <div id="bpn" class="row">

                </div>

            </div>
        </div>


        <!-- Content Row -->

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Indra Faizal Amri 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<script type="text/javascript" src="<?php base_url() ?>assets/vendor/custom-js/dashboard.js"></script>
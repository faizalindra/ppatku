<!-- Begin Page Content -->
<script type="text/javascript" src="<?php base_url() ?>assets/vendor/jquery/jquery-ui.min.js"></script>
<link href="<?= base_url() ?>assets/vendor/jquery/jquery-ui.min.css" rel="stylesheet" type="text/css">
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="col">

        <div class="row">
            <div class="col-xl-4 col-md-4 mb-4">
                <div class="card border-left-danger shadow h-100 py-2 bg-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">Berkas Terdaftar</div>
                                <div class="h1 mb-0 font-weight-bold text-white"><?php echo $ba ?></div>
                                <div class="text-white">Proses &nbsp; : <?php echo $bb ?></div>
                                <div class="text-white">Selesai &nbsp; : <?php echo $bc ?></div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('berkas'); ?>"><i class="fas fa-book fa-3x text-warning"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 mb-4">
                <div class="card border-left-danger shadow h-100 py-2 bg-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">Sertipikat Terdaftar</div>
                                <div class="h1 mb-0 font-weight-bold text-white"><?php echo $sa ?></div>
                                <div class="text-white">&nbsp;</div>
                                <div class="text-white">&nbsp;</div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('berkas'); ?>"><i class="fas fa-certificate fa-3x text-warning"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 mb-4">
                <div class="card border-left-danger shadow h-100 py-2 bg-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-md font-weight-bold text-white text-uppercase mb-1">Proses BPN Terdaftar</div>
                                <div class="h1 mb-0 font-weight-bold text-white"><?php echo $bpn_a ?></div>
                                <div class="text-white">Proses &nbsp; : <?php echo $bpn_b ?></div>
                                <div class="text-white">Selesai &nbsp; : <?php echo $bpn_a - $bpn_b ?></div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('bpn'); ?>"><i class="fas fa-cogs fa-3x text-warning"></i></a>
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

                <div class='row'>

                    <!-- card berkas belum selesai -->
                    <div class="row col-md-9">
                        <?php
                        $a = 0;
                        foreach ($berkas as $b) {
                            $a++; ?>
                            <div class="col-md-4 mb-4">
                                <div class="card bg-success font-weight-bold text-white shadow text-decoration-underline">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 justify-content-center" align="center"><button class='btn btn-info'><?= $b['id_berkas']?></button></div>
                                        </div>
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
                                        <div> Ket :
                                            <div class="small font-weight-bold"><?= nl2br($b['keterangan']); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php if ($a >= 9) {
                                break;
                            }
                        } ?>
                    </div>

                    <!-- card catatan -->
                    <div class="col-auto col-md-3">
                        <?php $i = 0;
                        foreach ($catatan as $r) {
                            if ($r['star_catatan'] == 1) {
                                $i++; ?>
                                <div class='col-auto mb-4'>
                                    <div class="card bg-dark font-weight-bold text-white shadow text-decoration-underline">
                                        <div class="card-body">
                                            <div class="row">
                                                <div align='left' class="col-md-6 text-white-50 small font-weight-bold">
                                                    <?= $r['tgl']; ?>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <a href='<?= base_url('catatan/hapus_catatan_dash/') . $r['id_catatan'] ?>' align='right'>
                                                        <div class="fa fa-trash"></div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div align='left'><?= nl2br($r['isi_catatan']) ?></div>
                                        </div>
                                    </div>
                                </div>
                        <?php if ($i == 5) {
                                    break;
                                }
                            }
                        } ?>
                    </div>
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
            <span>Copyright &copy; Indra Faizal Amri <?= $year=date('Y')?></span>
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
<style>
    .fa-trash {
        color: white;
    }
</style>
<!-- Begin Page Content -->
<script type="text/javascript" src="<?php base_url('assets/vendor/jquery/jquery-ui.min.js') ?>"></script>
<link href="<?= base_url('assets/vendor/jquery/jquery-ui.min.css') ?>" rel="stylesheet" type="text/css">
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
                                <div class="h1 mb-0 font-weight-bold text-white"><?=  $b['b_terdaftar'] ?></div>
                                <div class="text-white">Proses &nbsp; : <?= $b['b_proses'] ?></div>
                                <div class="text-white">Selesai &nbsp; : <?= $b['b_selesai'] ?></div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('berkas'); ?>"><i class="fas fa-book fa-5x text-warning"></i></a>
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
                                <div class="h1 mb-0 font-weight-bold text-white"><?= $s ?></div>
                                <div class="text-white">&nbsp;</div>
                                <div class="text-white">&nbsp;</div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('berkas'); ?>"><i class="fas fa-certificate fa-5x text-warning"></i></a>
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
                                <div class="h1 mb-0 font-weight-bold text-white"><?= $bb['bb_terdaftar'] ?></div>
                                <div class="text-white">Proses &nbsp; : <?= $bb['bb_proses'] ?></div>
                                <div class="text-white">Selesai &nbsp; : <?= $bb['bb_terdaftar'] - $bb['bb_proses'] ?></div>
                            </div>
                            <div class="col-auto">
                                <a href="<?= base_url('bpn'); ?>"><i class="fas fa-cogs fa-5x text-warning"></i></a>
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
                                <div class="card bg-success font-weight-bold text-white shadow text-decoration-underline" style="min-height: 210px;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 justify-content-left" ><h5><u><?= $b['kode'] ?></u></h5></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 text-center"><?= $b['jenis_berkas']; ?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 text-left">
                                                <?php $napen = str_replace(":", ": \n", $b['nama_penjual'])  ?>
                                                <div class="text-capitalize"><strong><u><?= nl2br($napen) ?></u></strong></div>
                                                <div class=" small font-weight-bold">
                                                    <?php
                                                    if ($b['no_sertipikat'] = null) {
                                                        $hsl = $b['jenis_hak'] . '. ' . $b['no_sertipikat'] . '/' . $b['desa'];
                                                    } else {
                                                        $hsl = 'Desa ' . $b['desa'];
                                                    }
                                                    ?>
                                                    <?= $hsl ?><br>
                                                    Kec. <?= $b['kecamatan']; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <p class="text-uppercase"><strong><u><?= $b['nama_pembeli']; ?></u></strong></p>
                                                <div class="text-white-50 font-weight-bold"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-auto"><u>Ket :</u> </div>
                                            <div class="col-auto font-weight-bold p-0"><?= nl2br($b['keterangan']); ?></div>
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
                                                    <?= date_format(date_create( $r['tgl']), 'd M Y')?>
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
            <span>Copyright &copy; Indra Faizal Amri <?= $year = date('Y') ?></span>
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
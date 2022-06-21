<script type="text/javascript" src="<?= base_url('assets/vendor/jquery/jquery-ui.min.js') ?>"></script>
<link href="<?= base_url('assets/vendor/jquery/jquery-ui.min.css') ?>" rel="stylesheet" type="text/css">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Catatan</h6>
    </div>
    <div class="card-body">

        <div class="row-auto">
            <button id="btnInput" type="button" class="btn btn-primary" data-toggle="modal" data-target="#formCatatan">Buat Catatan</button>
        </div>
        <div class="row-md-8 col-auto"></div>
        <p></p>
        <div class="row-md-4 col-auto"></div>

        <div class="row">
            <div class="card col-md-12 col col-auto">
                <div class="card-header">
                    <h4 class="m-0 font-weight-bold text-primary" align='center'>Prioritas</h4>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <!-- card catatan -->
                                <?php foreach ($catatan as $r) {
                                    if ($r['star_catatan'] == 1) { ?>
                                        <div class='col-auto col-md-4 mb-2'>
                                            <div class="card bg-dark font-weight-bold text-white shadow text-decoration-underline">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div align='left' class="col-md-6 text-white-50 small font-weight-bold">
                                                            <?= date_format(date_create($r['tgl']), 'd M Y'); ?>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <a href='<?= base_url('catatan/hapus_catatan/') . $r['id_catatan'] ?>' align='right'>
                                                                <div class="fa fa-trash"></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div align='left'><?= nl2br($r["isi_catatan"]) ?></div>
                                                    <div align='center'>
                                                        <i href="#" class="fa fa-star fa-bintang" style="font-size:25px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-12 col col-auto">
                <div class="card-header">
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row gx-3">
                                <!-- card catatan -->
                                <?php foreach ($catatan as $r) {
                                    if ($r['star_catatan'] != 1) { ?>
                                        <div class='col-auto col-md-4'>
                                            <div class="card bg-primary font-weight-bold text-white shadow text-decoration-underline">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div align='left' class="col-md-6 text-white-50 small font-weight-bold">
                                                            <?= $r['tgl']; ?>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <a href='<?= base_url('catatan/hapus_catatan/') . $r['id_catatan'] ?>' align='right'>
                                                                <div class="fa fa-trash"></div>
                                                            </a>

                                                        </div>
                                                    </div>
                                                    <div align='left'><?= nl2br($r["isi_catatan"]) ?></div>
                                                    <div align='center'>
                                                        <a href="<?= base_url('catatan/bintang_catatan/') . $r['id_catatan'] ?>">
                                                            <div class="fa fa-star fa-unstar" style="font-size:25px;"></div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="formCatatan" tabindex="-1" role="dialog" aria-labelledby="formCatatanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="formCatatanLabel">Catatan Baru</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAwesome" method="post" action="<?= base_url('catatan/input_catatan') ?>">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="catatan" class="col-sm-2 col-form-label">
                            Catatan
                        </label>
                        <div class="col-sm-10">
                            <textarea id="txt_catatan_0" name="txt_catatan" cols="40" rows="6" class="form-control" required="required"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12" align='center'>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input name="bintang" id="bintang_0" type="checkbox" class="custom-control-input" value="1">
                                <label for="bintang_0" class="custom-control-label">Prioritas</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script type="text/javascript" src="<?= base_url('assets/vendor/datatables/jquery.dataTables.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet" type="text/css">

<style>
    .fa-bintang {
        color: yellow;
    }

    .fa-unstar {
        color: white;
    }

    .fa-trash {
        color: white;
    }
</style>
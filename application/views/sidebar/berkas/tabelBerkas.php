    <script type="text/javascript" src="<?= base_url('assets/vendor/jquery/jquery-ui.min.js') ?>"></script>
    <link href="<?= base_url('assets/vendor/jquery/jquery-ui.min.css') ?>" rel="stylesheet" type="text/css">
    <div class="card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manajemen Berkas</h6>
        </div>
        <div class="card-body">

            <div class="comtainer">
                <div class="row">
                    <div class="col-auto col-md-2">
                        <button id="btnStart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#formInputBerkas">Input Berkas</button>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <!-- Terdaftar -->
                            <div class="col-md-3">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body p-1">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col p-1">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Terdaftar</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $b['b_terdaftar'] ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Dalam Proses -->
                            <div class="col-md-3">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body p-1">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col p-1">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Dalam Proses</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $b['b_proses'] ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-cogs fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Selesai -->
                            <div class="col-md-3">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body p-1">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col p-1">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Selesai</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $b['b_selesai'] ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-check-square fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Dicabut -->
                            <div class="col-md-3">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body p-1">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col p-1">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    Dicabut</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $b['b_dicabut'] ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-unlink fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-auto">
                    <table class="table table-striped" id="tabel-berkas">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Tanggal Masuk</th>
                                <th>No Sertipikat</th>
                                <th>Kecamatan</th>
                                <th>Jenis Berkas</th>
                                <th>Pihak 1</th>
                                <th>Pihak 2</th>
                                <th>Berkas Selesai</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- model form input -->
        <div class="modal fade" id="formInputBerkas" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title"><strong>INPUT BERKAS</strong></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form id="formAwesome" method="post" action="<?= base_url('berkas/simpanBer') ?>" autocomplete="off" style="font-weight: 400 !important">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h6><u>Berkas</u></h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">No.
                                                                        </div>
                                                                    </div>
                                                                    <input type="number" class="form-control" name="no_berkas" id="no_berkas" aria-describedby="helpId" max="<?= $max_berkas ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <div class="input-group">
                                                                    <input type="text" name="tgl_masuk" class="form-control datepicker" id="tgl_masuk_i" placeholder="Tanggal Masuk" autocomplete="off">
                                                                    <div class="input-group-append">
                                                                        <div class="input-group-text">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <select name="sertipikat" id="sertipikat_i" class="custom-select" aria-placeholder="Sertipikat">
                                                                <option disabled selected value> -- Sertipikat -- </option>
                                                                <?php foreach ($sertipikat as $row) :
                                                                    echo $row;
                                                                endforeach; ?>
                                                            </select>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <i class="fa fa-book"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">Kec</div>
                                                            </div>
                                                            <select name="kecamatan" id="kecamatan_i" class="custom-select" required>
                                                                <option disabled selected value> -- Kecamatan -- </option>
                                                                <?php foreach ($kecamatan as $row) : ?>
                                                                    <option value="<?php echo $row->id; ?>" data-value="<?php echo $row->id ?>"><?php echo $row->nama; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">Desa</div>
                                                            </div>
                                                            <select id="desa_i" name="desa" class="custom-select" required>
                                                                <option disabled selected value> -- Desa -- </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">Proses</div>
                                                            </div>
                                                            <select name="jenis_berkas[]" class="form-control select2 select2-hidden-accessible" multiple="" id="jenis_berkas_i" tabindex="-1" style="width: 83%;" required>
                                                                <option value="AJB">AJB</option>
                                                                <option value="APHB">APHB</option>
                                                                <option value="APHT">APHT</option>
                                                                <option value="Ganti Blangko">Ganti Blangko</option>
                                                                <option value="Ganti Nama">Ganti Nama</option>
                                                                <option value="Hibah">Hibah</option>
                                                                <option value="Konversi">Konversi</option>
                                                                <option value="Pemecahan">Pemecahan</option>
                                                                <option value="Pengeringan">Pengeringan</option>
                                                                <option value="Peningkatan Hak">Peningkatan Hak</option>
                                                                <option value="Roya">Roya</option>
                                                                <option value="SKMHT">SKMHT</option>
                                                                <option value="Waris">Waris</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="penjual" id="penjual_i" aria-describedby="helpId" autocapitalize="on" pattern="\s*(?:[\w:,\.]\s*){5,50}$" maxlength="50" required>
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">Pihak 1
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="pembeli" id="pembeli_i" aria-describedby="helpId" autocapitalize="on" pattern="\s*(?:[\w:,\.]\s*){0,50}$" maxlength="50">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">Pihak 2
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">Rp.
                                                                </div>
                                                            </div>
                                                            <input type="number" class="form-control" name="tot_biaya" id="tot_biaya_i" aria-describedby="helpId" placeholder="Biaya" max="99999999">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <textarea id="keterangan_i" name="keterangan" cols="40" rows="3" class="form-control" maxlength="50"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <h6><u>Kelengkapan</u></h6>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <span id="checkboxHelpBlock" class="form-text text-muted"><u>Penjual</u> :</span>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <div class="input-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="ktp_penjual_i" name="ktp_penjual">
                                                                        <label class="custom-control-label" for="ktp_penjual_i">KTP</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="input-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="kk_penjual_i" name="kk_penjual">
                                                                        <label class="custom-control-label" for="kk_penjual_i">KK</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="input-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="ktp_is_penjual_i" name="ktp_is_penjual">
                                                                        <label class="custom-control-label" for="ktp_is_penjual_i">KTP Suami/Istri</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-1 mb-1" />
                                                    <div class="row">
                                                        <span id="checkboxHelpBlock" class="form-text text-muted"><u>Pembeli</u> :</span>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <div class="input-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="ktp_pembeli_i" name="ktp_pembeli">
                                                                        <label class="custom-control-label" for="ktp_pembeli_i">KTP</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="input-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="kk_pembeli" name="kk_pembeli">
                                                                        <label class="custom-control-label" for="kk_pembeli">KK</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="input-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="ktp_is_pembeli_i" name="ktp_is_pembeli">
                                                                        <label class="custom-control-label" for="ktp_is_pembeli_i">KTP Suami/Istri</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="input-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="bpjs_i" name="bpjs">
                                                                        <label class="custom-control-label" for="bpjs_i">BPJS</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-1 mb-1" />
                                                    <div class="row">
                                                        <span id="checkboxHelpBlock" class="form-text text-muted"><u>Ahli Waris</u> :</span>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="row">
                                                            <div class="col-auto">
                                                                <div class="input-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="ktp_ahli_waris_i" name="ktp_ahli_waris">
                                                                        <label class="custom-control-label" for="ktp_ahli_waris_i">KTP</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="input-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="kk_ahli_waris_i" name="kk_ahli_waris">
                                                                        <label class="custom-control-label" for="kk_ahli_waris_i">KK</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-auto">
                                                                <div class="input-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="akta_kematian_i" name="akta_kematian">
                                                                        <label class="custom-control-label" for="akta_kematian_i">Akta Kematian</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-1 mb-1" />
                                                    <div class="row">
                                                        <span id="checkboxHelpBlock" class="form-text text-muted"><u>Tanah</u> :</span>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="shm_i" name="shm">
                                                                        <label class="custom-control-label" for="shm_i">SHM</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="sppt_i" name="sppt">
                                                                        <label class="custom-control-label" for="sppt_i">SPPT</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-1 mb-1" />
                                                    <div class="row">
                                                        <span id="checkboxHelpBlock" class="form-text text-muted"><u>Lainnya</u> :</span>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <div class="input-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="order_i" name="order_">
                                                                        <label class="custom-control-label" for="order_i">Order</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <div class="input-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="imb_i" name="imb">
                                                                        <label class="custom-control-label" for="imb_i">IMB</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group row">
                                                                <div class="input-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="spk_i" name="spk">
                                                                        <label class="custom-control-label" for="spk_i">SPK</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="ket_beda_nama" name="ket_beda_nama">
                                                                <label class="custom-control-label" for="ket_beda_nama">Pernyataan Beda Nama</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="persetujuan_hibah_i" name="persetujuan_hibah">
                                                                <label class="custom-control-label" for="persetujuan_hibah_i">Persetujuan Hibah</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <textarea id="ket_kelengkapan_i" name="ket_kelengkapan" cols="40" rows="2" class="form-control" maxlength="30"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-danger" value="reset"><i class="fa fa-trash"></i></button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button name="submit" type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end model form input -->

        <!-- model form edit -->
        <div class="modal fade" id="formedit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title"><strong>Edit Berkas</strong></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form id="formAwesome" method="post" action="<?= base_url() ?>berkas/update_berkas" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="container-fluid">
                                            <input type="text" name="id_e" id="id_e" hidden readonly>
                                            <div class="form-group row">
                                                <div class="input-group">
                                                    <input type="text" name="tgl_masuk_e" class="form-control datepicker" id="tgl_masuk" placeholder="Tanggal Masuk" autocomplete="off">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="input-group">
                                                    <select name="sertipikat_e" id="sertipikat_e" class="custom-select">
                                                        <option disabled selected value> -- Sertipikat -- </option>
                                                        <?php foreach ($sertipikat as $row) :
                                                            echo $row;
                                                        endforeach; ?>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-book"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">Kec</div>
                                                            </div>
                                                            <select name="kecamatan_e" id="kecamatan_e" class="custom-select">
                                                                <option disabled selected value> -- Kecamatan -- </option>
                                                                <?php foreach ($kecamatan as $row) : ?>
                                                                    <option value="<?php echo $row->id; ?>" data-value="<?php echo $row->id ?>"><?php echo $row->nama; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group row">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">Desa</div>
                                                            </div>
                                                            <select id="desa_e" name="desa_e" class="custom-select">
                                                                <option disabled selected value> -- Desa -- </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Proses</div>
                                                    </div>
                                                    <select name="jenis_berkas[]_e" class="form-control select2 select2-hidden-accessible" multiple="" id="jenis_berkas_e" tabindex="-1" style="width: 83%;">
                                                        <option value="AJB">AJB</option>
                                                        <option value="APHB">APHB</option>
                                                        <option value="APHT">APHT</option>
                                                        <option value="Ganti Blangko">Ganti Blangko</option>
                                                        <option value="Ganti Nama">Ganti Nama</option>
                                                        <option value="Hibah">Hibah</option>
                                                        <option value="Konversi">Konversi</option>
                                                        <option value="Pemecahan">Pemecahan</option>
                                                        <option value="Pengeringan">Pengeringan</option>
                                                        <option value="Peningkatan Hak">Peningkatan Hak</option>
                                                        <option value="Roya">Roya</option>
                                                        <option value="SKMHT">SKMHT</option>
                                                        <option value="Waris">Waris</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="penjual_e" id="penjual_e" aria-describedby="helpId" autocapitalize="on" pattern="\s*(?:[\w:,\.]\s*){5,50}$" maxlength="50">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">Penjual
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="pembeli_e" id="pembeli_e" aria-describedby="helpId" autocapitalize="on" pattern="\s*(?:[\w:,\.]\s*){0,50}$" maxlength="50">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">Pembeli
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="input-group">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">Rp.
                                                        </div>
                                                    </div>
                                                    <input type="number" class="form-control" name="tot_biaya_e" id="tot_biaya_e" aria-describedby="helpId" placeholder="Biaya" max="99999999">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="input-group">
                                                    <textarea id="keterangan_e" name="keterangan_e" cols="40" rows="3" class="form-control" maxlength="50"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button name="submit" type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end model form edit -->

        <!-- modal detail berkas -->
        <div class="modal fade" id="modelDetail2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header p-1 bg-primary text-white rounded">
                        <h4 class="modal-title pl-3" id="id_berkas_"></h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 pr-3">
                                    <div class="row">
                                        <div class="col-md-12 p-1">
                                            <div class="card border-dark">
                                                <div class="card-header p-1 bg-primary text-white">
                                                    <div class="row">
                                                        <div class="col-md-6 text-left">
                                                            <h6><strong>
                                                                    <div id="tgl_masuk_berkas_"></div>
                                                                </strong></h6>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <h6><strong>
                                                                    <div id="jenis_berkas_"></div>
                                                                </strong></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body p-1">
                                                    <div class="row text-left ml-0">
                                                        <div class="col-md-12 text-muted">
                                                            <div id="col_sertipikat"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 text-center p-2">
                                                            <div class="card-title">Pihak 1</div>
                                                            <h5 class="card-text" style="text-transform:capitalize" id="pihak_1"></h5>
                                                        </div>

                                                        <div class="col-md-6 text-center p-2">
                                                            <div class="card-title">Pihak 2</div>
                                                            <h5 class="card-text" style="text-transform:capitalize" id="pihak_2"></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-muted" id="ket_berkas">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 p-1">
                                            <div class="card border-dark">
                                                <div class="card-header p-1 bg-primary text-white">
                                                    <h6>Kelengkapan</h6>
                                                </div>
                                                <div class="card-body p-1 text-left">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div>
                                                                <ul id="kelengkapan_ada">
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div>
                                                                <ul id="kelengkapan_belum_ada">

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row p-0">
                                                        <div class="col-md-11 pl-3">
                                                            <p id="ket_keleng" class="text-muted" contenteditable="true"></p>
                                                        </div>
                                                        <div class="col-auto p-0"><button class="btn btn-circle btn-sm btn-success" id="save_ket_keleng"><i class="fa fa-save"></i></button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 p-1">
                                            <div class="card border-dark">
                                                <div class="card-header p-1 bg-primary text-white">
                                                    <h6>Proses</h6>
                                                </div>
                                                <div class="card-body p-1">
                                                    <div id="proses_" class="text-white"></div>
                                                    <div class="row pl-3 pt-1">
                                                        <div class="col-md-11 p-0">
                                                            <p id="ket_proses" class="text-muted" contenteditable="true"></p>
                                                        </div>
                                                        <div class="col-auto p-0"><button class="btn btn-circle btn-sm btn-success" id="save_ket_proses"><i class="fa fa-save"></i></button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 p-1">
                                    <div class="card border-dark" style=" min-height: 555px;">
                                        <div class="card-header p-1 bg-primary text-white">
                                            <h6>Proses BPN</h6>
                                        </div>
                                        <div class="card-body p-1">
                                            <div id="bpn_">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 p-1">
                                    <div class="card border-dark" style=" min-height: 555px;">
                                        <div class="card-header p-1 bg-primary text-white">
                                            <div class="row">
                                                <div class="col-md-12 text-left" style="font-size: 12px;">
                                                    Total Biaya
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <h5 id="total_biaya_"></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" id="row_biaya">
                                            </div>
                                            <div class="row">
                                                <br>
                                                <div class="col-md-12 text-center"><button id="tambah_biaya" data-toggle="collapse" data-target="#collapse_biaya" class="badge badge-success rounded-circle border border-white"><i class="fa fa-plus"></i></button></div>
                                                <div class="col-md-12">
                                                    <div id="collapse_biaya" class="collapse">
                                                        <form action="#" onsubmit="input_biaya();return false" autocomplete="off" id="form-biaya">
                                                            <div class="row">
                                                                <div class="col-md-12 text-center text-muted">
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input bayar_" type="radio" id="pembayaran" name="bayar_" value="0" required>
                                                                        <label class="form-check-label" for="pembayaran">Bayar/DP</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input bayar_" type="radio" id="penambahan" name="bayar_" value="1" required>
                                                                        <label class="form-check-label" for="penambahan">Tambah</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12"><input type="text" class="form-control datepicker" name="tgl_bayar" id="tgl_bayar" placeholder="Tanggal"></div>
                                                                <div class="col-md-12"><input type="text" class="form-control" name="jum_bayar" id="jum_bayar" pattern="[0-9]{3,7}" maxlength="7" title="Masukan Angka antara Rp. 1.000 ~ Rp. 99.999.999" placeholder="Rp." required></div>
                                                                <div class="col-md-12"><input type="text" class="form-control" name="penyetor" id="penyetor" placeholder="Bpk/Ibu" maxlength="20" required></div>
                                                                <div class="col-md-12"><textarea class="form-control" name="ket_bayar" id="ket_bayar" placeholder="Ket:" maxlength="30"></textarea></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <button type="reset" class="btn btn-sm btn-danger" data-dismiss="true">Reset</button>
                                                                    <button id="save_bayar" type="submit" class="btn btn-sm btn-primary">Save</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer p-1 text-white" id="footer_biaya">
                                            <div class="row">
                                                <div id="ket_bayar_" class="col-md-12 text-left" style="font-size: 12px;"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <h4 class="" id="status_bayar"></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of modal detail berkas -->

        <!-- modal sertipikat -->
        <div class="modal fade" id="ModalSertipikat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Detai Sertipikat</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="reload">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Nomor Sertipikat</th>
                                        <th>Kecamatan</th>
                                        <th>Luas m<sup>2</sup></th>
                                        <th>Atas Nama</th>
                                        <th>Penerima Hak</th>
                                    </tr>
                                </thead>
                                <tbody id="detail_sertipikat">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal sertipikat -->

        <!-- modal detail untuk berkas dicabut -->
        <div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header p-1 bg-primary text-white">
                        <h4 class="modal-title pl-3" id="id_berkas_2"></h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="text-center ">
                                    <h4 class="text-center text-dark">Berkas Dicabut</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-3">
                                    <div class="row">
                                        <div class="col-md-12 p-1">
                                            <div class="card border-dark">
                                                <div class="card-header p-1 bg-primary text-white">
                                                    <div class="row">
                                                        <div class="col-md-6 text-left">
                                                            <h6><strong>
                                                                    <div id="tgl_masuk_berkas_2"></div>
                                                                </strong></h6>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <h6><strong>
                                                                    <div id="jenis_berkas_2"></div>
                                                                </strong></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body p-1">
                                                    <div class="row text-left ml-0">
                                                        <div class="col-md-12 text-muted">
                                                            <div id="col_sertipikat_2"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 text-center p-2">
                                                            <div class="card-title">Pihak 1</div>
                                                            <h5 class="card-text" style="text-transform:capitalize" id="pihak_1_2"></h5>
                                                        </div>

                                                        <div class="col-md-6 text-center p-2">
                                                            <div class="card-title">Pihak 2</div>
                                                            <h5 class="card-text" style="text-transform:capitalize" id="pihak_2_2"></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer text-muted" id="ket_berkas_2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 p-1">
                                            <div class="card border-dark">
                                                <div class="card-header p-1 bg-primary text-white">
                                                    <h6>Kelengkapan</h6>
                                                </div>
                                                <div class="card-body p-1 text-left">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div>
                                                                <ul id="kelengkapan_ada_2">
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div>
                                                                <ul id="kelengkapan_belum_ada_2">
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row p-0">
                                                        <div class="col-md-11 pl-3">
                                                            <p id="ket_keleng_2" class="text-muted" contenteditable="true"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 p-1">
                                            <div class="card border-dark">
                                                <div class="card-header p-1 bg-primary text-white">
                                                    <h6>Proses</h6>
                                                </div>
                                                <div class="card-body p-1">
                                                    <div id="proses_2" class="text-white"></div>
                                                    <div class="row pl-3 pt-1">
                                                        <div class="col-md-11 p-0">
                                                            <p id="ket_proses_2" class="text-muted" contenteditable="true"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 p-1">
                                    <div class="card border-dark" style=" min-height: 555px;">
                                        <div class="card-header p-1 bg-primary text-white">
                                            <h6>Proses BPN</h6>
                                        </div>
                                        <div class="card-body p-1">
                                            <div id="bpn_2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 p-1">
                                    <div class="card border-dark" style=" min-height: 555px;">
                                        <div class="card-header p-1 bg-primary text-white">
                                            <div class="row">
                                                <div class="col-md-12 text-left" style="font-size: 12px;">
                                                    Total Biaya
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <h5 id="total_biaya__2"></h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row" id="row_biaya_2">
                                            </div>
                                        </div>
                                        <div class="card-footer p-1" id="footer_biaya_2">
                                            <div class="row">
                                                <div id="ket_bayar_2" class="col-md-12 text-left" style="font-size: 12px;"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <h4 class="" id="status_bayar_2"></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="<?= base_url('assets/vendor/datatables/jquery.dataTables.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/vendor/select2/select2.min.js') ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/vendor/custom-js/tabelBerkas.js') ?>"></script>
        <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets/vendor/select2/select2.min.css') ?>" rel="stylesheet" type="text/css">

        <style>
            #ui-datepicker-div {
                z-index: 10000 !important;
            }

            /* table,
            th,
            td {
                border: 1px solid black;
                border-collapse: collapse;
            } */
        </style>
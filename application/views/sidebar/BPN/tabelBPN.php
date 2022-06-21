<script type="text/javascript" src="<?= base_url('assets/vendor/jquery/jquery-ui.min.js') ?>"></script>
<link href="<?= base_url('assets/vendor/jquery/jquery-ui.min.css') ?>" rel="stylesheet" type="text/css">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manajemen Proses BPN</h6>
    </div>
    <div class="card-body">

        <div class="comtainer">
            <div class="row">
                <div class="col-auto col-md-2">
                    <button id="btnStart" type="button" class="btn btn-primary col-auto row-auto" data-toggle="modal" data-target="#inputbpn">Input STTD</button>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body p-1">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col p-1">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Terdaftar</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $a ?></div>
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $b ?></div>
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
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $a - $b ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check-square fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"> </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-auto">
                <table class="table table-striped" id="tabel-BPN">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No.</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Nama Pemohon</th>
                            <th scope="col">Nomor BPN</th>
                            <th scope="col">Jenis Proses</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Status</th>
                            <?php if ($this->session->userdata('role_id') != 2) {
                                echo '<th scope="col">Aksi</th>';
                            } ?>
                            <!-- <th scope="col">Action</th> -->
                        </tr>
                    </thead>
                    <tbody id="show_data">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal inputBPN -->
<div class="modal fade" id="inputbpn" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title"><strong>Input Proses BPN</strong></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="formAwesome" method="post" action="<?= base_url('bpn/inputbpn') ?>" autocomplete="off">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="container-fluid">
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <input type="text" name="tgl_masuk_i" class="form-control datepicker" id="tgl_masuk_i" placeholder="Tanggal Masuk" autocomplete="off">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <select name="no_berkas_i" id="no_berkas_i" class="custom-select" required>
                                                <option disabled selected value> -- Nomor Berkas -- </option>
                                                <?php foreach ($berkas as $row) :
                                                    echo $row;
                                                endforeach; ?>
                                            </select>
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="fa fa-book"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <select name="jenis_proses_i" class="form-control" id="jenis_proses_i" required>
                                                <option disabled selected value> -- Proses -- </option>
                                                <option value="Balik Nama">Balik Nama</option>
                                                <option value="Ganti Blangko">Ganti Blangko</option>
                                                <option value="Ganti Nama">Ganti Nama</option>
                                                <option value="IPH">IPH</option>
                                                <option value="Konversi">Konversi</option>
                                                <option value="Kutip SU">Kutip SU</option>
                                                <option value="Pemecahan">Pemecahan</option>
                                                <option value="Pengeringan">Pengeringan</option>
                                                <option value="Peningkatan Hak">Peningkatan Hak</option>
                                                <option value="Roya">Roya</option>
                                                <option value="Tapak Kapling">Tapak Kapling</option>
                                                <option value="Ukur">Ukur</option>
                                                <option value="Waris">Waris</option>
                                            </select>
                                            <div class="input-group-append">
                                                <div class="input-group-text"><i class="fa fa-cogs"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <div class="form-group row">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">No BPN
                                                        </div>
                                                    </div>
                                                    <input type="number" class="form-control" name="no_bpn_i" id="no_bpn_i" aria-describedby="helpId" autocapitalize="on" max="999999" title="Angka maksimal 999999" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="form-group row">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">Tahun
                                                        </div>
                                                    </div>
                                                    <select class="form-control" name="tahun_i" id="tahun_i" required>
                                                        <option value="<?= date('Y') ?>"><?= date('Y') ?></option>
                                                        <?php $tahun = date('Y');
                                                        $min_tahun = $tahun - 5;
                                                        $max_tahun = $tahun + 5;
                                                        for ($i = $min_tahun; $i <= $max_tahun; $i++) : ?>
                                                            <option value="<?= $i ?>"><?= $i ?></option>
                                                        <?php endfor; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Pemohon
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="nama_pemohon_i" id="nama_pemohon_i" aria-describedby="helpId" autocapitalize="on" required pattern="\s*(?:[\w:,\.]\s*){5,25}$" maxlength="25">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <textarea id="ket_i" name="ket_i" cols="40" rows="3" class="form-control" maxlength="30"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" value="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i></button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button name="submit" type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($this->session->userdata('role_id') != 2) { ?>
    <!-- Modal Edit -->
    <div class="modal fade" id="edit_bpn" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"><strong>Input Proses BPN</strong></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form id="formAwesome" method="post" action="<?= base_url() ?>bpn/update_bpn" autocomplete="off">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="container-fluid">
                                        <input type="number" value="" name="no_proses_bpn_e" id="no_proses_bpn_e" readonly hidden>
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <input type="text" name="tgl_masuk_e" class="form-control datepicker" id="tgl_masuk_e" placeholder="Tanggal Masuk" autocomplete="off">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <select name="no_berkas_e" id="no_berkas_e" class="custom-select">
                                                    <option disabled selected value> -- Nomor Berkas -- </option>
                                                    <?php foreach ($berkas as $row) :
                                                        echo $row;
                                                    endforeach; ?>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="fa fa-book"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <select name="jenis_proses_e" class="form-control" id="jenis_proses_e">
                                                    <option disabled selected value> -- Proses -- </option>
                                                    <option value="Balik Nama">Balik Nama</option>
                                                    <option value="Ganti Blangko">Ganti Blangko</option>
                                                    <option value="Ganti Nama">Ganti Nama</option>
                                                    <option value="IPH">IPH</option>
                                                    <option value="Konversi">Konversi</option>
                                                    <option value="Kutip SU">Kutip SU</option>
                                                    <option value="Pemecahan">Pemecahan</option>
                                                    <option value="Pengeringan">Pengeringan</option>
                                                    <option value="Peningkatan Hak">Peningkatan Hak</option>
                                                    <option value="Roya">Roya</option>
                                                    <option value="Tapak Kapling">Tapak Kapling</option>
                                                    <option value="Ukur">Ukur</option>
                                                    <option value="Waris">Waris</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="fa fa-cogs"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="form-group row">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">No BPN
                                                            </div>
                                                        </div>
                                                        <input type="number" class="form-control" name="no_bpn_e" id="no_bpn_e" aria-describedby="helpId" autocapitalize="on" max="999999" title="Angka maksimal 999999">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group row">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">Tahun
                                                            </div>
                                                        </div>
                                                        <select class="form-control" name="tahun_e" id="tahun_e">
                                                            <option value="<?= date('Y') ?>"><?= date('Y') ?></option>
                                                            <?php $tahun = date('Y');
                                                            $min_tahun = $tahun - 5;
                                                            $max_tahun = $tahun + 5;
                                                            for ($i = $min_tahun; $i <= $max_tahun; $i++) : ?>
                                                                <option value="<?= $i ?>"><?= $i ?></option>
                                                            <?php endfor; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Pemohon
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" name="nama_pemohon_e" id="nama_pemohon_e" aria-describedby="helpId" autocapitalize="on" pattern="\s*(?:[\w:,\.]\s*){5,25}$" maxlength="25">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="input-group">
                                                <textarea id="ket_e" name="ket_e" cols="40" rows="3" class="form-control" maxlength="30"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" value="reset" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i></button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button name="submit" type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>




<script type="text/javascript" src="<?= base_url('assets/vendor/datatables/jquery.dataTables.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/select2/select2.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/vendor/custom-js/tabelBPN.js') ?>"></script>
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
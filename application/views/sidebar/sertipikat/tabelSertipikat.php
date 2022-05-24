<script type="text/javascript" src="<?php base_url() ?>assets/vendor/jquery/jquery-ui.min.js"></script>
<link href="<?= base_url() ?>assets/vendor/jquery/jquery-ui.min.css" rel="stylesheet" type="text/css">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manajemen Sertipikat</h6>
    </div>
    <div class="card-body">

        <div class="row-auto">
            <button id="btnStart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#forminput">Input Sertipikat</button>
        </div>
        <div class="row-md-8 col-auto"></div>
        <div class="row-md-4 col-auto">
            <div class="row justify-content-end">
                <div class="row-md-2 justify-content-end">Terdaftar </div>
                <div class="row-md-2 justify-content-end">&nbsp;: <?php echo $a ?> &nbsp;</div>
            </div>
        </div>
        <p></p>

        <div class="row">
            <div class="col-lg-12 col-auto">
                <table class="table table-striped" id="tabel-sertipikat">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <!-- <th scope="col">No. Reg</th> -->
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Nomor Sertipikat</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Luas</th>
                            <th scope="col">Pemilik Hak</th>
                            <th scope="col">Penerima Hak</th>
                            <th scope="col">Proses</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- model form input -->
<div class="modal fade" id="forminput" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title"><strong>Input Sertipikat</strong></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="formAwesome" method="post" action="<?= base_url() ?>sertipikat/inputSertipikat" autocomplete="off">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="container-fluid">
                                    <input type="text" class="form-control" name="id_e" id="id_e" hidden readonly>
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
                                            <select name="jenis_hak_i" id="jenis_hak_i" class="custom-select">
                                                <option disabled selected value> -- Jenis Hak -- </option>
                                                <option value="M"> Hak Milik </option>
                                                <option value="GB"> Guna Banggunan </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <input type="number" name="nomor_sertipikat_i" class="form-control" id="nomor_sertipikat_i" placeholder="-- Nomor Sertipikat --" autocomplete="off">
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
                                                    <select name="kecamatan_i" id="kecamatan_i" class="custom-select">
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
                                                    <select id="desa_i" name="desa_i" class="custom-select">
                                                        <option disabled selected value> -- Desa -- </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Luas
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="luas_i" id="luas_i" aria-describedby="helpId" autocapitalize="on" placeholder="m²">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Proses</div>
                                            </div>
                                            <select name="jenis_berkas[]_i" class="form-control select2 select2-hidden-accessible" multiple="" id="jenis_berkas_i" tabindex="-1" style="width: 83%;">
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
                                                <option value="SKMHT">SKMHT</option>
                                                <option value="Waris">Waris</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="pemilik_hak_i" id="pemilik_hak_i" aria-describedby="helpId" autocapitalize="on">
                                            <div class="input-group-append">
                                                <div class="input-group-text">Pemilik
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="penerima_hak_i" id="penerima_hak_i" aria-describedby="helpId" autocapitalize="on">
                                            <div class="input-group-append">
                                                <div class="input-group-text">Penerima
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <textarea id="keterangan_i" name="keterangan_i" cols="40" rows="3" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" value="reset" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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

<!-- model edit -->
<div class="modal fade" id="edit_sert" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title"><strong>Edit Sertipikat</strong></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form id="formAwesome" method="post" action="<?= base_url() ?>sertipikat/update_sertipikat" autocomplete="off">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="container-fluid">
                                    <input type="text" name="id_e" id="id_e" hidden readonly>
                                    <input type="text" class="form-control" name="id_e" id="id_e" hidden readonly>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <select name="jenis_hak_e" id="jenis_hak_e" class="custom-select">
                                                <option disabled selected value> -- Jenis Hak -- </option>
                                                <option value="M"> Hak Milik </option>
                                                <option value="GB"> Guna Banggunan </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <input type="number" name="nomor_sertipikat_e" class="form-control" id="nomor_sertipikat_e" placeholder="-- Nomor Sertipikat --" autocomplete="off">
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
                                                <div class="input-group-text">Alamat
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="alamat_e" id="alamat_e" aria-describedby="helpId" autocapitalize="on" readonly>
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
                                                    <select id="desa_e" name="desa_e" class="custom-select" placeholder="-- Desa --">
                                                        <option disabled selected value> -- Desa -- </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Luas
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="luas_e" id="luas_e" aria-describedby="helpId" autocapitalize="on" placeholder="m²">
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
                                                <option value="SKMHT">SKMHT</option>
                                                <option value="Waris">Waris</option>
                                            </select>
                                            <span id="textHelpBlock" class="form-text text-muted coment"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="pemilik_hak_e" id="pemilik_hak_e" aria-describedby="helpId" autocapitalize="on">
                                            <div class="input-group-append">
                                                <div class="input-group-text">Pemilik
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="penerima_hak_e" id="penerima_hak_e" aria-describedby="helpId" autocapitalize="on">
                                            <div class="input-group-append">
                                                <div class="input-group-text">Penerima
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <textarea id="keterangan_e" name="keterangan_e" cols="40" rows="3" class="form-control"></textarea>
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
<!-- end model edit -->

<!-- modal edit sertipikat -->
<div class="modal fade" id="edit_sert2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Edit Sertipikat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAwesome" method="post" action="<?= base_url('sertipikat/update_sertipikat') ?>">
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="number" name="no_reg_e" class="form-control" id="no_reg_e" readonly hidden>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_hak" class="col-sm-6 col-form-label">
                                Jenis Hak
                            </label>
                            <div class="col-sm-6">
                                <select name="jenis_hak_e" class="form-control" id="jenis_hak" placeholder="Nomor Sertipikat" value="<?= set_value('jenis_hak'); ?>" required>
                                    <option value="M">Hak Milik</option>
                                    <option value="GB">Hak Guna Bangunan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_sertipikat" class="col-sm-6 col-form-label">
                                Nomor Sertipikat
                            </label>
                            <div class="col-sm-6">
                                <input type="number" name="no_sertipikat_e" class="form-control" id="no_sertipikat" placeholder="Nomor Sertipikat" value="<?= set_value('no_sertipikat'); ?>" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kec" class="col-6 col-form-label">Kecamatan</label>
                            <div class="col-sm-6">
                                <input type="text" id="kec" name="kec_e" class="custom-select" required>
                                </input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dsa" class="col-6 col-form-label">Desa</label>
                            <div class="col-sm-6">
                                <input type="text" id="dsa" name="dsa_e" class="custom-select" required>
                                </input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="luas" class="col-sm-6 col-form-label">
                                Luas
                            </label>
                            <div class="col-sm-6">
                                <input type="number" name="luas_e" class="form-control" id="luas" placeholder="m2" value="<?= set_value('luas'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pemilik_hak" class="col-sm-6 col-form-label">
                                Pemilik Hak
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="pemilik_hak_e" class="form-control" id="pemilik_hak" placeholder="" value="<?= set_value('nama_penjual'); ?>" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pembeli_hak" class="col-sm-6 col-form-label">
                                Penerima Hak
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="pembeli_hak_e" class="form-control" id="pembeli_hak" placeholder="" value="<?= set_value('pembeli_hak'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="proses" class="col-sm-6 col-form-label">
                                Proses
                            </label>
                            <div class="col-sm-6">
                                <select name="proses[]_e" class="form-control select2 select2-hidden-accessible" multiple="" id="proses" placeholder="" value="<?= set_value('proses'); ?>" autocomplete="off" style="width: 100%;">
                                    <option>AJB</option>
                                    <option>APHT</option>
                                    <option>APHB</option>
                                    <option>SKMHT</option>
                                    <option>Hibah</option>
                                    <option>Konversi</option>
                                    <option>Ganti Nama</option>
                                    <option>Waris</option>
                                    <option>Peningkatan Hak</option>
                                    <option>Pengeringan</option>
                                    <option>Pemecahan</option>
                                    <option>IPH</option>
                                </select>
                                <span id="textHelpBlock" class="form-text text-muted coment"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ket" class="col-sm-6 col-form-label">
                                Keterangan
                            </label>
                            <div class="col-sm-6">
                                <textarea name="ket_e" class="form-control" id="ket" value="<?= set_value('ket'); ?>"></textarea>
                            </div>
                        </div>
                        <!-- </div> -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="<?php base_url() ?>assets/vendor/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?php base_url() ?>assets/vendor/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php base_url() ?>assets/vendor/custom-js/tabelSertipikat.js"></script>
<link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>assets/vendor/select2/select2.min.css" rel="stylesheet" type="text/css">
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


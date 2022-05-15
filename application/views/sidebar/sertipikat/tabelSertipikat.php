<script type="text/javascript" src="<?php base_url() ?>assets/vendor/jquery/jquery-ui.min.js"></script>
<link href="<?= base_url() ?>assets/vendor/jquery/jquery-ui.min.css" rel="stylesheet" type="text/css">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manajemen Sertipikat</h6>
    </div>
    <div class="card-body">

        <button id="btnStart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#input_sert">Input Sertipikat</button>
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

<!-- modal input sertipikat -->
<div class="modal fade" id="input_sert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Sertipikat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAwesome" method="post" action="<?= base_url('sertipikat/inputSertipikat') ?>">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="jenis_hak" class="col-sm-6 col-form-label">
                                Jenis Hak
                            </label>
                            <div class="col-sm-6">
                                <select name="jenis_hak" class="form-control" id="jenis_hak" placeholder="Nomor Sertipikat" value="<?= set_value('jenis_hak'); ?>" required>
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
                                <input type="number" name="no_sertipikat" class="form-control" id="no_sertipikat" placeholder="Nomor Sertipikat" value="<?= set_value('no_sertipikat'); ?>" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kec" class="col-6 col-form-label">Kecamatan</label>
                            <div class="col-sm-6">
                                <select id="kec" name="kec" class="custom-select" required>
                                    <option value="">No Selected</option>
                                    <?php foreach ($kecamatan as $row) : ?>
                                        <option id="kec_<?php echo $row->id; ?>" class="list_desa" value="<?php echo $row->nama; ?>" data="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dsa" class="col-6 col-form-label">Desa</label>
                            <div class="col-sm-6">
                                <select id="dsa" name="dsa" class="custom-select" required>
                                    <option value="">No Selected</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="luas" class="col-sm-6 col-form-label">
                                Luas
                            </label>
                            <div class="col-sm-6">
                                <input type="number" name="luas" class="form-control" id="luas" placeholder="m2" value="<?= set_value('luas'); ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pemilik_hak" class="col-sm-6 col-form-label">
                                Pemilik Hak
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="pemilik_hak" class="form-control" id="pemilik_hak" placeholder="" value="<?= set_value('nama_penjual'); ?>" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pembeli_hak" class="col-sm-6 col-form-label">
                                Penerima Hak
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="pembeli_hak" class="form-control" id="pembeli_hak" placeholder="" value="<?= set_value('pembeli_hak'); ?>" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="proses" class="col-sm-6 col-form-label">
                                Proses
                            </label>
                            <div class="col-sm-6">
                                <select name="proses[]" class="form-control select2 select2-hidden-accessible" multiple="" id="proses" placeholder="" value="<?= set_value('proses'); ?>" autocomplete="off" style="width: 100%;" required>
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
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ket" class="col-sm-6 col-form-label">
                                Keterangan
                            </label>
                            <div class="col-sm-6">
                                <textarea name="ket" class="form-control" id="ket" placeholder="" value="<?= set_value('ket'); ?>"></textarea>
                            </div>
                        </div>
                        <!-- </div> -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary submit_edit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal edit sertipikat -->
<div class="modal fade" id="edit_sert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
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
                                <input type="text" name="no_reg_e" class="form-control datepicker" id="id" placeholder="Tanggal Masuk" readonly hidden>
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
                                <input type="text" name="pembeli_hak_e" class="form-control" id="pembeli_hak" placeholder="" value="<?= set_value('pembeli_hak'); ?>" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="proses" class="col-sm-6 col-form-label">
                                Proses
                            </label>
                            <div class="col-sm-6">
                                <select name="proses[]_e" class="form-control select2 select2-hidden-accessible" multiple="" id="proses" placeholder="" value="<?= set_value('proses'); ?>" autocomplete="off" style="width: 100%;" required>
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
                                <textarea name="ket_e" class="form-control" id="ket" placeholder="" value="<?= set_value('ket'); ?>"></textarea>
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
<!-- <style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style> -->
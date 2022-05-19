<script type="text/javascript" src="<?php base_url() ?>assets/vendor/jquery/jquery-ui.min.js"></script>
<link href="<?= base_url() ?>assets/vendor/jquery/jquery-ui.min.css" rel="stylesheet" type="text/css">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manajemen Berkas Proses BPN</h6>
    </div>
    <div class="card-body">

        <div class="comtainer">
            <div class="row">
                <div class="col-auto col-md-2">
                    <button id="btnStart" type="button" class="btn btn-primary col-auto row-auto" data-toggle="modal" data-target="#input_bpn">Input SSTD</button>
                </div>
                <div class="col-md-8"></div>
                <div class="col-md-2">
                    <div class="row justify-content-end">
                        <div class="row-md-2 justify-content-end">Terdaftar </div>
                        <div class="row-md-2 justify-content-end">: <?php echo $a ?></div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="row-md-2 justify-content-end">Berjalan</div>
                        <div class="row-md-2 justify-content-end">: <?php echo $b ?></div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="row-md-2 justify-content-end">Selesai</div>
                        <div class="row-md-2 justify-content-end">: <?php echo $a - $b ?></div>
                    </div>
                </div>
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
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal input BPN -->
<div class="modal fade" id="input_bpn" tabindex="-1" role="dialog" aria-labelledby="input_bpnModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="input_bpnModalLabel">Input BPN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAwesome" method="post" action="<?= base_url('BPN/inputBPN') ?>">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="tgl_masuk" class="col-sm-6 col-form-label">
                                Tanggal Masuk
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="tgl_masuk" class="form-control datepicker" id="tgl_masuk" placeholder="Tanggal Masuk" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_pemohon" class="col-sm-6 col-form-label">
                                Nama Pemohon
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="nama_pemohon" class="form-control" id="nama_pemohon" placeholder="Nama Pemohon" autocomplete="on" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_proses" class="col-sm-6 col-form-label">
                                Jenis Proses
                            </label>
                            <div class="col-sm-6">
                                <select type="text" name="jenis_proses" class="form-control" id="jenis_proses" placeholder="Jenis Proses" autocomplete="off" required>
                                    <option>-</option>
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
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomor_bpn" class="col-sm-6 col-form-label">
                                Nomor BPN
                            </label>
                            <div class="col-sm-6">
                                <input type="number" name="nomor_bpn" class="form-control" id="nomor_bpn" placeholder="Nomor BPN" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ket" class="col-sm-6 col-form-label">
                                Keterangan
                            </label>
                            <div class="col-sm-6">
                                <textarea name="ket" class="form-control" id="ket" placeholder="" autocomplete="off"></textarea>
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

<!-- modal Edit BPN -->
<div class="modal fade" id="edit_bpn" tabindex="-1" role="dialog" aria-labelledby="edit_bpnModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_bpnModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAwesome" method="post" action="<?= base_url('bpn/update_bpn') ?>">
                    <div class="modal-body">
                        <input type="number" value="" name="no_proses_bpn_e" id="no_proses_bpn_e" readonly hidden>
                        <div class="form-group row">
                            <label for="tgl_masuk_e" class="col-sm-6 col-form-label">
                                Tanggal Masuk
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="tgl_masuk_e" value="" class="form-control datepicker" id="tgl_masuk_e" placeholder="Tanggal Masuk" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_pemohon_e" class="col-sm-6 col-form-label">
                                Nama Pemohon
                            </label>
                            <div class="col-sm-6">
                                <input type="text" name="nama_pemohon_e" value="" class="form-control" id="nama_pemohon_e" placeholder="Nama Pemohon" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_proses_e" class="col-sm-6 col-form-label">
                                Jenis Proses
                            </label>
                            <div class="col-sm-6">
                                <select type="text" name="jenis_proses_e" value="" class="form-control" id="jenis_proses_e" placeholder="Jenis Proses" autocomplete="off">
                                    <option>-</option>
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
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_bpn_e" class="col-sm-6 col-form-label">
                                Nomor BPN
                            </label>
                            <div class="col-sm-6">
                                <input type="number" name="no_bpn_e" value="" class="form-control" id="no_bpn_e" placeholder="Nomor BPN" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ket_e" class="col-sm-6 col-form-label">
                                Keterangan
                            </label>
                            <div class="col-sm-6">
                                <textarea name="ket_e" class="form-control" value="" id="ket_e" placeholder="" autocomplete="off"></textarea>
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


<script type="text/javascript" src="<?php base_url() ?>assets/vendor/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?php base_url() ?>assets/vendor/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php base_url() ?>assets/vendor/custom-js/tabelBPN.js"></script>
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
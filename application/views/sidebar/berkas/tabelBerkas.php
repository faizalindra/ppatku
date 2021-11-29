    <script type="text/javascript" src="<?php base_url() ?>assets/vendor/jquery/jquery-ui.min.js"></script>
    <link href="<?= base_url() ?>assets/vendor/jquery/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manajemen Berkas</h6>
            <p id="testing" data-value='1' onload="uji()" value="2" class='uji'></p>
        </div>
        <div class="card-body">

            <button id="btnStart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#formInputBerkas">Input Berkas</button>
            <button id="uji" type="button" data="3" class="btn btn-primary ujitombol">Input Berkas</button>

            <div class="row">
                <div class="col-auto">
                    <table class="table table-striped" id="tabel-berkas">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Masuk</th>
                                <th>Reg Sertipikat</th>
                                <th>Desa</th>
                                <th>Kecamatan</th>
                                <th>Jenis Berkas</th>
                                <th>Id Proses</th>
                                <th>Status Proses</th>
                                <th>Nama Penjual</th>
                                <th>Nama Pembeli</th>
                                <th>Biaya</th>
                                <th>DP</th>
                                <th>Total Biaya</th>
                                <th>Berkas Selesai</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="show_data">
                        </tbody>
                    </table>

                </div>
            </div>

            <!-- model form input -->
            <div class="modal fade" id="formInputBerkas" tabindex="-1" role="dialog" aria-labelledby="formInputBerkasLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="formInputBerkasLabel">Form Input</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div>
                            <ul class="nav nav-tabs nav-justified md-tabs indigo" id="tabinput" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="berkas-tab-just" data-toggle="tab" href="#berkas-just" role="tab" aria-controls="berkas-just" aria-selected="true">Berkas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="sertipikat-tab-just" data-toggle="tab" href="#sertipikat-just" role="tab" aria-controls="sertipikat-just" aria-selected="false">Sertipikat</a>
                                </li>
                            </ul>
                        </div>
                        <form id="formAwesome" method="post" action="<?= base_url() ?>berkas/simpanBer">
                            <!-- <form id="formAwesome"> -->
                            <div class="modal-body">
                                <div class="tab-content card pt-5" id="myTabContentJust">
                                    <div class="tab-pane fade show active" id="berkas-just" role="tabpanel" aria-labelledby="berkas-tab-just">
                                        <div class="form-group row">
                                            <label for="tgl_masuk" class="col-sm-6 col-form-label">
                                                Tanggal Masuk
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" name="tgl_masuk" class="form-control datepicker" id="tgl_masuk" placeholder="Tanggal Masuk" value="<?= set_value('tgl_masuk'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="reg_sertipikat" class="col-sm-6 col-form-label">
                                                Nomor Registrasi Sertipikat
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" name="reg_sertipikat" class="form-control" id="reg_sertipikat" placeholder="Nomor Registrasi Sertipikat" value="<?= set_value('reg_sertipikat'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kecamatan" class="col-sm-6 col-form-label">
                                                Kecamatan
                                            </label>
                                            <div class="col-sm-6">
                                                <select name="kecamatan" class="form-control" id="kecamatan" placeholder="Kecamatan" value="<?= set_value('kecamatan'); ?>">
                                                    <option value="">No Selected</option>
                                                    <?php foreach ($kecamatan as $row) : ?>
                                                        <option id="kecamatan1" value="<?php echo $row->nama; ?>" data-value="<?php echo $row->id ?>"><?php echo $row->nama; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label for="desa" class="col-sm-6 col-form-label">
                                                Desa
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" name="desa" class="form-control" id="desa" placeholder="Desa" value="<?= set_value('desa'); ?>">
                                                <option value="">No Selected</option>
                                                </input>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label for="desa" class="col-sm-6 col-form-label">
                                                Desa
                                            </label>
                                            <div class="col-sm-6">
                                                <select name="desa" class="form-control" id="desa" placeholder="Desa" value="<?= set_value('desa'); ?>">
                                                    <option value="">No Selected</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_berkas" class="col-sm-6 col-form-label">
                                                Proses
                                            </label>
                                            <div class="col-sm-6">
                                                <select name="jenis_berkas[]" class="form-control select2 select2-hidden-accessible" multiple="" id="jenis_berkas" tabindex="-1" value="<?= set_value('jenis_berkas'); ?>" data-placeholder="Jenis Berkas" style="width: 100%;">
                                                    <!-- <option value="" disabled selected>Pilih :</option> -->
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

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_penjual" class="col-sm-6 col-form-label">
                                                Nama Penjual
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" name="nama_penjual" class="form-control" id="nama_penjual" placeholder="Nama Penjual" value="<?= set_value('nama_penjual'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_pembeli" class="col-sm-6 col-form-label">
                                                Nama Pembeli
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" name="nama_pembeli" class="form-control" id="nama_pembeli" placeholder="Nama Pembeli" value="<?= set_value('nama_pembeli'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="biaya" class="col-sm-6 col-form-label">
                                                Biaya
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" name="biaya" class="form-control" id="biaya" placeholder="Biaya" value="<?= set_value('Biaya'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="dp" class="col-sm-6 col-form-label">
                                                dp
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" name="dp" class="form-control" id="dp" placeholder="DP" value="<?= set_value('DP'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tot_biaya" class="col-sm-6 col-form-label">
                                                Total Biaya
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" name="tot_biaya" class="form-control" id="tot_biaya" placeholder="Total Biaya" value="<?= set_value('tot_biaya'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="keterangan" class="col-sm-6 col-form-label">
                                                Keterangan
                                            </label>
                                            <div class="col-sm-6">
                                                <textarea cols="40" rows="5" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan" value="<?= set_value('keterangan'); ?>"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="sertipikat-just" role="tabpanel" aria-labelledby="sertipikat-tab-just">
                                        <div class="form-group row">
                                            <label for="no_sertipikat" class="col-5 col-form-label">Nomor Sertipikat</label>
                                            <div class="col-7">
                                                <input id="no_sertipikat" name="no_sertipikat" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="proses" class="col-5 col-form-label">Proses</label>
                                            <div class="col-7">
                                                <select id="proses" name="proses[]" class="form-control select2 select2-hidden-accessible" multiple="multiple" id="proses" tabindex="-1" value="" style="width: 100%;">
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
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_hak" class="col-5 col-form-label">Jenis Hak</label>
                                            <div class="col-7">
                                                <select id="jenis_hak" name="jenis_hak" class="custom-select">
                                                    <option value="SHM">SHM</option>
                                                    <option value="SHGB">SHGB</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kec" class="col-5 col-form-label">Kecamatan</label>
                                            <div class="col-7">
                                                <select id="kec" name="kec" class="custom-select">
                                                    <option value="">No Selected</option>
                                                    <?php foreach ($kecamatan as $row) : ?>
                                                        <option id="kec_<?php echo $row->id; ?>" class="list_desa" value="<?php echo $row->nama; ?>" data="<?php echo $row->id; ?>"><?php echo $row->nama; ?> - <?php echo $row->id; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="dsa" class="col-5 col-form-label">Desa</label>
                                            <div class="col-7">
                                                <select id="dsa" name="dsa" class="custom-select">
                                                    <option value="">No Selected</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="luas" class="col-5 col-form-label">Luas</label>
                                            <div class="col-7">
                                                <input id="luas" name="luas" placeholder="m2" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pemilik_hak" class="col-5 col-form-label">Pemilik Hak</label>
                                            <div class="col-7">
                                                <input id="pemilik_hak" name="pemilik_hak" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pembeli_hak" class="col-5 col-form-label">Penerima Hak</label>
                                            <div class="col-7">
                                                <input id="pembeli_hak" name="pembeli_hak" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ket" class="col-5 col-form-label">Keterangan</label>
                                            <div class="col-7">
                                                <textarea id="ket" name="ket" cols="40" rows="5" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button id="btn_simpan" type="submit" class="btn btn-primary">Submit</button>
                                <!-- <button id="btnbtn" class="btn btn-danger">?</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end model form input -->

            <!-- model form edit -->
            <div class="modal fade" id="formedit" tabindex="-1" role="dialog" aria-labelledby="formeditLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="formedit">Form Edit</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="formAwesome" method="post" action="<?= base_url() ?>berkas/simpanBer">
                            <!-- <form id="formAwesome"> -->
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="tgl_masuk" class="col-sm-6 col-form-label">
                                        Tanggal Masuk
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="tgl_masuk" class="form-control datepicker" id="tgl_masuk" placeholder="Tanggal Masuk" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="reg_sertipikat" class="col-sm-6 col-form-label">
                                        Nomor Registrasi Sertipikat
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="reg_sertipikat" class="form-control" id="reg_sertipikat" placeholder="Nomor Registrasi Sertipikat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kecamatan" class="col-sm-6 col-form-label">
                                        Kecamatan
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="kecamatan" class="form-control" id="kecamatan" placeholder="Kecamatan">
                                            <option value="">No Selected</option>
                                            <?php foreach ($kecamatan as $row) : ?>
                                                <option id="kecamatan" data-value="<?php echo $row->id ?>"><?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="desa" class="col-sm-6 col-form-label">
                                        Desa
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="desa" class="form-control" id="desa" placeholder="Desa">
                                        <!-- <option value="">No Selected</option> -->
                                        </input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis_berkas" class="col-sm-6 col-form-label">
                                        Jenis Berkas
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="jenis_berkas[]" class="form-control select2 select2-hidden-accessible" multiple="" id="jenis_berkas" tabindex="-1" data-placeholder="Jenis Berkas" style="width: 100%;">
                                            <!-- <option value="" disabled selected>Pilih :</option> -->
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

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penjual" class="col-sm-6 col-form-label">
                                        Status Proses
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="status_proses" class="form-control" id="nama_penjual" placeholder="Nama Penjual">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penjual" class="col-sm-6 col-form-label">
                                        Nama Penjual
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="nama_penjual" class="form-control" id="nama_penjual" placeholder="Nama Penjual">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_pembeli" class="col-sm-6 col-form-label">
                                        Nama Pembeli
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="nama_pembeli" class="form-control" id="nama_pembeli" placeholder="Nama Pembeli">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="biaya" class="col-sm-6 col-form-label">
                                        Biaya
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="biaya" class="form-control" id="biaya" placeholder="Rp. ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="dp" class="col-sm-6 col-form-label">
                                        DP
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="dp" class="form-control" id="dp" placeholder="Rp. ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tot_biaya" class="col-sm-6 col-form-label">
                                        Total Biaya
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="tot_biaya" class="form-control" id="tot_biaya" placeholder="Rp. ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-sm-6 col-form-label">
                                        Keterangan
                                    </label>
                                    <div class="col-sm-6">
                                        <textarea name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan : "></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button id="btn_simpan" type="submit" class="btn btn-primary">Submit</button>
                                <!-- <button id="btnbtn" class="btn btn-danger">?</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end model form input -->

            <!-- modal detail -->
            <div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel">Detail Berkas</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <button class='btn btn-info btn-sm' id="editberkas"><i class="fa fa-edit">Edit</i></button>
                            <div id="reload">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Reg Sertipikat</th>
                                            <th>Desa</th>
                                            <th>Kecamatan</th>
                                            <th>Jenis Berkas</th>
                                            <th>Id Proses</th>
                                            <th>Status Proses</th>
                                            <th>Nama Penjual</th>
                                            <th>Nama Pembeli</th>
                                            <th>Biaya</th>
                                            <th>DP</th>
                                            <th>Total Biaya</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data_detail">

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
            <!-- end modal detail -->

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
                                            <th>Nomor Registrasi</th>
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


            <script type="text/javascript" src="<?php base_url() ?>assets/vendor/datatables/jquery.dataTables.js"></script>
            <script type="text/javascript" src="<?php base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
            <script type="text/javascript" src="<?php base_url() ?>assets/vendor/select2/select2.min.js"></script>
            <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" /> -->
            <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
            <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
            <link href="<?= base_url() ?>assets/vendor/select2/select2.min.css" rel="stylesheet" type="text/css">

            <script type="text/javascript">
                $(document).ready(function() {
                    data_berkas(); //pemanggilan fungsi tampil barang.
                    uji();

                    function addCommas(nStr) {
                        nStr += '';
                        x = nStr.split('.');
                        x1 = x[0];
                        x2 = x.length > 1 ? '.' + x[1] : '';
                        var rgx = /(\d+)(\d{3})/;
                        while (rgx.test(x1)) {
                            x1 = x1.replace(rgx, '$1' + ',' + '$2');
                        }
                        return x1 + x2;
                    }

                    $('.datepicker').datepicker({
                        format: 'yy-mm-dd',
                        formatSubmit: 'yyyy-mm-dd'
                    });
                    $('.select2').select2();
                    $('.proses').select2();


                    function antinull(val) {
                        c = " ";
                        val2 = "Rp. " + addCommas(val);
                        val1 = addCommas(val);
                        if (val > 0) {
                            if (val >= 100000) {
                                return val2;
                            } else {
                                return val1
                            }
                        } else {
                            return c;
                        }
                    }

                    function berkasSelesai(val) {
                        tail = '</button>';
                        condi1 = '<button class="badge badge-info"> Selesai';
                        condi2 = '<button class="badge badge-danger"> Proses';
                        if (val == 1) {
                            return condi1 + tail;
                        } else {
                            return condi2 + tail;
                        }
                    }

                    // dynamic select wilayah
                    $('#kecamatan').change(function() {
                        var id = document.getElementById('kecamatan1').getAttribute('data-value');
                        $.ajax({
                            url: "<?php echo site_url('wilayah/get_desa'); ?>",
                            method: "POST",
                            data: {
                                id: id
                            },
                            async: true,
                            dataType: 'json',
                            success: function(data) {

                                var html = '';
                                var i;
                                for (i = 0; i < data.length; i++) {
                                    html += '<option value=' + data[i].nama + '>' + data[i].nama + '</option>';
                                }
                                $('#desa').html(html);

                            }
                        });
                        return false;
                    });

                    // script uji
                    function uji() {
                        var id = document.getElementById('testing').getAttribute('data-value');
                        $.ajax({
                            method: 'GET',
                            url: '<?php base_url(); ?>sertipikat/uji',
                            async: true,
                            dataType: 'json',
                            data: {
                                id: id
                            },
                            success: function(data) {
                                $.each(data, function(pembeli_hak) {
                                    var ujia = data.pembeli_hak;
                                    var u = "pembeli hak adalah : " + ujia
                                    $('.uji').html(u);
                                })

                            },
                            error: function(data) {
                                var test2 = "gagal";
                                var hsl = test2 + "id"
                                $('.uji').html(id);
                            }
                        });
                    }

                    // fungsi tampil berkas
                    function data_berkas() {
                        $.ajax({
                            method: 'GET',
                            url: '<?php base_url(); ?>Berkas/data_berkas',
                            async: true,
                            dataType: 'json',
                            success: function(data) {
                                function sertipikat(val) {
                                    cond1 = '<button href="javascript:;" class="btn btn-info btn_sertipikat" data="' + data[i].id + '">' + val
                                    cond2 = " "
                                    if (val >= 1) {
                                        return cond1;
                                    } else
                                        return cond2;
                                }

                                function proses(val) {
                                    if (val >= 1) {
                                        return val
                                    }
                                }
                                var html = '';
                                var i;
                                var c = 0;
                                for (i = 0; i < data.length; i++) {
                                    c++
                                    html += '<tr class="text-capitalize text-center">' +
                                        '<td>' + c + '</td>' +
                                        '<td>' + data[i].tgl_masuk + '</td>' +
                                        '<td>' + sertipikat(antinull(data[i].reg_sertipikat)) + '</td>' +
                                        '<td>' + data[i].desa + '</td>' +
                                        '<td>' + data[i].kecamatan + '</td>' +
                                        '<td>' + data[i].jenis_berkas + '</td>' +
                                        '<td>' + antinull(data[i].id_proses) + '</td>' +
                                        '<td>' + data[i].status_proses + '</td>' +
                                        '<td>' + data[i].nama_penjual + '</td>' +
                                        '<td>' + data[i].nama_pembeli + '</td>' +
                                        '<td>' + addCommas(antinull(data[i].biaya)) + '</td>' +
                                        '<td>' + addCommas(antinull(data[i].dp)) + '</td>' +
                                        '<td>' + addCommas(antinull(data[i].tot_biaya)) + '</td>' +
                                        '<td>' + berkasSelesai(data[i].berkas_selesai) + '</td>' +
                                        '<td style="text-align:right;">' +
                                        '<button id="uji1" href="javascript:;"  class="badge badge-info edit_berkas" data="' + data[i].id + '"><i class="fa fa-search" ></i> Detail</button>' + ' ' +
                                        '</td>' +
                                        '</tr>';
                                }
                                $('#show_data').html(html);
                                var table = $('#tabel-berkas').dataTable({});

                            }

                        });
                    }
                    //tombol detail berkas
                    $('#show_data').on('click', '.item_detail', function() {
                        var id = $(this).attr('data');
                        // alert(id);
                        $.ajax({
                            method: "GET",
                            url: '<?php base_url(); ?>Berkas/get_berkas',
                            dataType: "JSON",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                $.each(data, function(id, tgl_masuk, reg_sertipikat, desa, kecamatan, jenis_berkas, status_proses, nama_penjual, nama_pembeli, dp, biaya, tot_biaya, berkas_selesai, luas) {
                                    // $.each(data, function(id, desa, nama_penjual) {
                                    $('#ModalDetail').modal('show');
                                    var html = "";
                                    html += '<tr class="text-capitalize text-center">' +
                                        '<td>' + data.id + '</td>' +
                                        '<td>' + data.tgl_masuk + '</td>' +
                                        '<td>' + antinull(data.reg_sertipikat) + '</td>' +
                                        '<td>' + data.desa + '</td>' +
                                        '<td>' + data.kecamatan + '</td>' +
                                        '<td>' + data.jenis_berkas + '</td>' +
                                        '<td>' + data.luas + '</td>' +
                                        '<td>' + data.status_proses + '</td>' +
                                        '<td>' + data.nama_penjual + '</td>' +
                                        '<td>' + data.nama_pembeli + '</td>' +
                                        '<td>' + antinull(data.biaya) + '</td>' +
                                        '<td>' + antinull(data.dp) + '</td>' +
                                        '<td>' + antinull(data.tot_biaya) + '</td>' +
                                        // '<td>' + data.berkas_selesai + '</td>' +
                                        '</tr>' +
                                        '<tr>' + '<td colspan="14"> Keterangan :' + '<p>' + data.keterangan + '</p>' +
                                        '</td>' + '</tr>' +
                                        '<tr>' + '<td colspan="14"> Proses :' + data.luas +
                                        '</td>' + '</tr>';

                                    $('#data_detail').html(html);
                                });
                            },
                            error: function() {
                                // $('#ModalDetail').modal('show');

                            }
                        });
                        return false;
                    });

                    // tombol detail sertipikat
                    $('#show_data').on('click', '.btn_sertipikat', function() {
                        var id = $(this).attr('data');
                        // alert(id);
                        $.ajax({
                            method: "GET",
                            url: '<?php base_url(); ?>Berkas/get_berkas',
                            dataType: "JSON",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                $.each(data, function(no_reg, no_sertipikat, tgl_daftar, jenis_hak, luas, desa, kecamatan, pemilik_hak, pembeli_hak, proses, ket) {
                                    // $.each(data, function(id, desa, nama_penjual) {
                                    $('#ModalSertipikat').modal('show');
                                    var html = "";
                                    html += '<tr class="text-capitalize text-center">' +
                                        '<td>' + id + '</td>' +
                                        '<td>' + data.tgl_daftar + '</td>' +
                                        '<td>' + data.no_reg + '</td>' +
                                        '<td>' + data.jenis_hak + '. ' + data.no_sertipikat + '/' + data.desa + '</td>' +
                                        '<td>' + data.kecamatan + '</td>' +
                                        '<td>' + antinull(data.luas) + '</td>' +
                                        '<td>' + data.pemilik_hak + '</td>' +
                                        '<td>' + data.pembeli_hak + '</td>' +
                                        '</tr>' +
                                        '<tr>' + '<td colspan="8"> Keterangan :' + '<p>' + antinull(data.ket) + '</p>' +
                                        '</td>' + '</tr>';

                                    $('#detail_sertipikat').html(html);
                                });
                            },
                            error: function() {
                                // $('#ModalDetail').modal('show');

                            }
                        });
                        return false;
                    });

                    //GET UPDATE
                    $('#show_data').on('click', '.edit_berkas', function() {
                        var id = $(this).attr('data');
                        $.ajax({
                            type: "GET",
                            url: "<?php base_url(); ?>berkas/get_berkas",
                            dataType: "JSON",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                $.each(data, function(id, reg_sertipikat, desa, kecamatan, jenis_berkas, status_proses, nama_penjual, nama_pembeli, biaya, dp, tot_biaya, keterangan) {
                                    $('#formedit').modal('show');
                                    $('[name="id"]').val(data.id);
                                    $('[name="tgl_masuk"]').val(data.tgl_masuk);
                                    $('[name="reg_sertipikat"]').val(data.reg_sertipikat);
                                    $('[name="desa"]').val(data.desa);
                                    $('[name="kecamatan"]').val(data.kecamatan);
                                    $('[name="jenis_berkas"]').val(data.jenis_berkas);
                                    $('[name="status_proses"]').val(data.status_proses);
                                    $('[name="nama_penjual"]').val(data.nama_penjual);
                                    $('[name="nama_pembeli"]').val(data.nama_pembeli);
                                    $('[name="biaya"]').val(data.biaya);
                                    $('[name="dp"]').val(data.dp);
                                    $('[name="harga_edit"]').val(data.tot_biaya);
                                    $('[name="keterangan"]').val(data.keterangan);
                                });
                            },
                            error: function(data) {
                                alert(id);
                            }
                        });
                        return false;
                    });

                    //Update Barang
                    $('#btn_update').on('click', function() {
                        var desa = $('#desa').val();
                        var kec = $('#kecamatan').val();
                        var jb = $('#jenis_berkas').val();
                        var napen = $('#nama_penjual').val();
                        var napem = $('#nama_pembeli').val();
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('index.php/berkas/update_berkas') ?>",
                            dataType: "JSON",
                            data: {
                                id: id,
                                napen: napen,
                                desa: desa
                            },
                            success: function(data) {
                                $('[name="id_edit"]').val("");
                                $('[name="napen_edit"]').val("");
                                $('[name="desa_edit"]').val("");
                                $('#ModalaEdit').modal('hide');
                                data_berkas();
                            }
                        });
                        return false;
                    });

                    //tes tombol
                    // $('#btnbtn').on('click',function(){
                    //     var sel2 = $('.select2').val();
                    //     alert(sel2);
                    // })

                    // tombol input berkas
                    // $('#btn_simpan').on('click', function() {
                    //     var reg_sertipikat = $('#reg_sertipikat').val();
                    //     var desa = $('#desa').val();
                    //     var kecamatan = $('#kecamatan').val();
                    //     var jenis_berkas = $('#jenis_berkas').val();
                    //     var nama_pembeli = $('#nama_pembeli').val();
                    //     var nama_penjual = $('#nama_penjual').val();
                    //     var biaya = $('#biaya').val();
                    //     var dp = $('#dp').val();
                    //     var tot_biaya = $('#tot_biaya').val();
                    //     var keterangan = $('#keterangan').val();
                    //     // alert(keterangan);
                    //     $.ajax({
                    //         type: "POST",
                    //         url: "<?php base_url(); ?>berkas/simpan_berkas",
                    //         dataType: "json",
                    //         data: {
                    //             reg_sertipikat: reg_sertipikat,
                    //             desa: desa,
                    //             kecamatan: kecamatan,
                    //             jenis_berkas: jenis_berkas,
                    //             nama_penjual: nama_penjual,
                    //             nama_pembeli: nama_pembeli,
                    //             biaya: biaya,
                    //             dp: dp,
                    //             tot_biaya: tot_biaya,
                    //             keterangan:keterangan
                    //         },
                    //         success: function(){
                    //             // $('[name="reg_sertipikat]').val("");
                    //             // $('[name="desa]').val("");
                    //             // $('[name="kecamatan]').val("");
                    //             // $('[name="jenis_berkas]').val("");
                    //             // $('[name="nama_pembeli]').val("");
                    //             // $('[name="nama_penjual]').val("");
                    //             // $('[name="biaya]').val("");
                    //             // $('[name="dp]').val("");
                    //             // $('[name="tot_biaya]').val("");
                    //             // $('[name="keterangan]').val("");
                    //             $('#formInputBerkas').modal('hide');
                    //             data_berkas();
                    //         },
                    //         error: function(){
                    //             alert(jenis_berkas);
                    //         }
                    //     });
                    //     return false;
                    // });
                    // dynamic select desa
                    $('#kecamatan').change(function() {
                        var kec1 = $('#kecamatan').val();
                        var id = "";
                        switch (kec1) {
                            case "Banjarmangu":
                                id = 1;
                                break;
                            case "Banjarnegara":
                                id = 2;
                                break;
                            case "Batur":
                                id = 3;
                                break;
                            case "Bawang":
                                id = 4;
                                break;
                            case "Kalibening":
                                id = 5;
                                break;
                            case "Karangkobar":
                                id = 6;
                                break;
                            case "Madukara":
                                id = 7;
                                break;
                            case "Mandiraja":
                                id = 8;
                                break;
                            case "Pagedongan":
                                id = 9;
                                break;
                            case "Pagentan":
                                id = 10;
                                break;
                            case "Pandanarum":
                                id = 11;
                                break;
                            case "Pejawaran":
                                id = 12;
                                break;
                            case "Punggelan":
                                id = 13;
                                break;
                            case "Purwanegara":
                                id = 14;
                                break;
                            case "Purwareja Klampok":
                                id = 15;
                                break;
                            case "Rakit":
                                id = 16;
                                break;
                            case "Sigaluh":
                                id = 17;
                                break;
                            case "Susukan":
                                id = 18;
                                break;
                            case "Wanadadi":
                                id = 19;
                                break;
                            case "Wanayasa":
                                id = 20;
                                break;
                        }
                        // alert(id);
                        $.ajax({
                            url: "<?php site_url(); ?>wilayah/get_desa",
                            method: "get",
                            data: {
                                id: id
                            },
                            async: true,
                            dataType: 'json',
                            success: function(data) {
                                // alert(id);

                                var html = '';
                                var i;
                                for (i = 0; i < data.length; i++) {
                                    html += '<option value=' + data[i].nama + '>' + data[i].nama + '</option>';
                                }
                                $('#desa').html(html);

                            }
                        });
                        return false;
                    });
                    $('#kec').change(function() {
                        var kec = $('#kec').val();
                        var id = "";
                        switch (kec) {
                            case "Banjarmangu":
                                id = 1;
                                break;
                            case "Banjarnegara":
                                id = 2;
                                break;
                            case "Batur":
                                id = 3;
                                break;
                            case "Bawang":
                                id = 4;
                                break;
                            case "Kalibening":
                                id = 5;
                                break;
                            case "Karangkobar":
                                id = 6;
                                break;
                            case "Madukara":
                                id = 7;
                                break;
                            case "Mandiraja":
                                id = 8;
                                break;
                            case "Pagedongan":
                                id = 9;
                                break;
                            case "Pagentan":
                                id = 10;
                                break;
                            case "Pandanarum":
                                id = 11;
                                break;
                            case "Pejawaran":
                                id = 12;
                                break;
                            case "Punggelan":
                                id = 13;
                                break;
                            case "Purwanegara":
                                id = 14;
                                break;
                            case "Purwareja Klampok":
                                id = 15;
                                break;
                            case "Rakit":
                                id = 16;
                                break;
                            case "Sigaluh":
                                id = 17;
                                break;
                            case "Susukan":
                                id = 18;
                                break;
                            case "Wanadadi":
                                id = 19;
                                break;
                            case "Wanayasa":
                                id = 20;
                                break;
                        }
                        // alert(id);
                        $.ajax({
                            url: "<?php site_url(); ?>wilayah/get_desa",
                            method: "get",
                            data: {
                                id: id
                            },
                            async: true,
                            dataType: 'json',
                            success: function(data) {
                                // alert(id);

                                var html = '';
                                var i;
                                for (i = 0; i < data.length; i++) {
                                    html += '<option value=' + data[i].nama + '>' + data[i].nama + '</option>';
                                }
                                $('#dsa').html(html);

                            }
                        });
                        return false;
                    });


                });
            </script>
            <!-- <style>
                table,
                th,
                td {
                    border: 1px solid black;
                    border-collapse: collapse;
                }
            </style> -->
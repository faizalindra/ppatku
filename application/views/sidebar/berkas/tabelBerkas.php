    <script type="text/javascript" src="<?php base_url() ?>assets/vendor/jquery/jquery-ui.min.js"></script>
    <link href="<?= base_url() ?>assets/vendor/jquery/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manajemen Berkas</h6>
            <p id="testing" data-value='1' onload="uji()" value="2" class='uji'></p>
        </div>
        <div class="card-body">

            <button id="btnStart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#formInputBerkas">Input Berkas</button>
            <!-- <button id="uji" type="button" data="3" class="btn btn-primary ujitombol">Input Berkas</button> -->

            <div class="row">
                <div class="col-auto">
                    <table class="table table-striped" id="tabel-berkas">
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
                                <!-- <th>Biaya</th>
                                <th>DP</th>
                                <th>Total Biaya</th> -->
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

                                    <!-- Input Berkas -->
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

                                    <!-- Input sertipikat -->
                                    <div class="form-group-row">
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-switch">
                                                <input name="switch-input" type="checkbox" class="custom-control-input switch-input-sertipikat" id="customSwitch1" value=1>
                                                <label class="custom-control-label" for="customSwitch1">Input Sertipikat</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="sertipikat-just" role="tabpanel" aria-labelledby="sertipikat-tab-just">
                                        <div class="form-group row">
                                            <label for="no_sertipikat" class="col-5 col-form-label">Nomor Sertipikat</label>
                                            <div class="col-7">
                                                <input id="no_sertipikat" name="no_sertipikat" type="text" class="form-control input_sert">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="proses" class="col-5 col-form-label">Proses</label>
                                            <div class="col-7">
                                                <select id="proses" name="proses[]" placeholder="uuuu" class="form-control select2 select2-hidden-accessible input_sert" multiple="multiple" id="proses" tabindex="-1" value="" style="width: 100%;">
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
                                                <select id="jenis_hak" name="jenis_hak" class="custom-select input_sert">
                                                    <option value="SHM">SHM</option>
                                                    <option value="SHGB">SHGB</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kec" class="col-5 col-form-label">Kecamatan</label>
                                            <div class="col-7">
                                                <select id="kec" name="kec" class="custom-select input_sert">
                                                    <option value="">No Selected</option>
                                                    <?php foreach ($kecamatan as $row) : ?>
                                                        <option id="kec_<?php echo $row->id; ?>" class="list_desa" value="<?php echo $row->nama; ?>" data="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="dsa" class="col-5 col-form-label">Desa</label>
                                            <div class="col-7">
                                                <select id="dsa" name="dsa" class="custom-select input_sert">
                                                    <option value="">No Selected</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="luas" class="col-5 col-form-label">Luas</label>
                                            <div class="col-7">
                                                <input id="luas" name="luas" placeholder="m2" type="text" class="form-control input_sert">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pemilik_hak" class="col-5 col-form-label">Pemilik Hak</label>
                                            <div class="col-7">
                                                <input id="pemilik_hak" name="pemilik_hak" type="text" class="form-control input_sert">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pembeli_hak" class="col-5 col-form-label">Penerima Hak</label>
                                            <div class="col-7">
                                                <input id="pembeli_hak" name="pembeli_hak" type="text" class="form-control input_sert">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ket" class="col-5 col-form-label">Keterangan</label>
                                            <div class="col-7">
                                                <textarea id="ket" name="ket" cols="40" rows="5" class="form-control input_sert"></textarea>
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
                        <form id="formAwesome" method="post" action="<?= base_url() ?>berkas/update_berkas">
                            <!-- <form id="formAwesome"> -->
                            <div class="modal-body">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" name="id" class="form-control datepicker" id="id" placeholder="Tanggal Masuk" readonly hidden>
                                    </div>
                                </div>
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
                                        <input type="text" name="kecamatan" class="form-control" id="kecamatan" placeholder="Kecamatan">
                                        <!-- <option value="">No Selected</option>
                                            <?php foreach ($kecamatan as $row) : ?>
                                                <option id="kecamatan" data-value="<?php echo $row->id ?>"><?php echo $row->nama; ?></option>
                                            <?php endforeach; ?>
                                        </select> -->
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
                                        <span id="textHelpBlock" class="form-text text-muted coment"></span>
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
            <!-- end model form edit -->

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
            <script type="text/javascript" src="<?php base_url() ?>assets/vendor/custom-js/tabelBerkas.js"></script>
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
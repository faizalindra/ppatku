    <script type="text/javascript" src="<?php base_url() ?>assets/vendor/jquery/jquery-ui.min.js"></script>
    <link href="<?= base_url() ?>assets/vendor/jquery/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manajemen Berkas</h6>
        </div>
        <div class="card-body">

            <button id="btnStart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#formInputBerkas">Input Berkas</button>

            <p></p>

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
                                <th>Nama Penjual</th>
                                <th>Nama Pembeli</th>
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
                                                <input type="text" name="tgl_masuk" class="form-control datepicker" id="tgl_masuk" placeholder="Tanggal Masuk" autocomplete="off" value="<?= set_value('tgl_masuk'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="reg_sertipikat" class="col-sm-6 col-form-label">
                                                Nomor Registrasi Sertipikat
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" name="reg_sertipikat" class="form-control" id="reg_sertipikat" placeholder="Nomor Registrasi Sertipikat" autocomplete="off" value="<?= set_value('reg_sertipikat'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="kecamatan" class="col-sm-6 col-form-label">
                                                Kecamatan
                                            </label>
                                            <div class="col-sm-6">
                                                <select name="kecamatan" class="form-control" id="kecamatan" placeholder="Kecamatan" autocomplete="off" value="<?= set_value('kecamatan'); ?>" required>
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
                                                <select name="desa" class="form-control" id="desa" placeholder="Desa" autocomplete="off" value="<?= set_value('desa'); ?>">
                                                    <option value="">No Selected</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_berkas" class="col-sm-6 col-form-label">
                                                Proses
                                            </label>
                                            <div class="col-sm-6">
                                                <select name="jenis_berkas[]" class="form-control select2 select2-hidden-accessible" multiple="" id="jenis_berkas" tabindex="-1" value="<?= set_value('jenis_berkas'); ?>" data-placeholder="Jenis Berkas" style="width: 100%;" required>
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
                                                    <option>IPH</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_penjual" class="col-sm-6 col-form-label">
                                                Nama Penjual
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" name="nama_penjual" class="form-control" id="nama_penjual" autocomplete="off" placeholder="Nama Penjual" value="<?= set_value('nama_penjual'); ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="nama_pembeli" class="col-sm-6 col-form-label">
                                                Nama Pembeli
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" name="nama_pembeli" class="form-control" id="nama_pembeli" autocomplete="off" placeholder="Nama Pembeli" value="<?= set_value('nama_pembeli'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="biaya" class="col-sm-6 col-form-label">
                                                Biaya
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" name="biaya" class="form-control" id="biaya" autocomplete="off" placeholder="Rp." value="<?= set_value('Biaya'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="dp" class="col-sm-6 col-form-label">
                                                DP
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" name="dp" class="form-control" id="dp" autocomplete="off" placeholder="Rp. " value="<?= set_value('DP'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tot_biaya" class="col-sm-6 col-form-label">
                                                Total Biaya
                                            </label>
                                            <div class="col-sm-6">
                                                <input type="text" name="tot_biaya" class="form-control" id="tot_biaya" autocomplete="off" placeholder="Rp." value="<?= set_value('tot_biaya'); ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="keterangan" class="col-sm-6 col-form-label">
                                                Keterangan
                                            </label>
                                            <div class="col-sm-6">
                                                <textarea cols="40" rows="5" name="keterangan" class="form-control" id="keterangan" autocomplete="off" placeholder="Keterangan" value="<?= set_value('keterangan'); ?>"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Input sertipikat -->
                                    <div class="tab-pane fade" id="sertipikat-just" role="tabpanel" aria-labelledby="sertipikat-tab-just">
                                        <div class="form-group-row">
                                            <div class="col-sm-6">
                                                <div class="custom-control custom-switch">
                                                    <input name="switch-input" type="checkbox" class="custom-control-input switch-input-sertipikat" id="customSwitch1" value=0>
                                                    <label class="custom-control-label" for="customSwitch1">Input Sertipikat</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="no_sertipikat" class="col-5 col-form-label">Nomor Sertipikat</label>
                                            <div class="col-7">
                                                <input id="no_sertipikat" name="no_sertipikat" type="text" autocomplete="off" class="form-control input_sert" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jenis_hak" class="col-5 col-form-label">Jenis Hak</label>
                                            <div class="col-7">
                                                <select id="jenis_hak" name="jenis_hak" class="custom-select input_sert" required>
                                                    <option value="SHM">SHM</option>
                                                    <option value="SHGB">SHGB</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="luas" class="col-5 col-form-label">Luas</label>
                                            <div class="col-7">
                                                <input id="luas" name="luas" placeholder="m2" autocomplete="off" type="text" class="form-control input_sert">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ket" class="col-5 col-form-label">Keterangan</label>
                                            <div class="col-7">
                                                <textarea id="ket" name="ket" cols="40" rows="5" autocomplete="off" class="form-control input_sert"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button id="btn_simpan" type="submit" class="btn btn-primary">Submit</button>

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
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="desa" class="col-sm-6 col-form-label">
                                        Desa
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="desa" class="form-control" id="desa" placeholder="Desa">
                                        </input>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis_berkas" class="col-sm-6 col-form-label">
                                        Jenis Berkas
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="jenis_berkas[]" class="form-control select2 select2-hidden-accessible" multiple="" id="jenis_berkas" tabindex="-1" data-placeholder="Jenis Berkas" style="width: 100%;">
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
                                <!-- <div class="form-group row">
                                    <label for="nama_penjual" class="col-sm-6 col-form-label">
                                        Status Proses
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="status_proses" class="form-control" id="status_proses" placeholder="Status Proses">
                                    </div>
                                </div> -->
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
                            <div id="reload">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No Berkas</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Reg Sertipikat</th>
                                            <th>Desa</th>
                                            <th>Kecamatan</th>
                                            <th>Jenis Berkas</th>
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

            <script type="text/javascript">
                // $(document).ready(function() {
                //     data_berkas(); //pemanggilan fungsi tampil barang.
                //     // uji();

                //     // alert(base_url);
                //     function addCommas(nStr) {
                //         nStr += '';
                //         x = nStr.split('.');
                //         x1 = x[0];
                //         x2 = x.length > 1 ? '.' + x[1] : '';
                //         var rgx = /(\d+)(\d{3})/;
                //         while (rgx.test(x1)) {
                //             x1 = x1.replace(rgx, '$1' + ',' + '$2');
                //         }
                //         return x1 + x2;
                //     }

                //     $('.datepicker').datepicker({
                //         format: 'yy-mm-dd',
                //         formatSubmit: 'yyyy-mm-dd'
                //     });
                //     $('.select2').select2();
                //     $('.proses').select2();

                //     //mengubah null menjadi whitespace
                //     function antinull(val) {
                //         c = " ";
                //         val2 = "Rp. " + addCommas(val);
                //         val1 = addCommas(val);
                //         if (val > 0) {
                //             if (val >= 100000) {
                //                 return val2;
                //             } else {
                //                 return val1
                //             }
                //         } else {
                //             return c;
                //         }
                //     }

                //     function berkasSelesai(val, vall) {
                //         window.base_url = <?php echo json_encode(base_url()); ?>;
                //         tail = '</a>';
                //         condi1 = '<a href="#"  class="badge badge-info btn-berkas_selesai"> Selesai';
                //         condi2 = '<a href="' + base_url + '/proses/berkas_selesai/' + vall + '/1/" onclick="return confirm(\'Pastikan semua proses sudah selesai?\');" class="badge badge-danger"> Proses';
                //         if (val == 1) {
                //             return condi1 + tail;
                //         } else {
                //             return condi2 + tail;
                //         }
                //     }

                //     //convert value input kecamatan menjadi id kecamatan
                //     function conv_kec(val) {
                //         // id = "";
                //         switch (val) {
                //             case "Banjarmangu":
                //                 id = 1;
                //                 break;
                //             case "Banjarnegara":
                //                 id = 2;
                //                 break;
                //             case "Batur":
                //                 id = 3;
                //                 break;
                //             case "Bawang":
                //                 id = 4;
                //                 break;
                //             case "Kalibening":
                //                 id = 5;
                //                 break;
                //             case "Karangkobar":
                //                 id = 6;
                //                 break;
                //             case "Madukara":
                //                 id = 7;
                //                 break;
                //             case "Mandiraja":
                //                 id = 8;
                //                 break;
                //             case "Pagedongan":
                //                 id = 9;
                //                 break;
                //             case "Pagentan":
                //                 id = 10;
                //                 break;
                //             case "Padanarum":
                //                 id = 11;
                //                 break;
                //             case "Pajewaran":
                //                 id = 12;
                //                 break;
                //             case "Punggelan":
                //                 id = 13;
                //                 break;
                //             case "Purwanegara":
                //                 id = 14;
                //                 break;
                //             case "Purworejo Klampok":
                //                 id = 15;
                //                 break;
                //             case "Rakit":
                //                 id = 16;
                //                 break;
                //             case "Sigaluh":
                //                 id = 17;
                //                 break;
                //             case "Susukan":
                //                 id = 18;
                //                 break;
                //             case "Wanadadi":
                //                 id = 19;
                //                 break;
                //             case "Wanayasa":
                //                 id = 20;
                //                 break;
                //         }
                //         return id;
                //     }

                //     //switch untuk disable input sertipikat
                //     $('.input_sert').prop('disabled', true);
                //     $('.switch-input-sertipikat').click(function() {
                //         if ($(this).is(':checked')) {
                //             $('.input_sert').prop('disabled', false);
                //         } else {
                //             $('.input_sert').prop('disabled', true);
                //         }
                //     });

                //     // dynamic select desa
                //     //selector for input berkas
                //     $('#kecamatan').change(function() {
                //         var kec1 = $('#kecamatan').val();
                //         var id = conv_kec(kec1);
                //         // alert(id);
                //         $.ajax({
                //             url: "<?php site_url(); ?>wilayah/get_desa",
                //             method: "get",
                //             data: {
                //                 id: id
                //             },
                //             async: true,
                //             dataType: 'json',
                //             success: function(data) {
                //                 var html = '';
                //                 var i;
                //                 for (i = 0; i < data.length; i++) {
                //                     html += '<option value=' + data[i].nama + '>' + data[i].nama + '</option>';
                //                 }
                //                 $('#desa').html(html);

                //             }
                //         });
                //         return false;
                //     });

                //     //selector for input sertipikat
                //     $('#kec').change(function() {
                //         var kec = $('#kec').val();
                //         var id = conv_kec(kec);
                //         // alert(id);
                //         $.ajax({
                //             url: "<?php site_url(); ?>wilayah/get_desa",
                //             method: "get",
                //             data: {
                //                 id: id
                //             },
                //             async: true,
                //             dataType: 'json',
                //             success: function(data) {
                //                 // alert(id);

                //                 var html = '';
                //                 var i;
                //                 for (i = 0; i < data.length; i++) {
                //                     html += '<option value=' + data[i].nama + '>' + data[i].nama + '</option>';
                //                 }
                //                 $('#dsa').html(html);

                //             }
                //         });
                //         return false;
                //     });

                //     // fungsi tampil berkas
                //     function data_berkas() {
                //         $.ajax({
                //             method: 'GET',
                //             url: '<?php base_url(); ?>Berkas/data_berkas',
                //             async: true,
                //             dataType: 'json',
                //             success: function(data) {
                //                 function sertipikat(val) {
                //                     cond1 = '<button href="javascript:;" class="btn btn-info btn_sertipikat" data="' + data[i].id + '">' + val
                //                     cond2 = " "
                //                     if (val >= 1) {
                //                         return cond1;
                //                     } else
                //                         return cond2;
                //                 }

                //                 function proses(val) {
                //                     if (val >= 1) {
                //                         return val
                //                     }
                //                 }
                //                 var html = '';
                //                 var i;
                //                 // var c = 0;
                //                 for (i = 0; i < data.length; i++) {
                //                     // c++
                //                     html += '<tr class="text-capitalize text-center">' +
                //                         '<td>' + data[i].id + '</td>' +
                //                         '<td>' + data[i].tgl_masuk + '</td>' +
                //                         '<td>' + sertipikat(antinull(data[i].reg_sertipikat)) + '</td>' +
                //                         '<td>' + data[i].desa + '</td>' +
                //                         '<td>' + data[i].kecamatan + '</td>' +
                //                         '<td>' + data[i].jenis_berkas + '</td>' +
                //                         // '<td>' + antinull(data[i].id_proses) + '</td>' +
                //                         // '<td>' + data[i].status_proses + '</td>' +
                //                         '<td>' + data[i].nama_penjual + '</td>' +
                //                         '<td>' + data[i].nama_pembeli + '</td>' +
                //                         '<td>' + berkasSelesai(data[i].berkas_selesai, data[i].id) + '</td>' +
                //                         '<td style="text-align:center;">' +
                //                         '<button id="uji1" href="javascript:;"  class="badge badge-info edit_berkas" data="' + data[i].id + '"><i class="fa fa-edit" ></i>Edit</button>' +
                //                         '<button id="uji1" href="javascript:;"  class="badge badge-primary item_detail" data="' + data[i].id + '"><i class="fa fa-search" ></i> Detail</button>' +
                //                         '</td>' + '</tr>';
                //                 }
                //                 $('#show_data').html(html);
                //                 var table = $('#tabel-berkas').dataTable({});

                //             }, error: function(){
                //                 alert('Gagal mengambil data tabel');
                //             }

                //         });
                //     }

                //     //tombol detail berkas
                //     $('#show_data').on('click', '.item_detail', function() {
                //         var id = $(this).attr('data');
                //         // alert(id);
                //         $.ajax({
                //             method: "GET",
                //             url: '<?php base_url(); ?>Berkas/get_berkas',
                //             dataType: "JSON",
                //             data: {
                //                 id: id
                //             },
                //             success: function(data) {
                //                 $.each(data, function(id, tgl_masuk, reg_sertipikat, desa, kecamatan, jenis_berkas, status_proses, nama_penjual, nama_pembeli, dp, biaya, tot_biaya, berkas_selesai, luas) {
                //                     $('#ModalDetail').modal('show');
                //                     var html1 = "";
                //                     html1 += '<tr class="text-capitalize text-center">' +
                //                         '<td id="id_proses_id" data-value="' + data.id + '">' + data.id + '</td>' +
                //                         '<td>' + data.tgl_masuk + '</td>' +
                //                         '<td>' + antinull(data.reg_sertipikat) + '</td>' +
                //                         '<td>' + data.desa + '</td>' +
                //                         '<td>' + data.kecamatan + '</td>' +
                //                         '<td id="id_jenis_berkas" data-value="' + data.jenis_berkas + '" >' + data.jenis_berkas + '</td>' +
                //                         '<td>' + data.nama_penjual + '</td>' +
                //                         '<td>' + data.nama_pembeli + '</td>' +
                //                         '<td>' + antinull(data.biaya) + '</td>' +
                //                         '<td>' + antinull(data.dp) + '</td>' +
                //                         '<td>' + antinull(data.tot_biaya) + '</td>' +
                //                         // '<td>' + data.berkas_selesai + '</td>' +
                //                         '</tr>' +
                //                         '<tr>' + '<td colspan="14"> Keterangan :' + '<p>' + data.keterangan + '</p>' +
                //                         '</td>' + '</tr>' +
                //                         '<tr>' + '<td colspan="14" id="ujtes"> Proses : ' +
                //                         '</td>' + '<tr >' + '</tr>' + '<div id="tdProses">' + '</div>' + '</tr>';

                //                     $('#data_detail').html(html1);
                //                     testr();

                //                 });
                //             },
                //             error: function() {
                //                 alert('Gagal Mengambil detail berkas');
                //             }
                //         });
                //         return false;
                //     });

                //     function testr() {
                //         var id = document.getElementById('id_proses_id').getAttribute('data-value');
                //         var arrjb = document.getElementById('id_jenis_berkas').getAttribute('data-value');
                //         var array_jb = [];
                //         var hasil = arrjb.split(","); //mengubah string menjadi array
                //         for (i = 0; i < hasil.length; i++) {
                //             switch (hasil[i]) {
                //                 case "AJB":
                //                     arrayy = ['5', '7', '8', '10', '13'];
                //                     break;
                //                 case "Hibah":
                //                     arrayy = ['5', '7', '8', '10', '13'];
                //                     break;
                //                 case "APHB":
                //                     arrayy = ['5', '7', '8', '10', '13'];
                //                     break;
                //                 case "Pemecahan":
                //                     arrayy = ['5', '9'];
                //                     break;
                //                 case "APHT":
                //                     arrayy = ['5', '6', '16'];
                //                     break;
                //                 case "SKMHT":
                //                     arrayy = ['15'];
                //                     break;
                //                 case "Konversi":
                //                     arrayy = ['1', '10', '11'];
                //                     break;
                //                 case "Ganti Nama":
                //                     arrayy = ['5', '8'];
                //                     break;
                //                 case "Pengeringan":
                //                     arrayy = ['2', '3', '4'];
                //                     break;
                //                 case "Peningkatan Hak":
                //                     arrayy = ['14'];
                //                     break;
                //                 case "Waris":
                //                     arrayy = ['5', '10', '12'];
                //                     break;
                //             }
                //             //mengabungkan array
                //             array_jb = array_jb.concat(arrayy);
                //         }
                //         //mengurutkan array dari kecil ke besar
                //         array_jb.sort(function(a, b) {
                //             return a - b
                //         });

                //         //menghapus duplikat value dari array
                //         var uniq = array_jb.reduce(function(a, b) {
                //             if (a.indexOf(b) < 0) a.push(b);
                //             return a;
                //         }, []);

                //         $.ajax({
                //             method: 'GET',
                //             url: '<?php base_url(); ?>testing/uji',
                //             async: true,
                //             dataType: 'json',
                //             data: {
                //                 id: id
                //             },
                //             success: function(data) {
                //                 window.base_url = <?php echo json_encode(base_url()); ?>;

                //                 var html = "";

                //                 for (i = 0; i < uniq.length; i++) {
                //                     // summ = summ + i;
                //                     switch (uniq[i]) {
                //                         case uniq[i] = '1':
                //                             if (data.ukur == 0 || data.ukur == null) {
                //                                 html += '<a id="id_btn-ukur" class="btn btn-secondary btn-rounded btn-ukur" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="1">Ukur</a>'
                //                             } else if (data.ukur == 1) {
                //                                 html += '<a id="id_btn-ukur" class="btn btn-warning btn-rounded btn-ukur" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="1">Ukur</a>'
                //                             } else if (data.ukur == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button">Ukur</a>'
                //                             };
                //                             break;
                //                         case uniq[i] = '2':
                //                             if (data.pert_teknis == 0 || data.pert_teknis == null) {
                //                                 html += '<a id="id_btn-pert_teknis" class="btn btn-secondary btn-rounded btn-pert_teknis" role="button" href="#" data-id="' + id + '" data-val="1"  data-jp="2">Pertimbangan Teknis </a>';
                //                             } else if (data.pert_teknis == 1) {
                //                                 html += '<a id="id_btn-pert_teknis" class="btn btn-warning btn-rounded btn-pert_teknis" role="button" href="#" data-id="' + id + '" data-val="2"  data-jp="2">Pertimbangan Teknis </a>';
                //                             } else if (data.pert_teknis == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button">Pertimbangan Teknis </a>';
                //                             };
                //                             break;
                //                         case uniq[i] = '3':
                //                             if (data.perijinan == 0 || data.perijinan == null) {
                //                                 html += '<a id="id_btn-perijinan" class="btn btn-secondary btn-rounded btn-perijinan" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="3">Perijinan </a>';
                //                             } else if (data.perijinan == 1) {
                //                                 html += '<a id="id_btn-perijinan" class="btn btn-warning btn-rounded btn-perijinan" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="3">Perijinan </a>';
                //                             } else if (data.perijinan == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button">Perijinan </a>';
                //                             };
                //                             break;
                //                         case uniq[i] = '4':
                //                             if (data.pengeringan == 0 || data.pengeringan == null) {
                //                                 html += '<a id="id_btn-pengeringan" class="btn btn-secondary btn-rounded btn-pengeringan" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="4">Pengeringan </a>';
                //                             } else if (data.pengeringan == 1) {
                //                                 html += '<a id="id_btn-pengeringan" class="btn btn-warning btn-rounded btn-pengeringan" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="4">Pengeringan </a>';
                //                             } else if (data.pengeringan == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button">Pengeringan </a>';
                //                             }
                //                             break;
                //                         case uniq[i] = '5':
                //                             if (data.cek_plot == 0 || data.cek_plot == null) {
                //                                 html += '<a id="id_btn-cek_plot" class="btn btn-secondary btn-rounded btn-cek_plot" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="5">Cek Plot </a>';
                //                             } else if (data.cek_plot == 1) {
                //                                 html += '<a id="id_btn-cek_plot" class="btn btn-warning btn-rounded btn-cek_plot" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="5">Cek Plot </a>';
                //                             } else if (data.cek_plot == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button">Cek Plot </a>';
                //                             };
                //                             break;
                //                         case uniq[i] = '6':
                //                             if (data.cek_sertipikat == 0 || data.cek_sertipikat == null) {
                //                                 html += '<a id="id_btn-cek_sertipikat" class="btn btn-secondary btn-rounded btn-cek_sertipikat" role="button" href="#" data-id="' + id + '" data-val="1"  data-jp="6">Cek Sertipikat </a>';
                //                             } else if (data.cek_sertipikat == 1) {
                //                                 html += '<a id="id_btn-cek_sertipikat" class="btn btn-warning btn-rounded btn-cek_sertipikat" role="button" href="#" data-id="' + id + '" data-val="2"  data-jp="6">Cek Sertipikat </a>';
                //                             } else if (data.cek_sertipikat == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button">Cek Sertipikat </a>';
                //                             };
                //                             break;
                //                         case uniq[i] = '7':
                //                             if (data.roya == 0 || data.roya == null) {
                //                                 html += '<a id="id_btn-roya" class="btn btn-secondary btn-rounded btn-roya" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="7" >Roya </a>';
                //                             } else if (data.roya == 1) {
                //                                 html += '<a id="id_btn-roya" class="btn btn-warning btn-rounded btn-roya" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="7" >Roya </a>';
                //                             } else if (data.roya == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button">Roya </a>';
                //                             };
                //                             break;
                //                         case uniq[i] = '8':
                //                             if (data.ganti_nama == 0 || data.ganti_nama == null) {
                //                                 html += '<a id="id_btn-ganti_nama" class="btn btn-secondary btn-rounded btn-ganti_nama" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="8" >Ganti Nama </a>';
                //                             } else if (data.ganti_nama == 1) {
                //                                 html += '<a id="id_btn-ganti_nama" class="btn btn-warning btn-rounded btn-ganti_nama" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="8" >Ganti Nama </a>';
                //                             } else if (data.ganti_nama == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button">Ganti Nama </a>';
                //                             };
                //                             break;
                //                         case uniq[i] = '9':
                //                             if (data.tapak_kapling == 0 || data.tapak_kapling == null) {
                //                                 html += '<a id="id_btn-tapak_kapling" class="btn btn-secondary btn-rounded btn-tapak_kapling" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="9" >Tapak Kapling </a>';
                //                             } else if (data.tapak_kapling == 1) {
                //                                 html += '<a id="id_btn-tapak_kapling" class="btn btn-warning btn-rounded btn-tapak_kapling" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="9" >Tapak Kapling </a>';
                //                             } else if (data.tapak_kapling == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button">Tapak Kapling </a>';
                //                             };
                //                             break;
                //                         case uniq[i] = '10':
                //                             if (data.bayar_pajak == 0 || data.bayar_pajak == null) {
                //                                 html += '<a id="id_btn-bayar_pajak" class="btn btn-secondary btn-rounded btn-bayar_pajak" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="10" >Validasi Pajak </a>';
                //                             } else if (data.bayar_pajak == 1) {
                //                                 html += '<a id="id_btn-bayar_pajak" class="btn btn-warning btn-rounded btn-bayar_pajak" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="10" >Validasi Pajak </a>';
                //                             } else if (data.bayar_pajak == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button">Validasi Pajak</a>';
                //                             };
                //                             break;
                //                         case uniq[i] = '11':
                //                             if (data.konversi == 0 || data.konversi == null) {
                //                                 html += '<a id="id_btn-konversi" class="btn btn-secondary btn-rounded btn-konversi" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="11" >Konversi </a>';
                //                             } else if (data.konversi == 1) {
                //                                 html += '<a id="id_btn-konversi" class="btn btn-warning btn-rounded btn-konversi" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="11" >Konversi </a>';
                //                             } else if (data.konversi == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button">Konversi </a>';
                //                             };
                //                             break;
                //                         case uniq[i] = '12':
                //                             if (data.waris == 0 || data.waris == null) {
                //                                 html += '<a id="id_btn-waris" class="btn btn-secondary btn-rounded btn-waris" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="12">Waris </a>';
                //                             } else if (data.waris == 1) {
                //                                 html += '<a id="id_btn-waris" class="btn btn-warning btn-rounded btn-waris" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="12">Wars </a>';
                //                             } else if (data.waris == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button">Waris </a>';
                //                             };
                //                             break;
                //                         case uniq[i] = '13':
                //                             if (data.balik_nama == 0 || data.balik_nama == null) {
                //                                 html += '<a id="id_btn-balik_nama" class="btn btn-secondary btn-rounded btn-balik_nama" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="13">Balik Nama </a>';
                //                             } else if (data.balik_nama == 1) {
                //                                 html += '<a id="id_btn-balik_nama" class="btn btn-warning btn-rounded btn-balik_nama" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="13">Balik Nama </a>';
                //                             } else if (data.balik_nama == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button">Balik Nama </a>';
                //                             };
                //                             break;
                //                         case uniq[i] = '14':
                //                             if (data.peningkatan_hak == 0 || data.peningkatan_hak == null) {
                //                                 html += '<a id="id_btn-peningkatan_hak" class="btn btn-secondary btn-rounded btn-peningkatan_hak" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="14">Peningkatan Hak </a>';
                //                             } else if (data.peningkatan_hak == 1) {
                //                                 html += '<a id="id_btn-peningkatan_hak" class="btn btn-warning btn-rounded btn-peningkatan_hak" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="14">Peningkatan Hak </a>';
                //                             } else if (data.peningkatan_hak == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button" >Peningkatan Hak </a>';
                //                             };
                //                             break;
                //                         case uniq[i] = '15':
                //                             if (data.skmht == 0 || data.skmht == null) {
                //                                 html += '<a id="id_btn-skmht" class="btn btn-secondary btn-rounded btn-skmht" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="15">SKMHT </a>';
                //                             } else if (data.skmht == 1) {
                //                                 html += '<a id="id_btn-skmht" class="btn btn-warning btn-rounded btn-skmht" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="15">SKMHT </a>';
                //                             } else if (data.skmht == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button">SKMHT </a>';
                //                             };
                //                             break;
                //                         case uniq[i] = '16':
                //                             if (data.ht == 0 || data.ht == null) {
                //                                 html += '<a id="id_btn-ht" class="btn btn-secondary btn-rounded btn-ht" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="16">HT </a>';
                //                             } else if (data.ht == 1) {
                //                                 html += '<a id="id_btn-ht" class="btn btn-warning btn-rounded btn-ht" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="16">HT </a>';
                //                             } else if (data.ht == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button" >HT </a>';
                //                             };
                //                             break;
                //                         case uniq[i] = '17':
                //                             if (data.ganti_blangko == 0 || data.ganti_blangko == null) {
                //                                 html += '<a id="id_btn-ganti_blangko" class="btn btn-secondary btn-rounded btn-ganti_blangko" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="17">Ganti Blangko </a>';
                //                             } else if (data.ganti_blangko == 1) {
                //                                 html += '<a id="id_btn-ganti_blangko" class="btn btn-warning btn-rounded btn-ganti_blangko" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="17">Ganti Blangko </a>';
                //                             } else if (data.ganti_blangko == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button" >Ganti Blangko </a>';
                //                             };
                //                             break;
                //                         case uniq[i] = '18':
                //                             if (data.iph == 0 || data.iph == null) {
                //                                 html += '<a id="id_btn-iph" class="btn btn-secondary btn-rounded btn-iph" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="18">IPH </a>';
                //                             } else if (data.iph == 1) {
                //                                 html += '<a id="id_btn-iph" class="btn btn-warning btn-rounded btn-iph" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="18">IPH </a>';
                //                             } else if (data.iph == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button" >IPH </a>';
                //                             };
                //                             break;
                //                         case uniq[i] = '19':
                //                             if (data.znt == 0 || data.znt == null) {
                //                                 html += '<a id="id_btn-znt" class="btn btn-secondary btn-rounded btn-znt"" role="button" href="# data-id="' + id + '" data-val="1" data-jp="19">ZNT </a>';
                //                             } else if (data.znt == 1) {
                //                                 html += '<a id="id_btn-znt" class="btn btn-warning btn-rounded btn-znt"" role="button" href="# data-id="' + id + '" data-val="2" data-jp="19">ZNT </a>';
                //                             } else if (data, znt == 2) {
                //                                 html += '<a class="btn btn-success btn-rounded" href="#" role="button" >ZNT </a>';
                //                             };
                //                             break;
                //                     }
                //                 }
                //                 $('#ujtes').html(html);

                //             },
                //             error: function() {
                //                 alert('Gagal megambil tombol proses');
                //             }
                //         });
                //     }


                //     // tombol detail sertipikat
                //     $('#show_data').on('click', '.btn_sertipikat', function() {
                //         var id = $(this).attr('data');
                //         // alert(id);
                //         $.ajax({
                //             method: "GET",
                //             url: '<?php base_url(); ?>Berkas/get_berkas',
                //             dataType: "JSON",
                //             data: {
                //                 id: id
                //             },
                //             success: function(data) {
                //                 $.each(data, function(no_reg, no_sertipikat, tgl_daftar, jenis_hak, luas, desa, kecamatan, pemilik_hak, pembeli_hak, proses, ket) {
                //                     // $.each(data, function(id, desa, nama_penjual) {
                //                     $('#ModalSertipikat').modal('show');
                //                     var html = "";
                //                     html += '<tr class="text-capitalize text-center">' +
                //                         '<td>' + id + '</td>' +
                //                         '<td>' + data.tgl_daftar + '</td>' +
                //                         '<td>' + data.no_reg + '</td>' +
                //                         '<td>' + data.jenis_hak + '. ' + data.no_sertipikat + '/' + data.desa + '</td>' +
                //                         '<td>' + data.kecamatan + '</td>' +
                //                         '<td>' + antinull(data.luas) + '</td>' +
                //                         '<td>' + data.pemilik_hak + '</td>' +
                //                         '<td>' + data.pembeli_hak + '</td>' +
                //                         '</tr>' +
                //                         '<tr>' + '<td colspan="8"> Keterangan :' + '<p>' + antinull(data.ket) + '</p>' +
                //                         '</td>' + '</tr>';

                //                     $('#detail_sertipikat').html(html);
                //                 });
                //             },
                //             error: function() {
                //                 // $('#ModalDetail').modal('show');
                //                 alert('gagal mengambil data sertipikat');

                //             }
                //         });
                //         return false;
                //     });

                //     // mengubah string menjadi array berdasarkan comma
                //     function sring_to_array(val) {
                //         var val = string.split(',');
                //         return val;
                //     }
                //     //edit berkas
                //     //GET UPDATE
                //     $('#show_data').on('click', '.edit_berkas', function() {
                //         var id = $(this).attr('data');
                //         $.ajax({
                //             type: "GET",
                //             url: "<?php base_url(); ?>berkas/get_berkas",
                //             dataType: "JSON",
                //             data: {
                //                 id: id
                //             },
                //             success: function(data) {
                //                 $.each(data, function(id, reg_sertipikat, desa, kecamatan, jenis_berkas, status_proses, nama_penjual, nama_pembeli, biaya, dp, tot_biaya, keterangan) {
                //                     $('#formedit').modal('show');
                //                     $('[name="id"]').val(data.id);
                //                     $('[name="tgl_masuk"]').val(data.tgl_masuk);
                //                     $('[name="reg_sertipikat"]').val(data.reg_sertipikat);
                //                     $('[name="desa"]').val(data.desa);
                //                     $('[name="kecamatan"]').val(data.kecamatan);
                //                     $('[name="jenis_berkas"]').val(data.jenis_berkas);
                //                     $('[name="status_proses"]').val(data.status_proses);
                //                     $('[name="nama_penjual"]').val(data.nama_penjual);
                //                     $('[name="nama_pembeli"]').val(data.nama_pembeli);
                //                     $('[name="biaya"]').val(data.biaya);
                //                     $('[name="dp"]').val(data.dp);
                //                     $('[name="harga_edit"]').val(data.tot_biaya);
                //                     $('[name="keterangan"]').val(data.keterangan);
                //                     $(".coment").html("Jenis Berkas : " + data.jenis_berkas);
                //                 });
                //             },
                //             error: function(data) {
                //                 alert('Gagal mengambil data (modal.edit_berkas');
                //             }
                //         });
                //         return false;
                //     });

                //     //tombol ukur
                //     $('#ModalDetail').on('click', '.btn-ukur', function() {
                //         var id = document.getElementById('id_btn-ukur').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-ukur').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/ukur',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })

                //     //tombol cek plot
                //     $('#ModalDetail').on('click', '.btn-cek_plot', function() {
                //         var id = document.getElementById('id_btn-cek_plot').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-cek_plot').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/cek_plot',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })

                //     //tombol pert_teknis
                //     $('#ModalDetail').on('click', '.btn-pert_teknis', function() {
                //         var id = document.getElementById('id_btn-pert_teknis').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-pert_teknis').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/pert_teknis',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })

                //     //tombol perijinan
                //     $('#ModalDetail').on('click', '.btn-perijinan', function() {
                //         var id = document.getElementById('id_btn-perijinan').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-perijinan').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/perijinan',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })
                //     //tombol pengeringan
                //     $('#ModalDetail').on('click', '.btn-pengeringan', function() {
                //         var id = document.getElementById('id_btn-pengeringan').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-pengeringan').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/pengeringan',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })
                //     //tombol cek_sertipikat
                //     $('#ModalDetail').on('click', '.btn-cek_sertipikat', function() {
                //         var id = document.getElementById('id_btn-cek_sertipikat').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-cek_sertipikat').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/cek_sertipikat',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })
                //     //tombol roya
                //     $('#ModalDetail').on('click', '.btn-roya', function() {
                //         var id = document.getElementById('id_btn-roya').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-roya').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/roya',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })
                //     //tombol ganti_nama
                //     $('#ModalDetail').on('click', '.btn-ganti_nama', function() {
                //         var id = document.getElementById('id_btn-ganti_nama').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-ganti_nama').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/ganti_nama',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })
                //     //tombol tapak_kapling
                //     $('#ModalDetail').on('click', '.btn-tapak_kapling', function() {
                //         var id = document.getElementById('id_btn-tapak_kapling').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-tapak_kapling').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/tapak_kapling',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })
                //     //tombol tapak_kapling
                //     // $('#ModalDetail').on('click', '.btn-tapak_kapling', function() {
                //     //     var id = document.getElementById('id_btn-tapak_kapling').getAttribute('data-id');
                //     //     var val = document.getElementById('id_btn-tapak_kapling').getAttribute('data-val');
                //     //     // alert(id);
                //     //     // alert(val);
                //     //     if (confirm("Lanjutkan Proses?")) {
                //     //         $.ajax({
                //     //             type: 'post',
                //     //             url: '<?php base_url(); ?>proses/tapak_kapling',
                //     //             dataType: 'JSON',
                //     //             data: {
                //     //                 id: id,
                //     //                 val: val
                //     //             },
                //     //             success: function(data) {
                //     //                 testr();
                //     //             },
                //     //             error: function() {
                //     //                 alert('Gagal mengambil data proses');
                //     //             }
                //     //         });
                //     //     }
                //     // })
                //     //tombol bayar_pajak
                //     $('#ModalDetail').on('click', '.btn-bayar_pajak', function() {
                //         var id = document.getElementById('id_btn-bayar_pajak').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-bayar_pajak').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/bayar_pajak',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })
                //     //tombol konversi
                //     $('#ModalDetail').on('click', '.btn-konversi', function() {
                //         var id = document.getElementById('id_btn-konversi').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-konversi').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/konversi',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })
                //     //tombol waris
                //     $('#ModalDetail').on('click', '.btn-waris', function() {
                //         var id = document.getElementById('id_btn-waris').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-waris').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/waris',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })
                //     //tombol balik_nama
                //     $('#ModalDetail').on('click', '.btn-balik_nama', function() {
                //         var id = document.getElementById('id_btn-balik_nama').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-balik_nama').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/balik_nama',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })
                //     //tombol peningkatan_hak
                //     $('#ModalDetail').on('click', '.btn-peningkatan_hak', function() {
                //         var id = document.getElementById('id_btn-peningkatan_hak').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-peningkatan_hak').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/peningkatan_hak',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })
                //     //tombol skmht
                //     $('#ModalDetail').on('click', '.btn-skmht', function() {
                //         var id = document.getElementById('id_btn-skmht').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-skmht').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/skmht',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })
                //     //tombol ht
                //     $('#ModalDetail').on('click', '.btn-ht', function() {
                //         var id = document.getElementById('id_btn-ht').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-ht').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/ht',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })
                //     //tombol ganti_blangko
                //     $('#ModalDetail').on('click', '.btn-ganti_blangko', function() {
                //         var id = document.getElementById('id_btn-ganti_blangko').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-ganti_blangko').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/ganti_blangko',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })
                //     //tombol iph
                //     $('#ModalDetail').on('click', '.btn-iph', function() {
                //         var id = document.getElementById('id_btn-iph').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-iph').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/iph',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })
                //     //tombol znt
                //     $('#ModalDetail').on('click', '.btn-znt', function() {
                //         var id = document.getElementById('id_btn-znt').getAttribute('data-id');
                //         var val = document.getElementById('id_btn-znt').getAttribute('data-val');
                //         if (confirm("Lanjutkan Proses?")) {
                //             $.ajax({
                //                 type: 'post',
                //                 url: '<?php base_url(); ?>proses/znt',
                //                 dataType: 'JSON',
                //                 data: {
                //                     id: id,
                //                     val: val
                //                 },
                //                 success: function(data) {
                //                     testr();
                //                 },
                //                 error: function() {
                //                     alert('Gagal mengambil data proses');
                //                 }
                //             });
                //         }
                //     })


                //     // tombol input berkas
                //     // $('#btn_simpan').on('click', function() {
                //     //     var reg_sertipikat = $('#reg_sertipikat').val();
                //     //     var desa = $('#desa').val();
                //     //     var kecamatan = $('#kecamatan').val();
                //     //     var jenis_berkas = $('#jenis_berkas').val();
                //     //     var nama_pembeli = $('#nama_pembeli').val();
                //     //     var nama_penjual = $('#nama_penjual').val();
                //     //     var biaya = $('#biaya').val();
                //     //     var dp = $('#dp').val();
                //     //     var tot_biaya = $('#tot_biaya').val();
                //     //     var keterangan = $('#keterangan').val();
                //     //     // alert(keterangan);
                //     //     $.ajax({
                //     //         type: "POST",
                //     //         url: "<?php base_url(); ?>berkas/simpan_berkas",
                //     //         dataType: "json",
                //     //         data: {
                //     //             reg_sertipikat: reg_sertipikat,
                //     //             desa: desa,
                //     //             kecamatan: kecamatan,
                //     //             jenis_berkas: jenis_berkas,
                //     //             nama_penjual: nama_penjual,
                //     //             nama_pembeli: nama_pembeli,
                //     //             biaya: biaya,
                //     //             dp: dp,
                //     //             tot_biaya: tot_biaya,
                //     //             keterangan:keterangan
                //     //         },
                //     //         success: function(){
                //     //             // $('[name="reg_sertipikat]').val("");
                //     //             // $('[name="desa]').val("");
                //     //             // $('[name="kecamatan]').val("");
                //     //             // $('[name="jenis_berkas]').val("");
                //     //             // $('[name="nama_pembeli]').val("");
                //     //             // $('[name="nama_penjual]').val("");
                //     //             // $('[name="biaya]').val("");
                //     //             // $('[name="dp]').val("");
                //     //             // $('[name="tot_biaya]').val("");
                //     //             // $('[name="keterangan]').val("");
                //     //             $('#formInputBerkas').modal('hide');
                //     //             data_berkas();
                //     //         },
                //     //         error: function(){
                //     //             alert(jenis_berkas);
                //     //         }
                //     //     });
                //     //     return false;
                //     // });

                // });
            </script>
            <!-- <style>
                table,
                th,
                td {
                    border: 1px solid black;
                    border-collapse: collapse;
                }
            </style> -->
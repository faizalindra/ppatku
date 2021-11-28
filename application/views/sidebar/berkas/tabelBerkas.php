    <script type="text/javascript" src="<?php base_url() ?>assets/vendor/jquery/jquery-ui.min.js"></script>
    <link href="<?= base_url() ?>assets/vendor/jquery/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manajemen Berkas</h6>
            <p id="testing" data-value='1' onload="uji()" value="2" class='uji'></p>
        </div>
        <div class="card-body">

            <button id="btnStart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">Input Berkas</button>
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
            <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="formModalLabel">Form Input</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="formAwesome" method="post" action="<?= base_url('berkas') ?>">
                            <div class="modal-body">
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
                                    <label for="desa" class="col-sm-6 col-form-label">
                                        Desa
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="desa" class="form-control" id="desa" placeholder="Desa" value="<?= set_value('desa'); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kecamatan" class="col-sm-6 col-form-label">
                                        Kecamatan
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="kecamatan" class="form-control" id="kecamatan" placeholder="Kecamatan" value="<?= set_value('kecamatan'); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jenis_berkas" class="col-sm-6 col-form-label">
                                        Jenis Berkas
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="jenis_berkas" class="form-control" id="jenis_berkas" placeholder="Jenis Berkas" value="<?= set_value('jenis_berkas'); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penjual" class="col-sm-6 col-form-label">
                                        Nama Penjual
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="nama_penjual" class="form-control" id="nama_penjual" placeholder="Nama Penjual" value="<?= set_value('nama_penjual'); ?>" required>
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
                                        <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan" value="<?= set_value('keterangan'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
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
                            <h3 class="modal-title" id="myModalLabel">Detai Berkas</h3>
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
            <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
            <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">

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
                                function proses(val){
                                    if(val >= 1){
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
                                        '<td>' +  sertipikat(antinull(data[i].reg_sertipikat)) + '</td>' +
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
                                        '<button id="uji1" href="javascript:;"  class="badge badge-info item_detail" data="' + data[i].id + '"><i class="fa fa-search" ></i> Detail</button>' + ' ' +
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

                    //Update Barang
                    $('#btn_update').on('click', function() {
                        var id = $('#kode_barang2').val();
                        var napen = $('#nama_barang2').val();
                        var desa = $('#desa2').val();
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

                });
            </script>
            <style>
                table,
                th,
                td {
                    border: 1px solid black;
                    border-collapse: collapse;
                }
            </style>
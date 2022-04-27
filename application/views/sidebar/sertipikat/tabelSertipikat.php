<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manajemen Sertipikat</h6>
    </div>
    <div class="card-body">

        <button id="btnStart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">Input Sertipikat</button>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped" id="tabel-sertipikat">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">No.Reg</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Nomor Sertipikat</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Luas</th>
                            <th scope="col">Pemilik Hak</th>
                            <th scope="col">Penerima Hak</th>
                            <th scope="col">Proses</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody id="show_data">
                    </tbody>
                </table>
            </div>
        </div>
        <!-- modal input sertipikat -->
        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="formModalLabel">Form Input</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- <?= $this->session->flashdata('pesan'); ?> -->
                    <form id="formAwesome" method="post" action="<?= base_url('berkas') ?>">
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Nomor Registrasi Sertipikat
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="reg_sertipikat" class="form-control" id="reg_sertipikat" placeholder="Nomor Registrasi Sertipikat" value="<?= set_value('reg_sertipikat'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Desa
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="desa" class="form-control" id="desa" placeholder="Desa" value="<?= set_value('desa'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Kecamatan
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="kecamatan" class="form-control" id="kecamatan" placeholder="Kecamatan" value="<?= set_value('kecamatan'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Jenis Berkas
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="jenis_berkas" class="form-control" id="jenis_berkas" placeholder="Jenis Berkas" value="<?= set_value('jenis_berkas'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Nama Penjual
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="nama_penjual" class="form-control" id="nama_penjual" placeholder="Nama Penjual" value="<?= set_value('nama_penjual'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Nama Pembeli
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="nama_pembeli" class="form-control" id="nama_pembeli" placeholder="Nama Pembeli" value="<?= set_value('nama_pembeli'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Biaya
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="biaya" class="form-control" id="biaya" placeholder="Biaya" value="<?= set_value('Biaya'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    dp
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="dp" class="form-control" id="dp" placeholder="DP" value="<?= set_value('DP'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Total Biaya
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="tot_biaya" class="form-control" id="tot_biaya" placeholder="Total Biaya" value="<?= set_value('tot_biaya'); ?>">
                                    <!-- <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Keterangan
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan" value="<?= set_value('keterangan'); ?>">
                                    <!-- <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?> -->
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
        <!-- end modal input sertipikat -->
        <script type="text/javascript" src="<?php base_url() ?>assets/vendor/datatables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="<?php base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
        <script type="text/javascript">
            $(document).ready(function() {
                data_sertipikat();
                // fungsi tampil berkas
                function data_sertipikat() {
                    $.ajax({
                        method: 'GET',
                        url: '<?php base_url(); ?>sertipikat/data_sertipikat',
                        async: true,
                        dataType: 'json',
                        success: function(data) {
                            var html = '';
                            var i;
                            var c = 0;
                            for (i = 1; i < data.length; i++) {
                                c++
                                html += '<tr class="text-capitalize text-center">' +
                                    '<td>' + c + '</td>' +
                                    '<td>' + data[i].no_reg + '</td>' +
                                    '<td>' + data[i].tgl_daftar + '</td>' +
                                    '<td>' + data[i].jenis_hak + '. ' + data[i].no_sertipikat + ' / ' + data[i].dsa + '</td>' +
                                    '<td>' + data[i].kec + '</td>' +
                                    '<td class="text-lowercase">' + data[i].luas + ' m2' + '</td>' +
                                    '<td>' + data[i].pemilik_hak + '</td>' +
                                    '<td>' + data[i].pembeli_hak + '</td>' +
                                    '<td>' + data[i].proses + '</td>' +
                                    '<td>' + antinull(data[i].ket) + '</td>' +
                                    '</tr>';
                            }
                            $('#show_data').html(html);
                            var table = $('#tabel-sertipikat').dataTable({
                                "columnDefs": [{
                                    "width": "25%",
                                    "targets": 9
                                }]
                            });

                        },
                        error: function() {
                            alert("gagal");
                        }

                    });
                }
                //mengubah null menjadi whitespace
                function antinull(val) {
                    if (val == null) {
                        return val = " ";
                    } else {
                        return val;
                    }
                }
            });
        </script>
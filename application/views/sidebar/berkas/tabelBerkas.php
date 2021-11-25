<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manajemen Berkas</h6>
    </div>
    <div class="card-body">

        <button id="btnStart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">Input Berkas</button>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover" class="mydata">
                    <thead>
                        <tr class="text-center" class="tabel-berkas">
                            <th scope="col">#</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Reg Sertipikat</th>
                            <th scope="col">Desa</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Jenis Berkas</th>
                            <th scope="col">Id Proses</th>
                            <th scope="col">Status Proses</th>
                            <th scope="col">Nama Penjual</th>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">Biaya</th>
                            <th scope="col">DP</th>
                            <th scope="col">Total Biaya</th>
                            <th scope="col">Berkas Selesai</th>
                        </tr>
                    </thead>
                    <tbody class="show_data">
                    </tbody>
                </table>
            </div>
        </div>

        <!-- model form input -->
        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
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
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
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

        <!-- modal detail registrasi sertipikat  -->
        <div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title entah" id="myModalLabel"></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="reload">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">Tanggal Masuk</th>
                                        <th scope="col">Nomor Registrasi</th>
                                        <th scope="col">Nomor Sertipikat</th>
                                        <th scope="col">Kecamatan</th>
                                        <th scope="col">Luas m<sup>2</sup></th>
                                        <th scope="col">Atas Nama</th>
                                        <th scope="col">Penerima Hak</th>
                                        <th scope="col">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>

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
        <!-- end modal detail registrasi sertipikat -->

        <script type="text/javascript" src="<?php base_url() ?>assets/vendor/datatables/jquery.dataTables.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                data_berkas(); //pemanggilan fungsi tampil barang.

                $('#mydata').dataTable();

                //fungsi tampil barang
                function data_berkas() {
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo base_url() ?>berkas/data_berkas',
                        async: true,
                        dataType: 'json',
                        success: function(data) {
                            var html = '';
                            var i;
                            for (i = 0; i < data.length; i++) {
                                html += '<tr>' +
                                    '<td>' + data[i].id + '</td>' +
                                    '<td>' + data[i].nama_penjual + '</td>' +
                                    '<td>' + data[i].desa + '</td>' +
                                    '<td style="text-align:right;">' +
                                    '<a href="javascript:;" class="btn btn-info btn-xs item_detail" data="' + data[i].id + '">Edit</a>' + ' ' +
                                    '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="' + data[i].id + '">Hapus</a>' +
                                    '</td>' +
                                    '</tr>';
                            }
                            $('#show_data').html(html);
                        }

                    });
                }

                //GET UPDATE
                $('#show_data').on('click', '.item_detail', function() {
                    var id = $(this).attr('data');
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url('berkas/get_berkas') ?>",
                        dataType: "JSON",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            $.each(data, function(id, nama_penjual, desa) {
                                $('#ModalaEdit').modal('show');
                                $('[name="id_edit"]').val(data.id);
                                $('[name="napen_edit"]').val(data.nama_penjual);
                                $('[name="desa_edit"]').val(data.desa);
                            });
                        }
                    });
                    return false;
                });


                //GET HAPUS
                $('#show_data').on('click', '.item_hapus', function() {
                    var id = $(this).attr('data');
                    $('#ModalHapus').modal('show');
                    $('[name="kode"]').val(id);
                });

                //Simpan Barang
                $('#btn_simpan').on('click', function() {
                    var id = $('#kode_barang').val();
                    var napen = $('#nama_barang').val();
                    var desa = $('#desa').val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('index.php/berkas/simpan_berkas') ?>",
                        dataType: "JSON",
                        data: {
                            id: id,
                            napen: napen,
                            desa: desa
                        },
                        success: function(data) {
                            $('[name="id"]').val("");
                            $('[name="napen"]').val("");
                            $('[name="desa"]').val("");
                            $('#ModalaAdd').modal('hide');
                            data_berkas();
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

                //Hapus Barang
                $('#btn_hapus').on('click', function() {
                    var kode = $('#textkode').val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('index.php/berkas/hapus_berkas') ?>",
                        dataType: "JSON",
                        data: {
                            kode: kode
                        },
                        success: function(data) {
                            $('#ModalHapus').modal('hide');
                            data_berkas();
                        }
                    });
                    return false;
                });

            });
        </script>
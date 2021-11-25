<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manajemen Berkas</h6>
    </div>
    <div class="card-body">


        <!-- This script got from www.frontendfreecode.com -->
        <button id="btnStart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">Input Berkas</button>

        <!-- modal form registrasi -->
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
        <!-- end modal form registrasi -->

        <div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel"><?= $b['reg_sertipikat'] ?></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
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
                                <tr class="text-capitalize text-center">
                                    <td><?= $b['tgl_masuk']; ?></td>
                                    <td><?= $b['no_reg']; ?></td>
                                    <td><?= $b['jenis_hak']; ?>. <?= $b['no_sertipikat']; ?>/<?= $b['desa']; ?></td>
                                    <td><?= $b['kecamatan']; ?></td>
                                    <td><?= $b['luas']; ?> m<sup>2</sup></td>
                                    <td><?= $b['pemilik_hak']; ?></td>
                                    <td><?= $b['pembeli_hak']; ?></td>
                                    <td><?= $b['keterangan']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover" id="mydata">
                    <thead>
                        <tr class="text-center">
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
                    <tbody id="show_data">

                    </tbody>
                </table>
            </div>
        </div>
        <script type="text/javascript" src="<?php base_url() ?>assets/vendor/datatables/jquery.dataTables.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {

                tampil_data_barang(); //pemanggilan fungsi tampil barang.

                $('#mydata').dataTable();

                //fungsi tampil barang
                function tampil_data_barang() {
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo base_url() ?>berkas2/data_berkas',
                        async: true,
                        dataType: 'json',
                        success: function(data) {
                            var html = '';
                            var i;
                            for (i = 0; i < data.length; i++) {
                                html += '<tr>' +
                                    '<td>' + data[i].no_reg + '</td>' +
                                    '<td>' + data[i].no_sertipikat + '</td>' +
                                    '<td>' + data[i].jenis_hak + '</td>' +
                                    '<td>' + data[i].dsa + '</td>' +
                                    '<td>' + data[i].kec + '</td>' +
                                    '<td>' + data[i].luas + '</td>' +
                                    '<td>' + data[i].pemilik_hak + '</td>' +
                                    '<td>' + data[i].pembeli_hak + '</td>' +
                                    '<td>' + data[i].tgl_masuk + '</td>' +
                                    '<td>' + data[i].proses + '</td>' +
                                    '<td>' + data[i].ket + '</td>' +
                                    '<td style="text-align:right;">' +
                                    '</tr>';
                            }
                            $('#show_data').html(html);
                        }

                    });
                }

                //GET UPDATE
                $('#show_data').on('click', '.item_edit', function() {
                    var id = $(this).attr('data');
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url('index.php/barang/get_barang') ?>",
                        dataType: "JSON",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            $.each(data, function(barang_kode, barang_nama, barang_harga) {
                                $('#ModalaEdit').modal('show');
                                $('[name="kobar_edit"]').val(data.barang_kode);
                                $('[name="nabar_edit"]').val(data.barang_nama);
                                $('[name="harga_edit"]').val(data.barang_harga);
                            });
                        }
                    });
                    return false;
                });

            });
        </script>
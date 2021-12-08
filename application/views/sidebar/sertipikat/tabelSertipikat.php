<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manajemen Sertipikat</h6>
    </div>
    <div class="card-body">

        <button id="btnStart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">Input Sertipikat</button><p></p>

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
                    <form id="formAwesome" method="post" action="<?= base_url('sertipikat/inputSertipikat') ?>">
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="jenis_hak" class="col-sm-6 col-form-label">
                                    Jenis Hak
                                </label>
                                <div class="col-sm-6">
                                    <select name="jenis_hak" class="form-control" id="jenis_hak" placeholder="Nomor Sertipikat" value="<?= set_value('jenis_hak'); ?>" required>
                                        <option value=""></option>
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
                                    <input type="text" name="no_sertipikat" class="form-control" id="no_sertipikat" placeholder="Nomor Sertipikat" value="<?= set_value('no_sertipikat'); ?>" required>
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
                                    <input type="text" name="luas" class="form-control" id="luas" placeholder="m2" value="<?= set_value('luas'); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pemilik_hak" class="col-sm-6 col-form-label">
                                    Pemilik Hak
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="pemilik_hak" class="form-control" id="pemilik_hak" placeholder="" value="<?= set_value('nama_penjual'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pembeli_hak" class="col-sm-6 col-form-label">
                                    Penerima Hak
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="pembeli_hak" class="form-control" id="pembeli_hak" placeholder="" value="<?= set_value('pembeli_hak'); ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="proses" class="col-sm-6 col-form-label">
                                    Proses
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="proses" class="form-control" id="proses" placeholder="" value="<?= set_value('proses'); ?>" required>
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
                                    '<td class="text-lowercase">' + antinull2(data[i].luas) + '</td>' +
                                    '<td>' + data[i].pemilik_hak + '</td>' +
                                    '<td>' + data[i].pembeli_hak + '</td>' +
                                    '<td>' + data[i].proses + '</td>' +
                                    '<td class="text-left">' + antinull(data[i].ket) + '</td>' +
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

                //convert value input kecamatan menjadi id kecamatan
                function conv_kec(val) {
                    // id = "";
                    switch (val) {
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
                    return id;
                }

                //selector for input sertipikat
                $('#kec').change(function() {
                    var kec = $('#kec').val();
                    var id = conv_kec(kec);
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

                //mengubah null di kolom keterangan menjadi whitespace
                function antinull(val) {
                    if (val == null) {
                        return val = " ";
                    } else {
                        return val;
                    }
                }

                //mengubah null di kolom keterangan menjadi whitespace
                function antinull2(val) {
                    var text = " m2";
                    if (val <= 0 || val == null) {
                        return val = " ";
                    } else {
                        return val + text;
                    }
                }
            });
        </script>
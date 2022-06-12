$(document).ready(function() {
    var getUrl = window.location;
    const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    data_sertipikat();

    //select2 for proses
    $('.select2').select2();
    // $('.proses').select2();

    $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd', maxDate: "0d", minDate: new Date(2015, 1 - 1, 1) });

    // fungsi tampil berkas
    function data_sertipikat() {

        $.ajax({
            method: 'GET',
            url: base_url + '/sertipikat/tabel_sertipikat',
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<tr class="text-capitalize text-center">' +
                        '<td>' + data[i].no_reg + '</td>' +
                        '<td>' + data[i].tgl_daftar + '</td>' +
                        '<td>' + data[i].jenis_hak + '. ' + data[i].no_sertipikat + ' / ' + data[i].desa + '</td>' +
                        '<td>' + data[i].kecamatan + '</td>' +
                        '<td class="text-lowercase">' + luas_null(data[i].luas) + '</td>' +
                        '<td>' + nl2br(data[i].pemilik_hak) + '</td>' +
                        '<td>' + data[i].pembeli_hak + '</td>' +
                        '<td>' + data[i].proses + '</td>' +
                        '<td class="text-left">' + nl2br(data[i].ket) + '</td>' +
                        '<td style="text-align:center;">' +
                        '<button href="javascript:;" class="badge badge-info edit_sertipikat" data="' + data[i].no_reg + '"><i class="fa fa-edit" ></i>Edit</button>' +
                        '</td>' +
                        '</tr>';
                }
                $('#show_data').html(html);
                var table = $('#tabel-sertipikat').dataTable({});

            },
            error: function() {
                alert("gagal");
            }

        });
    }

    // fungsi edit sertipikat, tombol edit sertipikat
    $('#show_data').on('click', '.edit_sertipikat', function() {
        var id = $(this).attr('data');
        $.ajax({
            type: "GET",
            url: base_url + "/sertipikat/get_sertipikat",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(data) {
                $.each(data, function(no_reg, jenis_hak, no_sertipikat, dsa, desa, kecamatan, proses, pemilik_hak, pembeli_hak, ket) {
                    $('#edit_sert').modal('show');
                    $('[name="id_e"]').val(data.no_reg);
                    $('[name="jenis_hak_e"]').val(data.jenis_hak);
                    $('[name="nomor_sertipikat_e"]').val(data.no_sertipikat);
                    var alamat = "Desa " + data.desa + ' , Kec. ' + data.kecamatan;
                    $('[name="alamat_e"]').val(alamat);
                    $('[name="desa_e"]').val(data.dsa);
                    $('[name="luas_e"]').val(data.luas);
                    $('[name="proses[]_e').val(data.proses);
                    $('[name="pemilik_hak_e"]').val(data.pemilik_hak);
                    $('[name="penerima_hak_e"]').val(data.pembeli_hak);
                    $('[name="keterangan_e"]').val(data.ket);
                    $(".coment").html("Jenis Berkas : " + data.proses);
                });
            },
            error: function(data) {
                alert('Gagal mengambil data sertipikat');
            }
        });
        return false;
    });


    //selector for field desa input sertipikat
    $('#kecamatan_i').change(function desa() {
        var id = $('#kecamatan_i').val();
        $.ajax({
            url: base_url + "/wilayah/get_desa",
            method: "get",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '<option disabled selected value> -- Desa -- </option>';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id + '>' + data[i].nama + '</option>';
                }
                $('#desa_i').html(html);

            },
            error: function() {
                alert("gagal mengambil data desa");
            }
        });
        return false;
    });

    //selector for field desa edit sertipikat
    $('#kecamatan_e').change(function desa() {
        var id = $('#kecamatan_e').val();
        $.ajax({
            url: base_url + "/wilayah/get_desa",
            method: "get",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '<option disabled selected value> -- Desa -- </option>';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].id + '>' + data[i].nama + '</option>';
                }
                $('#desa_e').html(html);

            },
            error: function() {
                alert("gagal mengambil data desa");
            }
        });
        return false;
    });

    //untuk menjaga line break pada textarea
    function nl2br(str, is_xhtml) {
        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
    }

    //mengubah null di kolom keterangan menjadi whitespace
    function luas_null(val) {
        var text = " m2";
        if (val <= 0 || val == null) {
            return val = " ";
        } else {
            return val + text;
        }
    }
});
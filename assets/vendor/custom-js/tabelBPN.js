$(document).ready(function () {
    data_BPN();
    //select2 for proses
    $('.select2').select2();
    $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd', maxDate: "0d", minDate: new Date(2015, 1 - 1, 1) });

    // fungsi tampil proses
    function data_BPN() {
        $.ajax({
            method: 'GET',
            url: base_url + '/bpn/get_prosesBPN',
            async: true,
            dataType: 'json',
            success: function (data) {
                var html = '';
                var i;
                var aksi = '';
                for (i = 0; i < data.length; i++) {
                    if (user_role != 2 || user_role != '2') {
                        var aksi = '<td style="text-align:center;">' +
                            '<button href="javascript:;" class="badge badge-info edit_bpn" data="' + data[i].no_proses_bpn + '"><i class="fa fa-edit" ></i>Edit</button>' + '</td>';
                    }
                    html += '<tr class="text-capitalize text-center">' +
                        '<td>' + data[i].no_proses_bpn + '</td>' +
                        '<td>' + data[i].tgl_masuk + '</td>' +
                        '<td>' + data[i].nama_pemohon + '</td>' +
                        '<td>' + data[i].no_bpn + '/' + data[i].tahun + '</td>' +
                        '<td>' + data[i].jenis_proses + '</td>' +
                        '<td class="text-left">' + nl2br(data[i].ket) + '</td>' +
                        '<td class="text-center">' + status_proses(data[i].status, data[i].no_proses_bpn) + '</td>' + aksi + '</tr>';
                }
                $('#show_data').html(html);
                var table = $('#tabel-BPN').dataTable({});
                if (user_role == 2 || user_role == '2') {
                    $('.status_bpn').removeAttr('href').removeAttr('onclick');
                }
            },
            error: function () {
                alert("gagal");
            }

        });
    }

    // fungsi edit proses BPN, tombol edit proses BPN
    $('#show_data').on('click', '.edit_bpn', function () {
        var id = $(this).attr('data');
        $.ajax({
            type: "GET",
            url: base_url + "/bpn/get_bpn",
            dataType: "JSON",
            data: {
                no_proses_bpn: id
            },
            success: function (data) {
                $.each(data, function (tgl_masuk, no_proses_bpn, id_berkas, tahun, nama_pemohon, jenis_proses, no_bpn, ket) {
                    $('#edit_bpn').modal('show');
                    $('[name="no_proses_bpn_e"]').val(data.no_proses_bpn);
                    $('[name="tgl_masuk_e"]').val(data.tgl_masuk);
                    $('[name="nama_pemohon_e"]').val(data.nama_pemohon);
                    $('[name="jenis_proses_e"]').val(data.jenis_proses);
                    $('[name="no_bpn_e"]').val(data.no_bpn);
                    $('[name="tahun_e"]').val(data.tahun);
                    $('[name="no_berkas_e"]').val(data.id_berkas);
                    $('[name="ket_e"]').val(data.ket);
                })
            },
            error: function () {
                alert('Gagal mengambil data');
            }
        });
        return false;
    });

    //fungsi badge status proses BPN
    function status_proses(status, id) {
        if (status == "0") {
            return '<a href="' + base_url + '/bpn/selesai/' + id + '"' + 'onclick="return confirm(\'Pastikan proses sudah selesai?\');" class="badge badge-warning status_bpn"> Proses </a>';
        } else if (status == "1") {
            return '<span class="badge badge-info">Selesai</span>';
        }
    }

    //untuk menjaga line break pada textarea
    function nl2br(str, is_xhtml) {
        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
    }

});
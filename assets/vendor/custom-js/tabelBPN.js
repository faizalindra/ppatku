$(document).ready(function() {
    var getUrl = window.location;
    const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    data_BPN();


    //select2 for proses
    $('.select2').select2();
    $('.proses').select2();

    $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' });

    //fungsi badge status proses BPN
    function status_proses(status, id) {
        if (status == "0") {
            return '<a href="' + base_url + '/bpn/selesai/' + id + '"' + 'onclick="return confirm(\'Pastikan proses sudah selesai?\');" class="badge badge-warning"> Proses </a>';
        } else if (status == "1") {
            return '<span class="badge badge-info">Selesai</span>';
        }
    }

    //untuk menjaga line break pada textarea
    function nl2br(str, is_xhtml) {
        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
    }

    // fungsi tampil proses
    function data_BPN() {
        $.ajax({
            method: 'GET',
            url: base_url + '/bpn/get_prosesBPN',
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<tr class="text-capitalize text-center">' +
                        '<td>' + data[i].no_proses_bpn + '</td>' +
                        '<td>' + data[i].tgl_masuk + '</td>' +
                        '<td>' + data[i].nama_pemohon + '</td>' +
                        '<td>' + data[i].no_bpn + '</td>' +
                        '<td>' + data[i].jenis_proses + '</td>' +
                        '<td class="text-left">' + nl2br(data[i].ket) + '</td>' +
                        '<td class="text-center">' + status_proses(data[i].status, data[i].no_proses_bpn) + '</td>' +
                        '<td style="text-align:center;">' +
                        '<button href="javascript:;" class="badge badge-info edit_bpn" data="' + data[i].no_proses_bpn + '"><i class="fa fa-edit" ></i>Edit</button>' +
                        '</td>' +
                        '</tr>';
                }
                $('#show_data').html(html);
                var table = $('#tabel-BPN').dataTable({});

            },
            error: function() {
                alert("gagal");
            }

        });
    }

    // fungsi edit proses BPN, tombol edit proses BPN
    $('#show_data').on('click', '.edit_bpn', function() {
        var id = $(this).attr('data');
        $.ajax({
            type: "GET",
            url: base_url + "/bpn/get_bpn",
            dataType: "JSON",
            data: {
                no_proses_bpn: id
            },
            success: function(data) {
                $.each(data, function(tgl_masuk, no_proses_bpn, nama_pemohon, jenis_proses, no_bpn, ket) {
                    $('#edit_bpn').modal('show');
                    $('[name="no_proses_bpn_e"]').val(data.no_proses_bpn);
                    $('[name="tgl_masuk_e"]').val(data.tgl_masuk);
                    $('[name="nama_pemohon_e"]').val(data.nama_pemohon);
                    $('[name="jenis_proses_e"]').val(data.jenis_proses);
                    $('[name="no_bpn_e"]').val(data.no_bpn);
                    $('[name="ket_e"]').val(data.ket);
                })
            },
            error: function() {
                alert('Gagal mengambil data');
            }
        });
        return false;
    });

    // $('#tabel-BPN').on('click', '.status_proses', function() {
    //     id = $(this).attr('data');
    //     alert(id);
    //     $.ajax({
    //         method: 'Post',
    //         url: base_url + '/bpn/selesai/' + id,
    //         async: true,
    //         success: function() {
    //             // alert('success');
    //             $('#tabel-BPN').dataTable({
    //                 // stateSave: true,
    //                 Destroy: true
    //             });
    //             data_BPN();
    //             // $('#table-BPN').DataTable().ajax.reload();

    //         },
    //         error: function() {
    //             alert('gagal');
    //         }
    //     })
    // })
    // $('#jenis_proses').on('change', function() {
    //     val = document.getElementById('jenis_proses').getAttribute('value');
    //     switch (val) {
    //         case 'Peningkatan Hak':
    //             jp = '1', est = 30;
    //             break;
    //         case 'Pengecekan':
    //             jp = '2', est = 7;
    //             break;
    //         case 'Pemberian Hak Tanggungan':
    //             jp = '3', est = 30;
    //             break;
    //         case 'Roya':
    //             jp = '4', est = 14;
    //             break;
    //         case 'Cek Plot':
    //             jp = '5', est = 7;
    //             break;
    //         case 'Pengalihan Hak':
    //             jp = '6', est = 180;
    //             break;
    //     }
    // });

    // function estimasi(tgl) {
    //     var date1 = new Date(tgl);
    //     var date2 = new Date();

    //     // To calculate the time difference of two dates
    //     var Difference_In_Time = date1.getTime() - date2.getTime();

    //     // To calculate the no. of days between two dates
    //     var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
    //     hari = Difference_In_Days.toFixed(0);
    //     var bulan = 0;
    //     if (hari >= 30) {
    //         while (hari >= 30) {
    //             hari = hari - 30;
    //             bulan = bulan + 1;
    //         }
    //         return bulan + " Bulan " + hari + " Hari";
    //     } else {
    //         return hari + " Hari";
    //     }
    // }

    //mengubah null di kolom keterangan menjadi whitespace
    function antinull(val) {
        if (val == null) {
            return val = " ";
        } else {
            return val;
        }
    }

});
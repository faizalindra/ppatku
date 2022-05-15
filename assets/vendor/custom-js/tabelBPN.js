$(document).ready(function() {
    var getUrl = window.location;
    const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    const current = new Date();
    current.setDate(current.getDate() + 2);
    // $('testing').html(current.toDateString());
    // alert(current.toDateString());
    data_BPN();


    //select2 for proses
    $('.select2').select2();
    $('.proses').select2();

    $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd' });

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
                var c = 0;
                for (i = 0; i < data.length; i++) {
                    c++
                    html += '<tr class="text-capitalize text-center">' +
                        '<td>' + data[i].no_proses_bpn + '</td>' +
                        '<td>' + data[i].tgl_masuk + '</td>' +
                        '<td>' + data[i].nama_pemohon + '</td>' +
                        '<td>' + data[i].no_bpn + '</td>' +
                        '<td>' + data[i].jenis_proses + '</td>' +
                        '<td class="text-left">' + antinull(data[i].ket) + '</td>' +
                        '<td style="text-align:center;">' +
                        '<button href="javascript:;" class="badge badge-info edit_sertipikat" data="' + data[i].no_proses_bpn + '"><i class="fa fa-edit" ></i>Edit</button>' +
                        '</td>' +
                        '</tr>';
                }
                $('#show_data').html(html);
                var table = $('#tabel-BPN').dataTable({
                    "columnDefs": [
                        //     { "width": "1%", "targets": 0 }, //no reg
                        //     { "width": "10%", "targets": 4 }, //Jenis Peoses
                        // { "width": "15%", "targets": 6 }, //Keterangan
                    ]
                });

            },
            error: function() {
                alert("gagal");
            }

        });
    }

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

    // $('#uji2').on('click', function() {
    //     var one_day = 1000 * 60 * 60 * 24
    //     var date1 = new Date('2022-05-08');
    //     var date2 = new Date();
    //     var Difference_In_Time = Math.round(date2.getTime() - date1.getTime()) / (one_day);
    //     var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
    //     var Final_Result = Difference_In_Days.toFixed(0);
    //     // var Result = Math.round(christmas_day.getTime() - present_date.getTime()) / (one_day);
    //     // alert(Difference_In_Days);
    //     $('#testing').html(Final_Result);
    //     // $('#testing').html('ubduab');
    // });


    // $('#uji2').on('click', function() {
    //     var data = document.getElementById('testing').getAttribute('value');
    //     data2 = calculate_estimasi(data);
    //     $('#testing').html(data);
    //     alert('kfnda');
    // });

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
                $.each(data, function(no_reg, jenis_hak, no_sertipikat, dsa, kec, proses, pemilik_hak, pembeli_hak, ket) {
                    $('#edit_sert').modal('show');
                    $('[name="no_reg_e"]').val(data.no_reg);
                    $('[name="jenis_hak_e"]').val(data.jenis_hak);
                    $('[name="no_sertipikat_e"]').val(data.no_sertipikat);
                    $('[name="dsa_e"]').val(data.dsa);
                    $('[name="kec_e"]').val(data.kec);
                    $('[name="luas_e"]').val(data.luas);
                    $('[name="proses[]_e').val(data.proses);
                    $('[name="pemilik_hak_e"]').val(data.pemilik_hak);
                    $('[name="pembeli_hak_e"]').val(data.pembeli_hak);
                    $('[name="ket_e"]').val(data.ket);
                    $(".coment").html("Jenis Berkas : " + data.proses);
                });
            },
            error: function(data) {
                alert('Gagal mengambil data sertipikat');
            }
        });
        return false;
    });

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

    //mengubah null di kolom keterangan menjadi whitespace

    function antinull(val) {
        if (val == null) {
            return val = " ";
        } else {
            return val;
        }
    }

});
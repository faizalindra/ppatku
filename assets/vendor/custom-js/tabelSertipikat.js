$(document).ready(function() {
    var getUrl = window.location;
    const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    data_sertipikat();

    //select2 for proses
    $('.select2').select2();
    $('.proses').select2();


    // fungsi tampil berkas
    function data_sertipikat() {

        $.ajax({
            method: 'GET',
            url: base_url + '/sertipikat/data_sertipikat',
            async: true,
            dataType: 'json',
            success: function(data) {
                var html = '';
                var i;
                var c = 0;
                for (i = 1; i < data.length; i++) {
                    c++
                    html += '<tr class="text-capitalize text-center">' +
                        // '<td>' + c + '</td>' +
                        '<td>' + data[i].no_reg + '</td>' +
                        '<td>' + data[i].tgl_daftar + '</td>' +
                        '<td>' + data[i].jenis_hak + '. ' + data[i].no_sertipikat + ' / ' + data[i].dsa + '</td>' +
                        '<td>' + data[i].kec + '</td>' +
                        '<td class="text-lowercase">' + antinull2(data[i].luas) + '</td>' +
                        '<td>' + data[i].pemilik_hak + '</td>' +
                        '<td>' + data[i].pembeli_hak + '</td>' +
                        '<td>' + data[i].proses + '</td>' +
                        '<td class="text-left">' + antinull(data[i].ket) + '</td>' +
                        '<td style="text-align:center;">' +
                        '<button href="javascript:;" class="badge badge-info edit_sertipikat" data="' + data[i].no_reg + '"><i class="fa fa-edit" ></i>Edit</button>' +
                        '</td>' +
                        '</tr>';
                }
                $('#show_data').html(html);
                var table = $('#tabel-sertipikat').dataTable({
                    "columnDefs": [
                        { "width": "1%", "targets": 1 }, //no reg
                        { "width": "5%", "targets": 3 }, //no sertipikat
                        { "width": "15%", "targets": 9 }, // keterangan

                    ]
                });

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
            case "Padanarum":
                id = 11;
                break;
            case "Pajewaran":
                id = 12;
                break;
            case "Punggelan":
                id = 13;
                break;
            case "Purwanegara":
                id = 14;
                break;
            case "Purworejo Klampok":
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

    //selector for field desa input sertipikat
    $('#kec').change(function desa() {
        var kec = $('#kec').val();
        var id = conv_kec(kec);
        // alert(id);
        $.ajax({
            url: base_url + "/wilayah/get_desa",
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

            },
            error: function() {
                alert("gagal mengambil data desa");
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
data_berkas(); //pemanggilan fungsi tampil barang.
// uji();
var berkas_id_detail = 0;
var getUrl = window.location;
const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

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

$('.datepicker').datepicker({ dateFormat: 'yy-mm-dd', maxDate: "0d", minDate: new Date(2015, 1 - 1, 1) });
$('.select2').select2();
$('.proses').select2();

//mengubah null pada kolom biaya menjadi whitespace
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


// dynamic select desa
//selector for input berkas
$('#kecamatan_i').change(function() {
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
        error: function(data) {
            alert('Error!!!. Gagal mengambil data desa');
        }
    });
    return false;
});

//selector for edit berkas
$('#formedit').on('change', '#kecamatan_e', function() {
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
        error: function(data) {
            alert('Error!!!. Gagal mengambil data desa');
        }
    });
    return false;
});

//fungsi untuk menampilkan sertipikat sesuai format M.nomor_sertipikat/Desa. val0 = jenis_hak, val1 = nomor_sertipikat, val2 = desa, val3 = reg_sertipikat
function sertipikat(val0, val1, val2, val3) {
    c = " ";
    cond1 = '<href href="javascript:;" class="btn_sertipikat" data="' + val3 + '">'
    if (val1 == null) {
        return c + '/ ' + val2;
    } else {
        sert = val0 + '. ' + val1 + "/" + val2;
        return cond1 + sert;
    }
}


function kecamatan(val1, val2) {
    if (val1 != null) {
        return val1;
    } else {
        return val2;
    }
}

//untuk menjaga line break pada textarea
function nl2br(str, is_xhtml) {
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}

// fungsi tampil berkas
function data_berkas() {
    var getUrl = window.location;
    var base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    $.ajax({
        method: 'GET',
        url: base_url + '/berkas/data_berkas',
        async: true,
        dataType: 'json',
        success: function(data) {

            function berkasSelesai(val, vall) {
                // var getUrl = window.location;
                // var base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
                condi0 = '<a href=' + base_url + '/proses/berkas_selesai/' + vall + '/1/ onclick="return confirm(\'Pastikan semua proses sudah selesai?\');" class="badge badge-warning"> Proses </a>';
                condi1 = '<i class="badge badge-info"> Selesai </i>';
                condi2 = '<a href="#"  class="badge badge-danger"> Berkas Dicabut </a>';
                if (val == 0) {
                    return condi0;
                } else if (val == 1) {
                    return condi1;
                } else {
                    return condi2;
                }
            }

            var html = '';
            var i;
            for (i = 0; i < data.length; i++) {
                html += '<tr class="text-capitalize text-center">' +
                    '<td>' + data[i].id_berkas + '</td>' +
                    '<td>' + data[i].tgl_masuk + '</td>' +
                    '<td>' + sertipikat(data[i].jenis_hak, data[i].no_sertipikat, data[i].desa, data[i].reg_sertipikat) + '</td>' +
                    '<td>' + data[i].kecamatan + '</td>' +
                    '<td>' + data[i].jenis_berkas + '</td>' +
                    '<td>' + data[i].nama_penjual + '</td>' +
                    '<td>' + data[i].nama_pembeli + '</td>' +
                    '<td>' + berkasSelesai(data[i].berkas_selesai, data[i].id) + '</td>' +
                    '<td style="text-align:center;">' +
                    '<button href="javascript:;"  class="badge badge-info edit_berkas" data="' + data[i].id_berkas + '"><i class="fa fa-edit" ></i></button>' +
                    // '<button href="javascript:;"  class="badge badge-primary item_detail" data="' + data[i].id_berkas + '"><i class="fa fa-search" ></i> Detail</button>' +
                    '<button href="javascript:;"  class="badge badge-primary item_detail2" data="' + data[i].id_berkas + '"><i class="fa fa-search" ></i> Detail</button>' +
                    '</td>' + '</tr>';
            }
            $('#show_data').html(html);
            var table = $('#tabel-berkas').dataTable({});

        },
        error: function() {
            alert('Gagal mengambil data tabel');
        }

    });
}

//tombol detail berkas
// $('#show_data').on('click', '.item_detail', function() {
//     var id = $(this).attr('data');
//     $.ajax({
//         method: "GET",
//         url: base_url + '/berkas/get_berkas',
//         dataType: "JSON",
//         data: {
//             id: id
//         },
//         success: function(data) {
//             $('#ModalDetail').modal('show');
//             var html1 = "";
//             html1 += '<tr class="text-capitalize text-center">' +
//                 '<td>' + data.id_berkas + '</td>' +
//                 '<td>' + data.tgl_masuk + '</td>' +
//                 '<td>' + sertipikat(data.jenis_hak, data.no_sertipikat, data.desa) + '</td>' +
//                 '<td>' + data.kecamatan + '</td>' +
//                 '<td>' + data.jenis_berkas + '</td>' +
//                 '<td>' + data.nama_penjual + '</td>' +
//                 '<td>' + data.nama_pembeli + '</td>' +
//                 '<td>' + antinull(data.tot_biaya) + '</td>' +
//                 '</tr>' +
//                 '<tr>' + '<td> Keterangan &nbsp;' + '</td>' + '<td colspan=9>' + nl2br(data.keterangan) + '</td>' +
//                 '</td>' + '</tr>' +
//                 '<tr>' + '<td> Kelengkapan &nbsp;' + '</td>' +
//                 '<td colspan=2>' + 'Ada' + '</td>' +
//                 '<td colspan=2>' + 'Belum Ada' + '</td>' +
//                 '<td colspan=6>' + 'Keterangan' + '</td>' + '</tr>' +
//                 '</td>' + '</tr>' +
//                 '<tr>' + '<td colspan="14" id="ujtes"> Proses : ' +
//                 '</td>' + '<tr >' + '</tr>' + '<div id="tdProses">' + '</div>' + '</tr>';

//             $('#data_detail').html(html1);
//             testr(data.id_berkas, data.jenis_berkas);
//         },
//         error: function() {
//             alert('Gagal Mengambil detail berkas');
//         }
//     });
//     return false;
// });

//tombol detail2 berkas///////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$('#show_data').on('click', '.item_detail2', function() {
    var id = $(this).attr('data');

    function sert_detail(jh, no_hk, dsa, kec) {
        if (no_hk != null) {
            return jh + '. ' + no_hk + '/' + dsa + ', Kec. ' + kec;
        } else {
            return 'Desa ' + dsa + ', Kec. ' + kec;
        }
    }
    $.ajax({
        method: "GET",
        url: base_url + '/berkas/get_berkas',
        dataType: "JSON",
        data: {
            id: id
        },
        success: function(data) {
            berkas_id_detail = data.id_berkas
            $('#modelDetail2').modal('show');
            $('#id_berkas_').html('No. ' + data.id_berkas);
            $('#tgl_masuk_berkas_').html(data.tgl_masuk);
            $('#jenis_berkas_').html(data.jenis_berkas);
            var sert = sert_detail(data.jenis_hak, data.no_sertipikat, data.desa, data.kecamatan);
            $('#col_sertipikat').html(sert);
            $('#pihak_1').html(data.nama_penjual);
            $('#pihak_2').html(data.nama_pembeli);
            $('#ket_berkas').html(nl2br(data.keterangan));
            $('#total_biaya_').html('Rp. ' + addCommas(data.tot_biaya));
            detail_kelengkapan(data.id_berkas);
            detail_proses(data.id_berkas);
            bpn(data.id_berkas);
            biaya(data.id_berkas);

        },
        error: function() {
            alert('Gagal Mengambil detail berkas');
        }
    });
    return false;
});




//////////////////////////////////////////////////////- Card Kelengkapan -///////////////////////////////////////////////
//fungsi untuk menampilkan kelengkapan berkas
function detail_kelengkapan(id) {
    $.ajax({
        url: base_url + '/Kelengkapan/get_kelengkapan',
        type: 'get',
        dataType: 'json',
        data: {
            id: id
        },
        success: function(data) {
            $('#kelengkapan_ada').html(data.ada);
            $('#kelengkapan_belum_ada').html(data.belum);
            $('#ket_keleng').html(nl2br(data.ket));
        },
        error: function(data) {
            alert('gagal mengambil kelengkapan');
        }
    });
}

function kelengkapan(id, jb) {
    if (confirm("Kelengkapan ada?")) {
        $.ajax({
            url: base_url + '/kelengkapan/update_kelengkapan',
            type: 'post',
            dataType: 'json',
            data: {
                id: id,
                jb: jb
            },
            success: function(data) {
                detail_kelengkapan(id);
            },
            error: function(data) {
                alert('gagal mengupdate kelengkapan');
            }
        });
    }
}
//contenteditable keterangan kelengkapan
$('#modelDetail2').on('click', '#save_ket_keleng', function() {
    var ket = document.getElementById('ket_keleng').innerHTML;
    var id = berkas_id_detail;
    if (ket != '') {
        ket = remove_div_in_ket(ket);
        console.log(ket);
        $.ajax({
            type: 'POST',
            url: base_url + '/kelengkapan/update_keterangan',
            dataType: 'JSON',
            data: {
                id: id,
                ket: ket
            },
            error: function() {
                console.log('Error: tidak bisa update keterangan kelengkapan')
            }
        })
    }
})


/////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////- Card Proses -///////////////////////////////////
//fungsi untuk menampilkan daftar proses
function detail_proses(id) {
    $.ajax({
        url: base_url + '/proses/get_proses',
        type: 'get',
        dataType: 'json',
        data: {
            id: id
        },
        success: function(data) {
            $('#proses_').html(data.proses);
            $('#ket_proses').html(nl2br(data.ket));
        },
        error: function(data) {
            alert('gagal mengambil data proses');
        }
    });
}

//untuk update status proses
function proses(id, val, jp) {
    if (confirm("Proses sudah selesai?")) {
        $.ajax({
            url: base_url + '/proses/update_proses',
            type: 'post',
            dataType: 'json',
            data: {
                id: id,
                jp: jp,
                val: val
            },
            success: function(data) {
                detail_proses(id);
            },
            error: function(data) {
                alert('gagal mengupdate proses');
            }
        });
    }
}
//contenteditable keterangan proses
$('#modelDetail2').on('click', '#save_ket_proses', function() {
        var ket = document.getElementById('ket_proses').innerHTML;
        var id = berkas_id_detail;
        if (ket != '') {
            ket = remove_div_in_ket(ket);
            $.ajax({
                type: 'POST',
                url: base_url + '/proses/update_keterangan',
                dataType: 'JSON',
                data: {
                    id: id,
                    ket: ket
                },
                success: function(data) {
                    console.log(data);
                },
                error: function() {
                    console.log('Error: tidak bisa update keterangan proses')
                }
            })
        }
    })
    //////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////// - Card BPN - ////////////////////////////////////////////
function bpn(id) {
    $.ajax({
        url: base_url + '/bpn/get_bpn_for_detail',
        type: 'get',
        dataType: 'json',
        data: {
            id: id
        },
        success: function(data) {
            html = '';
            for (i = 0; i < data.length; i++) {
                html += data[i];
            }
            $('#bpn_').html(html);
        },
        error: function(data) {
            alert('gagal mengambil data bpn');
        }
    });
}
/////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////// - Card Biaya /////////////////////////////////////////////

$("#modelDetail2").on('click', ".bayar_", function() {
    var val = $('input[name="bayar_"]:checked').val();
    if (val == 1) {
        document.getElementById("penyetor").disabled = true;
    } else {
        document.getElementById("penyetor").disabled = false;
    }
})

//fungsi untuk menampilkan card biaya
function biaya(id) {
    $.get(base_url + '/biaya/get_biaya', {
        id: id
    }, function(data) {
        $('#row_biaya').html(data.card);
        console.log(data);
        $('#footer_biaya').css(data.color[1], data.color[2]);
        $('#status_bayar').html(data.status);
        $('#ket_bayar_').html(data.ket);

    }, 'json').fail(function() { console.log('gagal mengambil data biaya') });
}

//fungsi untuk input biaya
function input_biaya() {
    var id = berkas_id_detail;
    var bayar_ = $('input[name="bayar_"]:checked').val();
    var tgl_bayar = $('[name="tgl_bayar"]').val();
    var jum_bayar = $('[name="jum_bayar"]').val();
    var penyetor = $('[name="penyetor"]').val();
    var ket_bayar = $('[name="ket_bayar"]').val();
    $.post(base_url + '/biaya/input_biaya', {
        id: id,
        bayar: bayar_,
        tgl_bayar: tgl_bayar,
        jum_bayar: jum_bayar,
        penyetor: penyetor,
        ket_bayar: ket_bayar
    }, function() {
        biaya(id);
    }, 'json').fail(function() { console.log('Gagal') })
    $('#form-biaya').find('input[type=text]').val('')
    $('#form-biaya').find('textarea').val('')
    $('#collapse_biaya').collapse('hide');
}

////////////////////////////////////////////////////////////////////////////////////////////////

//untuk menghapus div di contenteditable
function remove_div_in_ket(val) {
    var split1 = val.split("</div><div>").join("\n")
    var split2 = split1.split("<div>").join("\n")
    var split3 = split2.split("</div>").join("\n")
    var split4 = split3.split("&nbsp;").join(" ")
    var split5 = split4.split("<br>").join("")
    return split5;
}


// tombol detail sertipikat
$('#show_data').on('click', '.btn_sertipikat', function() {
    var id = $(this).attr('data');
    $.ajax({
        method: "GET",
        url: base_url + '/sertipikat/get_sertipikat',
        dataType: "JSON",
        data: {
            id: id
        },
        success: function(data) {
            $.each(data, function() {
                $('#ModalSertipikat').modal('show');
                var html = "";
                html += '<tr class="text-capitalize text-center">' +
                    '<td>' + id + '</td>' +
                    '<td>' + data.tgl_daftar + '</td>' +
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
            alert('gagal mengambil data sertipikat');

        }
    });
    return false;
});


//edit berkas
$('#show_data').on('click', '.edit_berkas', function() {
    var id = $(this).attr('data');
    $.ajax({
        type: "GET",
        url: base_url + "/berkas/get_berkas",
        dataType: "JSON",
        data: {
            id: id
        },
        success: function(data) {
            $.each(data, function() {
                $('#formedit').modal('show');
                $('[name="id_e"]').val(data.id_berkas);
                $('[name="tgl_masuk_e"]').val(data.tgl_masuk);
                $('[name="sertipikat_e"]').val(data.reg_sertipikat);
                $('[name="desa_e"]').val(data.desa);
                var alamat = 'Desa ' + data.desa + ', Kec. ' + data.kecamatan;
                $('[name="alamat_e"]').val(alamat);
                $('[name="desa_e"]').val(data.desa);
                $('[name="kecamatan_e"]').val(data.kecamatan);
                $('[name="jenis_berkas[]_e"]').val(data.jenis_berkas);
                $('[name="penjual_e"]').val(data.nama_penjual);
                $('[name="pembeli_e"]').val(data.nama_pembeli);
                $('[name="biaya_e"]').val(data.biaya);
                $('[name="dp_e"]').val(data.dp);
                $('[name="tot_biaya_e"]').val(data.tot_biaya);
                $('[name="keterangan_e"]').val(data.keterangan);
                $(".coment").html("Jenis Berkas : " + data.jenis_berkas);
            });
        },
        error: function(data) {
            alert('Gagal mengambil data (modal.edit_berkas');
        }
    });
    return false;
});
var berkas_id_detail = 0;
var jenis_modal = 0;
// var table; // 0 = modal berkas, 1 = modal berkas cabut
tabel_berkas(); //pemanggilan fungsi tampil barang.
$(document).ready(function () {
    setTimeout(function () {
    $('#tabel-berkas').removeAttr('style')}, 1);
    var cari = $('#cari_data').attr('data');
    $('#tabel-berkas').dataTable().fnFilter(cari);
});

$('.datepicker').datepicker({ dateFormat: 'yy-mm-dd', maxDate: "0d", minDate: new Date(2015, 1 - 1, 1), changeMonth: true, changeYear: true });
$('.select2').select2();
$('.proses').select2();

/////////////////////////////////////////////////// -- Tabel Berkas -- //////////////////////////////////////////////////
// fungsi tampil tabel berkas
function tabel_berkas() {
    // $('#tabel-berkas').DataTable().clear().destroy();
    var table = $('#tabel-berkas').dataTable({
        "ajax": {
            "url": base_url + "/berkas/tabel_berkas",
            "type": "post",
            "autoWidth": true,
            // "dataSrc": "data",
        },
        columns: [{
            data: 'no_urut'
        },
        {
            data: 'kode_b'
        },
        {
            data: 'tgl_masuk'
        },
        {
            data: 'sertipikat'
        },
        {
            data: 'kecamatan'
        },
        {
            data: 'jenis_berkas'
        },
        {
            data: 'nama_penjual'
        },
        {
            data: 'nama_pembeli'
        },
        {
            data: 'status_berkas'
        },
        {
            data: 'aksi'
        },
        ],
        'columnDefs': [
            {
                "targets": 5,
                "className": "text-center",
            },
            {
                "targets": 6,
                "className": "text-center",
            },
            {
                "targets": 7,
                "className": "text-center",
            },
            {
                "targets": 8,
                "className": "text-center",
            },
        ]
    }
    );
    // $('#tabel-berkas').dataTable().fnFilter('mandiraja');
}

// tombol detail berkas
$('#show_data').on('click', '.item_detail2', function () {
    var id = $(this).attr('data');
    jenis_modal = 0;
    $.ajax({
        method: "GET",
        url: base_url + '/berkas/get_berkas',
        dataType: "JSON",
        data: {
            id: id
        },
        success: function (data) {
            berkas_id_detail = data.id_berkas
            $('#modelDetail2').modal('show');
            $('#id_berkas_').html('No. ' + data.id_berkas);
            $('#tgl_masuk_berkas_').html(data.tgl_masuk);
            $('#jenis_berkas_').html(data.jenis_berkas);
            $('#col_sertipikat').html(data.sertipikat);
            $('#pihak_1').html(nl2br(data.nama_penjual));
            $('#pihak_2').html(data.nama_pembeli);
            $('#ket_berkas').html(nl2br(data.keterangan));
            $('#total_biaya_').html(data.tot_biaya);
            detail_kelengkapan(data.id_berkas);
            detail_proses(data.id_berkas);
            bpn(data.id_berkas);
            biaya(data.id_berkas);

        },
        error: function () {
            alert('Gagal Mengambil detail berkas');
        }
    });
    return false;
});

//tombol print nomor berkas
$('#print_b').click(function () {
    var idb = berkas_id_detail;
    window.open(base_url + '/berkas/print_berkas/' + idb, '_blank');
})

// tombol detail sertipikat
$('#show_data').on('click', '.btn_sertipikat', function () {
    var id = $(this).attr('data');
    $.ajax({
        method: "GET",
        url: base_url + '/sertipikat/get_sertipikat',
        dataType: "JSON",
        data: {
            id: id
        },
        success: function (data) {
            $('#ModalSertipikat').modal('show');
            var html = "";
            html += '<tr class="text-capitalize text-center">' +
                '<td>' + id + '</td>' +
                '<td>' + data.tgl_daftar + '</td>' +
                '<td>' + data.jenis_hak + '. ' + data.no_sertipikat + '/' + data.desa + '</td>' +
                '<td>' + data.kecamatan + '</td>' +
                '<td>' + data.luas + '</td>' +
                '<td>' + data.pemilik_hak + '</td>' +
                '<td>' + data.pembeli_hak + '</td>' +
                '</tr>' +
                '<tr>' + '<td colspan="8"> Keterangan :' + '<p>' + data.ket + '</p>' +
                '</td>' + '</tr>';

            $('#detail_sertipikat').html(html);
        },
        error: function () {
            alert('gagal mengambil data sertipikat');

        }
    });
    return false;
});

// tombol edit berkas
$('#show_data').on('click', '.edit_berkas', function () {
    var id = $(this).attr('data');
    $.ajax({
        type: "GET",
        url: base_url + "/berkas/get_berkas",
        dataType: "JSON",
        data: {
            id: id
        },
        success: function (data) {
            $('#formedit').modal('show');
            $('[name="id_e"]').val(data.id_berkas);
            $('[name="tgl_masuk_e"]').val(data.tgl_masuk);
            $('[name="sertipikat_e"]').val(data.reg_sertipikat);
            $('[name="kecamatan_e"]').val(data.id_kecamatan);
            var html = '<option value="' + data.id_desa + '">' + data.desa + '</option>';
            $('[name="desa_e"]').html(html);
            $('[name="desa_e"]').val(data.id_desa);
            $('[name="jenis_berkas[]_e"]').val(data.jenis_berkas);
            $('[name="jenis_berkas[]_e"]').trigger('change');
            $('[name="penjual_e"]').val(data.nama_penjual);
            $('[name="pembeli_e"]').val(data.nama_pembeli);
            $('[name="tot_biaya_e"]').val(data.biaya);
            $('[name="keterangan_e"]').val(data.keterangan);
        },
        error: function (data) {
            alert('Gagal mengambil data (modal.edit_berkas');
        }
    });
    return false;
});

//tombol detail berkas dicabut
$('#show_data').on('click', '.item_detail', function () {
    var id = $(this).attr('data');
    jenis_modal = 1;
    $.ajax({
        method: "GET",
        url: base_url + '/berkas/get_berkas',
        dataType: "JSON",
        data: {
            id: id
        },
        success: function (data) {
            $('#ModalDetail').modal('show');
            $('#id_berkas_2').html('No. ' + data.id_berkas);
            $('#tgl_masuk_berkas_2').html(data.tgl_masuk);
            $('#jenis_berkas_2').html(data.jenis_berkas);
            $('#col_sertipikat_2').html(data.sertipikat);
            $('#pihak_1_2').html(nl2br(data.nama_penjual));
            $('#pihak_2_2').html(data.nama_pembeli);
            $('#ket_berkas_2').html(nl2br(data.keterangan));
            $('#total_biaya_2').html(data.tot_biaya);
            detail_kelengkapan(data.id_berkas, 1);
            detail_proses(data.id_berkas, 1);
            bpn(data.id_berkas, 1);
            biaya(data.id_berkas, 1);
        },
        error: function () {
            alert('Gagal Mengambil detail berkas');
        }
    });
    return false;
});

//tombol status berkas
$('#show_data').on('click', '.status_berkas', function () {
    if (confirm('Pastikan proses telah selesai !!!!')) {
        var id = $(this).attr('data');
        $(this).toggleClass('badge-warning badge-success');
        $(this).html('Selesai');
        console.log(id)
        $.post(base_url + '/proses/berkas_selesai', { id: id },
            function (data) {
                console.log(data)
            }, "json").fail(function () { console.log('gagal') });
    }

});

//auto select when sertipikat is inputed
$('#formInputBerkas').on('change', '#sertipikat_i', function () {
    var id = $(this).val();
    $.post(base_url + '/berkas/get_sert_for_auto', { id: id },
        function (data) {

            $('#kecamatan_i').val(data.id_kecamatan);
            var html = '<option value="' + data.id_desa + '">' + data.desa + '</option>';
            $('#desa_i').html(html);
            $('#desa_i').val(data.id_desa);
            $('#jenis_berkas_i').val(data.proses);
            $('#jenis_berkas_i').trigger('change');
            $('#penjual_i').val(data.pemilik_hak);
            $('#pembeli_i').val(data.pembeli_hak);

        }, "json").fail(function () { console.log('gagal') });

});
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


////////////////////////////////////////// -- Dynamic Selector Kecamatan/Desa -- ////////////////////////////////////////
// dynamic select desa for input berkas
$('#kecamatan_i').change(function () {
    var id = $('#kecamatan_i').val();
    $.ajax({
        url: base_url + "/wilayah/get_desa",
        method: "get",
        data: {
            id: id
        },
        async: true,
        dataType: 'json',
        success: function (data) {
            var html = '<option disabled selected value> -- Desa -- </option>';
            var i;
            for (i = 0; i < data.length; i++) {
                html += '<option value=' + data[i].id + '>' + data[i].nama + '</option>';
            }
            $('#desa_i').html(html);
        },
        error: function (data) {
            alert('Error!!!. Gagal mengambil data desa');
        }
    });
    return false;
});

//dynamic select desa for edit berkas
$('#formedit').on('change', '#kecamatan_e', function () {
    var id = $('#kecamatan_e').val();
    $.ajax({
        url: base_url + "/wilayah/get_desa",
        method: "get",
        data: {
            id: id
        },
        async: true,
        dataType: 'json',
        success: function (data) {
            var html = '<option disabled selected value> -- Desa -- </option>';
            var i;
            for (i = 0; i < data.length; i++) {
                html += '<option value=' + data[i].id + '>' + data[i].nama + '</option>';
            }
            $('#desa_e').html(html);
        },
        error: function (data) {
            alert('Error!!!. Gagal mengambil data desa');
        }
    });
    return false;
});
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////- Card Kelengkapan -///////////////////////////////////////////////
//fungsi untuk menampilkan kelengkapan berkas
function detail_kelengkapan(id, opt) {
    $.ajax({
        url: base_url + '/Kelengkapan/get_kelengkapan',
        type: 'get',
        dataType: 'json',
        data: {
            id: id
        },
        success: function (data) {
            if (opt == null) {
                $('#kelengkapan_ada').html(data.ada);
                $('#kelengkapan_belum_ada').html(data.belum);
                $('#ket_keleng').html(nl2br(data.ket));
            } else {
                $('#kelengkapan_ada_2').html(data.ada);
                $('#kelengkapan_belum_ada_2').html(data.belum);
                $('#ket_keleng_2').html(nl2br(data.ket));
            }


        },
        error: function (data) {
            alert('gagal mengambil kelengkapan');
        }
    });
}

// tombol kelengkapan
$('#modelDetail2').on('click', '.tbl_keleng', function () {
    var id = $(this).attr('data');
    var jb = $(this).attr('data_s');
    if (jenis_modal == 0) {
        if (confirm('Kelengkapan ada?')) {
            $.post(base_url + '/kelengkapan/update_kelengkapan', { id: id, jb: jb },
                function (data) {
                    detail_kelengkapan(id);
                }, "json").fail(function () { console.log('gagal') });
        }
    }
});

//contenteditable keterangan kelengkapan
$('#modelDetail2').on('click', '#save_ket_keleng', function () {
    var ket = document.getElementById('ket_keleng').innerHTML;
    var id = berkas_id_detail;
    if (ket != '') {
        ket = remove_div_in_ket(ket);
        // console.log(ket);
        $.ajax({
            type: 'POST',
            url: base_url + '/kelengkapan/update_keterangan',
            dataType: 'JSON',
            data: {
                id: id,
                ket: ket
            },
            error: function () {
                console.log('Error: tidak bisa update keterangan kelengkapan')
            }
        })
    }
})
/////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////- Card Proses -///////////////////////////////////
//fungsi untuk menampilkan daftar proses
function detail_proses(id, opt) {
    $.ajax({
        url: base_url + '/proses/get_proses',
        type: 'get',
        dataType: 'json',
        data: {
            id: id
        },
        success: function (data) {
            if (opt == null) {
                $('#proses_').html(data.proses);
                $('#ket_proses').html(nl2br(data.ket));
            } else {
                $('#proses_2').html(data.proses);
                $('#ket_proses_2').html(nl2br(data.ket));
            }

        },
        error: function (data) {
            alert('gagal mengambil data proses');
        }
    });
}

$('#modelDetail2').on('click', '.tbl_proses', function () {
    var id = $(this).attr('data');
    var val = $(this).attr('datas');
    var jp = $(this).attr('datat');
    console.log(id + "-" + jp + "-" + val);
    if (jenis_modal == 0) {
        // if (user_role != 2 || user_role != 3) {
        if (confirm('Konfirmasi proses?')) {
            $.post(base_url + '/proses/update_proses', { id: id, jp: jp, val: val },
                function (data) {
                    console.log(data);
                    detail_proses(id);
                }, "json").fail(function () { console.log('gagal mengupdate proses') });
        }
        // }
    }
});

//contenteditable keterangan proses
$('#modelDetail2').on('click', '#save_ket_proses', function () {
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
            success: function (data) {
                // console.log(data);
            },
            error: function () {
                console.log('Error: tidak bisa update keterangan proses')
            }
        })
    }
})
//////////////////////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////// - Card BPN - ////////////////////////////////////////////
//fungsi menampilkan proses bpn
function bpn(id, opt) {
    $.ajax({
        url: base_url + '/bpn/get_bpn_for_detail',
        type: 'get',
        dataType: 'json',
        data: {
            id: id
        },
        success: function (data) {
            html = '';
            for (i = 0; i < data.length; i++) {
                html += data[i];
            }
            if (opt == null) {
                $('#bpn_').html(html);
            } else {
                $('#bpn_2').html(html)
            }
        },
        error: function (data) {
            alert('gagal mengambil data bpn');
        }
    });
}
/////////////////////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////// - Card Biaya- /////////////////////////////////////////////
//fungsi untuk menampilkan card biaya
function biaya(id, opt) {
    $.get(base_url + '/biaya/get_biaya', { id: id },
        function (data) {
            if (opt == null) {
                $('#row_biaya').remove('.card-biaya');
                $('#row_biaya').html(data.card);
                $('#footer_biaya').css(data.color[1], data.color[2]);
                $('#status_bayar').html(data.status);
                $('#ket_bayar_').html(data.ket);
            } else {
                $('#row_biaya_2').remove('.card-biaya');
                $('#row_biaya_2').html(data.card);
                $('#footer_biaya_2').css(data.color[1], data.color[2]);
                $('#status_bayar_2').html(data.status);
                $('#ket_bayar_2').html(data.ket);
            }
        }, 'json').fail(function () { console.log('gagal mengambil data biaya') });
}

// nonaktifkan field tergantung dari tombol radio
$("#modelDetail2").on('click', ".bayar_", function () {
    var val = $('input[name="bayar_"]:checked').val();
    if (val == 1) {
        document.getElementById("penyetor").disabled = true;
        document.getElementById("ket_bayar").disabled = false;
    } else {
        document.getElementById("penyetor").disabled = false;
        document.getElementById("ket_bayar").disabled = true;
    }
})

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
    }, function () {
        biaya(id);
    }, 'json').fail(function () { console.log('Gagal') })
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


//untuk menjaga line break pada textarea
function nl2br(str, is_xhtml) {
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}
var getUrl = window.location;
const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];

$('#cabut_berkas_').on('click', function() {
    var id_cabut = $('#select_cabut').val();
    // console.log(id_cabut);
    if (id_cabut === null) {
        alert("Pilih Cabut Berkas");
    } else {
        $('#modal_cabut').modal('show');
        $("#kode_konfirmasi").html(random_word());
    }

});

$('#submit_cabut').on('click', function() {
    var kode = document.getElementById("kode_konfirmasi").innerHTML;
    var i_kode = $("#input_konfirmasi").val();
    if (kode === i_kode) {
        var id = $("#select_cabut").val();
        $.post(base_url + '/proses/berkas_selesai', { id: id, kode: kode },
            function() {
                alert('Berkas No. ' + id + ' Dicabut');
                $(location).attr('href', base_url + '/berkas');
            },
            'JSON');
    } else {
        alert('Kode Tidak Sama')
    }
});

$('#select_cabut').on('change', function() {
    // var id = $(this).attr('data');
    var id = $("#select_cabut").val();
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
            $('#tgl_masuk_berkas_').html(data.tgl_masuk);
            $('#jenis_berkas_').html(data.jenis_berkas);
            $('#col_sertipikat').html(data.sertipikat);
            $('#pihak_1').html(data.nama_penjual);
            $('#pihak_2').html(data.nama_pembeli);
            $('#ket_berkas').html(nl2br(data.keterangan));
            $('#total_biaya_').html(data.tot_biaya);
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

function random_word() {
    var length = 5;
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() *
            charactersLength));
    }
    return result;
}

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

function biaya(id) {
    $.get(base_url + '/biaya/get_biaya', { id: id },
        function(data) {
            $('#row_biaya').remove('.card-biaya');
            $('#row_biaya').html(data.card);
            $('#footer_biaya').css(data.color[1], data.color[2]);
            $('#status_bayar').html(data.status);
            $('#ket_bayar_').html(data.ket);
        }, 'json').fail(function() { console.log('gagal mengambil data biaya') });
}

function nl2br(str, is_xhtml) {
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
}

function kelengkapan(val, val2) {
    return false;
}
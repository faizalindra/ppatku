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
})

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

data_sertipikat();
$('.select2').select2();
$('.datepicker').datepicker({ dateFormat: 'yy-mm-dd', maxDate: "0d", minDate: new Date(2015, 1 - 1, 1), changeMonth: true, changeYear: true });

// document ready
$(document).ready(function () {
    var cari = $('#cari_data').attr('data');
    if (cari) {
        $('#tabel-sertipikat').dataTable().fnFilter(cari);
    }
    setTimeout(function () {
        $('#tabel-sertipikat').removeAttr('style')
    }, 10);
})

// Tabel Sertipikat
function data_sertipikat() {
    var table = $('#tabel-sertipikat').dataTable({
        "ajax": {
            "url": base_url + "/sertipikat/tabel_sertipikat",
            "type": "post",
            "autoWidth": true,
        },
        // "dom": 'lBfrtip',
        columns: [{
            data: 'no_urut'
        },
        {
            data: 'kode_s'
        },
        {
            data: 'tgl_daftar'
        },
        {
            data: 'sertipikat'
        },
        {
            data: 'kecamatan'
        },
        {
            data: 'luas'
        },
        {
            data: 'pemilik_hak'
        },
        {
            data: 'pembeli_hak'
        },
        {
            data: 'proses',
        },
        {
            data: 'ket'
        },
        {
            data: 'aksi',
        },
        ],
        'columnDefs': [
            {
                "targets": 6,
                "className": "text-center",
            },
            {
                "targets": 7,
                "className": "text-center",
            },
        ],
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
        // ]
    })
}


// fungsi edit sertipikat, tombol edit sertipikat
$('#show_data').on('click', '.edit_sertipikat', function () {
    var id = $(this).attr('data');
    $.ajax({
        type: "GET",
        url: base_url + "/sertipikat/get_sertipikat",
        dataType: "JSON",
        data: {
            id: id
        },
        success: function (data) {
            $('#edit_sert').modal('show');
            $('[name="id_e"]').val(data.no_reg);
            $('[name="jenis_hak_e"]').val(data.jenis_hak);
            $('[name="nomor_sertipikat_e"]').val(data.no_sertipikat);
            $('[name="kecamatan_e"]').val(data.id_kecamatan);
            var html = '<option value="' + data.id_desa + '">' + data.desa + '</option>';
            $('[name="desa_e"]').html(html);
            $('[name="desa_e"]').val(data.id_desa);
            $('[name="luas_e"]').val(data.luas);
            $('#jenis_berkas_e').val(data.proses);
            $('#jenis_berkas_e').trigger('change');
            $('[name="pemilik_hak_e"]').val(data.pemilik_hak);
            $('[name="penerima_hak_e"]').val(data.pembeli_hak);
            $('[name="keterangan_e"]').val(data.ket);
        },
        error: function (data) {
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
        success: function (data) {
            var html = '<option disabled selected value> -- Desa -- </option>';
            var i;
            for (i = 0; i < data.length; i++) {
                html += '<option value=' + data[i].id + '>' + data[i].nama + '</option>';
            }
            $('#desa_i').html(html);

        },
        error: function () {
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
        success: function (data) {
            var html = '<option disabled selected value> -- Desa -- </option>';
            var i;
            for (i = 0; i < data.length; i++) {
                html += '<option value=' + data[i].id + '>' + data[i].nama + '</option>';
            }
            $('#desa_e').html(html);

        },
        error: function () {
            alert("gagal mengambil data desa");
        }
    });
    return false;
});

$('#reset_form').on('click', function(){
    $('[name="jenis_berkas[]_i"]').val(null).trigger('change');
})

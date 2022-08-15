
data_BPN();
var id_bpn;;
//select2 for proses
$('.select2').select2();
$('.datepicker').datepicker({ dateFormat: 'yy-mm-dd', maxDate: "0d", minDate: new Date(2015, 1 - 1, 1), changeMonth: true, changeYear: true });

$(document).ready(function () {
    var cari = $('#cari_data').attr('data');
    if (cari) {
        $('#tabel-BPN').dataTable().fnFilter(cari);
    }
    setTimeout(function () {
        $('#tabel-BPN').removeAttr('style')
    }, 10);
})

// fungsi tampil proses
function data_BPN() {
    var table = $('#tabel-BPN').dataTable({
        "ajax": {
            "url": base_url + "/bpn/tabel_bpn",
            "type": "post",
            "autoWidth": true,
        },
        // "dom": 'lBfrtip',
        columns: [{
            data: 'no_urut'
        },
        {
            data: 'tgl_masuk'
        },
        // {
        //     data: 'tgl_selesai',
        //     visible: false,
        //     searchable: false
        // },
        {
            data: 'id_berkas'
        },
        {
            data: 'nama_pemohon'
        },
        {
            data: 'nomor'
        },
        {
            data: 'jenis_proses'
        },
        {
            data: 'ket'
        },
        {
            data: 'status',
        },
        {
            data: 'aksi',
            visible: false
        },
        ],
        'columnDefs': [
            {
                "targets": 2,
                "className": "text-center",
            },
            {
                "targets": 3,
                "className": "text-center",
            },
            {
                "targets": 7,
                "className": "text-center",
            },
        ],
    })
    if(user_role != 2){
        $('#tabel-BPN').DataTable().column(8).visible(true);
    }

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
            $('#edit_bpn').modal('show');
            $('[name="no_proses_bpn_e"]').val(data.no_proses_bpn);
            $('[name="tgl_masuk_e"]').val(data.tgl_masuk);
            $('[name="nama_pemohon_e"]').val(data.nama_pemohon);
            $('[name="jenis_proses_e"]').val(data.jenis_proses);
            $('[name="no_bpn_e"]').val(data.no_bpn);
            $('[name="tahun_e"]').val(data.tahun);
            $('[name="no_berkas_e"]').val(data.id_berkas);
            $('[name="ket_e"]').val(data.ket);
        },
        error: function () {
            alert('Gagal mengambil data');
        }
    });
    return false;
});

//fungsi untuk mengbuah status proses BPN menjadi selesai
$('#show_data').on('click', '.status_bpn', function () {
    if (confirm('Pastikan proses telah selesai !!!!')) {
        var id = $(this).attr('data');
        $(this).toggleClass('badge-warning badge-success');
        $(this).html('selesai');
        // console.log(id)
        $.post(base_url + '/bpn/selesai', { id: id },
            function (data) {
                console.log(data)
            }, "json").fail(function () { console.log('gagal') });
    }
});

//membuka modal proses gagal
$('#show_data').on('click', '.btn-gagal', function () {
    id_bpn = $(this).attr('data');
    $('#id_bpn').val(id_bpn);
    $('#modal-gagal').modal('show');
})


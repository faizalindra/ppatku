$(document).ready(function() {
    get_bpn();
    // alert('Selamat Datang');

    function get_bpn() {
        $.ajax({
            type: "GET",
            url: base_url + "/bpn/get_BPN_dashboard",
            dataType: "JSON",
            data: {},
            success: function(data) {
                var html = '';
                var i = 0;
                for (i = 0; i < data.length; i++) {
                    html +=
                        '<div class="col-lg-3">' +
                        bg_est_changer(data[i].estimasi) +
                        '<div class="card-body">' +
                        '<div class="row">' +
                        '<div class="col-md-6 text-left">' + data[i].nama_pemohon +
                        '<div class="text-white-50 small font-weight-bold">' + data[i].no_bpn +
                        '</div>' + '</div>' +
                        '<div class="col-md-6 text-right">' + data[i].jenis_proses +
                        '<div class="text-white-50 font-weight-bold">' +
                        '</div>' + '</div>' + '</div>' +
                        '<p></p>' +
                        '<div class="text-center">' + '<a href="' + base_url + '/berkas/detail/' + "value.id_berkas" + '">' + '<button type="button" class="btn btn-light btn-sm">' + data[i].estimasi + '</button>' + '</a>' +
                        '</div>' + '</div>' + '</div>' + '</div>';
                }
                $('#bpn').html(html);
            },
            error: function(data) {
                alert('Gagal mengambil data');
            }
        });
    }
    //berfungsi untuk mengubah background
    function bg_est_changer(v) {
        if (v >= 1 && v <= 5) {
            return '<div class="card bg-primary font-weight-bold text-white shadow text-decoration-underline">'
        } else if (v == 0) {
            return '<div class="card bg-success font-weight-bold text-white shadow text-decoration-underline">'
        } else if (v < 0 && v >= -5) {
            return '<div class="card bg-danger font-weight-bold text-white shadow text-decoration-underline">'
        } else {
            return '<div class="card bg-secondary font-weight-bold text-white shadow text-decoration-underline">'
        }
    }
})
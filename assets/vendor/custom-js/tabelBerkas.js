data_berkas(); //pemanggilan fungsi tampil barang.
// uji();

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

$('.datepicker').datepicker({
    dateFormat: 'yy-mm-dd'
});
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
                var getUrl = window.location;
                var base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
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
                    '<button href="javascript:;"  class="badge badge-info edit_berkas" data="' + data[i].id_berkas + '"><i class="fa fa-edit" ></i>Edit</button>' +
                    '<button href="javascript:;"  class="badge badge-primary item_detail" data="' + data[i].id_berkas + '"><i class="fa fa-search" ></i> Detail</button>' +
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
$('#show_data').on('click', '.item_detail', function() {
    var id = $(this).attr('data');
    $.ajax({
        method: "GET",
        url: base_url + '/berkas/get_berkas',
        dataType: "JSON",
        data: {
            id: id
        },
        success: function(data) {
            $('#ModalDetail').modal('show');
            var html1 = "";
            html1 += '<tr class="text-capitalize text-center">' +
                '<td id="id_proses_id" data-value="' + data.id_berkas + '">' + data.id_berkas + '</td>' +
                '<td>' + data.tgl_masuk + '</td>' +
                '<td>' + sertipikat(data.jenis_hak, data.no_sertipikat, data.desa) + '</td>' +
                '<td>' + data.kecamatan + '</td>' +
                '<td id="id_jenis_berkas" data-value="' + data.jenis_berkas + '" >' + data.jenis_berkas + '</td>' +
                '<td>' + data.nama_penjual + '</td>' +
                '<td>' + data.nama_pembeli + '</td>' +
                '<td>' + antinull(data.tot_biaya) + '</td>' +
                '</tr>' +
                '<tr>' + '<td> Keterangan &nbsp;' + '</td>' + '<td colspan=9>' + nl2br(data.keterangan) + '</td>' +
                '</td>' + '</tr>' +
                '<tr>' + '<td> Kelengkapan &nbsp;' + '</td>' +
                '<td colspan=2>' + 'Ada' + '</td>' +
                '<td colspan=2>' + 'Belum Ada' + '</td>' +
                '<td colspan=6>' + 'Keterangan' + '</td>' + '</tr>' +
                '</td>' + '</tr>' +
                '<tr>' + '<td colspan="14" id="ujtes"> Proses : ' +
                '</td>' + '<tr >' + '</tr>' + '<div id="tdProses">' + '</div>' + '</tr>';

            $('#data_detail').html(html1);
            testr();
        },
        error: function() {
            alert('Gagal Mengambil detail berkas');
        }
    });
    return false;
});

//untuk membuat list proses
function testr() {
    var id = document.getElementById('id_proses_id').getAttribute('data-value');
    var arrjb = document.getElementById('id_jenis_berkas').getAttribute('data-value');
    var array_jb = [];
    var hasil = arrjb.split(","); //mengubah string menjadi array
    for (i = 0; i < hasil.length; i++) {
        switch (hasil[i]) {
            case "AJB":
                arrayy = ['5', '7', '8', '10', '13'];
                break;
            case "Hibah":
                arrayy = ['5', '7', '8', '10', '13'];
                break;
            case "APHB":
                arrayy = ['5', '7', '8', '10', '13'];
                break;
            case "Pemecahan":
                arrayy = ['5', '9'];
                break;
            case "APHT":
                arrayy = ['5', '6', '16'];
                break;
            case "SKMHT":
                arrayy = ['15'];
                break;
            case "Konversi":
                arrayy = ['1', '10', '11'];
                break;
            case "Ganti Nama":
                arrayy = ['5', '8'];
                break;
            case "Pengeringan":
                arrayy = ['2', '3', '4'];
                break;
            case "Peningkatan Hak":
                arrayy = ['14'];
                break;
            case "Waris":
                arrayy = ['5', '10', '12'];
                break;
            case "Ganti Blangko":
                arrayy = ['1', '20', '17'];
                break;
        }
        //mengabungkan array
        array_jb = array_jb.concat(arrayy);
    }
    //mengurutkan array dari kecil ke besar
    array_jb.sort(function(a, b) {
        return a - b
    });

    //menghapus duplikat value dari array
    var uniq = array_jb.reduce(function(a, b) {
        if (a.indexOf(b) < 0) a.push(b);
        return a;
    }, []);
    $.ajax({
        method: 'GET',
        url: base_url + '/proses/get_proses',
        async: true,
        dataType: 'json',
        data: {
            id: id
        },
        success: function(data) {
            var html = "";
            for (i = 0; i < uniq.length; i++) {
                // summ = summ + i;
                switch (uniq[i]) {
                    case uniq[i] = '1':
                        if (data.ukur == 0 || data.ukur == null) {
                            html += '<a id="id_btn-ukur" class="btn btn-secondary btn-rounded btn-ukur" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="1">Ukur</a>'
                        } else if (data.ukur == 1) {
                            html += '<a id="id_btn-ukur" class="btn btn-warning btn-rounded btn-ukur" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="1">Ukur</a>'
                        } else if (data.ukur == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button">Ukur</a>'
                        };
                        break;
                    case uniq[i] = '2':
                        if (data.pert_teknis == 0 || data.pert_teknis == null) {
                            html += '<a id="id_btn-pert_teknis" class="btn btn-secondary btn-rounded btn-pert_teknis" role="button" href="#" data-id="' + id + '" data-val="1"  data-jp="2">Pertimbangan Teknis </a>';
                        } else if (data.pert_teknis == 1) {
                            html += '<a id="id_btn-pert_teknis" class="btn btn-warning btn-rounded btn-pert_teknis" role="button" href="#" data-id="' + id + '" data-val="2"  data-jp="2">Pertimbangan Teknis </a>';
                        } else if (data.pert_teknis == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button">Pertimbangan Teknis </a>';
                        };
                        break;
                    case uniq[i] = '3':
                        if (data.perijinan == 0 || data.perijinan == null) {
                            html += '<a id="id_btn-perijinan" class="btn btn-secondary btn-rounded btn-perijinan" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="3">Perijinan </a>';
                        } else if (data.perijinan == 1) {
                            html += '<a id="id_btn-perijinan" class="btn btn-warning btn-rounded btn-perijinan" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="3">Perijinan </a>';
                        } else if (data.perijinan == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button">Perijinan </a>';
                        };
                        break;
                    case uniq[i] = '4':
                        if (data.pengeringan == 0 || data.pengeringan == null) {
                            html += '<a id="id_btn-pengeringan" class="btn btn-secondary btn-rounded btn-pengeringan" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="4">Pengeringan </a>';
                        } else if (data.pengeringan == 1) {
                            html += '<a id="id_btn-pengeringan" class="btn btn-warning btn-rounded btn-pengeringan" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="4">Pengeringan </a>';
                        } else if (data.pengeringan == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button">Pengeringan </a>';
                        }
                        break;
                    case uniq[i] = '5':
                        if (data.cek_plot == 0 || data.cek_plot == null) {
                            html += '<a id="id_btn-cek_plot" class="btn btn-secondary btn-rounded btn-cek_plot" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="5">Cek Plot </a>';
                        } else if (data.cek_plot == 1) {
                            html += '<a id="id_btn-cek_plot" class="btn btn-warning btn-rounded btn-cek_plot" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="5">Cek Plot </a>';
                        } else if (data.cek_plot == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button">Cek Plot </a>';
                        };
                        break;
                    case uniq[i] = '6':
                        if (data.cek_sertipikat == 0 || data.cek_sertipikat == null) {
                            html += '<a id="id_btn-cek_sertipikat" class="btn btn-secondary btn-rounded btn-cek_sertipikat" role="button" href="#" data-id="' + id + '" data-val="1"  data-jp="6">Cek Sertipikat </a>';
                        } else if (data.cek_sertipikat == 1) {
                            html += '<a id="id_btn-cek_sertipikat" class="btn btn-warning btn-rounded btn-cek_sertipikat" role="button" href="#" data-id="' + id + '" data-val="2"  data-jp="6">Cek Sertipikat </a>';
                        } else if (data.cek_sertipikat == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button">Cek Sertipikat </a>';
                        };
                        break;
                    case uniq[i] = '7':
                        if (data.roya == 0 || data.roya == null) {
                            html += '<a id="id_btn-roya" class="btn btn-secondary btn-rounded btn-roya" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="7" >Roya </a>';
                        } else if (data.roya == 1) {
                            html += '<a id="id_btn-roya" class="btn btn-warning btn-rounded btn-roya" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="7" >Roya </a>';
                        } else if (data.roya == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button">Roya </a>';
                        };
                        break;
                    case uniq[i] = '8':
                        if (data.ganti_nama == 0 || data.ganti_nama == null) {
                            html += '<a id="id_btn-ganti_nama" class="btn btn-secondary btn-rounded btn-ganti_nama" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="8" >Ganti Nama </a>';
                        } else if (data.ganti_nama == 1) {
                            html += '<a id="id_btn-ganti_nama" class="btn btn-warning btn-rounded btn-ganti_nama" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="8" >Ganti Nama </a>';
                        } else if (data.ganti_nama == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button">Ganti Nama </a>';
                        };
                        break;
                    case uniq[i] = '9':
                        if (data.tapak_kapling == 0 || data.tapak_kapling == null) {
                            html += '<a id="id_btn-tapak_kapling" class="btn btn-secondary btn-rounded btn-tapak_kapling" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="9" >Tapak Kapling </a>';
                        } else if (data.tapak_kapling == 1) {
                            html += '<a id="id_btn-tapak_kapling" class="btn btn-warning btn-rounded btn-tapak_kapling" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="9" >Tapak Kapling </a>';
                        } else if (data.tapak_kapling == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button">Tapak Kapling </a>';
                        };
                        break;
                    case uniq[i] = '10':
                        if (data.bayar_pajak == 0 || data.bayar_pajak == null) {
                            html += '<a id="id_btn-bayar_pajak" class="btn btn-secondary btn-rounded btn-bayar_pajak" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="10" >Validasi Pajak </a>';
                        } else if (data.bayar_pajak == 1) {
                            html += '<a id="id_btn-bayar_pajak" class="btn btn-warning btn-rounded btn-bayar_pajak" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="10" >Validasi Pajak </a>';
                        } else if (data.bayar_pajak == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button">Validasi Pajak</a>';
                        };
                        break;
                    case uniq[i] = '11':
                        if (data.konversi == 0 || data.konversi == null) {
                            html += '<a id="id_btn-konversi" class="btn btn-secondary btn-rounded btn-konversi" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="11" >Konversi </a>';
                        } else if (data.konversi == 1) {
                            html += '<a id="id_btn-konversi" class="btn btn-warning btn-rounded btn-konversi" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="11" >Konversi </a>';
                        } else if (data.konversi == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button">Konversi </a>';
                        };
                        break;
                    case uniq[i] = '12':
                        if (data.waris == 0 || data.waris == null) {
                            html += '<a id="id_btn-waris" class="btn btn-secondary btn-rounded btn-waris" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="12">Waris </a>';
                        } else if (data.waris == 1) {
                            html += '<a id="id_btn-waris" class="btn btn-warning btn-rounded btn-waris" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="12">Wars </a>';
                        } else if (data.waris == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button">Waris </a>';
                        };
                        break;
                    case uniq[i] = '13':
                        if (data.balik_nama == 0 || data.balik_nama == null) {
                            html += '<a id="id_btn-balik_nama" class="btn btn-secondary btn-rounded btn-balik_nama" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="13">Balik Nama </a>';
                        } else if (data.balik_nama == 1) {
                            html += '<a id="id_btn-balik_nama" class="btn btn-warning btn-rounded btn-balik_nama" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="13">Balik Nama </a>';
                        } else if (data.balik_nama == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button">Balik Nama </a>';
                        };
                        break;
                    case uniq[i] = '14':
                        if (data.peningkatan_hak == 0 || data.peningkatan_hak == null) {
                            html += '<a id="id_btn-peningkatan_hak" class="btn btn-secondary btn-rounded btn-peningkatan_hak" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="14">Peningkatan Hak </a>';
                        } else if (data.peningkatan_hak == 1) {
                            html += '<a id="id_btn-peningkatan_hak" class="btn btn-warning btn-rounded btn-peningkatan_hak" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="14">Peningkatan Hak </a>';
                        } else if (data.peningkatan_hak == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button" >Peningkatan Hak </a>';
                        };
                        break;
                    case uniq[i] = '15':
                        if (data.skmht == 0 || data.skmht == null) {
                            html += '<a id="id_btn-skmht" class="btn btn-secondary btn-rounded btn-skmht" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="15">SKMHT </a>';
                        } else if (data.skmht == 1) {
                            html += '<a id="id_btn-skmht" class="btn btn-warning btn-rounded btn-skmht" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="15">SKMHT </a>';
                        } else if (data.skmht == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button">SKMHT </a>';
                        };
                        break;
                    case uniq[i] = '16':
                        if (data.ht == 0 || data.ht == null) {
                            html += '<a id="id_btn-ht" class="btn btn-secondary btn-rounded btn-ht" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="16">HT </a>';
                        } else if (data.ht == 1) {
                            html += '<a id="id_btn-ht" class="btn btn-warning btn-rounded btn-ht" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="16">HT </a>';
                        } else if (data.ht == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button" >HT </a>';
                        };
                        break;
                    case uniq[i] = '17':
                        if (data.kutip_su == 0 || data.kutip_su == null) {
                            html += '<a id="id_btn-kutip_su" class="btn btn-secondary btn-rounded btn-kutip_su" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="19">Kutip SU </a>';
                        } else if (data.kutip_su == 1) {
                            html += '<a id="id_btn-kutip_su" class="btn btn-warning btn-rounded btn-kutip_su" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="19">Kutip SU </a>';
                        } else if (data.kutip_su == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button" >Kutip SU</a>';
                        };
                        break;
                    case uniq[i] = '18':
                        if (data.iph == 0 || data.iph == null) {
                            html += '<a id="id_btn-iph" class="btn btn-secondary btn-rounded btn-iph" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="18">IPH </a>';
                        } else if (data.iph == 1) {
                            html += '<a id="id_btn-iph" class="btn btn-warning btn-rounded btn-iph" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="18">IPH </a>';
                        } else if (data.iph == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button" >IPH </a>';
                        };
                        break;
                    case uniq[i] = '19':
                        if (data.znt == 0 || data.znt == null) {
                            html += '<a id="id_btn-znt" class="btn btn-secondary btn-rounded btn-znt"" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="19">ZNT </a>';
                        } else if (data.znt == 1) {
                            html += '<a id="id_btn-znt" class="btn btn-warning btn-rounded btn-znt"" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="19">ZNT </a>';
                        } else if (data.znt == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button" >ZNT </a>';
                        };
                        break;
                    case uniq[i] = '20':
                        if (data.validasi_sert == 0 || data.validasi_sert == null) {
                            html += '<a id="id_validasi_sert" class="btn btn-secondary btn-rounded btn-validasi_sert"" role="button" href="#" data-id="' + id + '" data-val="1" data-jp="19">Validasi Sertipikat </a>';
                        } else if (data.validasi_sert == 1) {
                            html += '<a id="id_validasi_sert" class="btn btn-warning btn-rounded btn-validasi_sert"" role="button" href="#" data-id="' + id + '" data-val="2" data-jp="19">Validasi Sertipikat </a>';
                        } else if (data.validasi_sert == 2) {
                            html += '<a class="btn btn-success btn-rounded" href="#" role="button" >Validasi Sertipikat </a>';
                        };
                        break;

                }
            }
            $('#ujtes').html(html);

        },
        error: function() {
            alert('Gagal megambil tombol proses');
        }
    });
}


// tombol detail sertipikat
$('#show_data').on('click', '.btn_sertipikat', function() {
    var id = $(this).attr('data');
    // alert(id);
    $.ajax({
        method: "GET",
        url: base_url + '/sertipikat/get_sertipikat',
        dataType: "JSON",
        data: {
            id: id
        },
        success: function(data) {
            $.each(data, function(no_sertipikat, tgl_daftar, jenis_hak, luas, desa, kec, pemilik_hak, pembeli_hak, proses, ket) {
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
            $.each(data, function(id_berkas, reg_sertipikat, desa, kecamatan, jenis_berkas, nama_penjual, nama_pembeli, biaya, dp, tot_biaya, keterangan) {
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

//tombol ukur
$('#ModalDetail').on('click', '.btn-ukur', function() {
    var id = document.getElementById('id_btn-ukur').getAttribute('data-id');
    var val = document.getElementById('id_btn-ukur').getAttribute('data-val');
    var getUrl = window.location;
    var base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/ukur',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol cek plot
$('#ModalDetail').on('click', '.btn-cek_plot', function() {
    var id = document.getElementById('id_btn-cek_plot').getAttribute('data-id');
    var val = document.getElementById('id_btn-cek_plot').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/cek_plot',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol pert_teknis
$('#ModalDetail').on('click', '.btn-pert_teknis', function() {
    var id = document.getElementById('id_btn-pert_teknis').getAttribute('data-id');
    var val = document.getElementById('id_btn-pert_teknis').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/pert_teknis',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol perijinan
$('#ModalDetail').on('click', '.btn-perijinan', function() {
    var id = document.getElementById('id_btn-perijinan').getAttribute('data-id');
    var val = document.getElementById('id_btn-perijinan').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/perijinan',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol pengeringan
$('#ModalDetail').on('click', '.btn-pengeringan', function() {
    var id = document.getElementById('id_btn-pengeringan').getAttribute('data-id');
    var val = document.getElementById('id_btn-pengeringan').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/pengeringan',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol cek_sertipikat
$('#ModalDetail').on('click', '.btn-cek_sertipikat', function() {
    var id = document.getElementById('id_btn-cek_sertipikat').getAttribute('data-id');
    var val = document.getElementById('id_btn-cek_sertipikat').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/cek_sertipikat',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol roya
$('#ModalDetail').on('click', '.btn-roya', function() {
    var id = document.getElementById('id_btn-roya').getAttribute('data-id');
    var val = document.getElementById('id_btn-roya').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/roya',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol ganti_nama
$('#ModalDetail').on('click', '.btn-ganti_nama', function() {
    var id = document.getElementById('id_btn-ganti_nama').getAttribute('data-id');
    var val = document.getElementById('id_btn-ganti_nama').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/ganti_nama',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol tapak_kapling
$('#ModalDetail').on('click', '.btn-tapak_kapling', function() {
    var id = document.getElementById('id_btn-tapak_kapling').getAttribute('data-id');
    var val = document.getElementById('id_btn-tapak_kapling').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/tapak_kapling',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol bayar_pajak
$('#ModalDetail').on('click', '.btn-bayar_pajak', function() {
    var id = document.getElementById('id_btn-bayar_pajak').getAttribute('data-id');
    var val = document.getElementById('id_btn-bayar_pajak').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/bayar_pajak',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol konversi
$('#ModalDetail').on('click', '.btn-konversi', function() {
    var id = document.getElementById('id_btn-konversi').getAttribute('data-id');
    var val = document.getElementById('id_btn-konversi').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/konversi',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol waris
$('#ModalDetail').on('click', '.btn-waris', function() {
    var id = document.getElementById('id_btn-waris').getAttribute('data-id');
    var val = document.getElementById('id_btn-waris').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/waris',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol balik_nama
$('#ModalDetail').on('click', '.btn-balik_nama', function() {
    var id = document.getElementById('id_btn-balik_nama').getAttribute('data-id');
    var val = document.getElementById('id_btn-balik_nama').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/balik_nama',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol peningkatan_hak
$('#ModalDetail').on('click', '.btn-peningkatan_hak', function() {
    var id = document.getElementById('id_btn-peningkatan_hak').getAttribute('data-id');
    var val = document.getElementById('id_btn-peningkatan_hak').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/peningkatan_hak',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol skmht
$('#ModalDetail').on('click', '.btn-skmht', function() {
    var id = document.getElementById('id_btn-skmht').getAttribute('data-id');
    var val = document.getElementById('id_btn-skmht').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/skmht',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol ht
$('#ModalDetail').on('click', '.btn-ht', function() {
    var id = document.getElementById('id_btn-ht').getAttribute('data-id');
    var val = document.getElementById('id_btn-ht').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/ht',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol kutip_su
$('#ModalDetail').on('click', '.btn-kutip_su', function() {
    var id = document.getElementById('id_btn-kutip_su').getAttribute('data-id');
    var val = document.getElementById('id_btn-kutip_su').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/kutip_su',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol iph
$('#ModalDetail').on('click', '.btn-iph', function() {
    var id = document.getElementById('id_btn-iph').getAttribute('data-id');
    var val = document.getElementById('id_btn-iph').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/iph',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol znt
$('#ModalDetail').on('click', '.btn-znt', function() {
    var id = document.getElementById('id_btn-znt').getAttribute('data-id');
    var val = document.getElementById('id_btn-znt').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/znt',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})

//tombol validasi_sert
$('#ModalDetail').on('click', '.btn-validasi_sert', function() {
    var id = document.getElementById('id_validasi_sert').getAttribute('data-id');
    var val = document.getElementById('id_validasi_sert').getAttribute('data-val');
    if (confirm("Lanjutkan Proses?")) {
        $.ajax({
            type: 'post',
            url: base_url + '/proses/validasi_sert',
            dataType: 'JSON',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                testr();
            },
            error: function() {
                alert('Gagal mengambil data proses');
            }
        });
    }
})


// tombol input berkas
// $('#btn_simpan').on('click', function() {
//     var reg_sertipikat = $('#reg_sertipikat').val();
//     var desa = $('#desa').val();
//     var kecamatan = $('#kecamatan').val();
//     var jenis_berkas = $('#jenis_berkas').val();
//     var nama_pembeli = $('#nama_pembeli').val();
//     var nama_penjual = $('#nama_penjual').val();
//     var biaya = $('#biaya').val();
//     var dp = $('#dp').val();
//     var tot_biaya = $('#tot_biaya').val();
//     var keterangan = $('#keterangan').val();
//     // alert(keterangan);
//     $.ajax({
//         type: "POST",
//         url: base_url + "/berkas/simpan_berkas",
//         dataType: "json",
//         data: {
//             reg_sertipikat: reg_sertipikat,
//             desa: desa,
//             kecamatan: kecamatan,
//             jenis_berkas: jenis_berkas,
//             nama_penjual: nama_penjual,
//             nama_pembeli: nama_pembeli,
//             biaya: biaya,
//             dp: dp,
//             tot_biaya: tot_biaya,
//             keterangan:keterangan
//         },
//         success: function(){
//             // $('[name="reg_sertipikat]').val("");
//             // $('[name="desa]').val("");
//             // $('[name="kecamatan]').val("");
//             // $('[name="jenis_berkas]').val("");
//             // $('[name="nama_pembeli]').val("");
//             // $('[name="nama_penjual]').val("");
//             // $('[name="biaya]').val("");
//             // $('[name="dp]').val("");
//             // $('[name="tot_biaya]').val("");
//             // $('[name="keterangan]').val("");
//             $('#formInputBerkas').modal('hide');
//             data_berkas();
//         },
//         error: function(){
//             alert(jenis_berkas);
//         }
//     });
//     return false;
// });
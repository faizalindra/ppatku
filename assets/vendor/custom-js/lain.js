var getUrl = window.location;
const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
const user_role = document.getElementById('roleid').getAttribute('data');
$(document).ready(function () {
    currentTime();
    hari();

    function hari() {
        var tanggallengkap = new String();
        var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
        namahari = namahari.split(" ");
        var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
        namabulan = namabulan.split(" ");
        var tgl = new Date();
        var hari = tgl.getDay();
        var tanggal = tgl.getDate();
        var bulan = tgl.getMonth();
        var tahun = tgl.getFullYear();
        tanggallengkap = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun;
        $('#tanggal').html(tanggallengkap);
    }

    function currentTime() {
        let date = new Date();
        let hh = date.getHours();
        let mm = date.getMinutes();
        let ss = date.getSeconds();
        let session = "AM";


        if (hh > 12) {
            session = "PM";
        }

        hh = (hh < 10) ? "0" + hh : hh;
        mm = (mm < 10) ? "0" + mm : mm;
        ss = (ss < 10) ? "0" + ss : ss;

        let time = hh + ":" + mm + ":" + ss + " " + session;

        $('#clock').html(time);
        var t = setTimeout(function () { currentTime() }, 1000);

    }

    // hover sidebar
    // $('#accordionSidebar').hover(function() {
    //     $('#page-top').removeClass('sidebar-toggled');
    //     $('#accordionSidebar').removeClass('toggled');
    //     console.log('remove');
    // }, function() {
    //     $('#page-top').addClass('sidebar-toggled');
    //     $('#accordionSidebar').addClass('toggled');
    //     console.log('add');
    // });

    // otomatis hilangkan alert
    $(".alert-success").fadeTo(4000, 500).slideUp(500, function () {
        $(".alert-success").slideUp(500);
    });
});

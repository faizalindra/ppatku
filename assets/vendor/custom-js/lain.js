//document ready
$(document).ready(function() {
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
        var t = setTimeout(function() { currentTime() }, 1000);

    }

    // $('#accordionSidebar').hover(function() {
    //     $('#page-top').removeClass('sidebar-toggled');
    //     $('#accordionSidebar').removeClass('toggled');
    //     console.log('remove');
    // }, function() {
    //     $('#page-top').addClass('sidebar-toggled');
    //     $('#accordionSidebar').addClass('toggled');
    //     console.log('add');
    // });

});
// var toggle = false;
// $('#sidebarToggle').on('click', function() {
//     var test = document.getElementById("page-top");
//     var hasil = test.classList.contains('sidebar-toggled');
//     if (hasil == false) {
//         $('#testingcol').attr("aria-toggle", 'collapse');
//         $('#testingcol').attr("data-target", "#collapseUtilities2");
//         $('#testingcol').attr("aria-expanded", true);
//         $('#testingcol').attr("aria-controls", 'collapseUtilities');
//         // $('#collapseUtilities2').show();
//         console.log('elemen berada di sini');
//     } else {
//         // $('#testingcol').hide();
//         $('#testingcol').removeAttr("data-target", "#collapseUtilities2");
//         $('#testingcol').removeAttr("aria-expanded", true);
//         $('#testingcol').removeAttr("aria-toggle", 'collapse');
//         $('#testingcol').removeAttr("aria-controls", 'collapseUtilities');
//         $('#testingcol').attr("href", "<?= base_url('Berkas'); ?>");
//         // $('#collapseUtilities2').hide();
//         console.log('elemen tidak berada di sini');
//     }
// });
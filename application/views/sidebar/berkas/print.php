<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berkas-ID_B<?= $berkas['kode_b'] ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/icon.png') ?>">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:wght@800&display=swap">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .display-3 {
            font-family: 'Rubix', sans-serif;
            font-weight: 800;
        }

        .display-5 {
            font-family: 'Rubix', sans-serif;
            font-weight: 800;
        }

        .display-4 {
            font-family: 'Rubix', sans-serif;
            font-weight: 800;
        }

        h3 {
            font-family: 'Rubix', sans-serif;
            font-weight: 800;
        }

        .pemhak {
            font-family: 'Rubix', sans-serif;
            font-weight: 800;
        }

        h6 {
            font-family: 'Rubix', sans-serif;
            font-weight: 800;
        }

        .nober {
            border-right: 3px solid black;
        }

        .noreg {
            border-right: 3px solid black;
            border-top: 3px solid black;
        }

        .noser {
            border-right: 3px solid black;
            border-top: 3px solid black;
            border-bottom: 3px solid black;
        }

        .jhak {
            border-left: 3px solid black;
            border-bottom: 3px solid black;
        }

        .bb {
            border-bottom: 3px solid black;
        }

        .br {
            border-right: 3px solid black;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="container ">
            <br>
            <div class="col" style="border: 3px solid black; max-width:90%">
                <div class="row pl-3" style="border-bottom: 3px solid black;">
                    <h5 class="m-0"><b><?= $berkas['tgl_masuk'] ?></b></h5>
                </div>
                <div class="row">
                    <div class="col-md-5 nober" style=" min-height:120px">
                        <div class="row">
                            <div class="col-md-12 text-left"><u><b>Nomor Berkas</b></u></div>
                            <div class="col-md-12 text-center display-3 p-0 m-0"><b class="text-muted">B</b><b><?= $berkas['kode_b'] ?></b></div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row pl-3"><b><u>Pihak 1</u></b></div>
                                <div class="row text-center align-items-center justify-content-center">
                                    <h4 class="h-100"><b><?= $berkas['nama_penjual'] ?></b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 noreg" style="min-height:120px">
                        <div class="row">
                            <div class="col-md-12 text-left"><u><b>Registrasi Sertipikat</b></u></div>
                            <div class="col-md-12 text-center display-3 p-0 m-0"><b class="text-muted"><?php if ($berkas['reg_sertipikat']) {
                                                                                                            echo 'S';
                                                                                                            $kode = $berkas['kode_s'];
                                                                                                        } else {
                                                                                                            $kode = '';
                                                                                                        } ?></b><b><?= $kode ?></b></div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row pl-3"><b><u>Pihak 2</u></b></div>
                                <div class="row text-center align-items-center justify-content-center">
                                    <h4 class="h-100"><b><?= $berkas['nama_pembeli'] ?></b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row h-100">
                    <div class="col-md-5 noser" style="min-height:50px">
                        <div class="row">
                            <div class="col-md-12 text-left"><u><b>Proses</b></u></div>
                            <div class="col-md-12 text-center pl-1 pr-0">
                                <h3><?= $berkas['jenis_berkas'] ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7" style="border-top: 3px solid black;border-bottom: 3px solid black;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row pl-3 text-left text-lg align-items-center"><b><?= $berkas['sertipikat2'] ?></b></div>
                                <div class="row pl-3 text-left text-lg align-items-center"><b>Kec. <?= $berkas['kecamatan'] ?></b></div>
                            </div>
                            <div class="col-md-6">
                                <div class="row h-50 pl-3 text-left align-items-center" style="border-left: 2px solid black ;"><b><u>Total Biaya :</u></b>&nbsp;<div class="text-lg"><b>Rp. <?php if ($berkas['biaya'] > 0) {
                                                                                                                                                                                                echo $berkas['biaya'];
                                                                                                                                                                                            } ?></b></div>
                                </div>
                                <div class="row h-50 pl-3 text-left align-items-center" style="border-left: 2px solid black ;"><b><u>DP / Bayar :</u></b>&nbsp;<div class="text-lg"><b>Rp.</b></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 pl-0" style="min-height: 50px;">
                        <div class="row pl-3 ">
                            <div class="col-md-12 text-left"><b><u>Ket :</u></b></div>
                            <div class="col-md-12 text-lg"><?= $berkas['keterangan'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <?php if ($berkas['reg_sertipikat'] != null || $berkas['reg_sertipikat'] != '') { ?>
            <div class="container">
                <div class="col m-2 p-2" style="border: 2px solid black; max-width:40%">
                    <div class="row mb-1">
                        <div class="col-md-9 ml-3">
                            <b>
                                <div class="row">Notaris-PPAT Sugeng Purwito SH MKn</div>
                                <div class="row">JL. Keputihan No.28, Mandiraja Wetan</div>
                            </b>
                        </div>
                        <div class="col-md-2 text-white" style="background-color: black;">
                            <b>
                                <div class="row justify-content-center">No. Reg</div>
                                <div class="row justify-content-center">S<?= $berkas['kode_s'] ?></div>
                            </b>
                        </div>
                    </div>
                    <div class="col" style="border: 4px solid black;">
                        <div class="row" style="border-bottom: 4px solid black;">
                            <div class="col-auto text-white pl-1" style="background-color: black;"><b><span><?= $berkas['jenis_hak2'] ?></span>. <span><?= $berkas['no_sertipikat'] ?></span></b></div>
                            <div class="col-md-8 pl-1"><?= $berkas['desa'] ?>, <?= $berkas['kecamatan'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 d-flex align-items-center text-center justify-content-center" style="border-right: 3px solid black;">
                                <h5><b><?= $berkas['pemilik_hak'] ?></b></h5>
                            </div>
                            <div class="col-md-7 pl-0">
                                <table width="110%" class="p-0 m-0">
                                    <tbody>
                                        <tr class="bb">
                                            <td class="br pl-1" width="80%">Booking NIB</td>
                                            <td></td>
                                        </tr>
                                        <tr class="bb">
                                            <td class="br pl-1" width="80%">Cek</td>
                                            <td></td>
                                        </tr>
                                        <tr class="bb">
                                            <td class="br pl-1" width="80%">Roya</td>
                                            <td></td>
                                        </tr>
                                        <tr class="bb">
                                            <td class="br pl-1" width="80%">AJB/AH/APHT/APHB</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td class="br pl-1" width="80%">Catat Waris</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="min-height: 50px;border-top: 3px solid black">
                                <div class="row pl-1"><u>Catatan: </u></div>
                                <div class="row pl-1"><?= $berkas['ket'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>


    <style>
        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
    <script type="text/javascript" src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
    <script>
        window.print();
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berkas-ID.<?= $berkas['id_berkas']?></title>
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
            border-right: 5px solid black;
        }

        .noreg {
            border-right: 5px solid black;
            border-top: 5px solid black;
        }

        .noser {
            border-right: 5px solid black;
            border-top: 5px solid black;
            border-bottom: 5px solid black;
        }

        .jhak {
            border-left: 5px solid black;
            border-bottom: 5px solid black;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="container ">
            <br>
            <div class="col" style="border: 5px solid black; max-width:90%">
                <div class="row pl-3" style="border-bottom: 5px solid black;">
                    <h5 class="m-0"><b><?= $berkas['tgl_masuk'] ?></b></h5>
                </div>
                <div class="row">
                    <div class="col-md-4 nober" style=" min-height:120px">
                        <div class="row">
                            <div class="col-md-12 text-left"><u><b>Nomor Berkas</b></u></div>
                            <div class="col-md-12 text-center display-3 p-0 m-0"><b class="text-muted">B</b><b><?= $berkas['id_berkas'] ?></b></div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12"><b><u>Pihak 1</u></b></div>
                            <div class="col-md-12 text-center align-items-center">
                                <h4 class="h-100"><b><?= $berkas['nama_penjual'] ?></b></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 noreg" style="min-height:120px">
                        <div class="row">
                            <div class="col-md-12 text-left"><u><b>Registrasi Sertipikat</b></u></div>
                            <div class="col-md-12 text-center display-3"><b class="text-muted"><?php if ($berkas['reg_sertipikat'] != null || $berkas['reg_sertipikat'] != '') {
                                                                                                    echo 'S';
                                                                                                } ?></b><b><?= $berkas['reg_sertipikat'] ?></b></div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12"><b><u>Pihak 2</u></b></div>
                            <div class="col-md-12 text-center align-items-center">
                                <h4 class="h-100"><b><?= $berkas['nama_pembeli'] ?></b></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row h-100">
                    <div class="col-md-4 noser" style="min-height:50px">
                        <div class="row">
                            <div class="col-md-12 text-left"><u><b>Proses</b></u></div>
                            <div class="col-md-12 text-center">
                                <h3><?= $berkas['jenis_berkas'] ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8" style="border-top: 2px solid black;">
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
                    <div class="row">
                        <div class="col-md-12" style="min-height: 50px;">
                            <div class="row pl-3 ">
                                <div class="col-md-12"><b><u>Ket :</u></b></div>
                                <div class="col-md-12 text-lg"><?= $berkas['keterangan'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php $s = 1;
        if ($berkas['reg_sertipikat'] != null || $berkas['reg_sertipikat'] != '') { ?>
                <div class="container ">
                    <br>
                    <div class="col" style="border: 5px solid black; max-width:40%">
                        <div class="row pl-1" style="border-bottom: 5px solid black;">
                            <h5 class="m-0"><b><?= $berkas['tgl_daftar'] ?></b></h5>
                        </div>
                        <div class="row">
                            <div class="col-md-5 nober" style=" min-height:100px">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row text-right justify-content-end">
                                            <div class="col-auto jhak pl-2 pr-2">
                                                <h4 class="m-0"><b>M</b></h4>
                                            </div>
                                        </div>
                                        <div class="row text-center p-0 m-0">
                                            <div class="col-md-12">
                                                <div class="col-md-12 text-center display-5 p-0 m-0">
                                                    <h3 class="mt-2"><b class="text-muted">S</b><b><?= $berkas['reg_sertipikat'] ?></b></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 pl-1">
                                                <h6 class="m-0"><b><?= $berkas['proses'] ?></b></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="row h-50" style="border-bottom: 5px solid black;">
                                    <div class="col-md-12"><b><?= $berkas['sertipikat2'] ?></b></div>
                                    <div class="col-md-12"><b><?= $berkas['kecamatan'] ?></b></div>
                                </div>
                                <div class="row h-50">
                                    <div class="col-md-12 h-100 text-center"><h4 class="h-100"><b class="pemhak"><?= $berkas['pemilik_hak'] ?></b></h4></div>
                                </div>
                            </div>
                        </div>
                        <div class="row h-100">
                            <div class="col-md-12" style="min-height: 50px;border-top: 5px solid black">
                                <div class="row pl-0 ">
                                    <div class="col-md-12 pl-1"><b><u>Keterangan :</u></b></div>
                                    <div class="col-md-12 text-lg"><?= $berkas['ket'] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php } ?>
    </div>
    <script type="text/javascript" src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
    <script>
            window.print();
    </script>
</body>

</html>
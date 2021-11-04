<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login PPATKU</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <!-- <link rel="icon" type="image/png" href="<?= base_url() ?>assets/images/icons/favicon.ico" /> -->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <!--===============================================================================================-->
</head>

<body>
    <!-- <div class="limiter"> -->
        <div class="container-login100" style="background-image: url('<?= base_url() ?>assets/images/bg-01.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
					Account Login
				</span>
                <!-- untuk meload pesan di flashdata -->
                <?= $this->session->flashdata('pesan'); ?>
                <form class="login100-form validate-form p-b-33 p-t-5" method="post" action="<?= base_url('autentifikasi')?>">

                    <!-- //Username -->
                    <div class="wrap-input100 validate-input" >
                    <!-- <div class="form-group"> -->
                        <input class="input100" type="text" name="username" placeholder="Username" value="<?= set_value('username');?>" id="username">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>')?>
                        <!-- <span class="focus-input100" data-placeholder="&#xe82a;"></span> -->
                    </div>

                    <!-- //Password -->
                    <div class="wrap-input100 validate-input" >
                    <!-- <div class="form-group"> -->
                        <input type="password" class="input100" name="password" placeholder="Password" id="password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>')?>
                        <!-- <span class="focus-input100" data-placeholder="&#xe80f;"></span> -->
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <button type="submit" class="login100-form-btn">
							Login
						</button>
                    </div>

                </form>
            </div>
        </div>
    <!-- </div> -->


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>assets/js/main.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
    <script>
      $('.alert-message').alert().delay(3000).slideUp('slow');
    </script>
</html>
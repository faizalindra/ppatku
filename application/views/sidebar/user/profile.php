<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Profile <?= $nama ?></h6>
        <div id="id_user" data="<?= $id ?>"></div>
    </div>
    <div class="card-body">

        <div class="container">
            <div class="row text-center">
                <?php
                if ($role_id == 0) {
                    $role = 'Notaris';
                } else if ($role_id == 1) {
                    $role = 'Admin';
                } else {
                    $role = 'User';
                }

                ?>
                <div class="col-md-4">Username :<h5 class="text-success"><?= $username ?></h5>
                </div>
                <div class="col-md-4">Status :<h5 class="text-success">Aktif</h5>
                </div>
                <div class="col-md-4">Role :<h5 class="text-success"><?= $role ?></h5>
                </div>
            </div>
            <hr>
            <!-- <br> -->
            <div class="row">
                <div class="col md-12">
                    <form onsubmit="return false" method="POST" autocomplete="false">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-address-card"></i>
                                    </div>
                                </div>
                                <input id="username" name="username" type="text" class="form-control" minlength="5">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-key"></i>
                                    </div>
                                </div>
                                <input id="password" name="password" type="password" class="form-control" minlength="5">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_c">Confirm Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fa fa-key"></i>
                                    </div>
                                </div>
                                <input id="password_c" name="password_c" type="password" class="form-control" minlength="5">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="row justify-content-center">
                                    <div class="col-auto border border-dark">
                                        <h1 id="kode_konfirmasi"></h1>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-sync" id="ganti_kode"></i>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-auto"><input id="input_konfirmasi" name="input_konfirmasi" type="text" class="form-control"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-trash fa-small"></i>Batal</button>
                            <button id="simpan_profil" name="submit" type="submit" class="btn btn-primary"><i class="fa fa-save fa-small"></i>Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <script>
            var id;
            $(document).ready(function() {
                random_word();
                id = $('#id_user').attr('data');
                $('#ganti_kode').click(function(e) {
                    random_word();
                });

                function random_word() {
                    var length = 5;
                    var result = '';
                    var characters = 'ABCDEFGHJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789';
                    var charactersLength = characters.length;
                    for (var i = 0; i < length; i++) {
                        result += characters.charAt(Math.floor(Math.random() *
                            charactersLength));
                    }
                    $('#kode_konfirmasi').html(result);
                }
            });

            $('#simpan_profil').on('click', function() {
                var username = $("#username").val();
                var password = $("#password").val();
                var password_c = $("#password_c").val();
                var kode = document.getElementById("kode_konfirmasi").innerHTML;
                var i_kode = $("#input_konfirmasi").val();
                if (password === password_c) {
                    if (kode === i_kode) {
                        $.post(base_url + '/user/update_profile', {
                                id: id,
                                username: username,
                                password: password,
                            },
                            function(data) {
                                alert("Berhasil mengubah data Profile")
                                window.location.reload(true);
                            },
                            'JSON').fail(function() {
                            console.log('gagal');
                        });
                    } else {
                        alert('Kode Tidak Sama')
                    }
                } else {
                    alert("Password tidak sama");
                }
            })
        </script>
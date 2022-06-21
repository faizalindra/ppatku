<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manajemen User</h6>
    </div>
    <div class="card-body">
        <!-- This script got from www.frontendfreecode.com -->
        <button id="btnStart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">Tambah User</button>

        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="formModalLabel">Form Registrasi</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- <?= $this->session->flashdata('pesan'); ?> -->
                    <form id="formAwesome" method="post" action="<?= base_url('user/manajemenUser') ?>">
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-6 col-form-label">
                                    Nama Staff
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Staff" value="<?= set_value('nama'); ?>" pattern="\s*(?:[\w\.]\s*){5,20}$" maxlength="20">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Username
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?= set_value('username'); ?>" minlength="5">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password1" class="col-sm-6 col-form-label">
                                    Password
                                </label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="password1" placeholder="Password" name="password1" minlength="5">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password2" class="col-sm-6 col-form-label">
                                    Password
                                </label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="password2" placeholder="Ulangi Password" name="password2" minlength="5">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                            <?php if ($this->session->userdata('role_id') == 0) {
                                echo '  <div class="form-group row">
                                            <label for="role" class="col-sm-6 col-form-label">
                                                Role
                                            </label>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="role" name="role">
                                                    <option value=1>Admin</option>
                                                    <option value=2>Staff</option>
                                                </select>
                                            </div>
                                        </div>';
                            }; ?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row">
            <div class="col-lg-12">
                <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php } ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Is Active</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $a = 1;
                        foreach ($staff as $b) {
                            if ($this->session->userdata('role_id') == 0) {
                                if ($b['role_id'] != 0) { ?>
                                    <tr>
                                        <th scope="row"><?= $a++; ?></th>
                                        <td><?= $b['nama']; ?></td>
                                        <td><?= $b['username']; ?></td>
                                        <td>
                                            <?php if ($b['role_id'] == 2) {
                                                // echo "Staff";
                                                echo '<a href="#" id="user_role" class="badge badge-info" data="' . $b['id'] . '" data-s="' . $b['role_id'] .  '">Staff</a>';
                                            } else {
                                                echo '<a href="#" id="user_role" class="badge badge-primary" data="' . $b['id'] . '" data-s="' . $b['role_id'] .  '">Notaris</a>';
                                            }
                                            ?></td>
                                        <td>
                                            <?php
                                            if ($b['is_active'] == 1) {
                                                echo '<a href="#" id="status_aktif" class="badge badge-success" data="' . $b['id'] . '" data-s="' . $b['is_active'] . '">Active</a>';
                                            } else {
                                                echo '<a href="#" id="status_aktif" class="badge badge-danger"  data="' . $b['id'] . '" data-s="' . $b['is_active'] . '">Not Active</a>';
                                            }
                                            ?></td>
                                        <td>
                                            <button id="hapus_user" type="button" class="btn btn-sm btn-danger" data="<?= $b['id']; ?>"><i class="fa fa-trash"></i>Hapus</button>
                                        </td>
                                    </tr>
                                <?php }
                            } else if ($this->session->userdata('role_id') == 1) {
                                if ($b['role_id'] == 2) { ?>
                                    <tr>
                                        <th scope="row"><?= $a++; ?></th>
                                        <td><?= $b['nama']; ?></td>
                                        <td><?= $b['username']; ?></td>
                                        <td>Staff</td>
                                        <td>
                                            <?php
                                            if ($b['is_active'] == 1) {
                                                echo '<a href="#" id="status_aktif" class="badge badge-success" data="' . $b['id'] . '" data-s="' . $b['is_active'] . '">Active</a>';
                                            } else {
                                                echo '<a href="#" id="status_aktif" class="badge badge-danger"  data="' . $b['id'] . '" data-s="' . $b['is_active'] . '">Not Active</a>';
                                            }
                                            ?></td>
                                        <td>
                                            <button id="hapus_user" type="button" class="btn btn-sm btn-danger" data="<?= $b['id']; ?>"><i class="fa fa-trash"></i>Hapus</button>
                                        </td>
                                    </tr>
                        <?php }
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>


        <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">

        <!-- Modal Konfirmasi -->
        <div class="modal fade" id="modal_hapus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Cabut</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h1><strong id="kode_konfirmasi"></strong></h1>
                                </div>
                            </div>
                            <form onsubmit="return false" autocomplete="off">
                                <div class="row"><input type="text" class="form-control" name="input_konfirmasi" id="input_konfirmasi" placeholder="Masukan Kode Konfirmasi"></div>
                                <br>
                                <div class="row text-center">
                                    <div class="col-md-12">
                                        <button type="reset" class="btn btn-danger">Reset</button>
                                        <button id="submit_data" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var modal_switch = 0;
            var u_id = 0;
            var s_id = 0;
            $(document).ready(function() {

                // Hapus User
                $('.table').on('click', '#hapus_user', function() {
                    var id = $(this).attr('data');
                    $('#modal_hapus').modal('show');
                    u_id = id;
                    modal_switch = 1;
                    $("#kode_konfirmasi").html(random_word());
                    // console.log('id : ' + id);
                });

                //non-aktifkan/aktifkan user
                $('.table').on('click', '#status_aktif', function() {
                    u_id = $(this).attr('data');
                    s_id = $(this).attr('data-s');
                    $('#modal_hapus').modal('show');
                    modal_switch = 2;
                    $("#kode_konfirmasi").html(random_word());
                });

                //ubah role user
                $('.table').on('click', '#user_role', function() {
                    u_id = $(this).attr('data');
                    r_id = $(this).attr('data-s');
                    $('#modal_hapus').modal('show');
                    modal_switch = 3;
                    $("#kode_konfirmasi").html(random_word());
                });
            });

            $('#submit_data').on('click', function() {
                var kode = document.getElementById("kode_konfirmasi").innerHTML;
                var i_kode = $("#input_konfirmasi").val();
                if (kode === i_kode) {
                    if (modal_switch === 1) {
                        var url_ = '/user/hapusUser';
                    } else if (modal_switch === 2) {
                        var url_ = '/user/active_deactive';
                    } else {
                        var url_ = '/user/ubah_role';
                    }
                    $.post(base_url + url_, {
                            id: u_id,
                            kode: kode,
                            status: s_id,
                            role: r_id
                        },
                        function(data) {
                            window.location.reload(true);
                        },
                        'JSON').fail(function() {
                        console.log('gagal');
                    });
                } else {
                    alert('Kode Tidak Sama')
                }
            })

            function random_word() {
                var length = 5;
                var result = '';
                var characters = 'ABCDEFGHJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789';
                var charactersLength = characters.length;
                for (var i = 0; i < length; i++) {
                    result += characters.charAt(Math.floor(Math.random() *
                        charactersLength));
                }
                return result;
            }
        </script>
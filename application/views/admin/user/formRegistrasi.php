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
                                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Staff" value="<?= set_value('nama'); ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Username
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?= set_value('username'); ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password1" class="col-sm-6 col-form-label">
                                    Password
                                </label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="password1" placeholder="Password" name="password1">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password2" class="col-sm-6 col-form-label">
                                    Password
                                </label>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="password2" placeholder="Ulangi Password" name="password2">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="awesomeness" class="col-sm-6 col-form-label">
                                    Is this an awesome form?
                                </label>
                                <div class="col-sm-6">
                                    <select class="form-control" id="awesomeness">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                            </div> -->
                            <!-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="awesomeCheck" required>
                                <label class="form-check-label" for="awesomeCheck">
                                    I confirm that I am an awesome person.
                                </label>
                            </div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
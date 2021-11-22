<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manajemen Berkas</h6>
    </div>
    <div class="card-body">


        <!-- This script got from www.frontendfreecode.com -->
        <button id="btnStart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">Input Berkas</button>

        <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="formModalLabel">Form Input</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- <?= $this->session->flashdata('pesan'); ?> -->
                    <form id="formAwesome" method="post" action="<?= base_url('berkas') ?>">
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Nomor Registrasi Sertipikat
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="reg_sertipikat" class="form-control" id="reg_sertipikat" placeholder="Nomor Registrasi Sertipikat" value="<?= set_value('reg_sertipikat'); ?>">
                                    <!-- <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Desa
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="desa" class="form-control" id="desa" placeholder="Desa" value="<?= set_value('desa'); ?>" required>
                                    <!-- <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Kecamatan
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="kecamatan" class="form-control" id="kecamatan" placeholder="Kecamatan" value="<?= set_value('kecamatan'); ?>" required>
                                    <!-- <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Jenis Berkas
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="jenis_berkas" class="form-control" id="jenis_berkas" placeholder="Jenis Berkas" value="<?= set_value('jenis_berkas'); ?>" required>
                                    <!-- <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Nama Penjual
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="nama_penjual" class="form-control" id="nama_penjual" placeholder="Nama Penjual" value="<?= set_value('nama_penjual'); ?>" required>
                                    <!-- <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Nama Pembeli
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="nama_pembeli" class="form-control" id="nama_pembeli" placeholder="Nama Pembeli" value="<?= set_value('nama_pembeli'); ?>">
                                    <!-- <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Biaya
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="biaya" class="form-control" id="biaya" placeholder="Biaya" value="<?= set_value('Biaya'); ?>">
                                    <!-- <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    dp
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="dp" class="form-control" id="dp" placeholder="DP" value="<?= set_value('DP'); ?>">
                                    <!-- <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Total Biaya
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="tot_biaya" class="form-control" id="tot_biaya" placeholder="Total Biaya" value="<?= set_value('tot_biaya'); ?>">
                                    <!-- <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?> -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="col-sm-6 col-form-label">
                                    Keterangan
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan" value="<?= set_value('keterangan'); ?>">
                                    <!-- <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?> -->
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
        <!-- <?= $this->session->flashdata('pesan'); ?> -->
        <div class="row">
            <div class="col-lg-12">
                <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php } ?>
                <!-- <?= $this->session->flashdata('pesan'); ?> -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Reg Sertipikat</th>
                            <th scope="col">Desa</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Jenis Berkas</th>
                            <th scope="col">Status Proses</th>
                            <th scope="col">Nama Penjual</th>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">Biaya</th>
                            <th scope="col">DP</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Berkas Selesai</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $a = 1;
                        foreach ($berkas as $b) { ?>
                            <tr>
                                <th scope="row"><?= $a++; ?></th>
                                <td><?= $b['tgl_masuk']; ?></td>
                                <td><?php
                                    if ($b['reg_sertipikat'] == 0) {
                                        echo " ";
                                    } else {
                                        $b['reg_sertipikat'];
                                    } ?></td>
                                <td><?= $b['desa']; ?></td>
                                <td><?= $b['kecamatan']; ?></td>
                                <td><?= $b['jenis_berkas']; ?></td>
                                <td><?= $b['id_proses']; ?></td>
                                <td><?= $b['status_proses']; ?></td>
                                <td><?= $b['nama_penjual']; ?></td>
                                <td><?= $b['nama_pembeli']; ?></td>
                                <td><?= $b['biaya']; ?></td>
                                <td><?= $b['dp']; ?></td>
                                <td><?= $b['tot_biaya']; ?></td>
                                <td><?= $b['keterangan']; ?></td>
                                <td><?= $b['berkas_selesai']; ?></td>
                                <td>
                                    <!-- <a href="<?= base_url('buku/ubahBuku/') . $b['id']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a> -->
                                    <!-- <a href="<?= base_url('user/hapusUser/') . $b['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $b['username']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a> -->
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
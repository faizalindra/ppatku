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
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Role</th>
                                <th scope="col">Is Active</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $a = 1;
                            foreach ($staff as $b) { ?>
                                <tr>
                                    <th scope="row"><?= $a++; ?></th>
                                    <td><?= $b['nama']; ?></td>
                                    <td><?= $b['username']; ?></td>
                                    <td><?= $b['role_id']; ?></td>
                                    <td><?= $b['is_active']; ?></td>
                                    <td>
                                        <!-- <a href="<?= base_url('buku/ubahBuku/') . $b['id']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a> -->
                                        <a href="<?= base_url('user/hapusUser/') . $b['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $b['username']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
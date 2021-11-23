<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manajemen Berkas</h6>
    </div>
    <div class="card-body">
        <!-- <?= $this->session->flashdata('pesan'); ?> -->
        <div class="row">
            <div class="col-lg-12">
                <!-- <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php } ?>
                <?= $this->session->flashdata('pesan'); ?> -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Reg Sertipikat</th>
                            <th scope="col">Desa</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Jenis Berkas</th>
                            <th scope="col">Id Proses</th>
                            <th scope="col">Status Proses</th>
                            <th scope="col">Nama Penjual</th>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">Biaya</th>
                            <th scope="col">DP</th>
                            <th scope="col">Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $a = 1;
                        foreach ($berkas as $b) {
                            $a+1;
                            if ($b['berkas_selesai'] == 0) { ?>
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
                                    <td>Rp. <?= $b['biaya']; ?></td>
                                    <td>Rp. <?= $b['dp']; ?></td>
                                    <td>Rp. <?= $b['tot_biaya']; ?></td>
                                    <td>
                                        <!-- <a href="<?= base_url('buku/ubahBuku/') . $b['id']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a> -->
                                        <!-- <a href="<?= base_url('user/hapusUser/') . $b['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $b['username']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a> -->
                                    </td>
                                </tr>
                            <?php }  else {}?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
<div class="modal fade" id="centralModalSm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel"><?= $b['reg_sertipikat'] ?></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Nomor Registrasi</th>
                            <th scope="col">Nomor Sertipikat</th>
                            <th scope="col">Kecamatan</th>
                            <th scope="col">Luas m<sup>2</sup></th>
                            <th scope="col">Atas Nama</th>
                            <th scope="col">Penerima Hak</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $a = 1;
                        foreach ($berkas as $b) { ?>
                            <tr class="text-capitalize text-center">
                                <td><?= $b['tgl_masuk']; ?></td>
                                <td><?= $b['no_reg']; ?></td>
                                <td><?= $b['jenis_hak']; ?>. <?= $b['no_sertipikat']; ?>/<?= $b['desa']; ?></td>
                                <td><?= $b['kecamatan']; ?></td>
                                <td><?= $b['luas']; ?> m<sup>2</sup>/td>
                                <td><?= $b['pemilik_hak']; ?></td>
                                <td><?= $b['pembeli_hak']; ?></td>
                                <td><?= $b['keterangan']; ?></td>
                                <td class="text-left"><?= $b['nama_pembeli']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
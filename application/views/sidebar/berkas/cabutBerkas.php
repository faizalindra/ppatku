<div class="container-fluid">
    <div class="row">
        <div class="input-group">
            <select name="select_cabut" class="custom-select" id="select_cabut">
                <option disabled selected value> -- > Pilih No. Berkas < -- </option>
                        <?php foreach ($berkas as $row) :
                            echo $row;
                        endforeach; ?>
            </select>
            <div class="input-group-append">
                <button class="input-group-text">Cabut</button>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 pr-3">
            <div class="row">
                <div class="col-md-12 p-1">
                    <!-- <div class=" p-2 mb-2 bg-white rounded"> -->
                    <div class="card border-dark">
                        <div class="card-header p-1" style="background-color:#9efff4;">
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <h6><strong>
                                            <div id="tgl_masuk_berkas_"></div>
                                        </strong></h6>
                                </div>
                                <div class="col-md-6 text-right">
                                    <h6><strong>
                                            <div id="jenis_berkas_"></div>
                                        </strong></h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-1">
                            <div class="row text-left ml-0">
                                <div class="col-md-12 text-muted">
                                    <div id="col_sertipikat"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 text-center p-2">
                                    <div class="card-title">Pihak 1</div>
                                    <h5 class="card-text" id="pihak_1"></h5>
                                </div>

                                <div class="col-md-6 text-center p-2">
                                    <div class="card-title">Pihak 2</div>
                                    <h5 class="card-text" id="pihak_2"></h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted" id="ket_berkas">
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 p-1">
                    <!-- <div class=" p-2 mb-2 bg-white rounded"> -->
                    <div class="card border-dark">
                        <div class="card-header p-1" style="background-color:#9efff4;">
                            <h6>Kelengkapan</h6>
                        </div>
                        <div class="card-body p-1 text-left">
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <ul id="kelengkapan_ada">
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <ul id="kelengkapan_belum_ada">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-0">
                                <div class="col-md-12 pl-3">
                                    <p id="ket_keleng" class="text-muted"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 p-1">
                    <div class="card border-dark">
                        <div class="card-header p-1" style="background-color:#9efff4;">
                            <h6>Proses</h6>
                        </div>
                        <div class="card-body p-1">
                            <div id="proses_"></div>
                            <div class="row pl-3 pt-1">
                                <div class="col-md-11 p-0">
                                    <p id="ket_proses" class="text-muted"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 p-1">
            <div class="card border-dark" style=" min-height: 555px;">
                <div class="card-header p-1" style="background-color:#9efff4;">
                    <h6>Proses BPN</h6>
                </div>
                <div class="card-body p-1">
                    <div id="bpn_">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 p-1">
            <div class="card border-dark" style=" min-height: 555px;">
                <div class="card-header p-1" style="background-color:#9efff4;">
                    <div class="row">
                        <div class="col-md-12 text-left text-muted" style="font-size: 12px;">
                            Total Biaya
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h5 id="total_biaya_"></h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row" id="row_biaya">
                    </div>
                </div>
                <div class="card-footer p-1" id="footer_biaya">
                    <div class="row">
                        <div id="ket_bayar_" class="col-md-12 text-left" style="font-size: 12px;"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h4 class="" id="status_bayar"></h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12 text-center">
            <button id="cabut_berkas_" href="#" class="btn btn-danger">
                <p><i class="fa fa-unlink"></i> Cabut Berkas</p>
            </button>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal_cabut" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                                <button id="submit_cabut" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url('assets/vendor/custom-js/cabutBerkas.js') ?>"></script>
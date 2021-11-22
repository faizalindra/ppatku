<div class="container px-5 my-5">
    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
        <div class="mb-3">
            <label class="form-label d-block">Jenis Hak</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="hakMilik" type="radio" name="jenisHak" data-sb-validations="required" />
                <label class="form-check-label" for="hakMilik">Hak Milik</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="hakGunaBangunan" type="radio" name="jenisHak" data-sb-validations="required" />
                <label class="form-check-label" for="hakGunaBangunan">Hak Guna Bangunan</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="" type="radio" name="jenisHak" data-sb-validations="required" />
                <label class="form-check-label" for=""></label>
            </div>
            <div class="invalid-feedback" data-sb-feedback="jenisHak:required">One option is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="nomorHak" type="text" placeholder="Nomor Hak" data-sb-validations="required" />
            <label for="nomorHak">Nomor Hak</label>
            <div class="invalid-feedback" data-sb-feedback="nomorHak:required">Nomor Hak is required.</div>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="kecamatan" aria-label="Kecamatan">
                <option value="Mandiraja">Mandiraja</option>
                <option value="Purwanegara">Purwanegara</option>
                <option value="Bawang">Bawang</option>
            </select>
            <label for="kecamatan">Kecamatan</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="desa" aria-label="Desa">
                <option value="Mandiraja Wetan">Mandiraja Wetan</option>
                <option value="Somawangi">Somawangi</option>
                <option value="Banjengan">Banjengan</option>
            </select>
            <label for="desa">Desa</label>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="luasM2" type="text" placeholder="Luas m2" data-sb-validations="required" />
            <label for="luasM2">Luas m2</label>
            <div class="invalid-feedback" data-sb-feedback="luasM2:required">Luas m2 is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="pemilikHak" type="text" placeholder="Pemilik Hak" data-sb-validations="required" />
            <label for="pemilikHak">Pemilik Hak</label>
            <div class="invalid-feedback" data-sb-feedback="pemilikHak:required">Pemilik Hak is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="penerimaHak" type="text" placeholder="Penerima Hak" data-sb-validations="required" />
            <label for="penerimaHak">Penerima Hak</label>
            <div class="invalid-feedback" data-sb-feedback="penerimaHak:required">Penerima Hak is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control datepicker" id="tanggalMasuk" type="text" placeholder="Tanggal Masuk" data-sb-validations="required" />
            <label for="tanggalMasuk">Tanggal Masuk</label>
            <div class="invalid-feedback" data-sb-feedback="tanggalMasuk:required">Tanggal Masuk is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Proses</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="ajb" type="checkbox" name="proses" data-sb-validations="required" />
                <label class="form-check-label" for="ajb">AJB</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="apht" type="checkbox" name="proses" data-sb-validations="required" />
                <label class="form-check-label" for="apht">APHT</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" id="hIbah" type="checkbox" name="proses" data-sb-validations="required" />
                <label class="form-check-label" for="hIbah">HIbah</label>
            </div>
            <div class="invalid-feedback" data-sb-feedback="proses:required">One option is required.</div>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" id="keterangan" type="text" placeholder="Keterangan" style="height: 10rem;" data-sb-validations="required"></textarea>
            <label for="keterangan">Keterangan</label>
            <div class="invalid-feedback" data-sb-feedback="keterangan:required">Keterangan is required.</div>
        </div>
        <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
                <div class="fw-bolder">Form submission successful!</div>
                <p>To activate this form, sign up at</p>
                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
            </div>
        </div>
        <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button>
        </div>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
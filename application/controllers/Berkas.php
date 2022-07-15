<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berkas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        // $this->load->library('form_validation');
        $this->load->model('ModelBerkas');
    }

    public function index()
    {

        $data['max_berkas'] = $this->ModelBerkas->get_last_id();
        $data['b'] = $this->ModelBerkas->record_b();
        $data['sertipikat'] = $this->ModelSertipikat->get_sert_for_select();
        $data['kecamatan'] = $this->ModelWilayah->get_kecamatan()->result();
        $data['judul'] = "Daftar Berkas";
        $this->load->view('templates/header', $data);
        if ($this->session->userdata('role_id') == 2) { //notaris
            $this->load->view('sidebar/berkas/tabelBerkas_staff', $data);
        } else {
            $this->load->view('sidebar/berkas/tabelBerkas', $data);
        }
        $this->load->view('templates/footer');
    }

    function tabel_berkas()
    {
        $data['data'] = $this->ModelBerkas->tabel_berkas();
        echo json_encode($data);
    }

    function get_berkas()
    {
        $id = $this->input->get('id');
        $data = $this->ModelBerkas->get_berkas($id);
        echo json_encode($data);
    }

    function update_berkas()
    {
        $id = $this->input->post('id_e');
        if ($this->input->post('penjual_e') != null) {
            $data['nama_penjual'] = $this->input->post('penjual_e', true);
        }
        if ($this->input->post('pembeli_e') != null) {
            $data['nama_pembeli'] = $this->input->post('pembeli_e', true);
        }
        if ($this->input->post('tot_biaya_e') != null) {
            $data['tot_biaya'] = $this->input->post('tot_biaya_e', true);
        }
        if ($this->input->post('keterangan_e') != null) {
            $data['keterangan'] = $this->input->post('keterangan_e', true);
        }
        if ($this->input->post('desa_e') != null) {
            $data['alamat'] = $this->input->post('desa_e', true);
        }
        if ($this->input->post('jenis_berkas[]_e') != null) {
            $data['jenis_berkas'] = implode(",", $this->input->post('jenis_berkas[]_e', true));
        }
        if ($this->input->post('sertipikat_e') != null) {
            $data['reg_sertipikat'] = $this->input->post('sertipikat_e', true);
            $no_reg['no_reg'] = $this->input->post('sertipikat_e');
            $sert['is_used'] = "1";
            $id_berkas = $this->input->post('id_e');
            $this->ModelSertipikat->update_sertipikat($sert, $no_reg, $id_berkas);
        }
        $this->ModelBerkas->update_berkas($data, $id);
        $this->session->set_flashdata('success', '  <div class="alert alert-success alert-dismissible fade show" role="alert">
        Berkas Berhasil di Update
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('berkas');
    }


    function simpanBer()
    {
        //berkas
        $data = array(
            'alamat' => $this->input->post('desa'),
            'jenis_berkas' => implode(",", $this->input->post('jenis_berkas')),
            'nama_penjual' => $this->input->post('penjual'),
            'tot_biaya' => $this->input->post('tot_biaya'),
            'keterangan' => $this->input->post('keterangan'),
        );
        if (!empty($this->input->post('pembeli'))) {
            $data['nama_pembeli'] = $this->input->post('pembeli');
        }
        if (!empty($this->input->post('sertipikat'))) {
            $data['reg_sertipikat'] = $this->input->post('sertipikat');
            $no_reg['no_reg'] = $this->input->post('sertipikat');
            $sert['is_used'] = "1";
            $this->ModelSertipikat->update_sertipikat($sert, $no_reg);
        }
        if (!empty($this->input->post('tgl_masuk'))) {
            $data['tgl_masuk'] = $this->input->post('tgl_masuk');
        }
        if (!empty($this->input->post('no_berkas'))) {
            $data['id'] = $this->input->post('no_berkas');
            $print_berkas = $this->input->post('no_berkas');
        } else {
            $print_berkas = $this->ModelBerkas->get_last_id();
        }



        //kelengkapan
        if (!empty($this->input->post('ktp_penjual'))) {
            $data_k['ktp_penjual'] = 1;
        }
        if (!empty($this->input->post('ktp_is_penjual'))) {
            $data_k['ktp_p_penjual'] = 1;
        }
        if (!empty($this->input->post('kk_penjual'))) {
            $data_k['kk_penjual'] = 1;
        }
        if (!empty($this->input->post('ktp_pembeli'))) {
            $data_k['ktp_pembeli'] = 1;
        }
        if (!empty($this->input->post('ktp_is_pembeli'))) {
            $data_k['ktp_p_pembeli'] = 1;
        }
        if (!empty($this->input->post('kk_pembeli'))) {
            $data_k['kk_pembeli'] = 1;
        }
        if (!empty($this->input->post('bpjs'))) {
            $data_k['bpjs'] = 1;
        }
        if (!empty($this->input->post('ktp_ahli_waris'))) {
            $data_k['ktp_ahli_waris'] = 1;
        }
        if (!empty($this->input->post('kk_ahli_waris'))) {
            $data_k['kk_ahli_waris'] = 1;
        }
        if (!empty($this->input->post('akta_kematian'))) {
            $data_k['akta_kematian'] = 1;
        }
        if (!empty($this->input->post('shm'))) {
            $data_k['shm'] = 1;
        }
        if (!empty($this->input->post('sppt'))) {
            $data_k['sppt'] = 1;
        }
        if (!empty($this->input->post('order_'))) {
            $data_k['order_'] = 1;
        }
        if (!empty($this->input->post('imb'))) {
            $data_k['imb'] = 1;
        }
        if (!empty($this->input->post('ket_beda_nama'))) {
            $data_k['ket_beda_nama'] = 1;
        }
        if (!empty($this->input->post('persetujuan_hibah'))) {
            $data_k['persetujuan_hibah'] = 1;
        }
        if (!empty($this->input->post('spk'))) {
            $data_k['spk'] = 1;
        }
        if (!empty($this->input->post('ket_kelengkapan'))) {
            $data_k['ket_kelengkapan'] = $this->input->post('ket_kelengkapan');
        }


        if (!empty($data_k)) {
            $this->ModelBerkas->insert_berkas_kelengkapan($data, $data_k);
            $this->session->set_flashdata('print_berkas', $print_berkas);
            echo json_encode($data);
            echo json_encode($data_k);
        } else {
            $this->ModelBerkas->simpanBerkas($data);
            $this->session->set_flashdata('print_berkas', $print_berkas);
            echo json_encode($data);
        }
        $this->session->set_flashdata('success', '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        Berkas Berhasil Ditambahkan
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
        redirect('berkas');
    }

    function cabut_berkas()
    {
        $b = array('berkas_selesai' => 0);
        $data['berkas'] = $this->ModelBerkas->get_berkas_for_select($b);
        $judul['judul'] = "Cabut Berkas";
        $this->load->view('templates/header', $judul);
        $this->load->view('sidebar/berkas/cabutBerkas', $data);
        $this->load->view('templates/footer');
    }

    function get_sert_for_auto()
    {
        $id = $this->input->post('id');
        $sert = $this->ModelSertipikat->get_sert_for_auto($id);
        echo json_encode($sert);
    }

    function print_berkas()
    {
        // sleep(3);
        $id = $this->uri->segment(3);
        if ($id == null) {
            $id = $this->ModelBerkas->get_last_id();
            $data['berkas'] = $this->ModelBerkas->get_berkas($id);
            $this->load->view('sidebar/berkas/print', $data);
        } else {
            $data['berkas'] = $this->ModelBerkas->get_berkas($id);
            $this->load->view('sidebar/berkas/print', $data);
        }
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertipikat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('ModelSertipikat');
    }

    public function index()
    {
        $data['a'] = $this->ModelSertipikat->s_terdaftar();
        $data['max_sertipikat'] = $this->ModelSertipikat->get_last_id();
        $data['kecamatan'] = $this->ModelWilayah->get_kecamatan()->result();
        $data['judul'] = "Daftar Sertipikat";
        $this->load->view('templates/header', $data);
        $this->load->view('sidebar/sertipikat/tabelSertipikat', $data);
        $this->load->view('templates/footer');
    }

    public function get_sertipikat()
    {
        $id = $this->input->get('id');
        $data = $this->ModelSertipikat->get_sertipikat($id);
        echo json_encode($data);
    }

    public function tabel_sertipikat()
    {
        $data = $this->ModelSertipikat->tabel_sertipikat();
        echo json_encode($data);
    }

    public function inputSertipikat()
    {
        $data = [
            'jenis_hak' => $this->input->post('jenis_hak_i', true),
            'no_sertipikat' => $this->input->post('nomor_sertipikat_i', true),
            'dsa' => $this->input->post('desa_i', true),
            'luas' => $this->input->post('luas_i', true),
            'pemilik_hak' => $this->input->post('pemilik_hak_i', true),
            'proses' => implode(",", $this->input->post('jenis_berkas[]_i', true)),
            'ket' => $this->input->post('keterangan_i', true),
        ];
        if (!empty($this->input->post('id_i', true))) {
            $data['no_reg'] = $this->input->post('id_i', true);
        }
        if (!empty($this->input->post('penerima_hak_i', true))) {
            $data['pembeli_hak'] = $this->input->post('penerima_hak_i', true);
        }
        if (!empty($this->input->post('tgl_masuk_i', true))) {
            $data['tgl_daftar'] = $this->input->post('tgl_masuk_i', true);
        }
        echo json_encode($data);
        $this->ModelSertipikat->simpanSertipikat($data);
        $this->session->set_flashdata('success', '  <div class="alert alert-success alert-dismissible fade show" role="alert">
        Sertipikat Berhasil Ditambahkan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sertipikat');
    }

    public function update_sertipikat()
    {
        $no_reg = array('no_reg' => $this->input->post('id_e', true));
        $data = array(
            'jenis_hak' => $this->input->post('jenis_hak_e', true),
            'no_sertipikat' => $this->input->post('nomor_sertipikat_e', true),
            'luas' => $this->input->post('luas_e', true),
            'pemilik_hak' => $this->input->post('pemilik_hak_e', true),
            'pembeli_hak' => $this->input->post('penerima_hak_e', true),
        );
        if ($this->input->post('keterangan_e', true) != null) {
            $data['ket'] = $this->input->post('keterangan_e', true);
        }
        if ($this->input->post('jenis_berkas[]_e', true) != null) {
            $data['proses'] = implode(",", $this->input->post('jenis_berkas[]_e', true));
        }
        if ($this->input->post('desa_e', true) != null) {
            $data['dsa'] = $this->input->post('desa_e', true);
        }
        $this->ModelSertipikat->update_sertipikat($data, $no_reg);
        $this->session->set_flashdata('success', '  <div class="alert alert-success alert-dismissible fade show" role="alert">
        Sertipikat Berhasil Di Edit
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('sertipikat');
        echo json_encode($data);
        echo json_encode($no_reg);
    }
}

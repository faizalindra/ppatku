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
        $data['kecamatan'] = $this->ModelWilayah->get_kecamatan()->result();
        $data['sertipikat'] = $this->ModelSertipikat->cekSertipikat()->result_array();
        $data['judul'] = "Daftar Sertipikat";
        $this->load->view('templates/header', $data);
        //jika role_id = 0 (notaris), jika role_id = 1 (admin), jika role_id = 2 (staff)
        if ($this->session->userdata('role_id') == 0) {
            $this->load->view('templates/sidebarNotaris');
            $this->load->view('templates/topbar');
            $this->load->view('sidebar/sertipikat/tabelSertipikat', $data);
        } elseif ($this->session->userdata('role_id') == 1) {
            $this->load->view('templates/sidebarAdmin');
            $this->load->view('templates/topbar');
            $this->load->view('sidebar/sertipikat/tabelSertipikat', $data);
        } elseif ($this->session->userdata('role_id') == 2) {
            $this->load->view('templates/sidebarStaff');
            $this->load->view('templates/topbar');
            $this->load->view('sidebar/sertipikat/tabelSertipikat_staff', $data);
        }

        $this->load->view('templates/footer');
    }

    public function get_sertipikat()
    {
        $id = $this->input->get('id');
        $data = $this->ModelSertipikat->get_sertipikat($id);
        echo json_encode($data);
    }

    public function data_sertipikat()
    {
        $data = $this->ModelSertipikat->sertipikat_list();
        echo json_encode($data);
    }

    public function inputSertipikat()
    {
        $proses = $this->input->post('proses', true);
        $prosess = implode(",", $proses); //mengubah array menjadi string
        $data = [
            'jenis_hak' => $this->input->post('jenis_hak', true),
            'no_sertipikat' => $this->input->post('no_sertipikat', true),
            'kec' => $this->input->post('kec', true),
            'dsa' => $this->input->post('dsa', true),
            'luas' => $this->input->post('luas', true),
            'pemilik_hak' => $this->input->post('pemilik_hak', true),
            'pembeli_hak' => $this->input->post('pembeli_hak', true),
            'proses' => $prosess,
            'ket' => $this->input->post('ket', true),
        ];
        $this->ModelSertipikat->simpanSertipikat($data);
        redirect('sertipikat');
    }

    public function update_sertipikat()
    {
        $no_reg = array('no_reg' => $this->input->post('no_reg_e', true));
        $data = array(
            'jenis_hak' => $this->input->post('jenis_hak_e', true),
            'no_sertipikat' => $this->input->post('no_sertipikat_e', true),
            'kec' => $this->input->post('kec_e', true),
            'dsa' => $this->input->post('dsa_e', true),
            'luas' => $this->input->post('luas_e', true),
            'pemilik_hak' => $this->input->post('pemilik_hak_e', true),
            'pembeli_hak' => $this->input->post('pembeli_hak_e', true),
            'ket' => $this->input->post('ket_e', true),
        );
        if ($this->input->post('proses', true) != null) {
            $data['proses'] = implode(",", $this->input->post('proses[]', true));
        }
        $this->ModelSertipikat->update_sertipikat($data, $no_reg);
        redirect('sertipikat');
    }
}

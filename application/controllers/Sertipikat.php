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

        $data['kecamatan'] = $this->ModelWilayah->get_kecamatan()->result();
        $data['sertipikat'] = $this->ModelSertipikat->cekSertipikat()->result_array();
        $data['judul'] = "Daftar Sertipikat";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin');
        $this->load->view('templates/topbar');
        $this->load->view('sidebar/sertipikat/tabelSertipikat', $data);
        $this->load->view('templates/footer');
    }

    public function uji()
    {
        $id = $this->input->get('id');
        $data = $this->ModelSertipikat->get_sertipikat($id);
        echo json_encode($data);
    }

    public function uji1()
    {
        $data = $this->ModelSertipikat->cekSertipikat()->result_array();
        echo json_encode($data);
    }


    function data_sertipikat()
    {
        $data = $this->ModelSertipikat->sertipikat_list();
        echo json_encode($data);
    }

    function inputSertipikat(){
        $data = [
            'jenis_hak' => $this->input->post('jenis_hak', true),
            'no_sertipikat' => $this->input->post('no_sertipikat', true),
            'kec' => $this->input->post('kec', true),
            'dsa' => $this->input->post('dsa', true),
            'luas' => $this->input->post('luas', true),
            'pemilik_hak' => $this->input->post('pemilik_hak', true),
            'pembeli_hak' => $this->input->post('pembeli_hak', true),
            'proses' => $this->input->post('proses', true),
            'ket' => $this->input->post('ket', true),
        ];
        $this->ModelSertipikat->simpanSertipikat($data);
        redirect('sertipikat');
    }
}

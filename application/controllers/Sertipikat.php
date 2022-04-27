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
}

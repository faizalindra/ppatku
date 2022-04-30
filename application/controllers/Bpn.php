<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bpn extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        // // $this->load->library('form_validation');
        // $this->load->model('ModelBpn');
    }

    public function index(){
        $data['judul'] = "Daftar Proses BPN";
        $data['sertipikat'] = $this->ModelBpn->get_prosesBPN();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin');
        $this->load->view('templates/topbar');
        $this->load->view('sidebar/BPN/tabelBPN');
        $this->load->view('templates/footer');
    }

    public function get_prosesBPN(){
        $data = $this->ModelBpn->get_prosesBPN();
        echo json_encode($data);
    }

    public function inputBPN(){
        $data = array(
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'no_bpn' => $this->input->post('no_bpn'),
            'ket' => $this->input->post('ket')
        );
        $data = $this->ModelBpn->inputBPN($data);
        echo json_encode($data);
    }
}
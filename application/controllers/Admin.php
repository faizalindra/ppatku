<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        if ($this->session->userdata('role_id') != 1) {
            //jika bukan admin arahkan ke autentifikasi/acc_block
            redirect('autentifikasi/acc_block');
        }
    }

    public function index()
    {
        $data = array(
            'ba' => $this->ModelTest->b_terdaftar(),
            'bb' => $this->ModelTest->b_proses(),
            'bc' =>  $this->ModelTest->b_selesai(),
            'bd' => $this->ModelTest->b_dicabut(),
            'sa' => $this->ModelSertipikat->cekSertipikat()->num_rows(),
            'bpn_a' => $this->ModelBpn->bpn_terdaftar(),
            'bpn_b' => $this->ModelBpn->bpn_proses(),
        );
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['berkas'] = $this->ModelBerkas->getBerkasUnfinish();
        $data['judul'] = "Dashboard";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin');
        $this->load->view('templates/topbar');
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
    }
}
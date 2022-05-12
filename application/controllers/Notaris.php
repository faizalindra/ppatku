<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notaris extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        if ($this->session->userdata('role_id') != 0) {
            //jika bukan notaris arahkan ke autentifikasi/acc_block (blocked)
            redirect('autentifikasi/acc_block');
        }
    }

    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['berkas'] = $this->ModelBerkas->getBerkasUnfinish();
        $data['judul'] = "Dashboard";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarNotaris');
        $this->load->view('templates/topbar');
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
    }
}
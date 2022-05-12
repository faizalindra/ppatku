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
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['berkas'] = $this->ModelBerkas->getBerkasUnfinish();
        // $data['berkas2'] = $this->ModelBerkas->getBerkasQuery()->result_array();
        $data['judul'] = "Dashboard";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin');
        $this->load->view('templates/topbar');
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
    }
    // public function manajemenUser(){
    //     $data['staff'] = $this->db->get('user')->result_array();
    //     $this->load->view('templates/header');
    //     $this->load->view('templates/sidebar');
    //     $this->load->view('templates/topbar');
    //     // $this->load->view('admin/user/formRegistrasi');
    //     $this->load->view('admin/user/manajemenUser', $data);
    //     $this->load->view('templates/footer');
    // }
}
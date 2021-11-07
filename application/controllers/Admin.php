<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     cek_login();
    // }

    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer');
    }

    public function manajemenUser(){
        $data['staff'] = $this->db->get('user')->result_array();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/topbar');
        // $this->load->view('admin/user/formRegistrasi');
        $this->load->view('admin/user/manajemenUser', $data);
        $this->load->view('admin/footer');
    }
}
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
        $this->load->view('admin/index');
    }
}
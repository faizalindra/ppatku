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
            'b' => $this->ModelBerkas->record_b(),
            's' => $this->ModelSertipikat->s_terdaftar(),
            'bb' => $this->ModelBpn->record_bpn(),
        );
        $uid = array(
            'user_id_catatan' => $this->session->userdata('id'),
        );
        $data['catatan'] = $this->ModelCatatan->catatan($uid);
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['berkas'] = $this->ModelBerkas->getBerkasUnfinish();
        $data['judul'] = "Dashboard";
        $this->load->view('templates/header', $data);
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
    }
}
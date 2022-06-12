<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        if ($this->session->userdata('role_id') != 2) {
            //jika bukan staff arahkan ke autentifikasi/acc_block
            redirect('autentifikasi/acc_block');
        }
    }

    public function index()
    {
        $data = array(
            'ba' => $this->ModelBerkas->b_terdaftar(),
            'bb' => $this->ModelBerkas->b_proses(),
            'bc' =>  $this->ModelBerkas->b_selesai(),
            'bd' => $this->ModelBerkas->b_dicabut(),
            'sa' => $this->ModelSertipikat->s_terdaftar(),
            'bpn_a' => $this->ModelBpn->bpn_terdaftar(),
            'bpn_b' => $this->ModelBpn->bpn_proses(),
        );
        $uid = array(
            'user_id_catatan' => $this->session->userdata('id'),
        );
        $data['catatan'] = $this->ModelCatatan->catatan($uid);
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['berkas'] = $this->ModelBerkas->getBerkasUnfinish();
        $data['judul'] = "Dashboard";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
    }
}
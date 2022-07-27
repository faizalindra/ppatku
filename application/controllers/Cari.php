<?php

class Cari extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $cari = $this->input->post('cari');
        $data = $this->input->post('pilih_cari');
        $this->session->set_flashdata('cari_data', $cari);
        if ($data == 'b') {
            redirect('berkas');
        } else if ($data == 's') {
            redirect('sertipikat');
        } else if ($data == 'p') {
            redirect('bpn');
        } else {
            $error['heading'] = '<div class="alert alert-danger" role="alert">404 Error</div>';
            $error['message'] = '<div class="alert alert-danger" role="alert">Format pencarian salah!!</div>';
            $this->load->view('errors/html/error_404', $error);
        }


    }
    public function cari_berkas()
    {
        $data = $this->uri->segment(3);
        $this->session->set_flashdata('cari_data', $data);
        redirect('berkas');
        echo json_encode($data);
    }
}

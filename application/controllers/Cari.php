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
        $data = $this->input->post('cari');
        $data = preg_split('/(?<=[bBsSuUpP]{1})(?=[\w\D]+$)/i', $data);
        // echo json_encode($data);
        if (!empty($data[1])) {
            $this->session->set_flashdata('cari_data', $data[1]);
            if ($data[0] == 'b') {
                redirect('berkas');
            } else if ($data[0] == 's') {
                redirect('sertipikat');
            } else if ($data[0] == 'p') {
                redirect('bpn');
            } else {
                $error['heading'] = '<div class="alert alert-danger" role="alert">404 Error</div>';
                $error['message'] = '<div class="alert alert-danger" role="alert">Format pencarian salah!!</div>';
                $this->load->view('errors/html/error_404', $error);
            }
        } else {
            $error['heading'] = '<h1 class="alert alert-danger" role="alert">404 Error</h1>';
            $error['message'] = '<h2 class="code" role="massage">Format pencarian salah!!</h2>';
            $this->load->view('errors/html/error_404', $error);
        }

    }
}

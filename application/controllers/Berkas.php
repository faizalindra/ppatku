<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berkas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('ModelBerkas');
    }

    // public function index()
    // {
    //     $data['berkas'] = $this->ModelBerkas->getBerkas()->result_array();
    //     // $data['berkas'] = $this->ModelBerkas->cekBerkas()->row_array();
    //     $this->load->view('admin/header');
    //     $this->load->view('admin/sidebar');
    //     $this->load->view('admin/topbar');
    //     $this->load->view('admin/berkas/tabelBerkas', $data);
    //     $this->load->view('admin/footer');
    // }

    public function index()
    {
        $data['berkas'] = $this->ModelBerkas->getBerkas()->result_array();

        $this->form_validation->set_rules('jenis_berkas', 'Jenis Berkas', 'required|trim|', [
            'required' => 'Jenis Berkas Belum diisi!!',
        ]);
        $this->form_validation->set_rules('nama_penjual', 'Nama Penjual', 'required|trim|', [
            'required' => 'Nama Penjual Belum diisi!!',
        ]);
        $this->form_validation->set_rules('nama_pembeli', 'Nama Pembeli', 'required|trim|', [
            'required' => 'Nama Pembeli Belum diisi!!',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar');
            $this->load->view('admin/berkas/tabelBerkas', $data);
            $this->load->view('admin/footer');
        } else {
            // $username = $this->input->post('username', true);
            $data1 = [
                'tgl_masuk' => time($this->input->post('tgl_masuk', true)),
                'reg_sertipikat' => $this->input->post('reg_sertipikat', true),
                'desa' => $this->input->post('desa', true),
                'kecamatan' => $this->input->post('kecamatan', true),
                'jenis_berkas' => $this->input->post('jenis_berkas', true),
                'status_proses' => $this->input->post('status_proses', true),
                'nama_penjual' => $this->input->post('nama_penjual', true),
                'nama_pembeli' => $this->input->post('nama_pembeli', true),
                'biaya' => $this->input->post('biaya', true),
                'dp' => $this->input->post('dp', true),
                'tot_biaya' => $this->input->post('tot_biaya', true),
                'keterangan' => $this->input->post('keterangan', true),
                'berkas_selesai' => 0
            ];

            $this->ModelUser->simpanBerkas($data1); //menggunakan model

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
            redirect('user/manajemenUser');
        }
    }
}

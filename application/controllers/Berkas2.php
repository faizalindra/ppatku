<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berkas2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->library('form_validation');
        $this->load->model('ModelBerkas2');
    }

    public function berkasProses()
    {
        $data['berkas'] = $this->ModelBerkas->getBerkas()->result_array();
        $data['judul'] = "Daftar Berkas Dalam Proses";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin');
        $this->load->view('templates/topbar');
        $this->load->view('sidebar/berkas/berkasProses', $data);
        $this->load->view('templates/footer');
    }

    public function berkasSelesai()
    {
        $data['berkas'] = $this->ModelBerkas->getBerkas()->result_array();
        $data['judul'] = "Daftar Berkas Selesai";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin');
        $this->load->view('templates/topbar');
        $this->load->view('sidebar/berkas/berkasSelesai', $data);
        $this->load->view('templates/footer');
    }

	function data_berkas(){
		$data=$this->ModelBerkas2->getBerkasLeft();
		echo json_encode($data);
	}

    function get_berkas_C(){
		$noreg=$this->input->get('id');
		$data=$this->ModelBerkas2->cek_berkas($noreg);
		echo json_encode($data);
    }

    public function index()
    {
        $data['berkas'] = $this->ModelBerkas->getBerkasLeft();
        $data2['judul'] = "Daftar Berkas";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarAdmin');
        $this->load->view('templates/topbar');
        $this->load->view('sidebar/berkas/tabelBerkas', $data);
        $this->load->view('templates/footer');
        $data1 = [
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

        $this->ModelBerkas->simpanBerkas($data1); //menggunakan model

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
        redirect('admin/berkas/tabelBerkas');
    }
}

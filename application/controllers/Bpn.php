<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bpn extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

    }

    public function index()
    {
        $data = array(
            'a' => $this->ModelBpn->bpn_terdaftar(),
            'b' => $this->ModelBpn->bpn_proses(),
        );
        $data['judul'] = "Daftar Proses BPN";
        $data['sertipikat'] = $this->ModelBpn->get_prosesBPN();
        $this->load->view('templates/header', $data);
        //jika role_id = 0 (notaris), jika role_id = 1 (admin), jika role_id = 2 (staff)
        if ($this->session->userdata('role_id') == 0) {
            $this->load->view('templates/sidebarNotaris');
            $this->load->view('templates/topbar');
            $this->load->view('sidebar/bpn/tabelBpn', $data);
        } elseif ($this->session->userdata('role_id') == 1) {
            $this->load->view('templates/sidebarAdmin');
            $this->load->view('templates/topbar');
            $this->load->view('sidebar/bpn/tabelBpn', $data);
        } elseif ($this->session->userdata('role_id') == 2) {
            $this->load->view('templates/sidebarStaff');
            $this->load->view('templates/topbar');
            $this->load->view('sidebar/bpn/tabelBpn_staff', $data);
        }
        $this->load->view('templates/footer');
    }

    public function get_prosesBPN()
    {
        $data = $this->ModelBpn->get_prosesBPN();
        echo json_encode($data);
        return $data;
    }


    public function inputBPN()
    {

        //mengumpulkan data yang akan dimasukkan ke database
        $data = array(
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'jenis_proses' => $this->input->post('jenis_proses'),
            'no_bpn' => $this->input->post('nomor_bpn'),
            'ket' => $this->input->post('ket')
        );
        //jika tgl_masuk tidak kosong maka akan diisi dengan tanggal yang diinputkan
        if ($this->input->post('tgl_masuk') != null) {
            $data['tgl_masuk'] = $this->input->post('tgl_masuk');
        }

        //post data ke modelBPN
        $this->ModelBpn->inputBPN($data);
        echo json_encode($data);
        redirect('bpn');
    }

    public function selesai()
    {
        $id = $this->uri->segment(3);
        // echo $id;
        // $data = array('status' => 1);
        $this->ModelBpn->selesai($id);
        redirect('bpn');
    }
}

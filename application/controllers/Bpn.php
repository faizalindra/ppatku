<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bpn extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        // // $this->load->library('form_validation');
        // $this->load->model('ModelBpn');
    }

    public function index()
    {
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

    public function get_BPN_dashboard()
    {
        $data = $this->ModelBpn->get_prosesBPN();
        foreach ($data as $key => $value) {
            $d1 = strtotime($value['estimasi']);
            $est = ceil(($d1 - time()) / 60 / 60 / 24);
            $est = $est - 1;
            $value['estimasi'] = $est;
            if ($est <= '2') {
                if ($est >= '-7') {
                    $data2[] = $value;
                }
            }
        }
        echo json_encode($data2);
    }

    public function inputBPN()
    {

        //mengecek nama proses lalu menentukan estimasi waktu berdasarkan nama proses
        $jp =  $this->input->post('jenis_proses');
        if ($this->input->post('tgl_masuk') == null) {
            $tgl = date('Y-m-d');
        } else {
            $tgl = $this->input->post('tgl_masuk');
        }

        switch ($jp) {
            case 'Peningkatan Hak':
                $est = date('Y-m-d', strtotime($tgl . '+ 3 days'));
                break;
            case 'Pengecekan':
                $est = date('Y-m-d', strtotime($tgl . '+ 3 days'));
                break;
            case 'Pemberian Hak Tanggungan':
                $est = date('Y-m-d', strtotime($tgl . '+ 30 days'));
                break;
            case 'Roya':
                $est = date('Y-m-d', strtotime($tgl . '+ 7 days'));
                break;
            case 'Cek Plot':
                $est = date('Y-m-d', strtotime($tgl . '+ 7 days'));
                break;
            case 'Pengalihan Hak':
                $est = date('Y-m-d', strtotime($tgl . '+ 6 months'));
                break;
        }

        //mengumpulkan data yang akan dimasukkan ke database
        $data = array(
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'jenis_proses' => $jp,
            'estimasi' => $est,
            'no_bpn' => $this->input->post('nomor_bpn'),
            'ket' => $this->input->post('ket')
        );

        //jika tgl masuk kosong maka akan mengambil tanggal sekarang
        if ($this->input->post('tgl_masuk') == null) {
            $data = $this->ModelBpn->inputBPN($data);
            echo json_encode($data);


            //jika tgl_masuk tidak kosong maka akan mengambil tanggal yang diinputkan
        } else {
            $tgl = ['tgl_masuk' => $this->input->post('tgl_masuk')];
            $data_tgl = array_merge($data, $tgl);
            $this->ModelBpn->inputBPN($data_tgl);
            echo json_encode($data_tgl);
        }
        echo json_encode($tgl);
        redirect('bpn');
    }
}

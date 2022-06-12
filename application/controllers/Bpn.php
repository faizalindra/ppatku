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
        $data['berkas'] = $this->ModelBerkas->get_berkas_for_select();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        if ($this->session->userdata('role_id') == 2) {
            $this->load->view('sidebar/bpn/tabelBpn_staff', $data);
        } else {
            $this->load->view('sidebar/bpn/tabelBpn', $data);
        }
        $this->load->view('templates/footer');
    }

    //untuk tabel bpn
    public function get_prosesBPN()
    {
        $data = $this->ModelBpn->get_prosesBPN();
        echo json_encode($data);
        return $data;
    }

    //untuk form edit bpn
    function get_bpn()
    {
        $id = array('no_proses_bpn' => $this->input->get('no_proses_bpn'));
        $data = $this->ModelBpn->get_bpn($id);
        echo json_encode($data);
    }

    function get_bpn_for_detail()
    {
        $id = array('id_berkas' => $this->input->get('id'));
        $data = $this->ModelBpn->get_bpn_for_detail($id);
        echo json_encode($data);
    }

    //untuk form edit bpn
    public function update_bpn()
    {
        $id = array('no_proses_bpn' => $this->input->post('no_proses_bpn_e'));
        $data = array(
            'nama_pemohon' => $this->input->post('nama_pemohon_e'),
            'no_bpn' => $this->input->post('no_bpn_e'),
            'tahun' => $this->input->post('tahun_e'),
            'jenis_proses' => $this->input->post('jenis_proses_e'),
            'ket' => $this->input->post('ket_e'),
        );
        if (!empty($this->input->post('tgl_masuk_e'))) {
            $data['tgl_masuk'] = $this->input->post('tgl_masuk_e');
        }
        $this->ModelBpn->update_bpn($data, $id);
        redirect('bpn');
        // echo json_encode($data);
        // echo json_encode($id);
    }

    public function inputBPN()
    {

        //mengumpulkan data yang akan dimasukkan ke database
        $data = array(
            'id_berkas' => $this->input->post('no_berkas_i'),
            'nama_pemohon' => $this->input->post('nama_pemohon_i'),
            'jenis_proses' => $this->input->post('jenis_proses_i'),
            'no_bpn' => $this->input->post('no_bpn_i'),
            'tahun' => $this->input->post('tahun_i'),
            'ket' => $this->input->post('ket_i')
        );
        //jika tgl_masuk tidak kosong maka akan diisi dengan tanggal yang diinputkan
        if ($this->input->post('tgl_masuk_i') != null) {
            $data['tgl_masuk'] = $this->input->post('tgl_masuk_i');
        }

        //post data ke modelBPN
        $this->ModelBpn->inputBPN($data);
        echo json_encode($data);
        redirect('bpn');
    }


    //untuk badge status proses bpn
    public function selesai()
    {
        $id = $this->uri->segment(3);
        $this->ModelBpn->selesai($id);
        redirect('bpn');
    }
}

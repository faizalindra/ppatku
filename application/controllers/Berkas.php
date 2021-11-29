<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berkas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->library('form_validation');
        $this->load->model('ModelBerkas');
    }

    public function berkasProses()
    {
        $data['berkas'] = $this->ModelBerkas->berkas_list();
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

    function data_berkas()
    {
        $data = $this->ModelBerkas->berkas_list();
        echo json_encode($data);
    }

    function get_berkas()
    {
        $id = $this->input->get('id');
        $data = $this->ModelBerkas->get_berkas($id);
        echo json_encode($data);
    }

    // function simpan_berkas()
    // {
    //     $id = $this->input->post('id');
    //     $tgl = $this->input->post('tanggal_masuk');
    //     $reg = $this->input->post('reg_sertipikat');
    //     $desa = $this->input->post('desa');
    //     $kec = $this->input->post('kecamatan');
    //     $jenis = $this->input->post('jenis_berkas');
    //     $status = $this->input->post('status_proses');
    //     $napen = $this->input->post('nama_penjual');
    //     $napem = $this->input->post('nama_pembeli');
    //     $biaya = $this->input->post('biaya');
    //     $dp = $this->input->post('dp');
    //     $tot_biaya = $this->input->post('tot_biaya');
    //     $ket = $this->input->post('keterangan');
    //     $berkas_s = $this->input->post('berkas_selesai');
    //     $data = $this->ModelBerkas->simpan_berkas($id, $tgl, $reg, $kec, $desa, $jenis, $status, $napen, $napem, $biaya, $dp, $tot_biaya, $ket, $berkas_s);
    //     echo json_encode($data);
    // }

    // function simpan_berkas2()
    // {
    //     $reg = $this->input->post('reg_sertipikat');
    //     $desa = $this->input->post('desa');
    //     $kec = $this->input->post('kecamatan');
    //     $jenis = $this->input->post('jenis_berkas');
    //     $napen = $this->input->post('nama_penjual');
    //     $napem = $this->input->post('nama_pembeli');
    //     $biaya = $this->input->post('biaya');
    //     $dp = $this->input->post('dp');
    //     $tot_biaya = $this->input->post('tot_biaya');
    //     $ket = $this->input->post('keterangan');
    //     $data = $this->ModelBerkas->simpan_berkas2($reg, $kec, $desa, $jenis, $napen, $napem, $biaya, $dp, $tot_biaya, $ket);
    //     echo json_encode($data);
    // }

    function update_berkas()
    {
        $id = $this->input->post('id');
        $tgl = $this->input->post('tanggal_masuk');
        $reg = $this->input->post('reg_sertipikat');
        $desa = $this->input->post('desa');
        $kec = $this->input->post('kecamatan');
        $jenis = $this->input->post('jenis_berkas');
        $status = $this->input->post('status_proses');
        $napen = $this->input->post('nama_penjual');
        $napem = $this->input->post('nama_pembeli');
        $biaya = $this->input->post('biaya');
        $dp = $this->input->post('dp');
        $tot_biaya = $this->input->post('tot_biaya');
        $berkas_s = $this->input->post('berkas_selesai');
        $data = $this->ModelBerkas->update_berkas($id, $tgl, $reg, $kec, $desa, $jenis, $status, $napen, $napem, $biaya, $dp, $tot_biaya, $berkas_s);
        echo json_encode($data);
    }

    function hapus_berkas()
    {
        $id = $this->input->post('kode');
        $data = $this->ModelBerkas->hapus_berkas($id);
        echo json_encode($data);
    }

    function simpanBer()
    {
        $jb = $this->input->post('jenis_berkas', true);
        $jbs = implode(",",$jb);
        $data = [
            // 'tgl_masuk' => $this->input->post('tgl_masuk', true),
            'reg_sertipikat' => $this->input->post('reg_sertipikat', true),
            'desa' => $this->input->post('desa', true),
            'kecamatan' => $this->input->post('kecamatan', true),
            'jenis_berkas' => $jbs,
            'status_proses' => $this->input->post('status_proses', true),
            'nama_penjual' => $this->input->post('nama_penjual', true),
            'nama_pembeli' => $this->input->post('nama_pembeli', true),
            'biaya' => $this->input->post('biaya', true),
            'dp' => $this->input->post('dp', true),
            'tot_biaya' => $this->input->post('tot_biaya', true),
            'keterangan' => $this->input->post('keterangan', true),
            'berkas_selesai' => 0
        ];

        $this->ModelBerkas->simpanBerkas($data); //menggunakan model
        redirect('berkas');

    }

    public function index()
    {
        $data['berkas'] = $this->ModelBerkas->getBerkasLeft();

        $this->form_validation->set_rules('jenis_berkas', 'Jenis Berkas', 'required', [
            'required' => 'Jenis Berkas Belum diisi!!',
        ]);
        $this->form_validation->set_rules('nama_penjual', 'Nama Penjual', 'required', [
            'required' => 'Nama Penjual Belum diisi!!',
        ]);
        // $this->form_validation->set_rules('nama_pembeli', 'Nama Pembeli', 'required|trim|', [
        //     'required' => 'Nama Pembeli Belum diisi!!',
        // ]);
        if ($this->form_validation->run() == false) {
            $data['judul'] = "Daftar Berkas";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarAdmin');
            $this->load->view('templates/topbar');
            $this->load->view('sidebar/berkas/tabelBerkas', $data);
            $this->load->view('templates/footer');
        } else {
            // $username = $this->input->post('username', true);
            // $jb = [$this->input->post('jenis_berkas', true)];

            $data1 = [
                // 'tgl_masuk' => $this->input->post('tgl_masuk', true),
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
            // echo json_encode($data1);
            redirect('berkas');
        }
    }
}

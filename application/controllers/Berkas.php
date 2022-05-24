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

    function data_berkas()
    {
        $data = $this->ModelBerkas->data_berkas();
        echo json_encode($data);
    }

    function get_berkas()
    {
        $id = $this->input->get('id');
        $data = $this->ModelBerkas->get_berkas($id);
        echo json_encode($data);
    }

    function update_berkas()
    {
        $id = $this->input->post('id_e');
        if ($this->input->post('penjual_e') != null) {
            $data['nama_penjual'] = $this->input->post('penjual_e', true);
        }
        if ($this->input->post('pembeli_e') != null) {
            $data['nama_pembeli'] = $this->input->post('pembeli_e', true);
        }
        if ($this->input->post('tot_biaya_e') != null) {
            $data['tot_biaya'] = $this->input->post('tot_biaya_e', true);
        }
        if ($this->input->post('keterangan_e') != null) {
            $data['keterangan'] = $this->input->post('keterangan_e', true);
        }
        if ($this->input->post('desa_e') != null) {
            $data['desa'] = $this->input->post('desa_e', true);
        }
        if ($this->input->post('jenis_berkas') != null) {
            $data['jenis_berkas'] = implode(",", $this->input->post('jenis_berkas', true));
        }
        if ($this->input->post('reg_sertipikat') != null) {
            $data['reg_sertipikat'] = $this->input->post('reg_sertipikat', true);
        }
        $this->ModelBerkas->update_berkas($data, $id);
        // echo json_encode($data);
        // echo json_encode($id);
        redirect('berkas');
    }


    function simpanBer()
    {
        //berkas
        $data = array(
            'alamat' => $this->input->post('desa'),
            'jenis_berkas' => implode(",", $this->input->post('jenis_berkas')),
            'nama_penjual' => $this->input->post('penjual'),
            'tot_biaya' => $this->input->post('tot_biaya'),
            'keterangan' => $this->input->post('keterangan'),
        );
        if (!empty($this->input->post('pembeli'))) {
            $data['nama_pembeli'] = $this->input->post('pembeli');
        }
        if (!empty($this->input->post('sertipikat'))) {
            $data['reg_sertipikat'] = $this->input->post('sertipikat');
        }
        if (!empty($this->input->post('tgl_masuk'))) {
            $data['tgl_masuk'] = $this->input->post('tgl_masuk');
        }



        //kelengkapan
        if (!empty($this->input->post('ktp_penjual'))) {
            $data_k['ktp_penjual'] = 1;
        }
        if (!empty($this->input->post('ktp_is_penjual'))) {
            $data_k['ktp_pasangan_penjual'] = 1;
        }
        if (!empty($this->input->post('kk_penjual'))) {
            $data_k['kk_penjual'] = 1;
        }
        if (!empty($this->input->post('ktp_pembeli'))) {
            $data_k['ktp_pembeli'] = 1;
        }
        if (!empty($this->input->post('ktp_is_pembeli'))) {
            $data_k['ktp_pasangan_pembeli'] = 1;
        }
        if (!empty($this->input->post('kk_pembeli'))) {
            $data_k['kk_pembeli'] = 1;
        }
        if (!empty($this->input->post('bpjs'))) {
            $data_k['bpjs'] = 1;
        }
        if (!empty($this->input->post('ktp_ahli_waris'))) {
            $data_k['ktp_ahli_waris'] = 1;
        }
        if (!empty($this->input->post('kk_ahli_waris'))) {
            $data_k['kk_ahli_waris'] = 1;
        }
        if (!empty($this->input->post('akta_kematian'))) {
            $data_k['akta_kematian'] = 1;
        }
        if (!empty($this->input->post('shm'))) {
            $data_k['shm'] = 1;
        }
        if (!empty($this->input->post('sppt'))) {
            $data_k['sppt'] = 1;
        }
        if (!empty($this->input->post('order_'))) {
            $data_k['order_'] = 1;
        }
        if (!empty($this->input->post('imb'))) {
            $data_k['imb'] = 1;
        }
        if (!empty($this->input->post('ket_beda_nama'))) {
            $data_k['ket_beda_nama'] = 1;
        }
        if (!empty($this->input->post('persetujuan_hibah'))) {
            $data_k['persetujuan_hibah'] = 1;
        }
        if (!empty($this->input->post('ket_kelengkapan'))) {
            $data_k['ket_kelengkapan'] = $this->input->post('ket_kelengkapan');
        }

        if (!empty($data_k)) {
            $this->ModelBerkas->insert_berkas_kelengkapan($data, $data_k);
            echo json_encode($data);
            echo json_encode($data_k);
        } else {
            $this->ModelBerkas->simpanBerkas($data);
            echo json_encode($data);
        }
        redirect('berkas');
    }

    public function index()
    {
        $data = array(
            'a' => $this->ModelBerkas->b_terdaftar(),
            'b' => $this->ModelBerkas->b_proses(),
            'c' =>  $this->ModelBerkas->b_selesai(),
            'd' => $this->ModelBerkas->b_dicabut(),
        );
        // $data['berkas'] = $this->ModelBerkas->getBerkasLeft();
        $data['sertipikat'] = $this->ModelSertipikat->get_sert_for_select();
        $data['kecamatan'] = $this->ModelWilayah->get_kecamatan()->result();

        $this->form_validation->set_rules('jenis_berkas', 'Jenis Berkas', 'required', [
            'required' => 'Jenis Berkas Belum diisi!!',
        ]);
        $this->form_validation->set_rules('nama_penjual', 'Nama Penjual', 'required', [
            'required' => 'Nama Penjual Belum diisi!!',
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = "Daftar Berkas";
            $this->load->view('templates/header', $data);
            if ($this->session->userdata('role_id') == 0) { //notaris
                $this->load->view('templates/sidebarNotaris', $data);
                $this->load->view('templates/topbar');
                $this->load->view('sidebar/berkas/tabelBerkas', $data);
                $this->load->view('templates/footer');
            } else if ($this->session->userdata('role_id') == 1) { //admin
                $this->load->view('templates/sidebarAdmin', $data);
                $this->load->view('templates/topbar');
                $this->load->view('sidebar/berkas/tabelBerkas', $data);
                $this->load->view('templates/footer');
            } else { //staff
                $this->load->view('templates/sidebarAdmin');
                $this->load->view('templates/topbar');
                $this->load->view('sidebar/berkas/tabelBerkas_staff', $data);
                $this->load->view('templates/footer');
            }
        } else {
            // $username = $this->input->post('username', true);
            // $jb = [$this->input->post('jenis_berkas', true)];

            $data1 = [
                // 'tgl_masuk' => $this->input->post('tgl_masuk', true),
                'reg_sertipikat' => $this->input->post('reg_sertipikat', true),
                'desa' => $this->input->post('desa', true),
                'kecamatan' => $this->input->post('kecamatan', true),
                'jenis_berkas' => $this->input->post('jenis_berkas', true),
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
}

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
        $data = $this->ModelBerkas->berkas_list();
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
        $jb = $this->input->post('jenis_berkas', true);
        $jbs = implode(",", $jb);
        $id = $this->input->post('id');
        // $tgl = $this->input->post('tanggal_masuk');
        $reg = $this->input->post('reg_sertipikat');
        $desa = $this->input->post('desa');
        $kec = $this->input->post('kecamatan');
        $jenis = $jbs;
        $status = $this->input->post('status_proses');
        $napen = $this->input->post('nama_penjual');
        $napem = $this->input->post('nama_pembeli');
        $biaya = $this->input->post('biaya');
        $dp = $this->input->post('dp');
        $tot_biaya = $this->input->post('tot_biaya');
        // $berkas_s = $this->input->post('berkas_selesai');
        $ket = $this->input->post('keterangan');
        $data = $this->ModelBerkas->update_berkas($id, $reg, $kec, $desa, $jenis, $status, $napen, $napem, $biaya, $dp, $tot_biaya, $ket);
        echo json_encode($data);
        redirect('berkas');
    }


    function simpanBer()
    {
        //data input berkas Tabel Berkas
        $jb = $this->input->post('jenis_berkas', true);
        $jbs = implode(",", $jb); //mengubah array menjadi string
        $data = [
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
        if ($this->input->post('tgl_masuk') == null) {
            // echo json_encode($data);
            $this->ModelBerkas->simpanBerkas($data);
        } else {
            $tgl = ['tgl_masuk' => $this->input->post('tgl_masuk')];
            $data_tgl = array_merge($data,$tgl);
            // echo json_encode($data_tgl);
            $this->ModelBerkas->simpanBerkas($data_tgl);
        }

        //data input Sertipikat Tabel Berkas
        $datas = [
            'no_sertipikat' => $this->input->post('no_sertipikat'),
            'jenis_hak' => $this->input->post('jenis_hak'),
            'proses' => $jbs,
            'kec' => $this->input->post('kecamatan'),
            'dsa' => $this->input->post('desa'),
            'luas' => $this->input->post('luas'),
            'pemilik_hak' => $this->input->post('nama_penjual'),
            'pembeli_hak' => $this->input->post('nama_pembeli'),
            'ket' => $this->input->post('ket'),
        ];
        $switch = $this->input->post('switch-input', true);
        // echo $switch; 
        if ($switch == 0) { //cek switch input sertipikat, jika di aktifkan maka simpan sertipikat
            $this->ModelSertipikat->simpanSertipikat($datas);
            // echo json_encode($datas);
        }
        redirect('berkas');
    }

    public function index()
    {
        $data['berkas'] = $this->ModelBerkas->getBerkasLeft();
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

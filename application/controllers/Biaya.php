<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biaya extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     // cek_login();
    // }

    function input_biaya()
    {
        // $tes = $this->input->post('tes');
        $data = array(
            'id_berkas' => $this->input->post('id'),
            'jenis_bayar' => $this->input->post('bayar'),
            'jum_bayar' => $this->input->post('jum_bayar'),
            'ket_bayar' => $this->input->post('ket_bayar'),
        );
        if (!empty($this->input->post('penyetor'))) {
            $data['penyetor'] = $this->input->post('penyetor');
        }
        if (!empty($this->input->post('tgl_bayar'))) {
            $data['tgl_bayar'] = $this->input->post('tgl_bayar');
        }
        $hasil = $this->ModelBiaya->input_biaya($data);
        echo json_encode($hasil);
    }
}

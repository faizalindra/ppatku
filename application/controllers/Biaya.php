<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biaya extends CI_Controller
{

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

    function get_biaya()
    {
        $idb = array('id' => $this->input->get('id'));
        $id = array('id_berkas' => $this->input->get('id'));
        $hasil = $this->ModelBiaya->get_biaya($id,$idb);
        echo json_encode($hasil);
        // print_r($hasil);
    }
}

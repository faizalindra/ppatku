<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        // get_uri();
    }

    public function get_proses()
    {
        $id = $this->input->get('id');
        $ids['no_proses'] = $id;
        $data = $this->ModelProses->get_proses($id, $ids);
        echo json_encode($data);
        // print_r($data);
    }

    public function update_proses()
    {
        $id = $this->input->post('id');
        $val = $this->input->post('val');
        $jp = $this->input->post('jp');
        $data = $this->ModelProses->update_proses($id, $val, $jp);
        echo json_encode($data);
    }

    function berkas_selesai()
    {
        //cabut berkas
        if (!empty($this->input->post('kode'))) {
            $data = array('berkas_selesai' => 3);
            $where = array('id' => $this->input->post('id'));
            $id = $this->input->post('id');
            $datas = $this->ModelProses->berkas_selesai($data, $where, $id);
            echo json_encode('berhasil');
        //berkas selesai    
        } else {
            $data = ['berkas_selesai' =>  1];
            $where = ['id' => $this->uri->segment(3)];
            $id = $this->uri->segment(3);
            $datas = $this->ModelProses->berkas_selesai($data, $where, $id);
            echo json_encode('berhasil');
            redirect('berkas');
        }
    }

    function update_keterangan()
    {
        $id = array('no_proses' => $this->input->post('id'));
        $ket = array('ket_proses' => $this->input->post('ket'));
        $this->ModelProses->update_keterangan($ket, $id);
        echo json_encode($ket);
    }
}

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

    public function get_proses(){
        $id = $this->input->get('id');
        $ids['no_proses'] = $id;
        $data = $this->ModelProses->get_proses($id, $ids);
        echo json_encode($data);
        // print_r($data);
    }

    public function update_proses(){
        $id = $this->input->post('id');
        $val = $this->input->post('val');
        $jp = $this->input->post('jp');
        $data = $this->ModelProses->update_proses($id, $val, $jp);
        echo json_encode($data);
    }

    function berkas_selesai()
    {
        $data = ['berkas_selesai' =>  $this->uri->segment(4)];
        $where = ['id' => $this->uri->segment(3)];
        $datas = $this->ModelProses->berkas_selesai($data, $where);
        echo json_encode($datas);
        redirect('berkas');
    }

    function update_keterangan(){
        $id = array('no_proses'=>$this->input->post('id'));
        $ket = array('ket_proses'=>$this->input->post('ket'));
        $this->ModelProses->update_keterangan($ket,$id);
        echo json_encode($ket);
    }
}

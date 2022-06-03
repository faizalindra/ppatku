<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelengkapan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        // get_uri();
    }

    public function get_kelengkapan()
    {

        $id = $this->input->get('id');
        $id2['id_kelengkapan'] = $id;
        $data = $this->ModelKelengkapan->get_kelengkapan($id2, $id);
        echo json_encode($data);
    }

    public function index()
    {
        $data = $this->ModelKelengkapan;

        echo json_encode($data);
    }

    public function update_kelengkapan(){
        $id = $this->input->post('id');
        $jb = $this->input->post('jb');
        $data = $this->ModelKelengkapan->update_kelengkapan($id, $jb);
        echo json_encode('berhasil');
    }
}

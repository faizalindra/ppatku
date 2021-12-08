<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Wilayah extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('ModelWilayah');
    }
 
    function index(){
        $data['kecamatan'] = $this->ModelWilayah->get_kecamatan()->result();
        $this->load->view('test/wilayah', $data);
    }
 
    function get_desa(){
        $id_kec = $this->input->get('id');
        $data = $this->ModelWilayah->get_desa($id_kec)->result();
        echo json_encode($data);
    }
    function get_desa2(){
        $id_kec = $this->input->get('id');
        $data = $this->ModelWilayah->get_desa($id_kec)->result();
        echo json_encode($data);
    }
}
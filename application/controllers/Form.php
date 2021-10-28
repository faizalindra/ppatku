<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Form extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('KecamatanModel');
    $this->load->model('DesaModel');
  }
  public function index(){
    $data['kecamatan'] = $this->KecamatanModel->view();
    
    $this->load->view('form', $data);
  }
  
  public function listDesa(){
    // Ambil data ID Kecamatan yang dikirim via ajax post
    $id_kecamatan = $this->input->post('id_kecamatan');
    
    $desa = $this->DesaModel->viewByKecamatan($id_kecamatan);
    
    // Buat variabel untuk menampung tag-tag option nya
    // Set defaultnya dengan tag option Pilih
    $lists = "<option value=''>Pilih</option>";
    
    foreach($desa as $data){
      $lists .= "<option value='".$data->id."'>".$data->nama."</option>"; // Tambahkan tag option ke variabel $lists
    }
    
    $callback = array('list_desa'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_desa
    echo json_encode($callback); // konversi varibael $callback menjadi JSON
  }
}
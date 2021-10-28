<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DesaModel extends CI_Model {
  
  public function viewByKecamatan($id_kecamatan){
    $this->db->where('id_kecamatan', $id_kecamatan);
    $result = $this->db->get('desa')->result(); // Tampilkan semua data Desa berdasarkan id Kecamatan
    
    return $result; 
  }
}
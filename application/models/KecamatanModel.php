<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class KecamatanModel extends CI_Model {
  
  public function view(){
    return $this->db->get('kecamatan')->result(); // Tampilkan semua data yang ada di tabel provinsi
  }
}
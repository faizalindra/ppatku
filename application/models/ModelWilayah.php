<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class ModelWilayah extends CI_Model{
     
    function get_kecamatan(){
        $query = $this->db->get('kecamatan');
        return $query;  
    }
 
    function get_desa($id_kec){
        $query = $this->db->get_where('desa', array('id_kecamatan' => $id_kec));
        return $query;
    }
     
}
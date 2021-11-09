<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelDesa extends CI_Model{
    public function getDesa($kd_kec){
        $this->db->where('kd_kec', $kd_kec);
        $result = $this->db->get('nama_desa')->result();
        return $result;
    }

    public function cekDesa($where = null){
        $this->db->get('tb_desa', $where);
    }
}

?>
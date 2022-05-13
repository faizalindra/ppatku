<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProses extends CI_Model {
    public function update_proses($data, $where){
        // return $this->db->query("UPDATE * FROM `tb_ket_proses` set 'ukur'='$uji[0]' WHERE `no_proses`='$uji[1]'");
        $this->db->update('tb_ket_proses', $data, $where);
        // return $hasil->result_array();
    }
    public function berkas_selesai($data, $where){
        // return $this->db->query("UPDATE * FROM `tb_ket_proses` set 'ukur'='$uji[0]' WHERE `no_proses`='$uji[1]'");
        $this->db->update('tb_berkas', $data, $where);
        // return $hasil->result_array();
    }
}



 ?>
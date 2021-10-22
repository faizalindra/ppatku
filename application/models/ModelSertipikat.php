<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSertipikat extends CI_Model{

    //Manajemen Sertipikat
    //List Sertipikat Tersimpan di tabel tb_sertipikat
    public function cekSertipikat(){
        return $this->db->get('tb_sertipikat');
    } 

    //Menyimpan Data Sertipikat ke tabel tb_sertipikat
    public function simpanSertipikat($data = null){
        $this->db->insert('tb_sertipikat', $data);
    }

    //Mencari Sertipikat di tabel tb_sertipikat
    public function getSertipikat($where){
        return $this->db->where('tb_sertipikat', $where);
    }

    //Untuk memperbaharui sertipikat di tb_sertipikat
    public function updateSertipikat($data = null, $where = null){
        $this->db->update('tb_sertipikat', $data,$where);
    }

    //untuk menghapus sertipikat di tb_sertipikat
    // public function hapusSertipikat($where = null){
    //     $this->db->delete('tb_sertipikat', $where);
    // }
    
    //Untuk mengurutkan dan menghitung sertipikat?, fungsi belum diketahui
    public function total($field, $where){
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
            $this->db->where($where);
        }
        $this->db->form('tb_sertipikat');
        return $this->db->get()->row($field);
    }

}

?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model {
    
    //MANAJEMEN USER
    //Fungsi Simpan data USER, simpan data dari variabel $data ke tabel tb_taff
    public function simpanData($data = null){
        $this->db->insert('tb_staff', $data);
    }

    //Fungsi Cek data USER (list), dari tabel tb_staff
    public function cekData($where = null){
        return $this->db->get_where('tb_staff', $where);
    }

    //Fungsi mencari data user, dari tabel tb_staff
    public function getUserWhere($where = null){
        return $this->db->get_where('tb_staff', $where);
    }

    //Fungsi untuk mengecek user akses database mysql (root/user)
    public function cekUserAccess($where = null){
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where($where);
        return$this->db->get();
    }

    //Fungsi untuk membatasi jumlah user
    public function getUserLimit(){
        $this->db->select('*');
        $this->db->from('tb_staff');
        $this->db->limit(10, 0);
        return$this->db->get();
    }
}
?>
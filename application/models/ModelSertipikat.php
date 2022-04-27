<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSertipikat extends CI_Model
{

    //Menyimpan Data Sertipikat ke tabel tb_sertipikat
    public function simpanSertipikat($data = null)
    {
        $this->db->insert('tb_sertipikat', $data);
    }

    //Manajemen Sertipikat
    //List Sertipikat Tersimpan di tabel tb_sertipikat
    public function cekSertipikat()
    {
        return $this->db->get('tb_sertipikat');
    }

    //Mencari Sertipikat di tabel tb_sertipikat
    public function getSertipikat($where)
    {
        return $this->db->where('tb_sertipikat', $where);
    }

    function sertipikat_list()
    {
        $hasil = $this->db->query("SELECT * FROM tb_sertipikat");
        return $hasil->result();
    }

    public function get_sertipikat($id)
    {
        $hasil = $this->db->query("SELECT * FROM `tb_sertipikat` WHERE no_reg='$id'");
        if ($hasil->num_rows() > 0) {
            foreach ($hasil->result() as $data) {
                $hsl = array(
                    'pembeli_hak' => $data->pembeli_hak
                );
            }
        }
        return $hsl;
    }

    //Untuk memperbaharui sertipikat di tb_sertipikat
    public function updateSertipikat($data = null, $where = null)
    {
        $this->db->update('tb_sertipikat', $data, $where);
    }

    //untuk menghapus sertipikat di tb_sertipikat
    // public function hapusSertipikat($where = null){
    //     $this->db->delete('tb_sertipikat', $where);
    // }

    //Untuk mengurutkan dan menghitung sertipikat?, fungsi belum diketahui
    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->form('tb_sertipikat');
        return $this->db->get()->row($field);
    }
}

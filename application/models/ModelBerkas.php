<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBerkas extends CI_Model
{
    public function simpanBerkas($data1 = null)
    {
        $this->db->insert('tb_berkas', $data1);
    }

    public function cekBerkas($where = null)
    {
        return $this->db->get_where('tb_berkas', $where);
    }

    public function getBerkas($where = null)
    {
        return $this->db->get_where('tb_berkas', $where);
    }

    public function berkasGet(){
        return $this->db->get('tb_berkas');
    }

    public function getBerkasQuery()
    {
        $this->db->select('*');
        $this->db->from('tb_berkas');
        $this->db->join('tb_sertipikat', 'tb_sertipikat.no_reg = tb_berkas.reg_sertipikat');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function updateBerkas($data1 = null, $where = null)
    {
        $this->db->update('tb_berkas', $data1, $where);
    }

    public function totBerkas($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('tb_berkas');
        return $this->db->get()->row($field);
    }
}

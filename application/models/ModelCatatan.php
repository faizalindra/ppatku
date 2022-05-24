<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelCatatan extends CI_Model
{

    public function catatan($where)
    {
        $data = $this->db->get_where('tb_catatan', $where);
        return $data->result_array();
    }
    public function input_catatan($data)
    {
        $this->db->insert('tb_catatan', $data);
    }

    public function bintang_catatan($data, $where)
    {
        $this->db->update('tb_catatan', $data, $where);
    }

    public function hapus_catatan($where)
    {
        $this->db->delete('tb_catatan', $where);
    }
}

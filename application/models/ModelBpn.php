<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBpn extends CI_Model
{
    public function get_prosesBPN()
    {
        $data = $this->db->get('tb_proses_bpn');
        return $data->result_array();
    }

    public function inputBPN($data = null)
    {
        $this->db->insert('tb_proses_bpn', $data);
    }
}

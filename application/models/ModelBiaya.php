<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBiaya extends CI_Model{

    function input_biaya($data){
        $this->db->insert('tb_bayar', $data);
        return 'sukses';
    }

}

?>
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

    function get_procBPN($id)
    {
        $hsl = $this->db->query("SELECT * FROM tb_proses_bpn WHERE no_proses_bpn='$id'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'no_proses_bpn' => $data->no_proses_bpn,
                    'tgl_masuk' => $data->tgl_masuk,
                    'nama_pemohon' => $data->nama_pemohon,
                    'no_bpn' => $data->no_bpn,
                    'jenis_proses' => $data->jenis_proses,
                    'ket' => $data->ket,
                    'status' => $data->status,
                );
            }
        }
        return $hasil;
    }
    public function bpn_terdaftar(){
        $hasil = $this->db->query("SELECT * FROM `tb_proses_bpn`")->num_rows();
        return $hasil;
    }
    public function bpn_proses(){
        $hasil = $this->db->query("SELECT * FROM `tb_proses_bpn` WHERE `status`= 0")->num_rows();
        return $hasil;
    }
}

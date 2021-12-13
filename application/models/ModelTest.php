<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class ModelTest extends CI_Model{
     
    function proses1($id)
    {
        $hasil = $this->db->query("SELECT * FROM `tb_ket_proses` WHERE `no_proses`='$id'");
        return $hasil->result_array();
    }
 
    function get_desa($id_kec){
        $query = $this->db->get_where('desa', array('id_kecamatan' => $id_kec));
        return $query;
    }

    public function proses($where)
    {
        return $this->db->where('tb_ket_proses', $where);
    }

    public function proses3($id)
    {
        $hasil = $this->db->query("SELECT * FROM `tb_ket_proses` WHERE `no_proses`='$id'");
        if ($hasil->num_rows() > 0) {
            foreach ($hasil->result() as $data) {
                $hsl = array(
                    'ukur' => $data->ukur,
                    'pert_teknis' => $data->pert_teknis,
                    'perijinan' => $data->perijinan,
                    'pengeringan' => $data->pengeringan,
                    'cek_plot' => $data->cek_plot,
                    'cek_sertipikat' => $data->cek_sertipikat,
                    'roya' => $data->roya,
                    'ganti_nama' => $data->ganti_nama,
                    'tapak_kapling' => $data->tapak_kapling,
                    'bayar_pajak' => $data->bayar_pajak,
                    'pajak_konv' => $data->pajak_konv,
                    'konversi' => $data->konversi,
                    'waris' => $data->waris,
                    'balik_nama' => $data->balik_nama,
                    'peningkatan_hak' => $data->peningkatan_hak,
                    'skmht' => $data->skmht,
                    'ht' => $data->ht,
                    'ganti_blangko' => $data->ganti_blangko,
                    'iph' => $data->iph,
                    'znt' => $data->znt,
                );
            }
        }
        return $hsl;
    }
     
}
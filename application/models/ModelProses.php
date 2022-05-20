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

    public function get_proses($id)
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
                    'konversi' => $data->konversi,
                    'waris' => $data->waris,
                    'balik_nama' => $data->balik_nama,
                    'peningkatan_hak' => $data->peningkatan_hak,
                    'skmht' => $data->skmht,
                    'ht' => $data->ht,
                    'kutip_su' => $data->kutip_su,
                    'validasi_sert' => $data->validasi_sert,
                    'znt' => $data->znt,
                );
            }
        }
        return $hsl;
    }
}



 ?>
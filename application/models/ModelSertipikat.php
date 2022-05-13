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

    //List Sertipikat Tersimpan di tabel tb_sertipikat
    function sertipikat_list()
    {
        $hasil = $this->db->query("SELECT * FROM tb_sertipikat");
        return $hasil->result();
    }

    //untuk mendapatkan sertipikat berdasarkan no_reg
    function get_sertipikat($id)
    {
        $hsl = $this->db->query("SELECT * FROM tb_sertipikat WHERE no_reg='$id'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'no_reg' => $data->no_reg,
                    'no_sertipikat' => $data->no_sertipikat,
                    'luas' => $data->luas,
                    'dsa' => $data->dsa,
                    'kec' => $data->kec,
                    'jenis_hak' => $data->jenis_hak,
                    'pemilik_hak' => $data->pemilik_hak,
                    'pembeli_hak' => $data->pembeli_hak,
                    'proses' => $data->proses,
                    'ket' => $data->ket,
                );
            }
        }
        return $hasil;
    }

    //Untuk memperbaharui sertipikat di tb_sertipikat
    public function update_sertipikat($no_reg, $jenis_hak, $no_sertipikat, $kec, $dsa, $luas, $pemilik_hak, $pembeli_hak, $proses, $ket)
    {
        $hasil = $this->db->query("UPDATE tb_sertipikat SET jenis_hak='$jenis_hak', no_sertipikat='$no_sertipikat', kec='$kec', dsa='$dsa', luas='$luas', pemilik_hak='$pemilik_hak', pembeli_hak='$pembeli_hak', proses='$proses', ket='$ket' WHERE no_reg='$no_reg'");
        return $hasil;
    }


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

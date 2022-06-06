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
    function tabel_sertipikat()
    {
        // $hasil = $this->db->query("SELECT * FROM tb_sertipikat");
        $hasil = $this->db->select("*, desa.nama as desa, kecamatan.nama as kecamatan")
            ->from('tb_sertipikat')
            ->join('desa', 'desa.id = tb_sertipikat.dsa', 'left')
            ->join('kecamatan', 'desa.id_kecamatan = kecamatan.id', 'left')
            ->get()->result();
        for ($i = 0; $i < count($hasil); $i++) {
            $hasil[$i]->tgl_daftar = date_format(date_create($hasil[$i]->tgl_daftar), 'd M Y');
        }
        return $hasil;
    }

    //untuk mendapatkan sertipikat berdasarkan no_reg
    function get_sertipikat($id)
    {
        $hsl = $this->db->select("*, desa.nama as desa, kecamatan.nama as kecamatan")
            ->from('tb_sertipikat')
            ->join('desa', 'desa.id = tb_sertipikat.dsa', 'left')
            ->join('kecamatan', 'desa.id_kecamatan = kecamatan.id', 'left')
            ->where('no_reg', $id)
            ->get()
            ->result();
        foreach ($hsl as $data) {
            $hasil = array(
                'no_reg' => $data->no_reg,
                'tgl_daftar' => $data->tgl_daftar,
                'no_sertipikat' => $data->no_sertipikat,
                'dsa' => $data->dsa,
                'desa' => $data->desa,
                'kecamatan' => $data->kecamatan,
                'jenis_hak' => $data->jenis_hak,
                'pemilik_hak' => $data->pemilik_hak,
                'pembeli_hak' => $data->pembeli_hak,
                'proses' => $data->proses,
            );
            if(!empty($data->luas)){
                $hasil['luas'] = $data->luas;
            }else{
                $hasil['luas'] = "";
            }
            if(!empty( $data->ket)){
                $hasil['ket'] = $data->ket;
            }else{
                $hasil['ket'] = "";
            }
        }
        return $hasil;
    }

    public function s_terdaftar()
    {
        $hasil = $this->db->query("SELECT count( * ) as  total_record FROM tb_sertipikat")->result();
        foreach ($hasil as $data) {
            $hsl = $data->total_record;
        }
        return $hsl;
    }

    //Untuk memperbaharui sertipikat di tb_sertipikat
    // public function update_sertipikat($no_reg, $jenis_hak, $no_sertipikat, $kec, $dsa, $luas, $pemilik_hak, $pembeli_hak, $ket)
    // {
    //     $hasil = $this->db->query("UPDATE tb_sertipikat SET jenis_hak='$jenis_hak', no_sertipikat='$no_sertipikat', kec='$kec', dsa='$dsa', luas='$luas', pemilik_hak='$pemilik_hak', pembeli_hak='$pembeli_hak',  ket='$ket' WHERE no_reg='$no_reg'");
    //     return $hasil;
    // }

    //buat fungsi untuk update sertipikat
    public function update_sertipikat($data, $no_reg)
    {
        // $this->db->where('no_reg', $data['no_reg']);
        $hasil = $this->db->update('tb_sertipikat', $data, $no_reg);
        return $hasil;
    }

    //untuk selector sertipikat di input berkas
    public function get_sert_for_select()
    {
        $data = $this->db->select('no_reg, dsa, jenis_hak, no_sertipikat, pemilik_hak, desa.nama as desa')
            ->from('tb_sertipikat')
            ->join('desa', 'tb_sertipikat.dsa = desa.id')
            ->get()
            ->result();
        return $data;
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

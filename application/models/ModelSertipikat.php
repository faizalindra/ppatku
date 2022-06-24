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
            $hasil[$i]->pemilik_hak = str_replace(":", ": \n", $hasil[$i]->pemilik_hak);
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
            if (!empty($data->luas)) {
                $hasil['luas'] = $data->luas;
            } else {
                $hasil['luas'] = "";
            }
            if (!empty($data->ket)) {
                $hasil['ket'] = $data->ket;
            } else {
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
        $data = $this->db->select('no_reg, dsa, proses, jenis_hak, no_sertipikat, pemilik_hak, desa.nama as desa, berkas_selesai')
            ->from('tb_sertipikat')
            ->join('desa', 'tb_sertipikat.dsa = desa.id')
            ->join('tb_berkas', 'tb_berkas.reg_sertipikat = tb_sertipikat.no_reg', 'left')
            ->where('berkas_selesai', null)
            ->or_where('berkas_selesai', '1')
            ->get()
            ->result();
        foreach ($data as $item) {
            $hasil[] = '<option value="' . $item->no_reg . '">' . $item->no_reg . '. ' . $item->jenis_hak  . ". " . $item->no_sertipikat . "/" . $item->desa . ' A.n.  ' . $item->pemilik_hak . ' | ' . $item->proses . '</option>';
        }
        $hasil = array_unique($hasil);
        return $hasil;
    }


}

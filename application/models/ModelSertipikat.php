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
            $hasil[$i]->kode_s = str_pad($hasil[$i]->no_reg, "5", "0", STR_PAD_LEFT);
            $hasil[$i]->pemilik_hak = str_replace(":", ": \n", $hasil[$i]->pemilik_hak);
            $hasil[$i]->proses = str_replace(",", ", ", $hasil[$i]->proses);
            $hasil[$i]->tgl_daftar = date_format(date_create($hasil[$i]->tgl_daftar), 'd M Y');
        }
        return $hasil;
    }

    //untuk mendapatkan sertipikat berdasarkan no_reg
    function get_sertipikat($id)
    {
        $hsl = $this->db->select("*, desa.nama as desa, kecamatan.nama as kecamatan, desa.id as id_desa, kecamatan.id as id_kecamatan")
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
                'id_desa' => $data->id_desa,
                'id_kecamatan' => $data->id_kecamatan,
                'kecamatan' => $data->kecamatan,
                'jenis_hak' => $data->jenis_hak,
                'pemilik_hak' => $data->pemilik_hak,
                'pembeli_hak' => $data->pembeli_hak,
                'proses' => explode(',', $data->proses)
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

    // buat fungsi untuk update sertipikat
    public function update_sertipikat($data, $no_reg, $id_berkas = null)
    {
        // cek apakah 'is_used' ada di data yang akan diupdate
        // digunakan untuk update status sertipikat di input dan edit berkas
        if (!empty($data['is_used'])) {
            //c ek apakah 'id_berkas' tidak kosong
            // digunakan pada saat edit berkas
            if (!empty($id_berkas)) {
                //dapatkan reg_sertipikat lama di tabel tb_berkas
                $datas = $this->db->select('reg_sertipikat')
                    ->from('tb_berkas')
                    ->where('id', $id_berkas)
                    ->get()
                    ->row_array();
                // jika reg_sertipikat lama ada maka ganti status is_used sertipikat lama menjadi 0
                if (!empty($datas['reg_sertipikat'])) {
                    $hasil = $this->db->update('tb_sertipikat', array('is_used' => 0), array('no_reg' => $datas['reg_sertipikat']));
                }
                // update status is_used seetipikat baru menjadi 1
                $hasil = $this->db->update('tb_sertipikat', $data, $no_reg);
            } else {
                // digunakan pada saat input berkas
                // update status is_used seetipikat baru menjadi 1
                $hasil = $this->db->update('tb_sertipikat', $data, $no_reg);
            }
        } else {
            // digunakan untuk update sertipikat di edit sertipikat tabelSertipikat
            $hasil = $this->db->update('tb_sertipikat', $data, $no_reg);
        }
        return $hasil;
    }

    //untuk selector sertipikat di input berkas
    public function get_sert_for_select()
    {
        $data = $this->db->select('no_reg, dsa, proses, jenis_hak, no_sertipikat, pemilik_hak, desa.nama as desa')
            ->from('tb_sertipikat')
            ->join('desa', 'tb_sertipikat.dsa = desa.id')
            ->where('is_used', 0)
            ->get()
            ->result();
        foreach ($data as $item) {
            $hasil[] = '<option value="' . $item->no_reg . '">' . $item->no_reg . '. ' . $item->jenis_hak  . ". " . $item->no_sertipikat . "/" . $item->desa . ' A.n.  ' . $item->pemilik_hak . ' | ' . $item->proses . '</option>';
        }
        return $hasil;
    }

    public function get_sert_for_auto($id)
    {
        $data = $this->db->select('kecamatan.id as id_kecamatan, desa.id as id_desa, desa.nama as desa, proses, pemilik_hak, pembeli_hak')
            ->from('tb_sertipikat')
            ->join('desa', 'tb_sertipikat.dsa = desa.id', 'left')
            ->join('kecamatan', 'desa.id_kecamatan = kecamatan.id', 'left')
            ->where('no_reg', $id)
            ->get()
            ->row_array();
        $data['proses'] = explode(',', $data['proses']);
        return $data;
    }
}

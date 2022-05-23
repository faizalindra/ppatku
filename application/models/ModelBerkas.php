<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBerkas extends CI_Model
{
    public function simpanBerkas($data1 = null)
    {
        $this->db->insert('tb_berkas', $data1);
    }
    public function insert_berkas_kelengkapan($data, $datas=null)
    {
        $this->db->insert('tb_berkas', $data);
        $id['id_kelengkapan'] = $this->db->insert_id();
        $this->db->update('tb_kelengkapan', $datas, $id);
    }

    public function getBerkas()
    {
        return $this->db->get('tb_berkas');
    }

    //menambilkan berkas yang belum selesai + di join dengan tabel sertipikat
    public function getBerkasUnfinish()
    {
        $data = 0;
        $hsl = $this->db->query("SELECT * FROM tb_berkas left join tb_sertipikat on tb_sertipikat.no_reg = tb_berkas.reg_sertipikat WHERE berkas_selesai='$data'");
        return $hsl->result_array();
    }

    //left join berkas untuk tabelBerkas
    public function getBerkasLeft()
    {
        $this->db->select('*');
        $this->db->from('tb_berkas'); // this is first table name
        $this->db->join('tb_sertipikat', 'tb_sertipikat.no_reg = tb_berkas.reg_sertipikat', 'left'); // this is second table name with both table ids
        $query = $this->db->get();
        return $query->result_array();
    }

    //inner join untuk tabel berkasProses dan berkasSelesai
    public function getBerkasQuery()
    {
        $this->db->select('*');
        $this->db->from('tb_berkas');
        $this->db->join('tb_sertipikat', 'tb_sertipikat.no_reg = tb_berkas.reg_sertipikat');
        $query = $this->db->get();
        return $query->result_array();
    }

    //menghitung total berkas
    public function totBerkas($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
            $this->db->where($where);
        }
        $this->db->from('tb_berkas');
        return $this->db->get()->row($field);
    }

    //untuk tabelBerkas
    function data_berkas()
    {
        $data = $this->db->select('*, tb_berkas.id as id_berkas, desa.nama as desa, kecamatan.nama as kecamatan')
            ->from('tb_berkas')
            ->join('tb_sertipikat', 'tb_sertipikat.no_reg = tb_berkas.reg_sertipikat', 'left')
            ->join('desa', 'tb_berkas.alamat = desa.id', 'left')
            ->join('kecamatan', 'desa.id_kecamatan = kecamatan.id', 'left')
            ->get()
            ->result();
        return $data;
    }

    function get_berkas($id)
    {
        $hsl = $this->db->select('*, tb_berkas.id as id_berkas, desa.nama as desa, kecamatan.nama as kecamatan')
            ->from('tb_berkas')
            ->join('tb_sertipikat', 'tb_sertipikat.no_reg = tb_berkas.reg_sertipikat', 'left')
            ->join('desa', 'tb_berkas.alamat = desa.id', 'left')
            ->join('kecamatan', 'desa.id_kecamatan = kecamatan.id', 'left')
            ->where('tb_berkas.id', $id)
            ->get()
            ->result();
        foreach ($hsl as $data) {
            $hasil = array(
                'id_berkas' => $data->id_berkas,
                'tgl_masuk' => $data->tgl_masuk,
                'reg_sertipikat' => $data->reg_sertipikat,
                'desa' => $data->desa,
                'kecamatan' => $data->kecamatan,
                'jenis_berkas' => $data->jenis_berkas,
                'nama_penjual' => $data->nama_penjual,
                'nama_pembeli' => $data->nama_pembeli,
                'tot_biaya' => $data->tot_biaya,
                'keterangan' => $data->keterangan,
                'dsa' => $data->dsa,
                'no_reg' => $data->no_reg,
                'no_sertipikat' => $data->no_sertipikat,
                'luas' => $data->luas,
                'tgl_daftar' => $data->tgl_daftar,
                'jenis_hak' => $data->jenis_hak,
                'pemilik_hak' => $data->pemilik_hak,
                'pembeli_hak' => $data->pembeli_hak,
                'proses' => $data->proses,
                'ket' => $data->ket,
            );
        }
        return $hasil;
    }

    //untuk form edit
    // function get_berkas($id)
    // {
    //     $hsl = $this->db->query("SELECT * FROM tb_berkas left join tb_sertipikat on tb_sertipikat.no_reg = tb_berkas.reg_sertipikat WHERE id='$id'");
    //     if ($hsl->num_rows() > 0) {
    //         foreach ($hsl->result() as $data) {
    //             $hasil = array(
    //                 'id' => $data->id,
    //                 'tgl_masuk' => $data->tgl_masuk,
    //                 'reg_sertipikat' => $data->reg_sertipikat,
    //                 'desa' => $data->desa,
    //                 'kecamatan' => $data->kecamatan,
    //                 'jenis_berkas' => $data->jenis_berkas,
    //                 // 'id_proses' => $data->id_proses,
    //                 'nama_penjual' => $data->nama_penjual,
    //                 'nama_pembeli' => $data->nama_pembeli,
    //                 'biaya' => $data->biaya,
    //                 'dp' => $data->dp,
    //                 'tot_biaya' => $data->tot_biaya,
    //                 'berkas_selesai' => $data->berkas_selesai,
    //                 'keterangan' => $data->keterangan,
    //                 'dsa' => $data->dsa,
    //                 'no_reg' => $data->no_reg,
    //                 'no_sertipikat' => $data->no_sertipikat,
    //                 'luas' => $data->luas,
    //                 'tgl_daftar' => $data->tgl_daftar,
    //                 'jenis_hak' => $data->jenis_hak,
    //                 'pemilik_hak' => $data->pemilik_hak,
    //                 'pembeli_hak' => $data->pembeli_hak,
    //                 'proses' => $data->proses,
    //                 'ket' => $data->ket,
    //             );
    //         }
    //     }
    //     return $hasil;
    // }

    public function b_terdaftar()
    {
        $hasil = $this->db->query("SELECT count( * ) as  total_record FROM tb_berkas")->result();
        foreach ($hasil as $data) {
            $hsl = $data->total_record;
        }
        return $hsl;
    }
    public function b_proses()
    {
        $hasil = $this->db->query("SELECT count( * ) as  total_record FROM tb_berkas WHERE `berkas_selesai`= 0")->result();
        foreach ($hasil as $data) {
            $hsl = $data->total_record;
        }
        return $hsl;
    }
    public function b_selesai()
    {
        $hasil = $this->db->query("SELECT count( * ) as  total_record FROM tb_berkas WHERE `berkas_selesai`= 1")->result();
        foreach ($hasil as $data) {
            $hsl = $data->total_record;
        }
        return $hsl;
    }
    public function b_dicabut()
    {
        $hasil = $this->db->query("SELECT count( * ) as  total_record FROM tb_berkas WHERE `berkas_selesai`= 2")->result();
        foreach ($hasil as $data) {
            $hsl = $data->total_record;
        }
        return $hsl;
    }

    function update_berkas($data, $id)
    {
        $hasil = $this->db->update('tb_berkas', $data, array('id' => $id));
        return $hasil;
    }
}

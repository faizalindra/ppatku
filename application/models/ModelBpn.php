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

    //untuk mengambil data bpn
    public function get_bpn($id)
    {
        $datas = $this->db->get_where('tb_proses_bpn', $id);
        foreach ($datas->result() as $data) {
            $hasil = array(
                'tgl_masuk' => $data->tgl_masuk,
                'no_proses_bpn' => $data->no_proses_bpn,
                'id_berkas' => $data->id_berkas,
                'nama_pemohon' => $data->nama_pemohon,
                'jenis_proses' => $data->jenis_proses,
                'no_bpn' => $data->no_bpn,
                'tahun' => $data->tahun,
                'ket' => $data->ket,
            );
        }
        return $hasil;
    }

    //update data bpn
    public function update_bpn($data, $id)
    {
        $data = $this->db->update('tb_proses_bpn', $data, $id);
        return $data;
    }

    public function bpn_terdaftar()
    {
        $hasil = $this->db->query("SELECT count( * ) as  total_record FROM tb_proses_bpn")->result();
        foreach ($hasil as $data) {
            $hsl = $data->total_record;
        }
        return $hsl;
    }
    public function bpn_proses()
    {
        $hasil = $this->db->query("SELECT count( * ) as  total_record FROM tb_proses_bpn WHERE status=0")->result();
        foreach ($hasil as $data) {
            $hsl = $data->total_record;
        }
        return $hsl;
    }

    public function selesai($id)
    {
        $hasil = $this->db->query("UPDATE `tb_proses_bpn` SET `status`= 1 WHERE `no_proses_bpn`='$id'");
        return $hasil;
    }
}

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

    function get_bpn_for_detail($id)
    {
        $hasil = $this->db->get_where('tb_proses_bpn', $id)->result();
        // $datas = $this->db->get_where('tb_proses_bpn', $id)->result();
        $data = array();
        foreach ($hasil as $h) {
            // foreach ($h as $b){
            if ($h->status == 1) {
                $card = '<div class="card border-dark bg-success" style="color:white;">';
            } else if ($h->status == 0) {
                $card = '<div class="card border-dark bg-warning">';
            }
            $data[] = $card .  '<div class="card-body p-1" >
                                <div class="row" style="font-size: 12px;">
                                    <div class="col-md-6 text-left mb-1">' . $h->tgl_masuk . '</div>
                                    <div class="col-md-6 text-right mb-1">' . $h->no_bpn . '/' . $h->tahun . '</div></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="text-center">' . $h->jenis_proses . '</h5> </div></div>
                                <div class="row">
                                    <div class="col-md-12 text-right" style="font-size: 12px;">@ ' . $h->nama_pemohon . '</div></div>
                            </div>
                        </div><br>';
        }
        return $data;
    }

    //update data bpn tabel bpn
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

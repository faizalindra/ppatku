<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBpn extends CI_Model
{
    public function tabel_bpn()
    {
        $data = $this->db->get('tb_proses_bpn')->result();
        $a = 1;
        for ($i = 0; $i < count($data); $i++) {

            // Ubah tanggal Masuk sesuai format tanggal bulan tahun. cth: 12 Juni 2022
            $data[$i]->tgl_masuk = date_format(date_create($data[$i]->tgl_masuk), 'd M Y');

            // Mengabunkan nomor PBN dengan tahun BPN. cth: 26131/2022
            $data[$i]->nomor = str_pad($data[$i]->no_bpn, "6", "0", STR_PAD_LEFT) . '/' . $data[$i]->tahun;

            // mengubah id berkas menjadi link url yang dapat digunakan untuk merujuk berkas
            $id_berkas = str_pad($data[$i]->id_berkas, "5", "0", STR_PAD_LEFT);
            $data[$i]->id_berkas = '<a href="' . base_url('cari/cari_berkas/B') . $id_berkas . '">B' . $id_berkas . '</a>';

            //ubah icon badge status proses BPN berdasarkan value
            // Sedang Proses
            if ($data[$i]->status == "0") {
                $status = '<span data="' . $data[$i]->no_proses_bpn . '" class="badge badge-warning status_bpn"> Proses </span>';
                $report = "<button class='badge badge-warning btn-sm btn-gagal' data='" . $data[$i]->no_proses_bpn . "'><i class='fa fa-exclamation-triangle'></i></button>";
                // Proses Selesai
            } else if ($data[$i]->status == "1") {
                $status = '<span class="badge badge-success">Selesai</span>';
                $report = '';
                // Proses Gagal
            } else if ($data[$i]->status == '2') {
                $status = '<span class="badge badge-secondary">Gagal</span>';
                $report = '';
                // Proses Dicabut
            } else if ($data[$i]->status == '3') {
                $status = '<span class="badge badge-danger">Dicabut</span>';
                $report = '';
            }
            $stat = $data[$i]->status;
            $data[$i]->status = $status;

            // Menjaga line break pada keterangan
            $data[$i]->ket = nl2br($data[$i]->ket);

            // untuk membuat tombol edit
            if ($this->session->userdata('role_id') != 2) {
                if ($stat == '0' || $this->session->userdata('role_id') == 0) {
                    $data[$i]->aksi =  '<button href="javascript:;" class="badge badge-info edit_bpn" data="' . $data[$i]->no_proses_bpn . '"><i class="fa fa-edit" ></i>Edit</button>&nbsp;' . $report;
                } else {
                    $data[$i]->aksi = '';
                }
                // $data[$i]->aksi = '<button href="javascript:;" class="badge badge-info edit_bpn" data="' . $data[$i]->no_proses_bpn . '"><i class="fa fa-edit" ></i>Edit</button>&nbsp;' . $report;
            } else {
                $data[$i]->aksi = '';
            }
            $data[$i]->no_urut = $a;
            $a++;
        }
        return $data;
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

    // digunakan untuk menampilkan card proses BPN pada Modal detail_berkas
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
            } else if ($h->status == 2) {
                $card = '<div class="card border-dark bg-secondary" style="color:white;">';
            } else if ($h->status == 3) {
                $card = '<div class="card border-dark bg-danger" style="color:white;">';
            }
            $data[] = $card .  '<div class="card-body p-1" >
                                <div class="row" style="font-size: 12px;">
                                    <div class="col-md-6 text-left mb-1">' .  date_format(date_create($h->tgl_masuk), 'd M Y') . '</div>
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

    public function record_bpn()
    {
        $hasil = $this->db->query("SELECT count( * ) as  total_record FROM tb_proses_bpn")->result();
        foreach ($hasil as $data) {
            $hsl['bb_terdaftar'] = $data->total_record;
        }
        $hasil0 = $this->db->query("SELECT count( * ) as  total_record FROM tb_proses_bpn WHERE status=0")->result();
        foreach ($hasil0 as $data) {
            $hsl['bb_proses'] = $data->total_record;
        }
        $hasil1 = $this->db->query("SELECT count( * ) as  total_record FROM tb_proses_bpn WHERE status=1")->result();
        foreach ($hasil1 as $data) {
            $hsl['bb_selesai'] = $data->total_record;
        }
        $hasil2 = $this->db->query("SELECT count( * ) as  total_record FROM tb_proses_bpn WHERE status=2")->result();
        foreach ($hasil2 as $data) {
            $hsl['bb_gagal'] = $data->total_record;
        }
        $hasil3 = $this->db->query("SELECT count( * ) as  total_record FROM tb_proses_bpn WHERE status=3")->result();
        foreach ($hasil3 as $data) {
            $hsl['bb_dicabut'] = $data->total_record;
        }
        return $hsl;
    }

    public function selesai($id)
    {
        $tgl = date("Y-m-d");
        $hasil = $this->db->query("UPDATE `tb_proses_bpn` SET `status`= 1, `tgl_selesai`= '$tgl' WHERE `no_proses_bpn`='$id'");
        return $hasil;
    }
}

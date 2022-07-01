<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBerkas extends CI_Model
{
    public function simpanBerkas($data1 = null)
    {
        $this->db->insert('tb_berkas', $data1);
    }
    public function insert_berkas_kelengkapan($data, $datas = null)
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
        // $hsl = $this->db->query("SELECT * FROM tb_berkas left join tb_sertipikat on tb_sertipikat.no_reg = tb_berkas.reg_sertipikat WHERE berkas_selesai='0'");
        $hsl = $this->db->select('*, desa.nama as desa, kecamatan.nama as kecamatan, tb_berkas.id as id_berkas')
            ->from('tb_berkas')
            ->join('tb_sertipikat', 'tb_sertipikat.no_reg = tb_berkas.reg_sertipikat', 'left')
            ->join('desa', 'desa.id = tb_berkas.alamat', 'left')
            ->join('kecamatan', 'desa.id_kecamatan = kecamatan.id', 'left')
            ->where('berkas_selesai', 0)
            ->get();
        return $hsl->result_array();
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
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]->nama_penjual = str_replace(":", ": \n", $data[$i]->nama_penjual);
            //membuat field sertipikat
            if (!empty($data[$i]->jenis_hak)) {
                $data[$i]->sertipikat = '<href class="btn_sertipikat" data="' . $data[$i]->reg_sertipikat . '">' . $data[$i]->jenis_hak . '. ' . $data[$i]->no_sertipikat . '/' . $data[$i]->desa;
            } else {
                $data[$i]->sertipikat = $data[$i]->desa;
            }
            //membuat field tombol status berkas
            if ($data[$i]->berkas_selesai == 0) {
                $data[$i]->status_berkas = '<span data="' . $data[$i]->id_berkas . '" class="badge badge-warning status_berkas">Proses</span>';
                $data[$i]->aksi = '<button  class="badge badge-info edit_berkas" data="' . $data[$i]->id_berkas . '"><i class="fa fa-edit" ></i></button>
                                   <button  class="badge badge-primary item_detail2" data="' . $data[$i]->id_berkas . '"><i class="fa fa-search" ></i> Detail</button>';
            } else if ($data[$i]->berkas_selesai == 1) {
                $data[$i]->status_berkas = '<span class="badge badge-success"> Selesai </span>';
                $data[$i]->aksi = '<button  class="badge badge-info edit_berkas" data="' . $data[$i]->id_berkas . '"><i class="fa fa-edit" ></i></button>
                                   <button  class="badge badge-primary item_detail2" data="' . $data[$i]->id_berkas . '"><i class="fa fa-search" ></i> Detail</button>';
            } else {
                $data[$i]->status_berkas = '<span class="badge badge-danger"> Berkas Dicabut </span>';
                $data[$i]->aksi = '<button  class="badge badge-primary item_detail" data="' . $data[$i]->id_berkas . '"><i class="fa fa-search" ></i> Detail</button>';
            }

            $data[$i]->tgl_masuk = date_format(date_create($data[$i]->tgl_masuk), 'd M Y');
        }
        return $data;
    }

    function get_berkas($id)
    {
        $hsl = $this->db->select('*, tb_berkas.id as id_berkas, desa.nama as desa, desa.id as id_desa,kecamatan.nama as kecamatan, kecamatan.id as id_kecamatan')
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
                'tgl_masuk' => date_format(date_create($data->tgl_masuk), 'd M Y'),
                'reg_sertipikat' => $data->reg_sertipikat,
                'desa' => $data->desa,
                'id_desa' => $data->id_desa,
                'id_kecamatan' => $data->id_kecamatan,
                'kecamatan' => $data->kecamatan,
                'jenis_berkas' => $data->jenis_berkas,
                'nama_penjual' => str_replace(":", ": \n", $data->nama_penjual),
                'nama_pembeli' => $data->nama_pembeli,
                'tot_biaya' => 'Rp. ' . number_format($data->tot_biaya),
                'biaya' => $data->tot_biaya,
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
            if (!empty($data->jenis_hak && !empty($data->no_sertipikat))) {
                $hasil['sertipikat'] = $data->jenis_hak . '. ' . $data->no_sertipikat . ' / ' . $data->desa . ', Kec. ' . $data->kecamatan;
            } else {
                $hasil['sertipikat'] = 'Desa ' . $data->desa . ', Kec. ' . $data->kecamatan;
            }
        }
        return $hasil;
    }

    public function get_berkas_for_select()
    {
        $data = $this->db->select('tb_berkas.id as id_berkas, no_sertipikat, nama_penjual, nama_pembeli, desa.nama as desa, jenis_hak, berkas_selesai')
            ->from('tb_berkas')
            ->join('desa', 'tb_berkas.alamat = desa.id', 'left')
            ->join('tb_sertipikat', 'tb_sertipikat.no_reg = tb_berkas.reg_sertipikat', 'left')
            ->get()
            ->result();

        foreach ($data as $item) {
            //cek apakah berkas sudah selesai atau berkas dicabut
            if ($item->berkas_selesai < 1) {
                //cek apakah berkas memiliki sertipikat atau tidak
                if (!empty($item->no_sertipikat)) {
                    if ($item->nama_penjual != '' && $item->nama_pembeli != ' ') {
                        $hasil[] = '<option value="' . $item->id_berkas . '">' . $item->id_berkas . '. ' . $item->jenis_hak . '. ' . $item->no_sertipikat . '/' . $item->desa . ', ' . $item->nama_penjual . ' => ' . $item->nama_pembeli . '</option>';
                    } else {
                        $hasil[] = '<option value="' . $item->id_berkas . '">' . $item->id_berkas . '. ' . $item->jenis_hak . '. ' . $item->no_sertipikat . '/' . $item->desa . ', ' . $item->nama_penjual . '</option>';
                    }
                } else {
                    if ($item->nama_penjual != '' && $item->nama_pembeli != ' ') {
                        $hasil[] = '<option value="' . $item->id_berkas . '">' . $item->id_berkas . '. Desa ' . $item->desa . ', ' . $item->nama_penjual . ' => ' . $item->nama_pembeli . '</option>';
                    } else {
                        $hasil[] = '<option value="' . $item->id_berkas . '">' . $item->id_berkas . '. Desa ' . $item->desa . ', ' . $item->nama_penjual . '</option>';
                    }
                }
            }
        }

        return $hasil;
    }

    public function record_b()
    {
        $hasil = $this->db->query("SELECT count( * ) as  total_record FROM tb_berkas")->result();
        foreach ($hasil as $data) {
            $hsl['b_terdaftar'] = $data->total_record;
        }
        $hasil2 =  $this->db->query("SELECT count( * ) as  total_record FROM tb_berkas WHERE `berkas_selesai`= 0")->result();
        foreach ($hasil2 as $data) {
            $hsl['b_proses'] = $data->total_record;
        }
        $hasil3 =  $this->db->query("SELECT count( * ) as  total_record FROM tb_berkas WHERE `berkas_selesai`= 1")->result();
        foreach ($hasil3 as $data) {
            $hsl['b_selesai'] = $data->total_record;
        }
        $hasil4 =  $this->db->query("SELECT count( * ) as  total_record FROM tb_berkas WHERE `berkas_selesai`>= 2")->result();
        foreach ($hasil4 as $data) {
            $hsl['b_dicabut'] = $data->total_record;
        }
        return $hsl;
    }

    function update_berkas($data, $id)
    {
        $hasil = $this->db->update('tb_berkas', $data, array('id' => $id));
        return $hasil;
    }

    // untuk mendapatkan id dari berkas yang terakhir diinputkan
    public function get_last_id()
    {
        $data = $this->db->select('id')
            ->from('tb_berkas')
            ->order_by('id', 'desc')
            ->limit(1)
            ->get()
            ->result_array();
        foreach ($data as $key) {
            $hsl = $key['id'];
        }
        return $hsl;
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelSertipikat extends CI_Model
{

    //Menyimpan Data Sertipikat ke tabel tb_sertipikat
    public function simpanSertipikat($data = null)
    {
        $this->db->insert('tb_sertipikat', $data);
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

        $a = 1;
        for ($i = 0; $i < count($hasil); $i++) {
            $hasil[$i]->kode_s = 'S' . str_pad($hasil[$i]->no_reg, "5", "0", STR_PAD_LEFT);
            $hasil[$i]->pemilik_hak = str_replace(":", ": \n", $hasil[$i]->pemilik_hak);
            $hasil[$i]->proses = str_replace(",", ", ", $hasil[$i]->proses);
            $hasil[$i]->tgl_daftar = date_format(date_create($hasil[$i]->tgl_daftar), 'd M Y');
            $hasil[$i]->sertipikat = $hasil[$i]->jenis_hak . '. ' . $hasil[$i]->no_sertipikat . '/' . $hasil[$i]->desa;
            if( $this->session->userdata('role_id')!= 2){
                $hasil[$i]->aksi = '<button href="javascript:;" class="badge badge-info edit_sertipikat" data="' . $hasil[$i]->no_reg . '"><i class="fa fa-edit" ></i>Edit</button>';
            } else {
                $hasil[$i]->aksi = '';
            }
            $hasil[$i]->ket = nl2br($hasil[$i]->ket);
            if ($hasil[$i]->luas == 0){
                $hasil[$i]->luas = '';
            } else{
                $hasil[$i]->luas = $hasil[$i]->luas;
            }
            $hasil[$i]->no_urut = $a;
            $a++;
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

    // jumlah sertipikat terdaftar yang ditampilkan pada card record sertipikat
    public function s_terdaftar()
    {
        $hasil = $this->db->query("SELECT count( * ) as  total_record FROM tb_sertipikat")->result();
        foreach ($hasil as $data) {
            $hsl = $data->total_record;
        }
        return $hsl;
    }

    // fungsi untuk update sertipikat
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
        if ($data) {
            foreach ($data as $item) {
                $hasil[] = '<option value="' . $item->no_reg . '">' . $item->no_reg . '. ' . $item->jenis_hak  . ". " . $item->no_sertipikat . "/" . $item->desa . ' A.n.  ' . $item->pemilik_hak . ' | ' . $item->proses . '</option>';
            }
            return $hasil;
        }
    }

    // untuk mengisi form berkas secara otomatis di input berkas
    public function get_sert_for_auto($id)
    {
        $data = $this->db->select('kecamatan.id as id_kecamatan, desa.id as id_desa, desa.nama as desa, proses, pemilik_hak, pembeli_hak')
            ->from('tb_sertipikat')
            ->join('desa', 'tb_sertipikat.dsa = desa.id', 'left')
            ->join('kecamatan', 'desa.id_kecamatan = kecamatan.id', 'left')
            ->where('no_reg', $id)
            ->get()
            ->row_array();
            
        // ubah 'proses' menjadi array
        $data['proses'] = explode(',', $data['proses']);
        return $data;
    }

    //untuk mendapatkan id dari sertipikat terakhir    
    public function get_last_id()
    {
        $data = $this->db->select('no_reg')
            ->from('tb_sertipikat')
            ->order_by('no_reg', 'desc')
            ->limit(1)
            ->get()
            ->result_array();
        if ($data) {
            foreach ($data as $key) {
                $hsl = $key['no_reg'];
            }
            return $hsl;
        }
    }
}

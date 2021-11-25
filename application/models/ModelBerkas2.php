<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBerkas2 extends CI_Model
{
    public function simpanBerkas($data1 = null)
    {
        $this->db->insert('tb_berkas', $data1);
    }

    function cekBerkas($noreg){
		$hsl=$this->db->query("SELECT * FROM tb_sertipikat left join 'tb_sertipikat' on 'tb_sertipikat.no_reg = tb_berkas.reg_sertipikat' WHERE no_reg='$noreg' ");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
                    'no_reg' => $data->no_reg,
                    'no_sertipikat' => $data->no_sertipikat,
                    'jenis_hak' => $data->jenis_hak,
                    'dsa' => $data->dsa,
                    'kec' => $data->kec,
                    'luas' => $data->luas,
                    'pemilik_hak' => $data->pemilik_hak,
                    'pembeli_hak' => $data->pembeli_hak,
                    'tgl_masuk' => $data->tgl_masuk,
                    'proses' => $data->proses,
                    'ket' => $data->ket
					);
			}
		}
		return $hasil;
	}

    public function getBerkas($where = null)
    {
        return $this->db->get_where('tb_berkas', $where);
    }

    public function berkasGet()
    {
        return $this->db->get('tb_berkas');
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

    //update berkas
    public function updateBerkas($data1 = null, $where = null)
    {
        $this->db->update('tb_berkas', $data1, $where);
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
}

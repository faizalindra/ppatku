<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBerkas extends CI_Model
{
    public function simpanBerkas($data1 = null)
    {
        $this->db->insert('tb_berkas', $data1);
    }

    public function getBerkas(){
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

    function berkas_list()
    {
        $hasil = $this->db->query("SELECT * FROM tb_berkas");
        return $hasil->result();
    }

    function simpan_berkas($id, $napen, $desa)
    {
        $hasil = $this->db->query("INSERT INTO tb_berkas (id,nama_penjual,desa)VALUES('$id','$napen','$desa')");
        return $hasil;
    }

    function get_berkas($id)
    {
        $hsl = $this->db->query("SELECT * FROM tb_berkas WHERE id='$id'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'id' => $data->id,
                    'tanggal_masuk' => $data->tanggal_masuk,
                    'reg_sertipikat' => $data->reg_sertipikat,
                    'desa' => $data->desa,
                    'kecamatan' => $data->kecamatan,
                    'jenis_berkas' => $data->jenis_berkas,
                    'status_proses' => $data->status_proses,
                    'nama_penjual' => $data->nama_penjual,
                    'nama_pembeli' => $data->nama_pembeli,
                    'biaya' => $data->biaya,
                    'dp' => $data->dp,
                    'tot_biaya' => $data->tot_biaya,
                    'berkas_selesai' => $data->berkas_selesai,
                );
            }
        }
        return $hasil;
    }

    function update_berkas($id, $tgl, $reg, $kec, $desa, $jenis, $status, $napen, $napem, $biaya, $dp, $tot_biaya, $berkas_s, )
    {
        $hasil = $this->db->query("UPDATE tb_berkas SET nama_penjual='$napen', tgl_masuk='$tgl', reg_sertipikat='$reg' ,desa='$desa', kecamatan='$kec', jenis_berkas='$jenis, status_proses='$status', nama_pembeli='$napem', biaya='$biaya', dp='$dp', tot_biaya='$tot_biaya', berkas_selesai='$berkas_s' WHERE id='$id'");
        return $hasil;
    }

    function hapus_berkas($id)
    {
        $hasil = $this->db->query("DELETE FROM tb_berkas WHERE id='$id'");
        return $hasil;
    }
}

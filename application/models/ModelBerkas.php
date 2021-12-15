<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBerkas extends CI_Model
{
    public function simpanBerkas($data1 = null)
    {
        $this->db->insert('tb_berkas', $data1);
    }

    public function getBerkas()
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

   
    function get_berkas($id)
    {
        $hsl = $this->db->query("SELECT * FROM tb_berkas left join tb_sertipikat on tb_sertipikat.no_reg = tb_berkas.reg_sertipikat WHERE id='$id'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'id' => $data->id,
                    'tgl_masuk' => $data->tgl_masuk,
                    'reg_sertipikat' => $data->reg_sertipikat,
                    'desa' => $data->desa,
                    'kecamatan' => $data->kecamatan,
                    'jenis_berkas' => $data->jenis_berkas,
                    'id_proses' => $data->id_proses,
                    'status_proses' => $data->status_proses,
                    'nama_penjual' => $data->nama_penjual,
                    'nama_pembeli' => $data->nama_pembeli,
                    'biaya' => $data->biaya,
                    'dp' => $data->dp,
                    'tot_biaya' => $data->tot_biaya,
                    'berkas_selesai' => $data->berkas_selesai,
                    'keterangan' => $data->keterangan,
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
        }
        return $hasil;
    }

    function update_berkas($id, $reg, $desa, $kec,  $jenis, $status, $napen, $napem, $biaya, $dp, $tot_biaya, $berkas_s)
    {
        $hasil = $this->db->query("UPDATE tb_berkas SET reg_sertipikat='$reg' ,desa='$desa', kecamatan='$kec', jenis_berkas='$jenis', status_proses='$status', nama_penjual='$napen', nama_pembeli='$napem', biaya='$biaya', dp='$dp', tot_biaya='$tot_biaya', berkas_selesai='$berkas_s' WHERE id='$id'");
        return $hasil;
    }

     // function simpan_berkas($id, $tgl, $reg, $kec, $desa, $jenis, $status, $napen, $napem, $biaya, $dp, $tot_biaya, $ket, $berkas_s)
    // {
    //     $hasil = $this->db->query("INSERT INTO tb_berkas (id,tgl_masuk,reg_sertipikat,desa,kecamatan,jenis_berkas,status_proses,nama_penjual,nama_pembeli,biaya,dp,tot_biaya,keterangan,berkas_selesai)VALUES('$id','$tgl','$reg','$desa','$kec','$jenis','$status','$napen','$napem','$biaya','$dp','$tot_biaya','$ket','$berkas_s')");
    //     return $hasil;
    // }
    // function simpan_berkas2($reg, $kec, $desa, $jenis, $napen, $napem, $biaya, $dp, $tot_biaya, $ket)
    // {
    //     $hasil = $this->db->query("INSERT INTO tb_berkas (reg_sertipikat,desa,kecamatan,jenis_berkas,nama_penjual,nama_pembeli,biaya,dp,tot_biaya,keterangan)VALUES('$reg','$desa','$kec','$jenis','$napen','$napem','$biaya','$dp','$tot_biaya','$ket')");
    //     return $hasil;
    // }

}

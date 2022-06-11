<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelBiaya extends CI_Model
{

    function input_biaya($data)
    {
        $this->db->insert('tb_bayar', $data);
        return 'sukses';
    }

    function get_biaya($id, $idb)
    {
        $hasil = $this->db->get_where('tb_bayar', $id)->result();
        $total_biaya = $this->db->select('tot_biaya')->get_where('tb_berkas', $idb)->row()->tot_biaya;
        $bayar = 0;
        $data['card'][] = '';
        foreach ($hasil as $h) {

            if ($h->jenis_bayar == '0') {
                $bayar += $h->jum_bayar;
            } else if ($h->jenis_bayar == '1') {
                $total_biaya += $h->jum_bayar;
            }

            if ($h->jenis_bayar == 0) {
                $a = '<div class="card border-dark p-0 bg-success" style="color:white;">';
                $b = '';
                $c = '<div class="col-md-3"></div>';
                $d = '<div class="col-md-12 text-right" style="font-size: 12px;">@ ' . $h->penyetor . '</div></div>';
            } else if ($h->jenis_bayar == 1) {
                $a = '<div class="card border-dark p-0 bg-danger" style="color:white;">';
                $b = '<div class="col-md-3"></div>';
                $c = '';
                $d = '<div class="col-md-12 text-left pl-3" style="font-size: 12px;">- ' . nl2br($h->ket_bayar) . '</div>';
            }
            $data['card'][] = '<div class="col-md-12 p-1 card-biaya">
                                <div class="row">' .
                $b . '
                                <div class="col-md-9">' .
                $a .
                '<div class="card-body p-0">
                                        <div class="row" style="font-size: 12px;">
                                            <div class="col-md-6 text-left mb-1 ml-1">' .
                date_format(date_create($h->tgl_bayar), 'd M Y') . '</div></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="text-center">Rp. ' . number_format($h->jum_bayar) . '</h5></div></div>
                                        <div class="row">' .
                $d .
                '</div>
                                </div>
                            </div>' .
                $c .
                '</div>
                    </div>';
        }
        if ($total_biaya == $bayar) {
            $data['status'] = 'Lunas';
            $data['color'][1] = 'background-color';
            $data['color'][2] = '#28a745';
        } else {
            $kurang = $total_biaya - $bayar;
            $data['status'] = 'Rp. ' . number_format($kurang);
            $data['color'][1] = 'background-color';
            $data['color'][2] = '#ffc107';
            $data['ket'] = 'Kurang';
        }
        return $data;
    }
}

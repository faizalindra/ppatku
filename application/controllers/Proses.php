<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        // get_uri();
    }

    public function proses()
    {
        $id = $this->input->get('id');
        $data = $this->ModelProses->get_proses($id);
        echo json_encode($data);
    }

    function index()
    {
        $jp = $this->input->post('jp');
        switch ($jp) {
            case $jp = '1':
                $data = ['ukur' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '2':
                $data = ['pert_teknis' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '3':
                $data = ['perijinan' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '4':
                $data = ['pengeringan' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '5':
                $data = ['cek_plot' => $this->input->post('val')];
                $where = ['no_proses' => $this->input->post('id')];
                $datas = $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '6':
                $data = ['cek_sertipikat' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '7':
                $data = ['roya' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '8':
                $data = ['ganti_nama' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '9':
                $data = ['ukur' =>  $this->input->post('val')];
                $where = ['tapak_kapling' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '10':
                $data = ['bayar_pajak' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '11':
                $data = ['konversi' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '12':
                $data = ['waris' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '13':
                $data = ['balik_nama' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '14':
                $data = ['peningkatan_hak' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '15':
                $data = ['skmht' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '16':
                $data = ['ht' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '17':
                $data = ['kutip_su' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '18':
                $data = ['iph' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '19':
                $data = ['znt' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
            case $jp = '20':
                $data = ['validasi_sert' =>  $this->input->post('val')];
                $where = ['no_proses' =>  $this->input->post('id')];
                $datas = $this->ModelProses->update_proses($data, $where);
                echo json_encode($datas);
                break;
        }
    }

    function berkas_selesai()
    {
        $data = ['berkas_selesai' =>  $this->uri->segment(4)];
        $where = ['id' => $this->uri->segment(3)];
        $datas = $this->ModelProses->berkas_selesai($data, $where);
        echo json_encode($datas);
        redirect('berkas');
    }
    function ukur()
    {
        $data = ['ukur' =>  $this->input->post('val')];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function pert_teknis()
    {
        $data = ['pert_teknis' =>  $this->input->post('val')];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function perijinan()
    {
        $data = [
            'perijinan' =>  $this->input->post('val'),
        ];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function pengeringan()
    {
        $data = ['pengeringan' =>  $this->input->post('val')];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function cek_plot()
    {
        $data = ['cek_plot' => $this->input->post('val')];
        $where = ['no_proses' => $this->input->post('id')];
        $datas = $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
        // echo json_encode($datas);

    }
    function cek_sertipikat()
    {
        $data = [
            'cek_sertipikat' =>  $this->input->post('val'),
        ];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function roya()
    {
        $data = [
            'roya' =>  $this->input->post('val'),
        ];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function ganti_nama()
    {
        $data = [
            'ganti_nama' =>  $this->input->post('val'),
        ];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function tapak_kapling()
    {
        $data = [
            'tapak_kapling' =>  $this->input->post('val'),
        ];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function bayar_pajak()
    {
        $data = [
            'bayar_pajak' =>  $this->input->post('val'),
        ];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function konversi()
    {
        $data = [
            'konversi' =>  $this->input->post('val'),
        ];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function waris()
    {
        $data = [
            'waris' =>  $this->input->post('val'),
        ];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function balik_nama()
    {
        $data = [
            'balik_nama' =>  $this->input->post('val'),
        ];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function peningkatan_hak()
    {
        $data = [
            'peningkatan_hak' =>  $this->input->post('val'),
        ];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function skmht()
    {
        $data = [
            'skmht' =>  $this->input->post('val'),
        ];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function ht()
    {
        $data = [
            'ht' =>  $this->input->post('val'),
        ];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function kutip_su()
    {
        $data = [
            'kutip_su' =>  $this->input->post('val'),
        ];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function znt()
    {
        $data = [
            'znt' =>  $this->input->post('val'),
        ];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function validasi_sert()
    {
        $data = [
            'validasi_sert' =>  $this->input->post('val'),
        ];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
    function iph()
    {
        $data = [
            'iph' =>  $this->input->post('val'),
        ];
        $where = ['no_proses' =>  $this->input->post('id')];
        $datas = $this->ModelProses->update_proses($data, $where);
        echo json_encode($datas);
    }
}

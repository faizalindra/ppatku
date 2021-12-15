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

    function berkas_selesai()
    {
        $data = [
            'berkas_selesai' => $this->uri->segment('4'),
        ];
        $where = ['id' => $this->uri->segment('3')];
        $this->ModelProses->berkas_selesai($data, $where);
        redirect('berkas');
    }
    function ukur()
    {
        $data = [
            'ukur' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function pert_teknis()
    {
        $data = [
            'pert_teknis' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function perijinan()
    {
        $data = [
            'perijinan' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function pengeringan()
    {
        $data = [
            'pengeringan' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function cek_plot()
    {
        $data = [
            'cek_plot' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function cek_sertipikat()
    {
        $data = [
            'cek_sertipikat' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function roya()
    {
        $data = [
            'roya' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function ganti_nama()
    {
        $data = [
            'ganti_nama' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function tapak_kapling()
    {
        $data = [
            'ukur' => $this->uri->segment('4'),
        ];
        $where = ['tapak_kapling' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function bayar_pajak()
    {
        $data = [
            'bayar_pajak' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function konversi()
    {
        $data = [
            'konversi' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function waris()
    {
        $data = [
            'waris' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function balik_nama()
    {
        $data = [
            'balik_nama' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function peningkatan_hak()
    {
        $data = [
            'peningkatan_hak' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function skmht()
    {
        $data = [
            'skmht' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function ht()
    {
        $data = [
            'ht' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function ganti_blangko()
    {
        $data = [
            'ganti_blangko' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function znt()
    {
        $data = [
            'znt' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
    function iph()
    {
        $data = [
            'iph' => $this->uri->segment('4'),
        ];
        $where = ['no_proses' => $this->uri->segment('3')];
        $this->ModelProses->update_proses($data, $where);
        redirect('berkas');
    }
}

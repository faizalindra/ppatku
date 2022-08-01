<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelKelengkapan extends CI_Model
{

    function get_kelengkapan($id2 = null, $id = null)
    {
        //ambil data dari database
        $jb = $this->db->select('jenis_berkas')->from('tb_berkas')->where('id', $id)->get()->result();
        //mengubah objek menjadi array
        foreach ($jb as $j) {
            $jb = $j->jenis_berkas;
        }
        //mengubah objek menjadi array
        $jb = explode(',', $jb);
        $jb_hasil = array();
        //mengdapatkan array kelengkapan beradarkan jenis berkas
        foreach ($jb as $j) {
            switch ($j) {
                case "AJB":
                    $jenis_berkas = array(1, 2, 3, 4, 5, 6, 7, 11, 12);
                    break;
                case "Hibah":
                    $jenis_berkas = array(1, 2, 3, 4, 5, 6, 7, 11, 12, 16);
                    break;
                case "APHB":
                    $jenis_berkas = array(1, 2, 3, 4, 5, 6, 11, 12);
                    break;
                case "Pemecahan":
                    $jenis_berkas = array(1, 3, 11, 12);
                    break;
                case "APHT":
                    $jenis_berkas = array(1, 2, 3, 4, 5, 6, 11, 12, 14, 17);
                    break;
                case "SKMHT":
                    $jenis_berkas = array(1, 2, 3, 4, 5, 6, 11, 12, 14, 17);
                    break;
                case "Konversi":
                    $jenis_berkas = array(1, 2, 3, 4, 5, 6, 12);
                    break;
                case "Ganti Nama":
                    $jenis_berkas = array(1, 2, 11, 15);
                    break;
                case "Pengeringan":
                    $jenis_berkas = array(1, 3, 11, 12);
                    break;
                case "Peningkatan Hak":
                    $jenis_berkas = array(1, 2, 11, 13);
                    break;
                case "Waris":
                    $jenis_berkas = array(8, 9, 10, 11, 12,);
                    break;
                case "Ganti Blangko":
                    $jenis_berkas = array(1, 3, 11, 12);
                    break;
                case "Roya":
                    $jenis_berkas = array(1, 3, 11, 12, 18);
                    break;
                case "Lain-Lain":
                    $jenis_berkas = array(1, 3, 11, 12);
                    break;
            }
            $jb_hasil = array_merge($jb_hasil, $jenis_berkas);
            $jb_hasil = array_unique($jb_hasil);
            sort($jb_hasil);
        }

        ///////////////////////////// tambilan tombol///////////////////////////////////////////////////////
        // <li><a class="badge badge-success" href="#">$kelengkapan[$i]</a></li> /////////////////////////// Sudah
        // <li><a class="badge badge-danger" href="#" data-jb="1" data-id="$id">$kelengkapan[$i]</a></li> // Belum
        $data['ada'] = '';
        $data['belum'] = '';
        $a_keleng = '<li><span class="badge badge-success tbl_keleng" >';
        $b_keleng = '<li><span class="badge badge-danger tbl_keleng"';
        $c_keleng = '</span></li>';
        $kelengkapan = array("", "KTP Pihak 1", "KTP Suami/Istri Pihak 1", "KK Pihak 1", "KTP Pihak 2", "KTP Suami/Istri Pihak 2", "KK Pihak 2", "BPJS", "KTP Ahli Waris", "KK Ahli Waris", "Akta Kematian", "SHM", "SPPT", "IMB", "Order", "Pernyataan Beda Nama", "Persetujuan Hibah", "SPK", "Pengantar Roya");
        $hasil = $this->db->get_where('tb_kelengkapan', $id2)->result();
        foreach ($hasil as $hasil) {
            $data['ket'] = $hasil->ket_kelengkapan;
            foreach ($jb_hasil as $b) {
                switch ($b) {
                    case 1:
                        if ($hasil->ktp_penjual != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="1">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                    case 2:
                        if ($hasil->ktp_p_penjual != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="2">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                    case 3:
                        if ($hasil->kk_penjual != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="3">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                    case 4:
                        if ($hasil->ktp_pembeli != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="4">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                    case 5:
                        if ($hasil->ktp_p_pembeli != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="5">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                    case 6:
                        if ($hasil->kk_pembeli != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="6">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                    case 7:
                        if ($hasil->bpjs != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="7">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                    case 8:
                        if ($hasil->ktp_ahli_waris != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="8">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                    case 9:
                        if ($hasil->kk_ahli_waris != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="9">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                    case 10:
                        if ($hasil->akta_kematian != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="10">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                    case 11:
                        if ($hasil->shm != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="11">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                    case 12:
                        if ($hasil->sppt != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="12">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                    case 13:
                        if ($hasil->imb != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="13">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                    case 14:
                        if ($hasil->order_ != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="14">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                    case 15:
                        if ($hasil->ket_beda_nama != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="15">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                    case 16:
                        if ($hasil->persetujuan_hibah != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="16">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                    case 17:
                        if ($hasil->spk != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="17">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                    case 18:
                        if ($hasil->pengantar_roya != null) {
                            $data['ada'] .=  $a_keleng . $kelengkapan[$b] . $c_keleng;
                        } else {
                            $data['belum'] .=  $b_keleng . 'data="' . $id . '" data_s="18">'.$kelengkapan[$b] . $c_keleng;
                        };
                        break;
                }
            }
        }
        return $data;
    }

    function update_kelengkapan($a, $b)
    {
        $id = array('id_kelengkapan' => $a);
        // $id['id_kelengkapan'] = $id;
        switch ($b) {
            case 1:
                $jk['ktp_penjual'] = 1;
                break;
            case 2:
                $jk['ktp_p_penjual'] = 1;
                break;
            case 3:
                $jk['kk_penjual'] = 1;
                break;
            case 4:
                $jk['ktp_pembeli'] = 1;
                break;
            case 5:
                $jk['ktp_p_pembeli'] = 1;
                break;
            case 6:
                $jk['kk_pembeli'] = 1;
                break;
            case 7:
                $jk['bpjs'] = 1;
                break;
            case 8:
                $jk['ktp_ahli_waris'] = 1;
                break;
            case 9:
                $jk['kk_ahli_waris'] = 1;
                break;
            case 10:
                $jk['akta_kematian'] = 1;
                break;
            case 11:
                $jk['shm'] = 1;
                break;
            case 12:
                $jk['sppt'] = 1;
                break;
            case 13:
                $jk['imb'] = 1;
                break;
            case 14:
                $jk['order_'] = 1;
                break;
            case 15:
                $jk['ket_beda_nama'] = 1;
                break;
            case 16:
                $jk['persetujuan_hibah'] = 1;
                break;
            case 17:
                $jk['spk'] = 1;
                break;
            case 18:
                $jk['pengantar_roya'] = 1;
                break;
        }
        $this->db->update('tb_kelengkapan', $jk, $id);
    }

    function update_keterangan($ket, $id)
    {
        $this->db->update('tb_kelengkapan', $ket, $id);
    }
}

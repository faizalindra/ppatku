<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelProses extends CI_Model
{
    // public function update_proses($data, $where)
    // {
    // return $this->db->query("UPDATE * FROM `tb_ket_proses` set 'ukur'='$uji[0]' WHERE `no_proses`='$uji[1]'");
    // $this->db->update('tb_ket_proses', $data, $where);////////
    // return $hasil->result_array();
    // }
    function berkas_selesai($data, $where, $id = null)
    {
        // return $this->db->query("UPDATE * FROM `tb_ket_proses` set 'ukur'='$uji[0]' WHERE `no_proses`='$uji[1]'");
        //get no_sertipikat from tb berkas
        $this->db->update('tb_berkas', $data, $where);
        if (!empty($id)) {
            $datas = $this->db->select('reg_sertipikat')
                ->from('tb_berkas')
                ->where('id', $id)
                ->get()
                ->row_array();
            foreach ($datas as $key => $value) {
                $hsl['no_reg'] = $value;
            }
            $target = ['is_used' => 0];
            $this->db->update('tb_sertipikat', $target, $hsl);
        }

        // return $hasil->result_array();
    }


    function get_proses($id, $ids)
    {
        $jb = $this->db->select('jenis_berkas')->from('tb_berkas')->where('id', $id)->get()->result();
        foreach ($jb as $j) {
            $jb = $j->jenis_berkas;
        }
        $jb = explode(',', $jb);
        $jb_hasil = array();
        foreach ($jb as $j) {
            switch ($j) {
                case "AJB":
                    $jenis_berkas = array(5, 7, 8, 10, 13);
                    break;
                case "Hibah":
                    $jenis_berkas = array(5, 7, 8, 10, 13);
                    break;
                case "APHB":
                    $jenis_berkas = array(5, 7, 8, 10, 13);
                    break;
                case "Pemecahan":
                    $jenis_berkas = array(5, 9);
                    break;
                case "APHT":
                    $jenis_berkas = array(5, 6, 16);
                    break;
                case "SKMHT":
                    $jenis_berkas = array(15);
                    break;
                case "Konversi":
                    $jenis_berkas = array(1, 10, 11);
                    break;
                case "Ganti Nama":
                    $jenis_berkas = array(5, 8);
                    break;
                case "Pengeringan":
                    $jenis_berkas = array(2, 3, 4);
                    break;
                case "Peningkatan Hak":
                    $jenis_berkas = array(14);
                    break;
                case "Waris":
                    $jenis_berkas = array(5, 10, 12);
                    break;
                case "Ganti Blangko":
                    $jenis_berkas = array(1, 20, 17);
                    break;
            }
            $jb_hasil = array_merge($jb_hasil, $jenis_berkas);
            $jb_hasil = array_unique($jb_hasil);
            sort($jb_hasil);
            $data = array();
            $a_proses = '<a class="badge badge-secondary"  href="#" id="btn-proses';
            $b_proses = '<a class="badge badge-warning"  href="#" id="btn-proses';
            $c_proses = '<a class="badge badge-success" href="#">';
            $d = '</a>';
            $arr_proses = array("", "Ukur", "Pertimbangan Teknis", "Perijinan", "Pengeringan", "Cek Plot", "Cek Sertipikat", "Roya", "Ganti Nama", "Tapak Kapling", "Validasi Pajak", "Konversi", "Waris", "Balik Nama", "Peningkatan Hak", "SKMHT", "APHT", "Kutip SU", "IPH", "ZNT", "Validasi Sertipikat");
            // $arr_prose2 = array("", "ukur", "pert_teknis", "perijinan", "pengeringan", "cek_plot", "cek_sertipikat", "roya", "ganti_nama", "tapak_kapling", "bayar_pajak", "konversi", "waris", "balik_nama", "peningkatan_hak", "skmht", "ht", "kutip_su", "iph", "znt", "validasi_sert");
            $hasil = $this->db->get_where('tb_ket_proses', $ids)->result();
            foreach ($hasil as $hsl) {
                $data['ket'] = $hsl->ket_proses;
                foreach ($jb_hasil as $b) {
                    switch ($b) {
                        case 1:
                            if ($hsl->ukur == null && $hsl->ukur == 0) {
                                $data['proses'][] = $a_proses . '1" onclick="proses(' . $id . ',1,1)">'  . $arr_proses[$b] . $d;
                            } else if ($hsl->ukur == 1) {
                                $data['proses'][] = $b_proses . '1" onclick="proses(' . $id . ',2,1)">'  . $arr_proses[$b] . $d;
                            } else if ($hsl->ukur == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 2:
                            if ($hsl->pert_teknis == null && $hsl->pert_teknis == 0) {
                                $data['proses'][] = $a_proses . '2" onclick="proses(' . $id . ',1,2)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->pert_teknis == 1) {
                                $data['proses'][] = $b_proses . '2" onclick="proses(' . $id . ',2,2)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->pert_teknis == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 3:
                            if ($hsl->perijinan == null && $hsl->perijinan == 0) {
                                $data['proses'][] = $a_proses . '3" onclick="proses(' . $id . ',1,3)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->perijinan == 1) {
                                $data['proses'][] = $b_proses . '3" onclick="proses(' . $id . ',2,3)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->perijinan == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 4:
                            if ($hsl->pengeringan == null && $hsl->pengeringan == 0) {
                                $data['proses'][] = $a_proses . '4" onclick="proses(' . $id . ',1,4)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->pengeringan == 1) {
                                $data['proses'][] = $b_proses . '4" onclick="proses(' . $id . ',2,4)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->pengeringan == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 5:
                            if ($hsl->cek_plot == null && $hsl->cek_plot == 0) {
                                $data['proses'][] = $a_proses . '5" onclick="proses(' . $id . ',1,5)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->cek_plot == 1) {
                                $data['proses'][] = $b_proses . '5" onclick="proses(' . $id . ',2,5)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->cek_plot == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 6:
                            if ($hsl->cek_sertipikat == null && $hsl->cek_sertipikat == 0) {
                                $data['proses'][] = $a_proses . '6" onclick="proses(' . $id . ',1,6)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->cek_sertipikat == 1) {
                                $data['proses'][] = $b_proses . '6" onclick="proses(' . $id . ',2,6)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->cek_sertipikat == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 7:
                            if ($hsl->roya == null && $hsl->roya == 0) {
                                $data['proses'][] = $a_proses . '7" onclick="proses(' . $id . ',1,7)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->roya == 1) {
                                $data['proses'][] = $b_proses . '7" onclick="proses(' . $id . ',2,7)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->roya == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 8:
                            if ($hsl->ganti_nama == null && $hsl->ganti_nama == 0) {
                                $data['proses'][] = $a_proses . '8" onclick="proses(' . $id . ',1,8)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->ganti_nama == 1) {
                                $data['proses'][] = $b_proses . '8" onclick="proses(' . $id . ',2,8)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->ganti_nama == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 9:
                            if ($hsl->tapak_kapling == null && $hsl->tapak_kapling == 0) {
                                $data['proses'][] = $a_proses . '9" onclick="proses(' . $id . ',1,9)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->tapak_kapling == 1) {
                                $data['proses'][] = $b_proses . '9" onclick="proses(' . $id . ',2,9)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->tapak_kapling == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 10:
                            if ($hsl->bayar_pajak == null && $hsl->bayar_pajak == 0) {
                                $data['proses'][] = $a_proses . '10" onclick="proses(' . $id . ',1,10)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->bayar_pajak == 1) {
                                $data['proses'][] = $b_proses . '10" onclick="proses(' . $id . ',2,10)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->bayar_pajak == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 11:
                            if ($hsl->konversi == null && $hsl->konversi == 0) {
                                $data['proses'][] = $a_proses . '11" onclick="proses(' . $id . ',1,11)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->konversi == 1) {
                                $data['proses'][] = $b_proses . '11" onclick="proses(' . $id . ',2,11)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->konversi == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 12:
                            if ($hsl->waris == null && $hsl->waris == 0) {
                                $data['proses'][] = $a_proses . '12" onclick="proses(' . $id . ',1,12)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->waris == 1) {
                                $data['proses'][] = $b_proses . '12" onclick="proses(' . $id . ',2,12)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->waris == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 13:
                            if ($hsl->balik_nama == null && $hsl->balik_nama == 0) {
                                $data['proses'][] = $a_proses . '13" onclick="proses(' . $id . ',1,13)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->balik_nama == 1) {
                                $data['proses'][] = $b_proses . '13" onclick="proses(' . $id . ',2,13)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->balik_nama == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 14:
                            if ($hsl->peningkatan_hak == null && $hsl->peningkatan_hak == 0) {
                                $data['proses'][] = $a_proses . '14" onclick="proses(' . $id . ',1,14)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->peningkatan_hak == 1) {
                                $data['proses'][] = $b_proses . '14" onclick="proses(' . $id . ',2,14)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->peningkatan_hak == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 15:
                            if ($hsl->skmht == null && $hsl->skmht == 0) {
                                $data['proses'][] = $a_proses . '15" onclick="proses(' . $id . ',1,15)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->skmht == 1) {
                                $data['proses'][] = $b_proses . '15" onclick="proses(' . $id . ',2,15)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->skmht == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 16:
                            if ($hsl->ht == null && $hsl->ht == 0) {
                                $data['proses'][] = $a_proses . '16" onclick="proses(' . $id . ',1,16)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->ht == 1) {
                                $data['proses'][] = $b_proses . '16" onclick="proses(' . $id . ',2,16)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->ht == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 17:
                            if ($hsl->kutip_su == null && $hsl->kutip_su == 0) {
                                $data['proses'][] = $a_proses . '17" onclick="proses(' . $id . ',1,17)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->kutip_su == 1) {
                                $data['proses'][] = $b_proses . '17" onclick="proses(' . $id . ',2,17)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->kutip_su == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 18:
                            if ($hsl->iph == null && $hsl->iph == 0) {
                                $data['proses'][] = $a_proses . '18" onclick="proses(' . $id . ',1,18)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->iph == 1) {
                                $data['proses'][] = $b_proses . '18" onclick="proses(' . $id . ',2,18)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->iph == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 19:
                            if ($hsl->znt == null && $hsl->znt == 0) {
                                $data['proses'][] = $a_proses . '19" onclick="proses(' . $id . ',1,19)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->znt == 1) {
                                $data['proses'][] = $b_proses . '19" onclick="proses(' . $id . ',2,19)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->znt == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                        case 20:
                            if ($hsl->validasi_sert == null && $hsl->validasi_sert == 0) {
                                $data['proses'][] = $a_proses . '20" onclick="proses(' . $id . ',1,10)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->validasi_sert == 1) {
                                $data['proses'][] = $b_proses . '20" onclick="proses(' . $id . ',2,20)">' . $arr_proses[$b] . $d;
                            } else if ($hsl->validasi_sert == 2) {
                                $data['proses'][] = $c_proses . $arr_proses[$b] . $d;
                            };
                            break;
                    }
                }
            }
        }
        return $data;
    }

    function update_proses($a, $b, $c)
    {
        $id = array('no_proses' => $a);
        // $data = array();
        switch ($c) {
            case 1:
                $data['ukur'] = $b;
                break;
            case 2:
                $data['pert_teknis'] = $b;
                break;
            case 3:
                $data['perijinan'] = $b;
                break;
            case 4:
                $data['pengeringan'] = $b;
                break;
            case 5:
                $data['cek_plot'] = $b;
                break;
            case 6:
                $data['cek_sertipikat'] = $b;
                break;
            case 7:
                $data['roya'] = $b;
                break;
            case 8:
                $data['ganti_nama'] = $b;
                break;
            case 9:
                $data['tapak_kapling'] = $b;
                break;
            case 10:
                $data['bayar_pajak'] = $b;
                break;
            case 11:
                $data['konversi'] = $b;
                break;
            case 12:
                $data['waris'] = $b;
                break;
            case 13:
                $data['balik_nama'] = $b;
                break;
            case 14:
                $data['peningkatan_hak'] = $b;
                break;
            case 15:
                $data['skmht'] = $b;
                break;
            case 16:
                $data['ht'] = $b;
                break;
            case 17:
                $data['kutip_su'] = $b;
                break;
            case 18:
                $data['iph'] = $b;
                break;
            case 19:
                $data['znt'] = $b;
                break;
            case 20:
                $data['validasi_sert'] = $b;
                break;
        }
        $this->db->update('tb_ket_proses', $data, $id);
        // return $data;

    }

    function update_keterangan($ket, $id)
    {
        $this->db->update('tb_ket_proses', $ket, $id);
    }
}

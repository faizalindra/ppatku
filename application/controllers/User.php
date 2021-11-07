<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        // $data['judul'] = 'Profil Saya';
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        // $data['judul'] = 'Data Anggota';
        // $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        // $this->db->where('role_id', 1);
        // $data['user'] = $this->db->get('user')->result_array();
        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        // $this->load->view('user/index', $data);
        // $this->load->view('templates/footer');
    }

    public function hapusUser()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelUser->hapusUser($where);
        redirect('user/manajemenUser');
    }

    public function ubahProfil()
    {
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak Boleh Kosong'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubah-profile', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama', true);
            $username = $this->input->post('username', true);
            $this->db->set('nama', $nama);
            $this->db->where('username', $username);
            $this->db->update('user');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Profil Berhasil diubah </div>');
            redirect('user');
        }
    }

    // public function ubahPassword()
    // {
    //     $data['judul'] = 'Ubah Password';
    //     $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();

    //     $this->form_validation->set_rules('password_sekarang', 'Password Saat ini', 'required|trim', [
    //         'required' => 'Password saat ini harus diisi'
    //     ]);

    //     $this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[4]|matches[password_baru2]', [
    //         'required' => 'Password Baru harus diisi',
    //         'min_length' => 'Password tidak boleh kurang dari 4 digit',
    //         'matches' => 'Password Baru tidak sama dengan ulangi password'
    //     ]);

    //     $this->form_validation->set_rules('password_baru2', 'Konfirmasi Password Baru', 'required|trim|min_length[4]|matches[password_baru1]', [
    //         'required' => 'Ulangi Password harus diisi',
    //         'min_length' => 'Password tidak boleh kurang dari 4 digit',
    //         'matches' => 'Ulangi Password tidak sama dengan password baru'
    //     ]);

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('user/ubah-password', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $pwd_skrg = $this->input->post('password_sekarang', true);
    //         $pwd_baru = $this->input->post('password_baru1', true);
    //         if (!password_verify($pwd_skrg, $data['user']['password'])) {
    //             $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Saat ini Salah!!! </div>');
    //             redirect('user/ubahPassword');
    //         } else {
    //             if ($pwd_skrg == $pwd_baru) {
    //                 $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Baru tidak boleh sama dengan password saat ini!!! </div>');
    //                 redirect('user/ubahPassword');
    //             } else {
    //                 //password ok
    //                 $password_hash = password_hash($pwd_baru, PASSWORD_DEFAULT);

    //                 $this->db->set('password', $password_hash);
    //                 $this->db->where('username', $this->session->userdata('username'));
    //                 $this->db->update('user');

    //                 $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Password Berhasil diubah</div>');
    //                 redirect('user/ubahPassword');
    //             }
    //         }
    //     }
    // }

    public function manajemenUser()
    {
        // if ($this->session->userdata('username')) {
        //     redirect('user');
        // }
        // Rule, nama harus di isi, jika belum muncul peringatan 'Nama Belum Diisi'
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Belum diis!!'
        ]);
        // Rule, username harus di isi, minimal panjang username adalah 5 karakter, username harus unik
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|is_unique[user.username]', [
            'required' => 'Username Belum diisi!!',
            'is_unique' => 'Username Sudah Terdaftar!'
        ]);
        // Rule, Password harus di isi, minimal 3 karakter, password harus sama dengan password2
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Tidak Sama!!',
            'min_length' => 'Password Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
        //jika jida disubmit kemudian validasi form diatas tidak berjalan, maka akan tetap berada di
        //tampilan registrasi. tapi jika disubmit kemudian validasi form diatas berjalan, maka data yang 
        //diinput akan disimpan ke dalam tabel user
        if ($this->form_validation->run() == false) {
            $data['staff'] = $this->db->get('user')->result_array();
            $data['judul'] = 'Registrasi';
            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar');
            $this->load->view('admin/user/formRegistrasi');
            $this->load->view('admin/user/tabelUser', $data);
            $this->load->view('admin/footer');
            // $this->load->view('autentifikasi/registrasi');
        } else {
            $username = $this->input->post('username', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($username),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
            ];

            $this->ModelUser->simpanData($data); //menggunakan model

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
            redirect('user/manajemenUser');
        }
    }

}

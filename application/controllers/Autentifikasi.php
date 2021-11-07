<?php

class Autentifikasi extends CI_Controller{

    // public function __construct()
    // {
    //     parent::__construct();
    //     cek_login();
    // }


    public function index(){
        

        //jika user masih memiliki sesi login user tidak perlu melakukan login, melainkan akan langsung 
        //diarahkan ke halaman user
        if($this->session->userdata('username')){
            redirect('admin');
        }

        //validasi apakah username sudah di isi atau belum
        $this->form_validation->set_rules('username', 'Username', 'required|trim', 
            ['required' => 'Username Harus Diisi!!!']);

        //validasi apakah password sudah di isi atau belum
        $this->form_validation->set_rules('password', 'Password', 'required|trim',
            ['required' => 'Password Harus Diisi!!!']);
        
        //jika validasi gagal maka tampilkan halaman login
        if($this->form_validation->run() == false){
            $data['user'] = '';
            $this->load->view('autentifikasi/login');
        }else{
            $this->_login();
        }
    }

    private function _login(){
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $user = $this->ModelUser->cekData(['username' => $username])->row_array();


        //jika user ada
        if($user){
            //jika user sudah aktif
            if ($user['is_active'] == 1){
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id'] == 1){
                        //jika benar arahkan ke controller admin
                        redirect('admin');
                    } else {
                        //jika benar arahkan ke controller user
                        redirect('user');
                    }
                    // redirect('test1');
                //jika password yang dimasukan salah munculkan peringatan salah password dan arahkan ke controller autentifikasi lagi
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password Salah!!</div>');
                    redirect('autentifikasi');
                }

            //jika ststus user belum aktif munculkan peringatan user belum aktif dan arahkan ke controller autentifikasi lagi
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User Belum aktif!!</div>');
                redirect('autentifikasi');
            }

        //jika username tidak ada maka munculkan pesan user belum terdaftar dan arahkan ke controller autentifikasi lagi
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User tidak terdaftar</div>');
            redirect('autentifikasi');
        }
    }

    // public function manajemenUser(){
    //     $data['staff'] = $this->db->get('user')->result_array();
    //     $this->load->view('admin/header');
    //     $this->load->view('admin/sidebar');
    //     $this->load->view('admin/topbar');
        // $this->load->view('admin/user/formRegistrasi');
    //     $this->load->view('admin/user/manajemenUser', $data);
    //     $this->load->view('admin/footer');
    // }

    // public function registrasi()
    // {
        // if ($this->session->userdata('username')) {
        //     redirect('user');
        // }
        // Rule, nama harus di isi, jika belum muncul peringatan 'Nama Belum Diisi'
        // $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
        //     'required' => 'Nama Belum diis!!'
        // ]);
        // Rule, username harus di isi, minimal panjang username adalah 5 karakter, username harus unik
        // $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|is_unique[user.username]', [
        //     'required' => 'Username Belum diisi!!',
        //     'is_unique' => 'Username Sudah Terdaftar!'
        // ]);
        // Rule, Password harus di isi, minimal 3 karakter, password harus sama dengan password2
        // $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
        //     'matches' => 'Password Tidak Sama!!',
        //     'min_length' => 'Password Terlalu Pendek'
        // ]);
        // $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
        //jika jida disubmit kemudian validasi form diatas tidak berjalan, maka akan tetap berada di
        //tampilan registrasi. tapi jika disubmit kemudian validasi form diatas berjalan, maka data yang 
        //diinput akan disimpan ke dalam tabel user
        // if ($this->form_validation->run() == false) {
        //     $data['staff'] = $this->db->get('user')->result_array();
        //     $data['judul'] = 'Registrasi';
        //     $this->load->view('admin/header');
        //     $this->load->view('admin/sidebar');
        //     $this->load->view('admin/topbar');
        //     $this->load->view('admin/user/formRegistrasi');
        //     // $this->load->view('admin/user/tabelUser', $data);
        //     $this->load->view('admin/footer');
            // $this->load->view('autentifikasi/registrasi');
        // } else {
        //     $username = $this->input->post('username', true);
        //     $data = [
        //         'nama' => htmlspecialchars($this->input->post('nama', true)),
        //         'username' => htmlspecialchars($username),
        //         'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        //         'role_id' => 2,
        //         'is_active' => 1,
        //     ];

        //     $this->ModelUser->simpanData($data); //menggunakan model

        //     $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Selamat!! akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
        //     redirect('autentifikasi');
        // }
    // }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
        redirect('autentifikasi');
    }
}

<?php

class Autentifikasi extends CI_Controller{

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

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
        redirect('autentifikasi');
    }
}

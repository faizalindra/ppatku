<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }


    public function hapusUser()
    {
        $where['id'] = $this->input->post('id');
        $this->input->post('kode');
        $this->ModelUser->hapusUser($where);
        echo json_encode($where);
    }

    public function update_user()
    {
        if (!empty($this->input->post('kode'))) {
            $where = ['id' => $this->input->post('id')];
            if ($this->input->post('status') == '1') {
                $data = ['is_active' => '0'];
            } else {
                $data = ['is_active' => '1'];
            }
            $this->ModelUser->update_user($where, $data);
            echo json_encode($where);
        }
    }

    public function ubah_role(){
        if (!empty($this->input->post('kode'))) {
            $where = ['id' => $this->input->post('id')];
            if ($this->input->post('role') == '2') {
                $data = ['role_id' => '1'];
            } else {
                $data = ['role_id' => '2'];
            }
            $this->ModelUser->update_user($where, $data);
            echo json_encode($where);
        }
    }

    public function update_profile(){
        $where['id'] = $this->input->post('id');
        if(!empty($this->input->post('username'))){
            $data['username'] = $this->input->post('username');
        }
        if(!empty($this->input->post('password'))){
            $data['password'] =  password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }
        $this->ModelUser->update_user($where, $data);
        echo json_encode('berhasil');
    }

    public function profile(){
        $data['judul'] = 'Profile';
        $data['id'] = $this->session->userdata('id');
        $data['nama'] = $this->session->userdata('nama');
        $data['username'] = $this->session->userdata('username');
        $data['role_id'] = $this->session->userdata('role_id');
        $this->load->view('templates/header', $data);
        $this->load->view('sidebar/user/profile', $data);
        $this->load->view('templates/footer');
    }

    public function manajemenUser()
    {
        // Rule, nama harus di isi, jika belum muncul peringatan 'Nama Belum Diisi'
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Belum diisi!!'
        ]);
        // Rule, username harus di isi, minimal panjang username adalah 5 karakter, username harus unik
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|is_unique[user.username]', [
            'required' => 'Username Belum diisi!!',
            'is_unique' => 'Username Sudah Terdaftar!'
        ]);
        // Rule, Password harus di isi, minimal 3 karakter, password harus sama dengan password2
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password Terlalu Pendek',
            'required' => 'Password Harus diisi!!'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]', [
            'required' => 'Password Harus diisi!!',
            'matches' => 'Password Tidak Sama!!',
        ]);
        //jika jida disubmit kemudian validasi form diatas tidak berjalan, maka akan tetap berada di
        //tampilan registrasi. tapi jika disubmit kemudian validasi form diatas berjalan, maka data yang 
        //diinput akan disimpan ke dalam tabel user
        if ($this->form_validation->run() == false) {
            $data['staff'] = $this->db->get('user')->result_array();
            $data['judul'] = 'Registrasi';
            $this->load->view('templates/header', $data);
            $this->load->view('sidebar/user/tabelUser', $data);
            $this->load->view('templates/footer');
            $this->session->set_flashdata('hasil_input', 1);
        } else {
            $username = $this->input->post('username', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($username),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'is_active' => 0,
            ];
            if($this->session->userdata('role_id') == 1){
                $data['role_id'] = '2';
            } else{
                $data['role_id'] = $this->input->post('role');
            }

            $this->ModelUser->simpanData($data); //menggunakan model

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">User '. $username .' berhasil dibuat<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button></div>');
            redirect('user/manajemenUser');
        }
    }
}

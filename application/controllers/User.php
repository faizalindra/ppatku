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
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();
        $data['berkas'] = $this->ModelBerkas->getBerkasQuery();
        // $data['berkas2'] = $this->ModelBerkas->getBerkasQuery()->result_array();
        $data['judul'] = "Dashboard";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarStaff');
        $this->load->view('templates/topbar');
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
    }

    public function hapusUser()
    {
        // $where = ['id' => $this->input->post('id')];
        $where['id'] = $this->input->post('id');
        $this->input->post('kode');
        $this->ModelUser->hapusUser($where);
        // return 'berhasil';
        echo json_encode($where);
        // redirect('user/manajemenUser');
    }

    public function active_deactive()
    {
        if (!empty($this->input->post('kode'))) {
            $where = ['id' => $this->input->post('id')];
            if ($this->input->post('status') == '1') {
                $data = ['is_active' => '0'];
            } else {
                $data = ['is_active' => '1'];
            }
            $this->ModelUser->active_deactive($where, $data);
            echo json_encode($where);
        }


        // redirect('user/manajemenUser');
    }

    public function ubahProfil()
    {
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->ModelUser->cekData(['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak Boleh Kosong'
        ]);


        if ($this->form_validation->run() == false) {
            $data['judul'] = "Daftar Berkas";
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

    public function user()
    {
        $data['staff'] = $this->db->get('user')->result_array();
        $data['judul'] = 'Registrasi';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebarNotaris');
        $this->load->view('templates/topbar');
        $this->load->view('notaris/formRegistrasi');
        $this->load->view('notaris/tabelUser', $data);
        $this->load->view('templates/footer');
    }

    public function inputUser()
    {
        $username = $this->input->post('username', true);
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($username),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1,
        ];
        $this->ModelUser->simpanData($data);
    }

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
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebarAdmin');
            $this->load->view('templates/topbar');
            $this->load->view('admin/user/formRegistrasi');
            $this->load->view('admin/user/tabelUser', $data);
            $this->load->view('templates/footer');
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

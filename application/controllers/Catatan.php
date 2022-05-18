<?php

class Catatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $uid = array(
            'user_id_catatan' => $this->session->userdata('id'),
        );
        $data['catatan'] = $this->ModelTest->catatan($uid);
        $data['judul'] = "Catatan";
        $this->load->view('templates/header', $data);
        //jika user adalah notaris load
        if ($this->session->userdata('role_id') == 0) {
            $this->load->view('templates/sidebarNotaris', $data);
        } else if ($this->session->userdata('role_id') == 1) {
            $this->load->view('templates/sidebarAdmin', $data);

        } else{
            $this->load->view('templates/sidebarStaff',$data);
        }
        $this->load->view('templates/topbar');
        $this->load->view('sidebar/catatan/tabelCatatan', $data);
        $this->load->view('templates/footer');
    }

    public function input_catatan()
    {
        $data = array(
            'isi_catatan' => $this->input->post('txt_catatan'),
            'user_id_catatan' => $this->session->userdata('id'),
        );
        if ($this->input->post('bintang') != null) {
            $data['star_catatan'] = $this->input->post('bintang');
        }
        $this->ModelCatatan->input_catatan($data);
        echo json_encode($data);
        redirect('catatan');
    }

    public function bintang_catatan()
    {
        $where = array('id_catatan' => $this->uri->segment(3));
        $data = array(
            'star_catatan' => 1,
        );
        $this->ModelCatatan->bintang_catatan($data, $where);
        redirect('catatan');
    }

    public function hapus_catatan(){
        $where = array('id_catatan' => $this->uri->segment(3));
        $this->ModelCatatan->hapus_catatan($where);
        redirect('catatan');
    }
    public function hapus_catatan_dash(){
        $where = array('id_catatan' => $this->uri->segment(3));
        $this->ModelCatatan->hapus_catatan($where);
        redirect(base_url());
    }
}

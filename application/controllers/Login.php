<?php

class Login2 extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_login');
    }

    function index(){
        $this->load->view('login');
    }

    function aksi_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => md5($password)
        );

        $cek = $this->m_login->cek_login("admin", $where);
    }
    
        
    


}


?>
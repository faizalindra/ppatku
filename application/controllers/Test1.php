<?php

class Test1 extends CI_Controller{
    public function index(){
        $data['user'] = 'indra';
        $this->load->view('welcome_message', $data);
    }
}

?>
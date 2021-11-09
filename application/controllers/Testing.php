<?php 

class Testing extends CI_Controller{

    public function index(){
        $this->load->view('admin/header');
        $this->load->view('test/datepick');
        $this->load->view('admin/footer');
    }
} 
?>
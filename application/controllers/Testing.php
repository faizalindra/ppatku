<?php

class Testing extends CI_Controller
{
    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('test/datepick');
        $this->load->view('admin/footer');
    }
    public function prosesi()
    {
        $this->load->view('test/test2');
    }

    public function uji()
    {
        $id = $this->input->get('id');
        $data = $this->ModelTest->proses3($id);
        echo json_encode($data);
    }

    function uji2()
    {
        $id = $this->input->get('id');
        // $id = 1;
        $data = $this->ModelTest->proses3($id);
        echo json_encode($data);
    }

}

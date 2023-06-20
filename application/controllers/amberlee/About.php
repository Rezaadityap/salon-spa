<?php

class About extends CI_Controller{
    public function index(){
        $data['title'] = "Amberlee";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/about',$data);
        $this->load->view('templates/footer',$data);
    }
}
?>
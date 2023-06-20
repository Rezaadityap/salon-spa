<?php

class Kontak extends CI_Controller{
    public function index(){
        $data['title'] = "Amberlee";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/kontak',$data);
        $this->load->view('templates/footer',$data);
    }
}
?>
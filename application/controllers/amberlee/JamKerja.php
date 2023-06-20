<?php

class JamKerja extends CI_Controller{
    public function index(){
        $data['title'] = "Amberlee";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/jamKerja',$data);
        $this->load->view('templates/footer',$data);
    }
}
?>
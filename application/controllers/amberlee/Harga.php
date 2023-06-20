<?php

class Harga extends CI_Controller{
    public function index(){
        $data['title'] = "Amberlee";
        $data ['treatment'] = $this->ModelSalon->get_data('data_treatment')->result();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/harga',$data);
        $this->load->view('templates/footer',$data);
    }
}
?>
<?php

class Produk extends CI_Controller{
    public function index(){
        $data['title'] = "Amberlee";
        $data ['treatment'] = $this->ModelSalon->get_data('data_treatment')->result();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/produk',$data);
        $this->load->view('templates/footer',$data);
    }
}
?>
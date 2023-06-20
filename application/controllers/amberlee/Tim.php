<?php

class Tim extends CI_Controller{
    public function index(){
        $data['title'] = "Amberlee";
        $data ['karyawan'] = $this->ModelSalon->get_data('data_karyawan')->result();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/tim',$data);
        $this->load->view('templates/footer',$data);
    }
}
?>
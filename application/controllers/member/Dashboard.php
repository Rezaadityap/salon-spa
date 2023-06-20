<?php

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses')!='3'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login!</strong>
        </div>'); 
        redirect('Login');
        }
    }

    public function index(){
        $data['title'] = "Dashboard";
        $data['amberlee'] = "Amberlee Salon&Spa";
        $id = $this->session->userdata('id_member');
        $data['produk'] = $this->db->query("SELECT * FROM data_treatment, data_member WHERE data_member.id_member='$id'")->result();
        $this->load->view('templates/templates_member/header',$data);
        $this->load->view('member/dashboard',$data);
        $this->load->view('templates/templates_member/footer',$data);
    }

    public function detail($id){
        $data['title'] = "Detail";
        $data['amberlee'] = "Amberlee Salon&Spa";
        $data['detail'] = $this->ModelSalon->ambil_id_produk($id);
        $this->load->view('templates/templates_member/header',$data);
        $this->load->view('member/detailProduk',$data);
        $this->load->view('templates/templates_member/footer',$data);
    }
}

?>
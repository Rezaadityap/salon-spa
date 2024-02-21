<?php 

class TentangKami extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses')!='3'){
            $this->session->set_flashdata('massage',' Anda belum Login!'); 
        redirect('Login');
        }
    }
    
    public function index(){
        $data['amberlee'] = "Amberlee Salon&Spa";
        $this->load->view('templates/templates_member/header',$data);
        $this->load->view('member/tentangKami',$data);
        $this->load->view('templates/templates_member/footer',$data);
    }
}

?>
<?php 

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses')!='2'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login!</strong>
        </div>'); 
        redirect('admin/Login');
        }
    }
    public function index(){
        $data['title'] = "Dashboard";
        $id = $this->session->userdata('id_karyawan'); 
        $data['karyawan'] = $this->db->query("SELECT * FROM data_karyawan WHERE id_karyawan='$id'")->result();
        $this->load->view('templates_karyawan/header',$data);
        $this->load->view('templates_karyawan/sidebar');
        $this->load->view('karyawan/dashboard',$data);
        $this->load->view('templates_karyawan/footer');
    }
}

?>
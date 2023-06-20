<?php 

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses')!='1'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login!</strong>
        </div>'); 
        redirect('admin/Login');
        }
    }
    public function index(){
        $data['title'] = "Dashboard";
        $karyawan = $this->db->query("SELECT * FROM data_karyawan");
        $therapist = $this->db->query("SELECT * FROM data_karyawan WHERE nama_jabatan = 'Therapist'");
        $treatment = $this->db->query("SELECT * FROM data_treatment");
        $pesan = $this->db->query("SELECT * FROM pesan");

        $data ['karyawan'] = $karyawan->num_rows();
        $data ['therapist'] = $therapist->num_rows();
        $data ['treatment'] = $treatment->num_rows();
        $data ['pesan'] = $pesan->num_rows();

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('templates_admin/footer');
        
    }
}

?>
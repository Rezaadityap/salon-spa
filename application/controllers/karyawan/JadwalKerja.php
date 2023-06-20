<?php

class JadwalKerja extends CI_Controller{
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
        $data['title'] = "Jadwal Kerja";
        $id = $this->session->userdata('id_karyawan'); 
        $data['jadwal'] = $this->db->query("SELECT jadwal .*, data_karyawan.nama_karyawan
        FROM jadwal
        INNER JOIN data_karyawan ON data_karyawan.nama_karyawan = jadwal.nama_karyawan
        WHERE id_karyawan='$id'")->result();
        $this->load->view('templates_karyawan/header',$data);
        $this->load->view('templates_karyawan/sidebar');
        $this->load->view('karyawan/jadwalKerja',$data);
        $this->load->view('templates_karyawan/footer');
    }
}

?>
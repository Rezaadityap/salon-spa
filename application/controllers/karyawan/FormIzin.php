<?php

class FormIzin extends CI_Controller{
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
        $data['title'] = "Izin Karyawan";
        $data['karyawan'] = $this->ModelSalon->get_data('data_karyawan')->result();
        $this->load->view('templates_karyawan/header',$data);
        $this->load->view('templates_karyawan/sidebar');
        $this->load->view('karyawan/formIzin',$data);
        $this->load->view('templates_karyawan/footer');
    }
    public function halamanIzin(){
        $data['title'] = "Izin Karyawan";
        $id = $this->session->userdata('id_karyawan'); 
        $data['izin'] = $this->db->query("SELECT data_izin.*, data_karyawan.nama_karyawan
        FROM data_izin
        INNER JOIN data_karyawan ON data_karyawan.nama_karyawan = data_izin.nama_karyawan
        WHERE id_karyawan='$id'")->result();        
        
        $this->load->view('templates_karyawan/header',$data);
        $this->load->view('templates_karyawan/sidebar');
        $this->load->view('karyawan/halamanIzin',$data);
        $this->load->view('templates_karyawan/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();

        if($this->form_validation->run()== FALSE){
            $this->index();   
        } else{
            $nama_karyawan = $this->input->post('nama_karyawan');
            $tanggal = $this->input->post('tanggal');
            $ket = $this->input->post('ket');

            $data = array(
                'nama_karyawan' => $nama_karyawan,
                'tanggal' => $tanggal,
                'ket' => $ket,
            );

            $this->ModelSalon->insert_data($data,'data_izin');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Data berhasil ditambahkan!</strong>
                    </div>'); 
                    redirect('karyawan/formIzin/halamanIzin');
        }
    }
    
    public function _rules(){
        $this->form_validation->set_rules('nama_karyawan','nama karyawan','required');
        $this->form_validation->set_rules('tanggal','tanggal','required');
        $this->form_validation->set_rules('ket','keterangan','required');
    }
}

?>
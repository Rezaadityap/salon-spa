<?php 
class JadwalKerja extends CI_Controller{
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
        $data['title'] = "Jadwal Kerja";
        $data['jadwal'] = $this->ModelSalon->get_data('jadwal')->result();
        if($this->input->post('keyword')){
            $data['jadwal'] = $this->ModelSalon->search();
        }

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/jadwalKerja',$data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahData(){
        $data ['title'] = "Tambah Data Jadwal";
        $data['karyawan'] = $this->ModelSalon->get_data('data_karyawan')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataJadwal',$data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();

        if($this->form_validation->run()== FALSE){
            $this->tambahData();   
        } else{
            $nama_karyawan = $this->input->post('nama_karyawan');
            $hari = $this->input->post('hari');
            $tanggal = $this->input->post('tanggal');
            $status = $this->input->post('status');

            $data = array(
                'nama_karyawan' => $nama_karyawan,
                'hari' => $hari,
                'tanggal' => $tanggal,
                'status' => $status,
            );

            $this->ModelSalon->insert_data($data,'jadwal');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Data berhasil ditambahkan!</strong>
                    </div>'); 
                    redirect('admin/JadwalKerja');
        }
    }
    public function deleteData($id){
        $where = array('id_jadwal' => $id);
        $this->ModelSalon->delete_data($where,'jadwal');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Data berhasil dihapus!</strong>
                    </div>'); 
                    redirect('admin/jadwalKerja');
    }
    public function deleteAll(){
        $this->db->empty_table('jadwal');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Data berhasil dihapus!</strong>
                    </div>'); 
                    redirect('admin/jadwalKerja');
    }
    
    public function _rules(){
        $this->form_validation->set_rules('nama_karyawan','nama karyawan','required');
        $this->form_validation->set_rules('hari','hari','required');
        $this->form_validation->set_rules('tanggal','tanggal','required');
        $this->form_validation->set_rules('status','status','required');
    }
} 
?>
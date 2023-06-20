<?php 

class Profil extends CI_Controller{
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
        $data['title'] = "Profil";
        $id = $this->session->userdata('id_karyawan');
        $data['karyawan'] = $this->db->query("SELECT * FROM data_karyawan WHERE id_karyawan='$id'")->result();
        $this->load->view('templates_karyawan/header',$data);
        $this->load->view('templates_karyawan/sidebar');
        $this->load->view('karyawan/profil',$data);
        $this->load->view('templates_karyawan/footer');
    }
    public function ubahPassword(){
        $data['title'] = "Ubah Password";
        $this->load->view('templates_karyawan/header',$data);
        $this->load->view('templates_karyawan/sidebar');
        $this->load->view('karyawan/ubahPassword',$data);
        $this->load->view('templates_karyawan/footer');
    }
    public function ubahPasswordAksi(){
        $passBaru = $this->input->post('passBaru');
        $ulangPass = $this->input->post('ulangPass');

        $this->form_validation->set_rules('passBaru','Password Baru','required|matches[ulangPass]');
        $this->form_validation->set_rules('ulangPass','Ulangi Password','required');

        if($this->form_validation->run() != FALSE){
            $data = array('password' => md5($passBaru));
            $id = array('id_karyawan' => $this->session->userdata('id_karyawan'));
            $this->ModelSalon->update_data('data_karyawan',$data,$id);
                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Password berhasil diubah!</strong>
                        </div>'); 
                       redirect('admin/Login');
        }else{
            $data['title'] = "Ubah Password";
            $this->load->view('templates_karyawan/header',$data);
            $this->load->view('templates_karyawan/sidebar');
            $this->load->view('karyawan/ubahPassword',$data);
            $this->load->view('templates_karyawan/footer');
        }

    }
}

?>
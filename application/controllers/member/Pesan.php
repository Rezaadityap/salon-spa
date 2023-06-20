<?php

class Pesan extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses')!='3'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login!</strong>
        </div>'); 
        redirect('Login');
        }
    }

    public function tambahPesan($id){
        $data['amberlee'] = "Amberlee Salon&Spa";
        $data['pesan'] = $this->db->query("SELECT * FROM data_treatment WHERE data_treatment.id_treatment='$id'")->result();
        $this->load->view('templates/templates_member/header',$data);
        $this->load->view('member/pesan',$data);
        $this->load->view('templates/templates_member/footer',$data);
    }
    public function tambahAksi(){
        $this->_rules();

        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Mohon Isi Pesanan dengan lengkap! Silahkan Pesan lagi.</strong>
                    </div>'); 
                    redirect('member/dashboard');
        } else{
        $id_member = $this->session->userdata('id_member');
        $id_treatment = $this->input->post('id_treatment');
        $tanggal = $this->input->post('tanggal');
        $jam = $this->input->post('jam');
        $tipe_pesan = $this->input->post('tipe_pesan');
        $alamat = $this->input->post('alamat');

        $data = array(
            'id_member' => $id_member,
            'id_treatment' => $id_treatment,
            'tanggal' => $tanggal,
            'jam' => $jam,
            'tipe_pesan' => $tipe_pesan,
            'alamat' => $alamat,
        );

        $this->ModelSalon->insert_data($data,'pesan');

        $data = array(
            'status' => '1'
        );

        $where = array(
            'id_treatment' => $id_treatment
        );

        $this->ModelSalon->update_data('data_treatment',$data,$where);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Pesanan berhasil ditambahkan!</strong>
                    </div>'); 
                    redirect('member/dashboard');
        
        
        }
    }
    public function _rules(){
        $this->form_validation->set_rules('tanggal','tanggal','required');
        $this->form_validation->set_rules('jam','jam','required');
        $this->form_validation->set_rules('tipe_pesan','Alamat','required');
    }
}

?>
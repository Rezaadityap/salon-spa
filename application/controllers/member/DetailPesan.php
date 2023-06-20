<?php 

class DetailPesan extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses')!='3'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login!</strong>
        </div>'); 
        redirect('Login');
        }
    }

    public function detail($id){
        $data['amberlee'] = "Amberlee Salon&Spa";
        $data['detail'] = $this->db->query("SELECT * FROM data_treatment,data_member,pesan WHERE pesan.id_member=data_member.id_member AND data_treatment.id_treatment='$id'")->result();
        $this->load->view('templates/templates_member/header',$data);
        $this->load->view('member/detailPesan',$data);
        $this->load->view('templates/templates_member/footer',$data);
    }
    public function dataPesan(){
        $data['amberlee'] = "Amberlee Salon&Spa";
        $id = $this->session->userdata('id_member');
        $data['datapesan'] = $this->db->query("SELECT * FROM data_treatment, data_member, pesan WHERE data_treatment.id_treatment=pesan.id_treatment AND data_member.id_member='$id'")->result();
        $this->load->view('templates/templates_member/header',$data);
        $this->load->view('member/dataPesan',$data);
        $this->load->view('templates/templates_member/footer',$data);
    }
    public function bayar()
    {
        $id_treatment = $this->input->post('id_treatment');
        $id_pesan = $this->input->post('id_pesan');
        $bukti_bayar = $_FILES['bukti_bayar']['name'];
            if($bukti_bayar){
                $config ['upload_path'] = './assets/photo/bukti_bayar/';
                $config ['allowed_types'] = 'jpg|jpeg|png|pdf'; 
                $this->load->library('upload',$config);
                if($this->upload->do_upload('bukti_bayar')){
                    $bukti_bayar = $this->upload->data('file_name');
                    $this->db->set('bukti_bayar',$bukti_bayar);
                } else{
                    echo $this->upload->display_errors();
                }
            }

        $data = array(
            'bukti_bayar' => $bukti_bayar
        );

        $where = array(
            'id_pesan' => $id_pesan
        );

        $this->ModelSalon->update_data('pesan',$data,$where);
        

        $data = array(
            'status' => '2'
        );

        $where = array(
            'id_treatment' => $id_treatment
        );

        $this->ModelSalon->update_data('data_treatment',$data,$where);

        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Pembayaran berhasil, sedang diproses!</strong>
                    </div>'); 
                    redirect('member/detailPesan/dataPesan');
    }
    public function cetak($id){
        $data['amberlee'] = "Amberlee Salon&Spa";
        $data['cetak'] = $this->db->query("SELECT * FROM pesan, data_member, data_treatment WHERE data_member.id_member=pesan.id_member AND data_treatment.id_treatment=pesan.id_treatment AND pesan.id_pesan='$id'")->result();
        $this->load->view('member/cetak',$data);
    }

}

?>
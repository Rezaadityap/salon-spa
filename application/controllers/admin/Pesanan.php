<?php 

class Pesanan extends CI_Controller{
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
        $data['title'] = "Data Pesanan";
        $data ['pesanan'] = $this->db->query("SELECT pesan .*, data_treatment.nama_treatment, data_member.nama, data_treatment.status, data_treatment.tipe, data_treatment.harga
        FROM pesan INNER JOIN data_treatment ON data_treatment.id_treatment=pesan.id_treatment
        INNER JOIN data_member ON data_member.id_member=pesan.id_member")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/pesanan',$data);
        $this->load->view('templates_admin/footer');
    }
    public function pembayaran($id){
        $data['title'] = "Pembayaran";
        $where = array('id_pesan' => $id);
        $data ['pembayaran'] = $this->db->query("SELECT * FROM pesan, data_treatment, data_member WHERE data_treatment.id_treatment=pesan.id_treatment AND data_member.id_member = pesan.id_member AND pesan.id_pesan='$id'")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updatePembayaran',$data);
        $this->load->view('templates_admin/footer');
    }
    public function cekPembayaran(){
        $id = $this->input->post('id');
        $id_treatment = $this->input->post('id_treatment');
        $id_pesan = $this->input->post('id_pesan');
        $status = $this->input->post('status');

        $data = array(
            'status' => $status,
        );

        $where = array(
            'id_treatment' => $id_treatment
        );

        $this->ModelSalon->update_data('data_treatment',$data,$where);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Transaksi selesai!</strong>
                    </div>'); 
                    redirect('admin/pesanan');
    }
    public function download_pembayaran($id){
        $data['amberlee'] = "Amberlee Salon&Spa";
        $data ['cetak'] = $this->db->query("SELECT * FROM pesan, data_treatment, data_member WHERE data_treatment.id_treatment=pesan.id_treatment AND data_member.id_member = pesan.id_member AND pesan.id_pesan='$id'")->result();
        $this->load->view('admin/cetakPembayaran',$data);
    }
    public function deleteData($id){
        $where = array('id_pesan' => $id);
        $this->ModelSalon->delete_data($where,'pesan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Data berhasil dihapus!</strong>
                    </div>'); 
                    redirect('admin/pesanan');
    }
}

?>
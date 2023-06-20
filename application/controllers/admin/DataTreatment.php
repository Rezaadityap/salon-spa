<?php 

class DataTreatment extends CI_Controller{
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
        $data['title'] = "Data Treatment";
        $data ['treatment'] = $this->ModelSalon->get_data('data_treatment')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataTreatment',$data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahData(){
        $data ['title'] = "Tambah Data Treatment";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataTreatment',$data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();

        if($this->form_validation->run()== FALSE){
            $this->tambahData();   
        } else{
            $nama_treatment = $this->input->post('nama_treatment');
            $harga = $this->input->post('harga');
            $tipe = $this->input->post('tipe');
            $deskripsi = $this->input->post('deskripsi');
            $photo = $_FILES['photo']['name'];
            if($photo=''){}else{
                $config ['upload_path'] = './assets/photo/produk/';
                $config ['allowed_types'] = 'jpg|jpeg|png|jfif'; 
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('photo')){
                    echo "Photo gagal diupload!";
                } else{
                    $photo = $this->upload->data('file_name'); 
                }
            }

            $data = array(
                'nama_treatment' => $nama_treatment,
                'harga' => $harga,
                'tipe' => $tipe,
                'deskripsi' => $deskripsi,
                'photo' => $photo
            );

            $this->ModelSalon->insert_data($data,'data_treatment');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Data berhasil ditambahkan!</strong>
                    </div>'); 
                    redirect('admin/DataTreatment');
        }
    }
    public function updateData($id){
        $where = array('id_treatment' => $id);
        $data ['treatment'] = $this->db->query("SELECT * FROM data_treatment WHERE id_treatment='$id'")->result();
        $data ['title'] = "Update Data Treatment";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataTreatment',$data);
        $this->load->view('templates_admin/footer');
    }
    public function updateDataAksi(){
        $this->_rules();

        if($this->form_validation->run()== FALSE){
            $this->updateData();   
        } else{
            $id = $this->input->post('id_treatment');
            $nama_treatment = $this->input->post('nama_treatment');
            $harga = $this->input->post('harga');
            $tipe = $this->input->post('tipe');
            $deskripsi = $this->input->post('deskripsi');

            $data = array(
                'nama_treatment' => $nama_treatment,
                'harga' => $harga,
                'tipe' => $tipe,
                'deskripsi' => $deskripsi,
            );

            $where = array(
                'id_treatment' => $id
            );

            $this->ModelSalon->update_data('data_treatment',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Data berhasil diupdate!</strong>
                    </div>'); 
                    redirect('admin/DataTreatment');
        }
    }
    public function deleteData($id){
        $where = array('id_treatment' => $id);
        $this->ModelSalon->delete_data($where,'data_treatment');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Data berhasil dihapus!</strong>
                    </div>'); 
                    redirect('admin/DataTreatment');
    }
    public function _rules(){
        $this->form_validation->set_rules('nama_treatment','nama treatment','required');
        $this->form_validation->set_rules('harga','harga produk','required');
        $this->form_validation->set_rules('deskripsi','deskripsi','required');
    }
}

?>
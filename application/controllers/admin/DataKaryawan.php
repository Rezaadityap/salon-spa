<?php

class DataKaryawan extends CI_Controller{
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
        $data['title'] = "Data Karyawan";
        $data ['karyawan'] = $this->ModelSalon->get_data('data_karyawan')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataKaryawan',$data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahData(){
        $data ['title'] = "Tambah Data Karyawan";
        $data ['jabatan'] = $this->ModelSalon->get_data('data_jabatan')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataKaryawan',$data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();

        if($this->form_validation->run()== FALSE){
            $this->tambahData();   
        } else{
            $nik = $this->input->post('nik');
            $nama_karyawan = $this->input->post('nama_karyawan');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $alamat = $this->input->post('alamat');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $nama_jabatan = $this->input->post('nama_jabatan');
            $hak_akses = $this->input->post('hak_akses');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $photo = $_FILES['photo']['name'];
            if($photo=''){}else{
                $config ['upload_path'] = './assets/photo/';
                $config ['allowed_types'] = 'jpg|jpeg|png'; 
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('photo')){
                    echo "Photo gagal diupload!";
                } else{
                    $photo = $this->upload->data('file_name'); 
                }
            }

            $data = array(
                'nik' => $nik,
                'nama_karyawan' => $nama_karyawan,
                'tgl_lahir' => $tgl_lahir,
                'alamat' => $alamat,
                'jenis_kelamin' => $jenis_kelamin,
                'nama_jabatan' => $nama_jabatan,
                'hak_akses' => $hak_akses,
                'username' => $username,
                'password' => $password,
                'photo' => $photo,
            );

            $this->ModelSalon->insert_data($data,'data_karyawan');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Data berhasil ditambahkan!</strong>
                    </div>'); 
                    redirect('admin/DataKaryawan');
        }
    } 
    public function updateData($id){
        $where = array('id_karyawan' => $id);
        $data ['karyawan'] = $this->db->query("SELECT * FROM data_karyawan WHERE id_karyawan='$id'")->result();
        $data ['title'] = "Update Data Karyawan";
        $data ['jabatan'] = $this->ModelSalon->get_data('data_jabatan')->result();

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataKaryawan',$data);
        $this->load->view('templates_admin/footer');
    }
    public function updateDataAksi(){
        $this->_rules();

        if($this->form_validation->run()== FALSE){
            $this->updateData();   
        } else{
            $id = $this->input->post('id_karyawan');
            $nik = $this->input->post('nik');
            $nama_karyawan = $this->input->post('nama_karyawan');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $alamat = $this->input->post('alamat');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $nama_jabatan = $this->input->post('nama_jabatan');
            $hak_akses = $this->input->post('hak_akses');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $photo = $_FILES['photo']['name'];
            if($photo){
                $config ['upload_path'] = './assets/photo/';
                $config ['allowed_types'] = 'jpg|jpeg|png'; 
                $this->load->library('upload',$config);
                if($this->upload->do_upload('photo')){
                    $photo = $this->upload->data('file_name');
                    $this->db->set('photo',$photo);
                } else{
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nik' => $nik,
                'nama_karyawan' => $nama_karyawan,
                'tgl_lahir' => $tgl_lahir,
                'alamat' => $alamat,
                'jenis_kelamin' => $jenis_kelamin,
                'nama_jabatan' => $nama_jabatan,
                'hak_akses' => $hak_akses,
                'username' => $username,
                'password' => $password,
            );

            $where = array(
                'id_karyawan' => $id
            );

            $this->ModelSalon->update_data('data_karyawan',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Data berhasil diupdate!</strong>
                    </div>'); 
                    redirect('admin/DataKaryawan');
        }
    } 
    public function _rules(){
        $this->form_validation->set_rules('nik','nik','required');
        $this->form_validation->set_rules('nama_karyawan','nama karyawan','required');
        $this->form_validation->set_rules('tgl_lahir','tanggal lahir','required');
        $this->form_validation->set_rules('alamat','alamat','required');
        $this->form_validation->set_rules('jenis_kelamin','jenis kelamin','required');
        $this->form_validation->set_rules('nama_jabatan','nama jabatan','required');
    }
    public function deleteData($id){
        $where = array('id_karyawan' => $id);
        $this->ModelSalon->delete_data($where,'data_karyawan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Data berhasil dihapus!</strong>
                    </div>'); 
                    redirect('admin/DataKaryawan');
    }
}
?>
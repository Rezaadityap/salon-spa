<?php 

class Register extends CI_Controller{
    public function index(){
        $data['title'] = "Register";
        $data['cp'] = "Copyright By Reza Aditya Pratama";
        $this->load->view('register',$data);
    }
    public function registerAksi(){
        $this->_rules();

        if($this->form_validation->run()== FALSE){
            $this->index();   
        } else{
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $no_hp = $this->input->post('no_hp');
            $alamat = $this->input->post('alamat');
        }

            $data = array(
                'nama' => $nama,
                'email' => $email,
                'password' => $password,
                'no_hp' => $no_hp,
                'alamat' => $alamat,
                'hak_akses' => 3,
            );

            $this->ModelSalon->insert_data($data,'data_member');
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Akun berhasil dibuat!</strong>
                    </div>'); 
                    redirect('login');
        }
        public function _rules(){
            $this->form_validation->set_rules('nama','nama','required');
            $this->form_validation->set_rules('email','email','required');
            $this->form_validation->set_rules('password','password','required');
            $this->form_validation->set_rules('no_hp','no_hp','required');
            $this->form_validation->set_rules('alamat','alamat','required');
	    }
    } 
?>
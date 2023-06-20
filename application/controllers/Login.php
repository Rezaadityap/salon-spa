<?php

class Login extends CI_Controller{
    public function index(){
        $this->_rules();
		
		if($this->form_validation->run()==FALSE){
			$data['title'] = "Login";
			$data['cp'] = "Copyright By Reza Aditya Pratama";
			$this->load->view('login',$data);
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$cek = $this->ModelSalon->cek_loginMember($email, $password);

			if($cek == FALSE){
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Email atau Password salah!</strong>
			</div>'); 
				redirect('Login');
			} else {
				$this->session->set_userdata('hak_akses',$cek->hak_akses);
				$this->session->set_userdata('nama',$cek->nama);
				$this->session->set_userdata('photo',$cek->photo);
				$this->session->set_userdata('id_member',$cek->id_member);
				switch ($cek->hak_akses) {
					case 3: redirect('member/Dashboard');
						break;
					default:
						break;
				}
			}
		}
	}
	public function _rules(){
            $this->form_validation->set_rules('email','email','required');
            $this->form_validation->set_rules('password','password','required');
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}

?>
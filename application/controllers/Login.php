<?php

class Login extends CI_Controller
{
	public function index()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Login Member";
			$data['cp'] = "Copyright By Reza Aditya Pratama";
			$this->load->view('login', $data);
		} else {
			// Validasi Sukses
			$this->_cek();
		}
	}
	private function _cek()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$member = $this->db->get_where('data_member', ['email' => $email])->row_array();

		// Jika Member ada
		if ($member) {
			// Jika Member Aktif 
			if ($member['is_active'] == 1) {
				// Jika Password benar
				if (password_verify($password, $member['password'])) {
					$data = [
						'email' => $member['email'],
						'hak_akses' => $member['hak_akses'],
						'nama' => $member['nama'],
						'id_member' => $member['id_member']
					];
					$this->session->set_userdata($data);
					redirect('member/dashboard');
					// Jika Password salah
				} else {
					$this->session->set_flashdata('massage', ' Password Salah!');
					redirect('login');
				}
				// Jika email belum diaktivasi
			} else {
				$this->session->set_flashdata('massage', 'Email belum diaktivasi, silahkan cek gmail kamu!');
				redirect('login');
			}
			// Jika email salah atau belum pernah daftar
		} else {
			$this->session->set_flashdata('massage', 'Email belum pernah terdaftar!');
			redirect('login');
		}
	}
	// Form validasi
	public function _rules()
	{
		$this->form_validation->set_rules('email', 'email', 'required', [
			'required' => 'Email belum diisi!'
		]);
		$this->form_validation->set_rules('password', 'password', 'required', [
			'required' => 'Harap masukkan password!'
		]);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}

?>
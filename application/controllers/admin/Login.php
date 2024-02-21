<?php

class Login extends CI_Controller
{
	public function index()
	{
		$this->_rules();

		// Jika form validasi false maka akan menampilkan halaman login kembali
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Login";
			$data['cp'] = "Copyright By Amberlee";
			$this->load->view('admin/login', $data);
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// Cek login
			$cek = $this->ModelSalon->cek_login($username, $password);

			// Jika cek == false 
			if ($cek == FALSE) {
				$this->session->set_flashdata('massage', 'Username atau Password salah!');
				redirect('admin/Login');
			} else {
				$this->session->set_userdata('hak_akses', $cek->hak_akses);
				$this->session->set_userdata('nama_karyawan', $cek->nama_karyawan);
				$this->session->set_userdata('photo', $cek->photo);
				$this->session->set_userdata('id_karyawan', $cek->id_karyawan);
				// Switch cek berdasarkan hak akses
				switch ($cek->hak_akses) {
					case 1:
						redirect('admin/Dashboard');
						break;
					case 2:
						redirect('karyawan/Dashboard');
						break;
					default:
						break;
				}
			}
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}
}


?>
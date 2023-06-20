<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$data['title'] = "Amberlee";
        $data['cp'] = "Copyright By Reza Aditya Pratama";
        $data ['treatment'] = $this->ModelSalon->get_data('data_treatment')->result();
        $data ['karyawan'] = $this->ModelSalon->get_data('data_karyawan')->result();
		$this->load->view('templates/header',$data);
		$this->load->view('templates/body',$data);
		$this->load->view('templates/footer',$data);
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Amberlee";
		$data['cp'] = "Copyright By Reza Aditya Pratama";
		$data['ulasan'] = $this->db->query("SELECT * FROM nilai, data_treatment, detail_pesan, pesan  WHERE data_treatment.id_treatment = nilai.id_treatment AND detail_pesan.id_pesan = pesan.id_pesan AND nilai.id_detail = detail_pesan.id_detail")->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/body', $data);
		$this->load->view('templates/footer', $data);
	}
}
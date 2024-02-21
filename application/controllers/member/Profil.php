<?php

class Profil extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Profil";
        $data['amberlee'] = "Amberlee Salon&Spa";
        $id = $this->session->userdata('id_member');
        $data['member'] = $this->db->query("SELECT * FROM data_member WHERE id_member='$id'")->result();

        $this->load->view('templates/templates_member/header', $data);
        $this->load->view('member/profil');
        $this->load->view('templates/templates_member/footer', $data);
    }
}

?>
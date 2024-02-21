<?php

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('massage', 'Anda belum login');
            redirect('admin/Login');
        }
    }
    public function index()
    {
        $data['title'] = "Profil";
        $id = $this->session->userdata('id_karyawan');
        $data['karyawan'] = $this->db->query("SELECT * FROM data_karyawan WHERE id_karyawan='$id'")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/profil', $data);
        $this->load->view('templates_admin/footer');
    }
    // Fungsi untuk ubah password
    public function ubahPassword()
    {
        $data['title'] = "Ubah Password";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/ubahPassword', $data);
        $this->load->view('templates_admin/footer');
    }
    // Fungsi aksi ubah password
    public function ubahPasswordAksi()
    {
        $passBaru = $this->input->post('passBaru');
        $ulangPass = $this->input->post('ulangPass');

        $this->form_validation->set_rules('passBaru', 'Password Baru', 'required|matches[ulangPass]');
        $this->form_validation->set_rules('ulangPass', 'Ulangi Password', 'required');

        if ($this->form_validation->run() != FALSE) {
            $data = array('password' => md5($passBaru));
            $id = array('id_karyawan' => $this->session->userdata('id_karyawan'));
            $this->ModelSalon->update_data('data_karyawan', $data, $id);
            $this->session->set_flashdata('pesan', 'Password berhasil diubah');
            redirect('admin/Login');
        } else {
            $data['title'] = "Ubah Password";
            $this->load->view('templates_admin/header', $data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/ubahPassword', $data);
            $this->load->view('templates_admin/footer');
        }

    }
}

?>
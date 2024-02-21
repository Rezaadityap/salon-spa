<?php

class DataJabatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('massage', 'Anda belum login!');
            redirect('admin/Login');
        }
    }
    public function index()
    {
        $data['title'] = "Data Jabatan";
        $data['jabatan'] = $this->ModelSalon->get_data('data_jabatan')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataJabatan', $data);
        $this->load->view('templates_admin/footer');
    }
    // Fungsi untuk menambah data jabatan
    public function tambahData()
    {
        $data['title'] = "Tambah Data Jabatan";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataJabatan', $data);
        $this->load->view('templates_admin/footer');
    }
    // Fungsi aksi tambah data
    public function tambahDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $nama_jabatan = $this->input->post('nama_jabatan');
            $gaji_pokok = $this->input->post('gaji_pokok');
            $uang_makan = $this->input->post('uang_makan');

            $data = array(
                'nama_jabatan' => $nama_jabatan,
                'gaji_pokok' => $gaji_pokok,
                'uang_makan' => $uang_makan,
            );

            $this->ModelSalon->insert_data($data, 'data_jabatan');
            $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
            redirect('admin/DataJabatan');
        }
    }
    // Fungsi update data berdasarkan id jabatan
    public function updateData($id)
    {
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan='$id'")->result();
        $data['title'] = "Update Data Jabatan";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataJabatan', $data);
        $this->load->view('templates_admin/footer');
    }
    // Fungsi aksi update data
    public function updateDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->updateData();
        } else {
            $id = $this->input->post('id_jabatan');
            $nama_jabatan = $this->input->post('nama_jabatan');
            $gaji_pokok = $this->input->post('gaji_pokok');
            $uang_makan = $this->input->post('uang_makan');

            $data = array(
                'nama_jabatan' => $nama_jabatan,
                'gaji_pokok' => $gaji_pokok,
                'uang_makan' => $uang_makan,
            );

            $where = array(
                'id_jabatan' => $id
            );

            $this->ModelSalon->update_data('data_jabatan', $data, $where);
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate');
            redirect('admin/DataJabatan');
        }
    }
    // Fungsi hapus data jabatan berdasarkan id
    public function deleteData($id)
    {
        $where = array('id_jabatan' => $id);
        $this->ModelSalon->delete_data($where, 'data_jabatan');
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
        redirect('admin/DataJabatan');
    }
    // Form validasi
    public function _rules()
    {
        $this->form_validation->set_rules('nama_jabatan', 'nama jabatan', 'required');
        $this->form_validation->set_rules('gaji_pokok', 'gaji pokok', 'required');
        $this->form_validation->set_rules('uang_makan', 'uang makan', 'required');
    }
}
?>
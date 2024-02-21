<?php

class SettingGaji extends CI_Controller
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
        $data['title'] = "Setting Penggajian";
        $data['setGaji'] = $this->ModelSalon->get_data('setting_gaji')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/settingGaji', $data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahData()
    {
        $data['title'] = "Tambah Potongan Gaji";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formSettingGaji', $data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambahData();
        } else {
            $setting_gaji = $this->input->post('setting_gaji');
            $nominal = $this->input->post('nominal');

            $data = array(
                'setting_gaji' => $setting_gaji,
                'nominal' => $nominal,
            );
            $this->ModelSalon->insert_data($data, 'setting_gaji');
            $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
            redirect('admin/SettingGaji');
        }
    }
    public function updateData($id)
    {
        $where = array('id' => $id);
        $data['setGaji'] = $this->db->query("SELECT * FROM setting_gaji WHERE id='$id'")->result();
        $data['title'] = "Update Settingan Gaji";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateSettingGaji', $data);
        $this->load->view('templates_admin/footer');
    }
    public function updateDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->updateData();
        } else {
            $id = $this->input->post('id');
            $setting_gaji = $this->input->post('setting_gaji');
            $nominal = $this->input->post('nominal');

            $data = array(
                'setting_gaji' => $setting_gaji,
                'nominal' => $nominal,
            );
            $where = array(
                'id' => $id
            );
            $this->ModelSalon->update_data('setting_gaji', $data, $where);
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate');
            redirect('admin/SettingGaji');
        }
    }
    public function deleteData($id)
    {
        $where = array('id' => $id);
        $this->ModelSalon->delete_data($where, 'setting_gaji');
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
        redirect('admin/SettingGaji');
    }
    public function _rules()
    {
        $this->form_validation->set_rules('setting_gaji', 'settingan gaji', 'required');
        $this->form_validation->set_rules('nominal', 'nominal', 'required');
    }
}
?>
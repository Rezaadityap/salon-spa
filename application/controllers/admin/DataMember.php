<?php

class DataMember extends CI_Controller
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
        $data['title'] = "Data Member";
        $data['member'] = $this->ModelSalon->get_data('data_member')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataMember', $data);
        $this->load->view('templates_admin/footer');
    }
    public function updateData($id)
    {
        $where = array('id_member' => $id);
        $data['member'] = $this->db->query("SELECT * FROM data_member WHERE id_member='$id'")->result();
        $data['title'] = "Update Data Member";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataMember', $data);
        $this->load->view('templates_admin/footer');
    }
    public function updateDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->updateData();
        } else {
            $id = $this->input->post('id_member');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $no_hp = $this->input->post('no_hp');
            $alamat = $this->input->post('alamat');

            $data = array(
                'nama' => $nama,
                'email' => $email,
                'password' => $password,
                'no_hp' => $no_hp,
                'alamat' => $alamat,
            );

            $where = array(
                'id_member' => $id
            );

            $this->ModelSalon->update_data('data_member', $data, $where);
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate');
            redirect('admin/DataMember');
        }
    }
    public function deleteData($id)
    {
        $where = array('id_member' => $id);
        $this->ModelSalon->delete_data($where, 'data_member');
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
        redirect('admin/DataMember');
    }
    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('no_hp', 'no handphone', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
    }
}

?>
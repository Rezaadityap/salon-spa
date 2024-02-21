<?php

class FormIzin extends CI_Controller
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
        $data['title'] = "Form Izin";

        $data['izin'] = $this->ModelSalon->get_data('data_izin')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formIzin', $data);
        $this->load->view('templates_admin/footer');
    }
    public function updateData($id)
    {
        $where = array('id_izin' => $id);
        $data['izin'] = $this->db->query("SELECT * FROM data_izin WHERE id_izin='$id'")->result();
        $data['title'] = "Update Approval";
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateApproval', $data);
        $this->load->view('templates_admin/footer');
    }
    public function updateDataAksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->updateData();
        } else {
            $id = $this->input->post('id_izin');
            $status = $this->input->post('status');

            $data = array(
                'status' => $status,
            );

            $where = array(
                'id_izin' => $id
            );

            $this->ModelSalon->update_data('data_izin', $data, $where);
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate');
            redirect('admin/formIzin');
        }
    }
    public function deleteData($id)
    {
        $where = array('id_izin' => $id);
        $this->ModelSalon->delete_data($where, 'data_izin');
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
        redirect('admin/formIzin');
    }
    public function _rules()
    {
        $this->form_validation->set_rules('status', 'status', 'required');
    }
}

?>
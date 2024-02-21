<?php

class Pesanan extends CI_Controller
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
        $data['title'] = "Data Pesanan";
        $data['pesanan'] = $this->db->query("SELECT * FROM pesan")->result();
        // untuk mencari pesanan dengan search
        if ($this->input->post('keyword')) {
            $data['pesanan'] = $this->ModelSalon->search_pesanan();
        }
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/pesanan', $data);
        $this->load->view('templates_admin/footer');
    }
    // fungsi untuk melihat pembayaran berdasarkan id pesan
    public function pembayaran($id)
    {
        $data['title'] = "Pembayaran";
        $data['pembayaran'] = $this->db->query("SELECT * FROM pesan WHERE pesan.id_pesan='$id'")->result();
        $data['detail'] = $this->db->query("SELECT * FROM detail_pesan, pesan, data_treatment WHERE pesan.id_pesan = detail_pesan.id_pesan AND data_treatment.id_treatment = detail_pesan.id_treatment AND pesan.id_pesan='$id'")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updatePembayaran', $data);
        $this->load->view('templates_admin/footer');
    }
    // Untuk acc pembayaran jika transaksi selesai
    public function cekPembayaran()
    {
        $id_pesan = $this->input->post('id_pesan');
        $status = $this->input->post('status');

        $data = array(
            'status' => $status,
        );

        $where = array(
            'id_pesan' => $id_pesan
        );

        $this->ModelSalon->update_data('pesan', $data, $where);
        $this->session->set_flashdata('pesan', 'Berhasil diupdate, Transaksi selesai.');
        redirect('admin/pesanan');
    }
    public function download_pembayaran($id)
    {
        $data['amberlee'] = "Amberlee Salon&Spa";
        $data['cetak'] = $this->db->query("SELECT * FROM pesan INNER JOIN detail_pesan INNER JOIN data_treatment WHERE detail_pesan.id_treatment = data_treatment.id_treatment AND pesan.id_pesan = detail_pesan.id_pesan AND pesan.id_pesan='$id'")->result();
        $this->load->view('admin/cetakPembayaran', $data);
    }
    public function deleteData($id)
    {
        $tables = array('pesan', 'detail_pesan');
        $this->db->where('id_pesan', $id);
        $this->db->delete($tables);
        $this->session->set_flashdata('pesan', ' Data berhasil dihapus!');
        redirect('member/pesan/dataPesan');
    }
}

?>
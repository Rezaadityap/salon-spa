<?php

class Pesan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('hak_akses') != '3') {
            $this->session->set_flashdata('massage', ' Anda belum Login!');
            redirect('Login');
        }
    }
    // Fungsi buat menambahkan ke keranjang
    public function add()
    {
        $data = array(
            'id' => $this->input->post('id'),
            'qty' => $this->input->post('qty'),
            'price' => $this->input->post('price'),
            'name' => $this->input->post('name'),
        );
        $this->cart->insert($data);
        $this->session->set_flashdata('pesan', ' item berhasil dimasukkan ke keranjang!');
        redirect('member/pesan/keranjang');
    }

    public function keranjang()
    {
        $data['title'] = "Keranjang";
        $data['amberlee'] = "Amberlee Salon&Spa";

        $this->load->view('templates/templates_member/header', $data);
        $this->load->view('member/keranjang');
        $this->load->view('templates/templates_member/footer', $data);
    }
    // Fungsi buat menghapus item dikeranjang  
    public function hapus($rowid)
    {
        $this->cart->remove($rowid);
        $this->session->set_flashdata('pesan', ' item berhasil dihapus!');
        redirect('member/pesan/keranjang');
    }
    public function transaksi()
    {
        $data['amberlee'] = "Amberlee Salon&Spa";
        $data['title'] = "Transaksi";
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required', [
            'required' => 'Mohon isi terlebih dahulu!'
        ]);
        $this->form_validation->set_rules('tipe_pesan', 'tipe_pesan', 'required', [
            'required' => 'Mohon isi terlebih dahulu!'
        ]);
        $this->form_validation->set_rules('jam', 'jam', 'required', [
            'required' => 'Mohon isi terlebih dahulu!'
        ]);

        $this->load->view('templates/templates_member/header', $data);
        $this->load->view('member/transaksi');
        $this->load->view('templates/templates_member/footer', $data);
    }
    public function rincian()
    {
        // Proses pembayaran menjalankan model transaksi
        $proses = $this->ModelTransaksi->index();
        // Jika variabel proses dijalankan, maka item dikeranjang akan dibersihkan/terhapus
        if ($proses) {
            $this->cart->destroy();
        } else {
            echo "Maaf pesananmu gagal";
        }

        $id = $this->session->userdata('id_member');
        $data['amberlee'] = "Amberlee Salon&Spa";
        $data['rincian'] = $this->db->query("SELECT pesan.*, data_member.nama FROM pesan INNER JOIN data_member ON data_member.nama = pesan.nama 
        WHERE pesan.status = 1 OR pesan.status = 2 AND data_member.id_member='$id'")->result();
        $data['detail'] = $this->db->query("SELECT detail_pesan.*, pesan.id_pesan, data_member.id_member, data_treatment.tipe 
        FROM detail_pesan INNER JOIN pesan ON pesan.id_pesan = detail_pesan.id_pesan
        INNER JOIN data_member ON data_member.id_member = detail_pesan.id_member
        INNER JOIN data_treatment ON data_treatment.id_treatment = detail_pesan.id_treatment
        WHERE detail_pesan.id_pesan = pesan.id_pesan AND pesan.status = 1 OR pesan.status = 2 AND data_member.id_member='$id'")->result();

        $this->load->view('templates/templates_member/header', $data);
        $this->load->view('member/pembayaran');
        $this->load->view('templates/templates_member/footer', $data);
    }
    // Fungsi upload pembayaran 
    public function pembayaran()
    {
        $this->form_validation->set_rules('bukti_bayar', 'bukti_bayar', 'required', [
            'required' => 'Mohon upload bukti bayar terlebih dahulu!'
        ]);
        $id_pesan = $this->input->post('id_pesan');
        $bukti_bayar = $_FILES['bukti_bayar']['name'];
        if ($bukti_bayar) {
            $config['upload_path'] = './assets/photo/bukti_bayar/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bukti_bayar')) {
                $bukti_bayar = $this->upload->data('file_name');
                $this->db->set('bukti_bayar', $bukti_bayar);
            } else {
                echo $this->upload->display_errors();
            }
        }
        // Unit 1
        $data = array(
            'bukti_bayar' => $bukti_bayar,
            'status' => 2
        );

        $where = array(
            'id_pesan' => $id_pesan
        );

        $this->ModelSalon->update_data('pesan', $data, $where);
        $this->session->set_flashdata('pesan', ' pembayaran sukses, pesanan sedang diproses!');
        redirect('member/pesan/dataPesan');
    }
    // Fungsi buat menampilkan data pesanan
    public function dataPesan()
    {
        $data['amberlee'] = "Amberlee Salon&Spa";
        $id = $this->session->userdata('id_member');
        $data['datapesan'] = $this->db->query("SELECT * FROM pesan INNER JOIN data_member WHERE pesan.nama = data_member.nama AND data_member.id_member='$id'")->result();
        $this->load->view('templates/templates_member/header', $data);
        $this->load->view('member/dataPesan', $data);
        $this->load->view('templates/templates_member/footer', $data);
    }
    // Fungsi buat menampilkan detail pesanan berdasarkan id
    public function detailPesan($id_pesan)
    {
        $data['amberlee'] = "Amberlee Salon&Spa";
        $data['title'] = "Detail Pesanan";
        $data['pesanan'] = $this->ModelTransaksi->ambil_id_pesan($id_pesan);
        $data['detail'] = $this->ModelTransaksi->ambil_id_detail($id_pesan);

        $this->load->view('templates/templates_member/header', $data);
        $this->load->view('member/detailPesan', $data);
        $this->load->view('templates/templates_member/footer', $data);
    }
    // Fungsi untuk mencetak invoice atau pembayaran
    public function cetak($id)
    {
        $data['amberlee'] = "Amberlee Salon&Spa";
        $data['title'] = "Invoice Pembayaran Anda";
        $data['cetak'] = $this->db->query("SELECT * FROM pesan WHERE pesan.id_pesan = '$id'")->result();
        $data['detail'] = $this->db->query("SELECT * FROM detail_pesan, pesan, data_treatment WHERE pesan.id_pesan = detail_pesan.id_pesan AND data_treatment.id_treatment = detail_pesan.id_treatment AND detail_pesan.id_pesan='$id'")->result();

        $this->load->view('templates/templates_member/header', $data);
        $this->load->view('member/cetak', $data);
        $this->load->view('templates/templates_member/footer', $data);
    }
    // Fungsi untuk melakukan penilaian berdasarkan pesanan
    public function nilai($id)
    {
        $data['amberlee'] = "Amberlee Salon&Spa";
        $data['title'] = "Nilai Pesanan Anda";
        $data['nilai'] = $this->db->query("SELECT * FROM detail_pesan, data_treatment, pesan WHERE detail_pesan.id_pesan = pesan.id_pesan 
        AND detail_pesan.id_treatment=data_treatment.id_treatment AND detail_pesan.id_detail='$id'")->result();

        $this->load->view('templates/templates_member/header', $data);
        $this->load->view('member/nilai', $data);
        $this->load->view('templates/templates_member/footer', $data);
    }
    // Fungsi untuk menjalankan aksi dari penilaian
    public function nilaiAksi()
    {
        $id_detail = $this->input->post('id_detail');
        $id_treatment = $this->input->post('id_treatment');
        $nilai = $this->input->post('nilai');
        $komentar = $this->input->post('komentar');

        $data = array(
            'id_detail' => $id_detail,
            'id_treatment' => $id_treatment,
            'nilai' => $nilai,
            'komentar' => $komentar
        );

        $this->db->insert('nilai', $data);
        $this->session->set_flashdata('pesan', ' berhasil mengirim penilaian');
        redirect('member/pesan/dataPesan');

    }
    // Fungsi untuk menghapus data pesanan berdasarkan id pesan
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
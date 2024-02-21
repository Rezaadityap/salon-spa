<?php

class ModelTransaksi extends CI_Model
{
    public function index()
    {
        $nama = $this->input->post('nama');
        $tanggal = $this->input->post('tanggal');
        $tipe_pesan = $this->input->post('tipe_pesan');
        $jam = $this->input->post('jam');
        $total_bayar = $this->input->post('total_bayar');
        $id_member = $this->input->post('id_member');

        $transaksi = array(
            'nama' => $nama,
            'tanggal' => $tanggal,
            'tipe_pesan' => $tipe_pesan,
            'jam' => $jam,
            'bukti_bayar' => "belum bayar",
            'status' => 1,
            'total_bayar' => $total_bayar

        );
        $this->db->insert('pesan', $transaksi);
        $id_pesan = $this->db->insert_id();

        foreach ($this->cart->contents() as $item) {
            $data = array(
                'id_pesan' => $id_pesan,
                'id_treatment' => $item['id'],
                'id_member' => $id_member,
                'nama_treatment' => $item['name'],
                'harga' => $item['price'],
            );
            $this->db->insert('detail_pesan', $data);
        }
        return TRUE;
    }
    public function ambil_id_pesan($id_pesan)
    {
        $result = $this->db->where('id_pesan', $id_pesan)->limit(1)->get('pesan');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function ambil_id_detail($id_pesan)
    {
        $result = $this->db->where('id_pesan', $id_pesan)->get('detail_pesan');

        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}

?>
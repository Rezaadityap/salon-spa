<?php

class ModelLaporan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function laporan_harian($tanggal, $bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('detail_pesan');
        $this->db->from('pesan');
        $this->db->from('data_treatment');
        $this->db->where('detail_pesan.id_pesan = pesan.id_pesan');
        $this->db->where('detail_pesan.id_treatment = data_treatment.id_treatment');
        $this->db->where('DAY(pesan.tanggal)', $tanggal);
        $this->db->where('MONTH(pesan.tanggal)', $bulan);
        $this->db->where('YEAR(pesan.tanggal)', $tahun);
        return $this->db->get()->result();
    }
    public function laporan_bulanan($bulan, $tahun)
    {
        $this->db->select('*');
        $this->db->from('pesan');
        $this->db->where('MONTH(pesan.tanggal)', $bulan);
        $this->db->where('YEAR(pesan.tanggal)', $tahun);
        return $this->db->get()->result();
    }
    public function laporan_tahunan($tahun)
    {
        $this->db->select('*');
        $this->db->from('pesan');
        $this->db->where('YEAR(pesan.tanggal)', $tahun);
        return $this->db->get()->result();
    }
}
?>
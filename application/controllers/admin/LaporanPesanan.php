<?php

class LaporanPesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModelLaporan");

        if ($this->session->userdata('hak_akses') != '1') {
            $this->session->set_flashdata('massage', 'Anda belum login');
            redirect('admin/Login');
        }
    }
    public function index()
    {
        $data['title'] = "Laporan Pesanan";

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/laporan_pesanan', $data);
        $this->load->view('templates_admin/footer');

    }
    public function laporanHarian()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
        );

        $data['title'] = 'Laporan Harian';
        $data['laporan'] = $this->ModelLaporan->laporan_harian($tanggal, $bulan, $tahun);


        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/laporan_harian', $data);
        $this->load->view('templates_admin/footer');
    }
    public function ExcelHari()
    {
        $tanggal = $this->input->post('tanggal');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tanggal' => $tanggal,
            'bulan' => $bulan,
            'tahun' => $tahun,
        );

        $data = $this->ModelLaporan->laporan_harian($tanggal, $bulan, $tahun);
        
        $this->load->library('PHPExcel');
        $objePHPExecel = new PHPExcel();
        $objePHPExecel->setActiveSheetIndex(0);
        $objePHPExecel->getActiveSheet()->SetCellValue('A1', 'Nama Customer');
        $objePHPExecel->getActiveSheet()->SetCellValue('B1', 'Nama treatment');
        $objePHPExecel->getActiveSheet()->SetCellValue('C1', 'Tipe Treatment');
        $objePHPExecel->getActiveSheet()->SetCellValue('D1', 'Tanggal');
        $objePHPExecel->getActiveSheet()->SetCellValue('E1', 'Jumlah Bayar');

        $kolom = 2;
        foreach ($data as $val) {
            $objePHPExecel->getActiveSheet()->SetCellValue('A' . $kolom, $val->nama);
            $objePHPExecel->getActiveSheet()->SetCellValue('B' . $kolom, $val->nama_treatment);
            $objePHPExecel->getActiveSheet()->SetCellValue('C' . $kolom, $val->tipe);
            $objePHPExecel->getActiveSheet()->SetCellValue('D' . $kolom, $val->tanggal);
            $objePHPExecel->getActiveSheet()->SetCellValue('E' . $kolom, $val->harga);

            $kolom++;
        }
        $objWrite = PHPExcel_IOFactory::createWriter($objePHPExecel, 'Excel2007');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Pesanan Harian.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();

        $objWrite->save('php://output');
        exit();
    }
    public function laporanBulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun,
        );

        $data['title'] = 'Laporan Bulanan';
        $data['laporan'] = $this->ModelLaporan->laporan_bulanan($bulan, $tahun);


        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/laporan_bulanan', $data);
        $this->load->view('templates_admin/footer');
    }
    public function ExcelBulan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = array(
            'bulan' => $bulan,
            'tahun' => $tahun,
        );

        $data = $this->ModelLaporan->laporan_bulanan($bulan, $tahun);

        // print_r($data);
        // exit;
        $this->load->library('PHPExcel');
        $objePHPExecel = new PHPExcel();
        $objePHPExecel->setActiveSheetIndex(0);
        $objePHPExecel->getActiveSheet()->SetCellValue('A1', 'Nama Customer');
        $objePHPExecel->getActiveSheet()->SetCellValue('B1', 'Tanggal');
        $objePHPExecel->getActiveSheet()->SetCellValue('C1', 'Jumlah Bayar');

        $kolom = 2;
        foreach ($data as $val) {
            $objePHPExecel->getActiveSheet()->SetCellValue('A' . $kolom, $val->nama);
            $objePHPExecel->getActiveSheet()->SetCellValue('B' . $kolom, $val->tanggal);
            $objePHPExecel->getActiveSheet()->SetCellValue('C' . $kolom, $val->total_bayar);

            $kolom++;
        }
        $objWrite = PHPExcel_IOFactory::createWriter($objePHPExecel, 'Excel2007');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Pesanan Bulanan.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();

        $objWrite->save('php://output');
        exit();
    }
    public function laporanTahunan()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun,
        );

        $data['title'] = 'Laporan Tahunan';
        $data['laporan'] = $this->ModelLaporan->laporan_tahunan($tahun);


        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/laporan_tahunan', $data);
        $this->load->view('templates_admin/footer');
    }
    public function ExcelTahun()
    {
        $tahun = $this->input->post('tahun');

        $data = array(
            'tahun' => $tahun,
        );

        $data = $this->ModelLaporan->laporan_tahunan($tahun);

        // print_r($data);
        // exit;
        $this->load->library('PHPExcel');
        $objePHPExecel = new PHPExcel();
        $objePHPExecel->setActiveSheetIndex(0);
        $objePHPExecel->getActiveSheet()->SetCellValue('A1', 'Nama Customer');
        $objePHPExecel->getActiveSheet()->SetCellValue('B1', 'Tanggal');
        $objePHPExecel->getActiveSheet()->SetCellValue('C1', 'Jumlah Bayar');

        $kolom = 2;
        foreach ($data as $val) {
            $objePHPExecel->getActiveSheet()->SetCellValue('A' . $kolom, $val->nama);
            $objePHPExecel->getActiveSheet()->SetCellValue('B' . $kolom, $val->tanggal);
            $objePHPExecel->getActiveSheet()->SetCellValue('C' . $kolom, $val->total_bayar);

            $kolom++;
        }
        $objWrite = PHPExcel_IOFactory::createWriter($objePHPExecel, 'Excel2007');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Laporan Pesanan Tahunan.xlsx"');
        header('Cache-Control: max-age=0');
        ob_end_clean();

        $objWrite->save('php://output');
        exit();
    }
}

?>
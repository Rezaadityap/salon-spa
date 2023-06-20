<?php 

class DataGaji extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if($this->session->userdata('hak_akses')!='2'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Anda Belum Login!</strong>
        </div>'); 
        redirect('admin/Login');
        }
    }
    public function index(){
        $data['title'] = "Data Gaji";
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }
        $id = $this->session->userdata('id_karyawan'); 
        $data['setting_gaji'] = $this->ModelSalon->get_data('setting_gaji')->result();
        $data['gaji'] = $this->db->query("SELECT data_karyawan.nama_karyawan, data_karyawan.nik, data_jabatan.gaji_pokok, data_jabatan.uang_makan, data_absensi.alfa, data_absensi.bulan, data_absensi.id_absensi
        FROM data_karyawan
        INNER JOIN data_absensi ON data_absensi.nik=data_karyawan.nik
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_karyawan.nama_jabatan
        WHERE id_karyawan = '$id'")->result();
        $this->load->view('templates_karyawan/header',$data);
        $this->load->view('templates_karyawan/sidebar');
        $this->load->view('karyawan/dataGaji',$data);
        $this->load->view('templates_karyawan/footer');
    }
    public function cetakSlip($id){
        $data['title'] = "Cetak Slip Gaji";
        $data ['setting_gaji'] = $this->ModelSalon->get_data('setting_gaji')->result();
        $data ['print_slip'] = $this->db->query("SELECT data_karyawan.nik, data_karyawan.nama_karyawan, data_karyawan.jenis_kelamin, data_jabatan.nama_jabatan,
        data_jabatan.gaji_pokok, data_jabatan.uang_makan, data_absensi.alfa, data_absensi.bulan
        FROM data_karyawan INNER JOIN data_absensi ON data_absensi.nik = data_karyawan.nik
        INNER JOIN data_jabatan ON data_jabatan.nama_jabatan = data_karyawan.nama_jabatan
        WHERE data_absensi.id_absensi = '$id'")->result();
        $this->load->view('templates_karyawan/headerForm',$data);
        $this->load->view('karyawan/cetakSlipGaji',$data);
    }
}

?>
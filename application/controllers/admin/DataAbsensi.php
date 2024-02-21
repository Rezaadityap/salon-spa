<?php

class DataAbsensi extends CI_Controller
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
        $data['title'] = "Data Absensi";

        // check all jika bulan dan tahun != akan menampilkan data
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }
        $data['absensi'] = $this->db->query("SELECT data_absensi.*, data_karyawan.nama_karyawan, data_karyawan.jenis_kelamin,
        data_karyawan.nama_jabatan
        FROM data_absensi
        INNER JOIN data_karyawan ON data_absensi.nik = data_karyawan.nik
        INNER JOIN data_jabatan ON data_karyawan.nama_jabatan = data_jabatan.nama_jabatan
        WHERE data_absensi.bulan = '$bulantahun'
        ORDER BY data_karyawan.nama_karyawan ASC")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataAbsensi', $data);
        $this->load->view('templates_admin/footer');
    }
    public function inputAbsensi()
    {
        // jika klik submit pada input absensi
        if ($this->input->post('submit', TRUE) == 'submit') {
            $post = $this->input->post();
            foreach ($post['bulan'] as $key => $value) {
                // jika bulan (belum ada data) dan nik karyawan ada maka akan diinput batch berdasarkan jumlah karyawan yang ada
                if ($post['bulan'][$key] != '' || $post['nik'][$key] != '') {
                    $simpan[] = array(
                        'bulan' => $post['bulan'][$key],
                        'nik' => $post['nik'][$key],
                        'nama_karyawan' => $post['nama_karyawan'][$key],
                        'jenis_kelamin' => $post['jenis_kelamin'][$key],
                        'nama_jabatan' => $post['nama_jabatan'][$key],
                        'hadir' => $post['hadir'][$key],
                        'sakit' => $post['sakit'][$key],
                        'alfa' => $post['alfa'][$key],
                    );
                }
            }
            $this->ModelSalon->insert_batch('data_absensi', $simpan);
            $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan');
            redirect('admin/dataAbsensi');
        }
        $data['title'] = "Input Absensi";
        // Jika sudah input maka akan menampilkan hasil inputan tadi
        if ((isset($_GET['bulan']) && $_GET['bulan'] != '') && (isset($_GET['tahun']) && $_GET['tahun'] != '')) {
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan . $tahun;
        } else {
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan . $tahun;
        }
        $data['input_absensi'] = $this->db->query("SELECT data_karyawan.*, data_jabatan.nama_jabatan FROM data_karyawan
        INNER JOIN data_jabatan ON data_karyawan.nama_jabatan = data_jabatan.nama_jabatan
        WHERE NOT EXISTS (SELECT * FROM data_absensi WHERE bulan = '$bulantahun' AND data_karyawan.nik = data_absensi.nik) 
        ORDER BY data_karyawan.nama_karyawan ASC")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/inputAbsensi', $data);
        $this->load->view('templates_admin/footer');
    }
}

?>
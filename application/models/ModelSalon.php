<?php 

class ModelSalon extends CI_Model{
    public function get_data($table){
        return $this->db->get($table);
    }
    public function insert_data($data,$table){
        $this->db->insert($table,$data);
    }
    public function insert_dataIzin($data,$table,$where){
        $this->db->insert($table,$data,$where);
    }
    public function update_data($table,$data,$where){
        $this->db->update($table, $data, $where);
    }
    public function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function insert_batch($table = null, $data = array()){
        $jumlah = count($data);
        if($jumlah > 0){
            $this->db->insert_batch($table,$data);
        }
    }
    public function detail_data($nama_karyawan = NULL){
        $query = $this->db->get_where('jadwal',$detail)->row();
        return $query;
    }
    public function get_keyword($keyword){
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->like('nama_karyawan');
        $this->db->or_like('hari');
        $this->db->or_like('tanggal');
        $this->db->or_like('status');
        return $this->db->get()->result();
    }
    public function insert_hari($data){
        $this->db->insert('jadwal',$data);
    }

    public function search(){
        $keyword = $this->input->post('keyword',true);
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->like('nama_karyawan', $keyword);
        $this->db->or_like('hari', $keyword);
        $this->db->or_like('tanggal', $keyword);
        $this->db->or_like('status', $keyword);
        return $this->db->get()->result();
    }

    public function ambil_id_produk($id){
        $hasil = $this->db->where('id_treatment',$id)->get('data_treatment');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return false;
        }
    }
    public function ambil_id_pesan($id){
        $hasil = $this->db->where('id_pesan',$id)->get('pesan');
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return false;
        }
    }

    public function cek_login(){
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db->where('username',$username)
                           ->where('password',md5($password))
                           ->limit(1)
                           ->get('data_karyawan');
        if($result->num_rows()>0){
            return $result->row();
        } else {
            return FALSE;
        }
    }
    public function cek_loginMember(){
        $email = set_value('email');
        $password = set_value('password');

        $result = $this->db->where('email',$email)
                           ->where('password',md5($password))
                           ->limit(1)
                           ->get('data_member');
        if($result->num_rows()>0){
            return $result->row();
        } else {
            return FALSE;
        }
    }
}
?>
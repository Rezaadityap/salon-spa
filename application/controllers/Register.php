<?php

class Register extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Register";
        $data['cp'] = "Copyright By Reza Aditya Pratama";
        $this->load->view('register', $data);
    }
    public function registerAksi()
    {

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($email),
                'password' => password_hash(
                    $this->input->post('password'),
                    PASSWORD_DEFAULT
                ),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'hak_akses' => 3,
                'is_active' => 0
            ];

            // Token Generate
            $token = base64_encode(random_bytes(8));
            $token_member = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('data_member', $data);
            $this->db->insert('token_member', $token_member);

            $this->_sendEmail($token, 'verifikasi');

            $this->session->set_flashdata('pesan', 'Akun berhasil dibuat. Silahkan cek email kamu untuk aktivasi!');
            redirect('login');
        }
    }
    // kirim email berdasarkan token dan typenya
    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'rezaditpratama12@gmail.com',
            'smtp_pass' => 'nqpbhzmoerrjoeab',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('rezaditpratama12@gmail.com', 'Salon Spa Amberlee');
        $this->email->to($this->input->post('email'));

        // Type untuk verifikasi
        if ($type == 'verifikasi') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik link ini untuk verifikasi akun anda : <a href="' . base_url() . 'register/verifikasi?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktivasi</a>');
        } elseif ($type == 'lupaPassword') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link ini untuk reset password : <a href="' . base_url() . 'register/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        //  Statement Jika Email Berhasil dikirim dan gagal dikirim
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
        }
    }

    public function verifikasi()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $member = $this->db->get_where('data_member', ['email' => $email])->row_array();

        // Statement jika email user benar dan ada dan email user salah
        if ($member) {
            $token_member = $this->db->get_where('token_member', ['token' => $token])->row_array();

            // Jika email berhasil diaktivasi sebelum 2x24 jam
            if ($token_member) {
                if (time() - $token_member['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('data_member');

                    $this->db->delete('token_member', ['email' => $email]);
                    $this->session->set_flashdata('pesan', ' Email berhasil diaktivasi, silahkan login!');
                    redirect('login');
                    // Jika 1x24 jam akun belum diverifikasi
                } else {
                    $this->db->delete('data_member', ['email' => $email]);
                    $this->db->delete('token_member', ['email' => $email]);

                    $this->session->set_flashdata('massage', ' Aktivasi akun gagal. Token Expired!');
                    redirect('login');
                }
                // Jika link token salah berdasarkan url
            } else {
                $this->session->set_flashdata('massage', ' Aktivasi akun gagal. Token Salah!');
                redirect('login');
            }
            // Jika email salah berdasarkan url
        } else {
            $this->session->set_flashdata('massage', ' Aktivasi akun gagal. Email Salah!');
            redirect('login');
        }
    }
    public function lupaPassword()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email belum diisi!',
            'valid_email' => 'Email tidak valid!'
        ]);

        // Jika form validasi salah
        if ($this->form_validation->run() == false) {
            $data['title'] = "Lupa Password";
            $data['cp'] = "Copyright By Amberlee";
            $this->load->view('lupa_password', $data);
        } else {
            $email = $this->input->post('email');
            $member = $this->db->get_where('data_member', ['email' => $email, 'is_active' => 1])->row_array();

            // jika email diinput dan email benar
            if ($member) {
                $token = base64_encode(random_bytes(8));
                $token_member = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('token_member', $token_member);
                $this->_sendEmail($token, 'lupaPassword');
                $this->session->set_flashdata('pesan', ' Silahkan cek email anda untuk reset password!');
                redirect('register/lupaPassword');
            } else {
                // Email tidak terdaftar atau belum diaktivasi
                $this->session->set_flashdata('massage', ' Email tidak terdaftar atau Email belum diaktivasi!');
                redirect('register/lupaPassword');
            }
        }
    }
    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $member = $this->db->get_where('data_member', ['email' => $email])->row_array();

        // Jika Email benar
        if ($member) {
            $token_member = $this->db->get_where('token_member', ['token' => $token])->row_array();

            // Jika Token Benar
            if ($token_member) {
                // User sudah klik reset password di gmail
                $this->session->set_userdata('reset_email', $email);
                $this->ubahPassword();
            } else {
                // Jika Token salah
                $this->session->set_flashdata('massage', ' Reset password gagal. Token Salah!');
                redirect('register/lupaPassword');
            }
        } else {
            // Jika Email salah
            $this->session->set_flashdata('massage', ' Reset password gagal. Email Salah!');
            redirect('register/lupaPassword');
        }
    }
    public function ubahPassword()
    {

        // Jika email tidak sama dengan session 
        if (!$this->session->userdata('reset_email')) {
            redirect('login');
        }
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password tidak sama!',
            'required' => 'password tidak boleh kosong!',
            'min_length' => 'password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Ubah Password";
            $data['cp'] = "Copyright By Reza Aditya Pratama";
            $this->load->view('ubah_password', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('data_member');

            // membersihkan session userdata email
            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('pesan', ' Password berhasil diubah!');
            redirect('login');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[data_member.email]', [
            'is_unique' => 'Email sudah terdaftar!',
            'valid_email' => 'Email tidak Valid',
            'required' => 'Email tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password tidak sama!',
            'required' => 'password tidak boleh kosong!',
            'min_length' => 'password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password]');
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required', [
            'required' => 'No hp tidak boleh kosong!'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required', [
            'required' => 'alamat tidak boleh kosong!'
        ]);
    }
}
?>
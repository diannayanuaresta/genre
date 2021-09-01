<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function registrasi()
    {
        if(!$this->session->userdata('username')){
            redirect('auth/login');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header');
            $this->load->view('auth/registrasi');
            $this->load->view('layout/footer');
        } else {
            $email = htmlspecialchars($this->input->post('email'));
            $token = base64_encode(random_bytes(32));
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $data_user = array(
                'email' => $email,
                'username' => htmlspecialchars($this->input->post('username')),
                'password' => $password,
                'is_active' => 0
            );

            $data_token = array(
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            );

            $this->db->insert('admin', $data_user);
            $this->db->insert('data_token', $data_token);
            $this->_sendEmail('aktivasi', $token, '');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kunjungi Email untuk aktivasi! <br> Batas waktu aktivasi selama 30 menit </div>');
            redirect('auth/registrasi');
        }
    }

    public function forgotPassword()
    {
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header');
            $this->load->view('auth/forgotPassword');
            $this->load->view('layout/footer');
        } else {
            $username = htmlspecialchars($this->input->post('username'));
            $email = htmlspecialchars($this->input->post('email'));
            $password = htmlspecialchars($this->input->post('password'));
            $admin = $this->db->get_where('admin', ['username' => $username])->row_array();

            if ($admin == null) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak ditemukan ! </div>');
                redirect('auth/forgotPassword');
            } else {
                if ($admin['email'] != $email) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak sesuai! </div>');
                    redirect('auth/forgotPassword');
                } else {
                    $token = base64_encode(random_bytes(32));
                    $data_token = array(
                        'email' => $email,
                        'token' => $token,
                        'date_created' => time()
                    );
                    $this->db->insert('data_token', $data_token);
                    $this->_sendEmail('verify', $token, $password);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kunjungi Email untuk verifikasi identitas untuk Ubah Password! <br> Batas waktu 30 menit </div>');
                    redirect('auth/forgotPassword');
                }
            }
        }
    }
    private function _sendEmail($type, $token, $password)
    {
        $data_token = $this->db->get_where('data_token', ['token' => $token])->row_array();
        $email = $data_token['email'];
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'developweb.site10@gmail.com',
            'smtp_pass' => '10Developweb02',
            'newline' => "\r\n",
            'charset' => 'utf-8',
            'mailtype' => 'html',

        ];

        $this->email->initialize($config);
        $this->email->from('developweb.site10@gmail.com', 'Admin Forum GenRe');
        $this->email->to($email);

        if ($type == 'aktivasi') {

            $this->email->subject('Aktivasi Admin');
            $this->email->message('    
            <div class="container">
            <div class="card mb-3">
                <img class="card-img-top" src="https://www.freepik.com/free-vector/effective-time-management-symbols-flat-elements-set-with-tasks-planning-training-activities-schedule-checkpoints-isolated_7497405.htm#page=1&query=activation&position=0" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Aktivasi Admin</h5>
                    <p class="card-text">Silakan aktivasi dengan Klik Link di bawah ini !</p>
                    <a clas="btn btn-primary" href=' . base_url('auth/verify') . '?email=' . $email . '&token=' . urlencode($token) . '">Aktivasi Sekarang</a>
                </div>
            </div>
            </div>');
        } else if ($type == 'verify') {
            $this->email->subject('Verifikasi Admin');
            $this->email->message('
            <div class="container">
            <div class="card mb-3">
                <img class="card-img-top" src="https://www.freepik.com/free-vector/effective-time-management-symbols-flat-elements-set-with-tasks-planning-training-activities-schedule-checkpoints-isolated_7497405.htm#page=1&query=activation&position=0" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Verifikasi Admin</h5>
                    <p class="card-text">Silakan verifikasi dengan Klik Link di bawah ini !</p>
                    <a clas="btn btn-primary" href=' . base_url('auth/gantiPassword') . '?token=' . urlencode($token) . '&password=' . urlencode(base64_encode($password)) . '">Verifikasi Sekarang</a>
                </div>
            </div>
            </div>
            ');
        }
        if ($this->email->send()) {
            true;
        } else {
            $this->email->print_debugger();
            die;
        }
    }


    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $admin = $this->db->get_where('data_token', ['email' => $email])->row_array();
        if (!$admin) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar ! </div>');
            redirect('auth/registrasi');
        } else {
            if (!$token == $admin['token']) {
                //hapus token
                $this->db->where('token', $admin['token']);
                $this->db->delete('data_token');
                //hapus admin
                $this->db->where('email', $email);
                $this->db->delete('admin');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token tidak Sesuai ! </div>');
                redirect('auth/registrasi');
            } else {
                if (time() - $admin['date_created'] > (60 * 30)) {
                    //hapus token
                    $this->db->where('token', $admin['token']);
                    $this->db->delete('data_token');
                    //hapus admin
                    $this->db->where('email', $email);
                    $this->db->delete('admin');
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Masa berlaku token telah berakhir ! </div>');
                    redirect('auth/registrasi');
                } else {
                    //hapus token
                    $this->db->where('token', $admin['token']);
                    $this->db->delete('data_token');
                    //update admin
                    $this->db->where('email', $email);
                    $this->db->set('is_active', 1);
                    $this->db->update('admin');


                    if ($this->session->userdata('username') == null) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah !</div>');
                        redirect('auth/login');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah !</div>');
                        redirect('admin/setting');
                    }
                }
            }
        }
    }

    public function login()
    {
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header');
            $this->load->view('auth/login');
            $this->load->view('layout/footer');
        } else {
            $username = htmlspecialchars($this->input->post('username'));
            $password = htmlspecialchars($this->input->post('password'));
            $user = $this->db->get_where('admin', ['username' => $username])->row_array();

            if ($user == null) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username belum terdaftar ! </div>');
                redirect('auth/login');
            } else {
                if (password_verify($password, $user['password']) == false) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password tidak sesuai ! </div>');
                    redirect('auth/login');
                } else {
                    $data = [
                        'id' => $user['id'],
                        'username' => $username,
                        'login' => TRUE
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin');
                }
            }
        }
    }

    public function gantiPassword()
    {
        $token = $this->input->get('token');
        $password = base64_decode($this->input->get('password'));
        $admin = $this->db->get_where('data_token', ['token' => $token])->row_array();
        $data_admin = $this->db->get_where('admin', ['email' => $admin['email']]);

        if (!$admin) {
            //hapus token
            $this->db->where('token', $admin['token']);
            $this->db->delete('data_token');

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token tidak tersedia !' . $data_admin->num_rows() . '</div>');
            redirect('auth/forgotPassword');
        } else {
            if ($data_admin->num_rows() == null) {
                //hapus token
                $this->db->where('token', $admin['token']);
                $this->db->delete('data_token');

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar !</div>');
                redirect('auth/forgotPassword');
            } else {
                if (time() - $admin['date_created'] > (60 * 30)) {
                    //hapus token
                    $this->db->where('token', $admin['token']);
                    $this->db->delete('data_token');

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Masa berlaku Token Habis !</div>');
                    redirect('auth/forgotPassword');
                } else {

                    //hapus token
                    $this->db->where('token', $admin['token']);
                    $this->db->delete('data_token');

                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $this->db->where('email', $admin['email']);
                    $this->db->set('password', $password);
                    $this->db->update('admin');

                    if ($this->session->userdata('username') == null) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah !</div>');
                        redirect('auth/login');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah !</div>');
                        redirect('admin/setting');
                    }
                }
            }
        }
    }
}

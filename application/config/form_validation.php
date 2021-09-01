<?php
$config = array(
    'auth/registrasi' => array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|trim|max_length[16]|min_length[8]|is_unique[admin.username]',
            'errors' => array(
                'required' => 'Mohon tidak dikosongkan',
                'max_length' => 'Maksimal 16 Karakter',
                'min_length' => 'Minimal 8 Karakter',
                'is_unique' => 'Username sudah terdaftar'
            )
        ),
        array(
            'field' => 'password',
            'label' => 'password',
            'rules' => 'required|trim|min_length[6]|max_length[16]|matches[konfirmasi_password]',
            'errors' => array(
                'required' => 'Mohon tidak dikosongkan',
                'max_length' => 'Maksimal 16 Karakter',
                'min_length' => 'Minimal 6 Karakter',
                'matches' => 'Konfirmasi Password tidak sesuai'
            )
        ),
        array(
            'field' => 'konfirmasi_password',
            'label' => 'Konfirmasi Password',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Mohon tidak dikosongkan'
            )
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|trim|valid_email|is_unique[admin.email]',
            'errors' => array(
                'required' => 'Mohon tidak dikosongkan',
                'valid_email' => 'Email tidak valid',
                'is_unique' => 'Email sudah digunakan'
            )
        ),
    ),
    'auth/login' => array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Mohon tidak dikosongkan',
            )
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Mohon tidak dikosongkan',
            )
        )
    ),
    'auth/forgotPassword' => array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Mohon tidak dikosongkan'
            )
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Mohon tidak dikosongkan'
            )
        ),
        array(
            'field' => 'password',
            'label' => 'password',
            'rules' => 'required|trim|min_length[6]|max_length[16]',
            'errors' => array(
                'required' => 'Mohon tidak dikosongkan',
                'max_length' => 'Maksimal 16 Karakter',
                'min_length' => 'Minimal 6 Karakter',
            )
        ),
    ),
    'auth/editAdmin' => array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Mohon tidak dikosongkan'
            )
        ),
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|trim',
            'errors' => array(
                'required' => 'Mohon tidak dikosongkan'
            )
        ),
    )

);

$config['error_prefix'] = '<div class="mb-0"><small class="text-danger ">';
$config['error_suffix'] = '</small></div>';

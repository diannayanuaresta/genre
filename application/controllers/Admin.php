<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_login();
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('admin/home_admin');
        $this->load->view('layout/footer');
    }
    public function duta()
    {
        $this->load->view('layout/header');
        $this->load->view('admin/duta_admin');
        $this->load->view('layout/footer');
    }
    public function blog()
    {
        $this->load->view('layout/header');
        $this->load->view('admin/blog_admin');
        $this->load->view('layout/footer');
    }
    public function galeri()
    {
        $this->load->view('layout/header');
        $this->load->view('admin/galeri_admin');
        $this->load->view('layout/footer');
    }
    public function chat()
    {
        $this->load->view('layout/header');
        $this->load->view('admin/chat_admin');
        $this->load->view('layout/footer');
    }
    public function setting()
    {
        $this->load->view('layout/header');
        $this->load->view('admin/setting');
        $this->load->view('layout/footer');
    }

    public function upload()
    {
        $config['upload_path'] = 'assets/images/duta';
        $config['allowed_types'] = 'png|gif|jpg|jpeg';
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['is_image'] = TRUE;
        $config['detect_mime'] = TRUE;

        $this->upload->initialize($config);
    }

    public function tambahDuta()
    {
        $duta_putra_img = $_FILES['duta_putra_img'];
        if ($duta_putra_img['error'] == 4) {
            $img_putra = null;
        } else {
            $this->upload();
            if (!$this->upload->do_upload('duta_putra_img')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi Kesalahan dalam proses Upload! </div>');
                redirect('admin/duta');
            } else {
                $img_putra = $this->upload->data('file_name');
            }
        }

        $duta_putri_img = $_FILES['duta_putri_img'];
        if ($duta_putri_img['error'] == 4) {
            $img_putri = null;
        } else {
            $this->upload();
            if (!$this->upload->do_upload('duta_putri_img')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi Kesalahan dalam proses Upload! </div>');
                redirect('admin/duta');
            } else {
                $img_putri = $this->upload->data('file_name');
            }
        }

        $data = array(
            'duta_putra_nama' => htmlspecialchars($this->input->post('duta_putra_nama')),
            'duta_putri_nama' => htmlspecialchars($this->input->post('duta_putri_nama')),
            'duta_putra_img' => $img_putra,
            'duta_putri_img' => $img_putri,
            'duta_tahun' => htmlspecialchars($this->input->post('duta_tahun')),
        );

        $this->db->insert('duta_genre', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Tambah Data Berhasil ! </div>');
        redirect('admin/duta');
    }

    public function ubahDuta()
    {
        $data['duta_id'] = $this->uri->segment(3);
        $this->load->view('layout/header');
        $this->load->view('admin/ubah_duta', $data);
        $this->load->view('layout/footer');
    }
    public function updateDuta()
    {
        $id = $this->input->post('duta_id');
        $duta = $this->db->get_where('duta_genre', ['duta_id' => $id])->row_array();

        $duta_img_putra = $_FILES['duta_putra_img'];
        if ($duta_img_putra['error'] == 4) {
            $img_putra = $duta['duta_putra_img'];
        } else {
            $this->upload();
            if (!$this->upload->do_upload('duta_putra_img')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Terjadi kesalahan saat Upload ! </div>');
                redirect('admin/duta');
            } else {
                $img_putra = $this->upload->data('file_name');

                //hapus file dari folder
                $target = 'assets/images/duta/' . $duta['duta_putra_img'];
                if (file_exists($target)) {
                    unlink($target);
                }
            }
        }

        $duta_img_putri = $_FILES['duta_putri_img'];
        if ($duta_img_putri['error'] == 4) {
            $img_putri = $duta['duta_putri_img'];
        } else {
            $this->upload();
            if (!$this->upload->do_upload('duta_putri_img')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Terjadi kesalahan saat Upload ! </div>');
                redirect('admin/duta');
            } else {
                $img_putri = $this->upload->data('file_name');

                //hapus file dari folder
                $target = 'assets/images/duta/' . $duta['duta_putri_img'];
                if (file_exists($target)) {
                    unlink($target);
                }
            }
        }

        $data = array(
            'duta_putra_nama' => htmlspecialchars($this->input->post('duta_putra_nama')),
            'duta_putri_nama' => htmlspecialchars($this->input->post('duta_putri_nama')),
            'duta_putra_img' => $img_putra,
            'duta_putri_img' => $img_putri,
            'duta_tahun' => htmlspecialchars($this->input->post('duta_tahun'))
        );
        $this->db->where('duta_id', $id);
        $this->db->update('duta_genre', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil Diupdate ! </div>');
        redirect('admin/duta');
    }

    public function hapusDuta()
    {
        $id = $this->uri->segment(3);
        $duta = $this->db->get_where('duta_genre', ['duta_id' => $id])->row_array();
        $imgPutra = 'assets/images/duta/' . $duta['duta_putra_img'];
        $imgPutri = 'assets/images/duta/' . $duta['duta_putri_img'];

        //hapus gambar duta Putra
        if (file_exists($imgPutra)) {
            unlink($imgPutra);
        }

        //hapus gambar duta Putri
        if (file_exists($imgPutri)) {
            unlink($imgPutri);
        }

        $this->db->where('duta_id', $id);
        $this->db->delete('duta_genre');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil Dihapus ! </div>');
        redirect('admin/duta');
    }


    public function tambahBlog()
    {
        $imgBlog = $_FILES['blog_img'];
        if ($imgBlog['error'] == 4) {
            $imgBlog = NULL;
        } else {

            $config['upload_path'] = 'assets/images/blog';
            $config['allowed_types'] = 'png|gif|jpg|jpeg';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['is_image'] = TRUE;
            $config['detect_mime'] = TRUE;

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('blog_img')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Terjadi Kesalahan Upload ! </div>');
                redirect('admin/blog');
            } else {
                $imgBlog = $this->upload->data('file_name');
            }
        }

        $data = array(
            'blog_judul' => htmlspecialchars($this->input->post('blog_judul')),
            'blog_catatan' => htmlspecialchars($this->input->post('blog_catatan')),
            'blog_tanggal' => htmlspecialchars($this->input->post('blog_tanggal')),
            'blog_img' => $imgBlog,
            'blog_penulis' => htmlspecialchars($this->input->post('blog_penulis'))
        );

        $this->db->insert('blog', $data);
        $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert"> Blog Kegiatan Berhasil Diposting ! </div>');
        redirect('admin/blog');
    }

    public function detailBlog()
    {
        $data['blog_id'] = $this->uri->segment(3);
        $this->load->view('layout/header');
        $this->load->view('admin/detail_blog', $data);
        $this->load->view('layout/footer');
    }

    public function updateBlog()
    {
        $id = $this->input->post('blog_id');
        $blog = $this->db->get_where('blog', ['blog_id' => $id])->row_array();
        $imgBlog = $_FILES['blog_img'];
        if ($imgBlog['error'] == 4) {
            $imgBlog = $blog['blog_img'];
        } else {

            $config['upload_path'] = 'assets/images/blog';
            $config['allowed_types'] = 'png|gif|jpg|jpeg';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['is_image'] = TRUE;
            $config['detect_mime'] = TRUE;

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('blog_img')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Terjadi Kesalahan Upload ! </div>');
                redirect('admin/detailBlog/' . $id);
            } else {
                $imgBlog = $this->upload->data('file_name');
                $imgTarget = 'assets/images/blog/' . $blog['blog_img'];
                if (file_exists($imgTarget)) {
                    unlink($imgTarget);
                }
            }
        }

        $data = array(
            'blog_judul' => htmlspecialchars($this->input->post('blog_judul')),
            'blog_catatan' => htmlspecialchars($this->input->post('blog_catatan')),
            'blog_tanggal' => htmlspecialchars($this->input->post('blog_tanggal')),
            'blog_img' => $imgBlog,
            'blog_penulis' => htmlspecialchars($this->input->post('blog_penulis'))
        );
        $this->db->where('blog_id', $id);
        $this->db->update('blog', $data);
        $this->session->set_flashdata('message',  '<div class="alert alert-success" role="alert"> Blog Kegiatan Berhasil Diupdate ! </div>');
        redirect('admin/detailBlog/' . $id);
    }

    public function hapusBlog()
    {
        $id = $this->uri->segment(3);
        $target = $this->db->get_where('blog', ['blog_id' => $id])->row_array();
        $img = 'assets/images/blog/' . $target['blog_img'];
        if (file_exists($img)) {
            unlink($img);
        };
        $this->db->where('blog_id', $id);
        $this->db->delete('blog');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Blog Kegiatan Berhasil Dihapus ! </div>');
        redirect('admin/blog');
    }

    public function tambahGaleri()
    {
        $imgGaleri = $_FILES['galeri_img'];
        if ($imgGaleri['error'] == 4) {
            $img_galeri = NULL;
        } else {
            //upload gambar
            $config['upload_path'] = 'assets/images/galeri';
            $config['allowed_types'] = 'png|gif|jpg|jpeg';
            $config['encrypt_name'] = TRUE;
            $config['is_image'] = TRUE;
            $config['detect_mime'] = TRUE;
            $config['remove_spaces'] = TRUE;

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('galeri_img')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Terjadi kesahan dalam upload ! </div>');
                redirect('admin/galeri');
            } else {
                $img_galeri = $this->upload->data('file_name');
            }
        }

        $data = array(
            'galeri_img' => $img_galeri,
            'galeri_catatan' => htmlspecialchars($this->input->post('galeri_catatan'))
        );

        $this->db->insert('galeri', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil Ditambahkan ! </div>');
        redirect('admin/galeri');
    }

    public function hapusGaleri()
    {
        $id = $this->uri->segment(3);
        $target = $this->db->get_where('galeri', ['galeri_id' => $id])->row_array();
        $img = 'assets/images/galeri/' . $target['galeri_img'];
        if (file_exists($img)) {
            unlink($img);
        }
        $this->db->where('galeri_id', $id);
        $this->db->delete('galeri');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil Dihapus ! </div>');
        redirect('admin/galeri');
    }

    public function editPik()
    {
        $data = array(
            'pik_desa' => htmlspecialchars($this->input->post('pik_desa')),
            'pik_sekolah' => htmlspecialchars($this->input->post('pik_sekolah')),
            'pik_note' => htmlspecialchars($this->input->post('pik_note')),
        );

        $this->db->where('id', 1);
        $this->db->update('pik_genre', $data);
        redirect('admin/#about_admin');
    }

    public function jawabChat()
    {
        $data = array(
            'chat_user_id' => $this->input->post('chat_user_id'),
            'chat_admin' => htmlspecialchars($this->input->post('chat_admin')),
        );

        $this->db->insert('chat_admin', $data);
        redirect('admin/#contact_admin');
    }

    public function hapusChatUser()
    {
        $id = $this->uri->segment(3);
        $this->db->where('chat_user_id', $id);
        $this->db->delete('chat_user');
        redirect('admin/#contact_admin');
    }

    public function hapusChatAdmin()
    {
        $id = $this->uri->segment(3);
        $this->db->where('chat_admin_id', $id);
        $this->db->delete('chat_admin');
        redirect('admin/#contact_admin');
    }
}

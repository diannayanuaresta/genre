<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('home');
		$this->load->view('layout/footer');
	}
	public function duta()
	{
		$this->load->view('layout/header');
		$this->load->view('duta');
		$this->load->view('layout/footer');
	}
	public function blog()
	{
		$this->load->view('layout/header');
		$this->load->view('blog');
		$this->load->view('layout/footer');
	}
	public function galeri()
	{
		$this->load->view('layout/header');
		$this->load->view('galeri');
		$this->load->view('layout/footer');
	}

	public function tanyaChat()
	{
		$chat_user = array(
			'chat_user' => htmlspecialchars($this->input->post('chat_user'))
		);

		$this->db->insert('chat_user', $chat_user);
		redirect('home/#contact');
	}

	public function hapusChatUser()
	{
		$id = $this->uri->segment(3);
		$this->db->where('chat_user_id', $id);
		$this->db->delete('chat_user');
		redirect('home/#contact');
	}
}

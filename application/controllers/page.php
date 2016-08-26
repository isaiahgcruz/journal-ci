<?php

class Page extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
	}

	function login() 
	{
		$data['title'] = 'CodeIgniter';
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if ($data = $this->user->validate_user($username, $password)) {
				$this->session->set_flashdata('alert', ['style' => 'success', 'message' => 'You are now logged in!']);
				$data = (array) $data;
				$data['is_logged'] = TRUE;
				$this->session->set_userdata('user_data', $data);
				redirect('home');
			} else {
				$this->session->set_flashdata('alert', ['style' => 'danger', 'message' => 'Incorrect username/password!']);
			}
		}
		$this->load->view('partials/header', $data);
		$this->load->view('login');
		$this->load->view('partials/footer');
	}

	function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('alert', ['style' => 'success', 'message' => 'You are now logged out!']);
		redirect('login');
	}
}
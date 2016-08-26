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

			if ($this->user->validate_user($username, $password)) {
				$this->session->set_flashdata('alert', ['style' => 'success', 'message' => 'You are now logged in!']);
			} else {
				$this->session->set_flashdata('alert', ['style' => 'danger', 'message' => 'Incorrect username/password!']);
			}
		}
		$this->load->view('partials/header', $data);
		$this->load->view('login');
		$this->load->view('partials/footer');
	}
}
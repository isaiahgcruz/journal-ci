<?php

/**
* 
*/
class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$user = $this->session->userdata('user_data');
		if (!$user['is_logged']) {
			redirect('login');
		}
	}

	function index()
	{
		$data['title'] = 'CodeIgniter';
		$this->load->view('partials/header', $data);
		$this->load->view('dashboard');
		$this->load->view('partials/footer');
	}
}
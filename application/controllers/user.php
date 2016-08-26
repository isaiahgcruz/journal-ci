<?php

/**
* 
*/
class User extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model('User_model', 'user');
		$this->load->model('Post_model', 'post');
	}

	function index()
	{
		$data['title'] = 'Test';
		$this->load->view('partials/header', $data);
		$this->load->view('partials/footer');
	}

	function show($id)
	{
		// $id = $this->input->get()
		var_dump($this->user->get_user_info($id));
	}

	function show_posts($id)
	{
		var_dump($this->user->get_user_posts($id));
	}
}
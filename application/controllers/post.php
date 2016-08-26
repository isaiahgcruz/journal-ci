<?php

/**
* 
*/
class Post extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model('Post_model', 'post');
		$this->load->library('pagination');
		$this->load->library('paginate');
	}

	function index($page = 1)
	{
		$posts = $this->post->get_posts_paginated($page,5);
		$data['posts'] = $posts['results'];
		$data['pagination'] = $this->paginate->set_pagination($page, $posts['count'], 'post/');

		$data['title'] = 'CodeIgniter';
		$this->load->view('partials/header', $data);
		$this->load->view('post/index', $data);
		$this->load->view('partials/footer');
	}
}
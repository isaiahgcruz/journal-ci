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
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$title = $this->input->post('title');
			$content = $this->input->post('content');
			if ($title && $content) {
				$data = [
					'title' => $title,
					'content' => $content,
					'user_id' => $this->session->userdata('user_data')['id'],
					'created_at' => date('Y-m-d H:i:s')	
				];
				$this->post->insert($data);
				$this->session->set_flashdata('alert', ['style' => 'success', 'message' => 'Post added successfully!']);
				redirect('post');
			} else {
				$this->session->set_flashdata('alert', ['style' => 'danger', 'message' => 'No field must be empty!']);
			}
		}
		$posts = $this->post->get_posts_paginated($page,5);
		$data['posts'] = $posts['results'];
		$data['pagination'] = $this->paginate->set_pagination($page, $posts['count'], 'post/');
		

		$data['title'] = 'CodeIgniter';
		$this->load->view('partials/header', $data);
		$this->load->view('post/index', $data);
		$this->load->view('partials/footer');
	}
}
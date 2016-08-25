<?php

class Post_model extends CI_Model {

	function __construct()
	{
		parent::__construct();

		$this->load->model('user_model', 'user');
	}

	function truncate()
	{
		$this->db->truncate('posts');
	}

	function insert($data)
	{
		$this->db->insert('posts', $data);
	}



}
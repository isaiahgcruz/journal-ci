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

	function update($postId, $data)
	{
		$this->db->where('id',$postId)->update($data);
	}

	function get_all_posts()
	{	
		$query = $this->db->order_by('posts.created_at')
			->join('users', 'posts.user_id = users.id')
			->get('posts');
		return $query->result();
	}

	

	function get_posts_paginated($page, $count)
	{	
		$page = (int) $page;
		$count = (int) $count;
		$query = $this->db->order_by('posts.created_at', 'DESC')->order_by('posts.id', 'DESC')
			->select(['posts.id', 'users.first_name', 'users.last_name', 'posts.title', 'posts.content'])
			->limit($count)
			->offset(($page-1)*$count)
			->join('users', 'posts.user_id = users.id');
		return ['results' => $query->get('posts')->result(), 'count' => $query->count_all_results('posts')];
	}

}
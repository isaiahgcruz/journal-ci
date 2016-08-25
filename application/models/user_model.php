<?php

class User_model extends CI_Model {
	var $id;
	var $username = '';
	var $password = '';
	var $first_name = '';
	var $last_name = '';

	function __construct() 
	{
		parent::__construct();
	}

	function get_all_users()
	{
		$q = $this->db->get('users');
		return $q->result();
	}

	function truncate()
	{
		$this->db->truncate('users');
	}

	function insert($data)
	{
		$this->db->insert('users', $data);
	}

	function get_user_info($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('users')->result();
	}

	function get_user_posts($id)
	{
		$this->db->where('user_id', $id);
		return $this->db->get('posts')->result();
	}

}
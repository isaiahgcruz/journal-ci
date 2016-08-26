<?php

/**
* 
*/
class Paginate
{
	var $ci;
	function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->library('pagination');		
	}

	function set_pagination($page, $count, $url)
	{
		$config['cur_page'] = $page;
		$config['base_url'] = base_url().$url;
		$config['total_rows'] = $count;
		$config['per_page'] = 5; 
		$config['uri_segment'] = 2;
		$config['use_page_numbers'] = TRUE;

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = '<<';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '>>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = FALSE;
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = FALSE;
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$this->ci->pagination->initialize($config); 
		return $this->ci->pagination->create_links();
	}
}
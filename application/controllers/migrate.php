<?php

class Migrate extends CI_Controller {
	function __construct()
    {
        parent::__construct();
 
        // can only be called from the command line
        if (!$this->input->is_cli_request()) {
            exit('Direct access is not allowed');
        }

        $this->session->sess_destroy();

    }
 
	public function index()
	{
		$this->load->library('migration');

		if ( ! $this->migration->latest()) {
			show_error($this->migration->error_string());
		}
	}

	public function rollback()
	{
		$this->load->library('migration');
		$this->migration->version(0);
	}
}
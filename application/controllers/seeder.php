<?php

class Seeder extends CI_Controller {

	function __construct() 
	{
		parent::__construct();

		if (!$this->input->is_cli_request()) {
			exit('Direct access is not allowed');
		}

		if (ENVIRONMENT !== 'development') {
			exit('Development environment use only');
		}

		$this->faker = Faker\Factory::create();

		$this->load->model('User_model', 'user');
		$this->load->model('Post_model', 'post');
	}

	function seed()
	{
		$this->_truncate_db();
		$this->_seed_users(25);
		$this->_seed_posts(10);
	}

	function _truncate_db()
	{
		$this->db->truncate('posts','users');
	}

	function _seed_users($limit)
	{
		echo "Seeding $limit users";

		for ($i = 0; $i < $limit; $i++) {
			echo '.';
			$first_name = $this->faker->firstName();
			$last_name = $this->faker->lastName();
			$username = strtolower($first_name[0]) . strtolower($last_name) . rand(0, 1000);
			$data = [
				'username' => $username,
				'password' => 'password',
				'first_name' => $first_name,
				'last_name' => $last_name,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];

			$this->user->insert($data);
		}

		echo PHP_EOL;
	}

	function _seed_posts($limit)
	{
		echo "Seeding $limit posts per user";
		
		$users = $this->user->get_all_users();

		foreach ($users as $user) {
			for ($i = 0; $i < $limit; $i++) {
				$data = [
					'title' => $this->faker->text(10),
					'content' => $this->faker->text(255),
					'user_id' => $user->id,
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s')
				];

				$this->post->insert($data);
			}
		}

		echo PHP_EOL;
	}

}
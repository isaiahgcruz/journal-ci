<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field([
				'id' => [
					'type' => 'INT',
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				],
				'username' => [
					'type' => 'VARCHAR',
					'constraint' => '20'
				],
				'password' => [
					'type' => 'VARCHAR',
					'constraint' => '50'
				],
				'first_name' => [
					'type' => 'VARCHAR',
					'constraint' => '50'
				],
				'last_name' => [
					'type' => 'VARCHAR',
					'constraint' => '50'
				],
				'created_at' => [
					'type' => 'DateTime'
				],
				'updated_at' => [
					'type' => 'DateTime'
				]
			]);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users');
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}
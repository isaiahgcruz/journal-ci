<?php

class Migration_Add_posts_table extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field([
				'id' => [
					'type' => 'INT',
					'unsigned' => TRUE,
					'auto_increment' => TRUE
				],
				'title' => [
					'type' => 'VARCHAR',
					'constraint' => '25'
				],
				'content' => [
					'type' => 'VARCHAR',
					'constraint' => '255'
				],
				'user_id' => [
					'type' => 'INT',
					'unsigned' => TRUE,
				],
				'created_at' => [
					'type' => 'DateTime'
				],
				'updated_at' => [
					'type' => 'DateTime',
					'null' => TRUE
				],
				'CONSTRAINT users_fid FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE'
			]);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('posts');
	}

	public function down()
	{
		$this->dbforge->drop_table('posts');
	}
}
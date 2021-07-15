<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          		=> ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true,],
			'name'       		=> ['type' => 'VARCHAR', 'constraint' => 100,],
			'email' 			=> ['type' => 'VARCHAR', 'constraint' => 100],
			'password'			=> ['type' => 'VARCHAR', 'constraint' => 255],
			'image'				=> ['type' => 'VARCHAR', 'constraint' => 255, 'default' => 'default.png'],
			'active'           	=> ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
			'id_akses' 			=> ['type' => 'int', 'default' => 1],
			'created_at'       	=> ['type' => 'datetime', 'null' => true],
			'updated_at'       	=> ['type' => 'datetime', 'null' => true],
			'deleted_at'       	=> ['type' => 'datetime', 'null' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('admin');

		$this->forge->addField([
			'id'          		=> ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true,],
			'email' 			=> ['type' => 'VARCHAR', 'constraint' => 100],
			'token'				=> ['type' => 'VARCHAR', 'constraint' => 255],
			'created_at'       	=> ['type' => 'int', 'constraint' => 100, 'null' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('token_admin');
	}

	public function down()
	{
		$this->forge->dropTable('admin');
		$this->forge->dropTable('token_admin');
	}
}

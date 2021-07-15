<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGuruTable extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          		=> ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true],
			'name'       		=> ['type' => 'VARCHAR', 'constraint' => 100],
			'nip' 				=> ['type' => 'VARCHAR', 'constraint' => 100],
			'password'			=> ['type' => 'VARCHAR', 'constraint' => 255],
			'gender'			=> ['type' => 'VARCHAR', 'constraint' => 20],
			'image'				=> ['type' => 'VARCHAR', 'constraint' => 255, 'default' => 'guru.jpg'],
			'active'           	=> ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
			'id_akses' 			=> ['type' => 'int', 'default' => 2],
			'created_at'       	=> ['type' => 'datetime', 'null' => true],
			'updated_at'       	=> ['type' => 'datetime', 'null' => true],
			'deleted_at'       	=> ['type' => 'datetime', 'null' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('guru', true);
	}

	public function down()
	{
		$this->forge->dropTable('guru');
	}
}

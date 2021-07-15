<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MapelMigration extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          		=> ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true],
			'mapel'       		=> ['type' => 'VARCHAR', 'constraint' => 100],
			'active'           	=> ['type' => 'int', 'constraint' => 5],
			'id_kelas'			=> [
				'type' => 'int', 'constraint' => 11, 'unsigned' => true
			],
			'id_guru' 			=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'created_at'       	=> ['type' => 'datetime', 'null' => true],
			'updated_at'       	=> ['type' => 'datetime', 'null' => true],
			'deleted_at'       	=> ['type' => 'datetime', 'null' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_kelas', 'kelas', 'id', false, 'CASCADE');
		$this->forge->addForeignKey('id_guru', 'guru', 'id', false, 'CASCADE');
		$this->forge->createTable('mapel', true);
	}

	public function down()
	{
		$this->forge->dropTable('mapel');
	}
}

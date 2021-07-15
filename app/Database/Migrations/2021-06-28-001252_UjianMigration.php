<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UjianMigration extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          		=> ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true],
			'ujian'       		=> ['type' => 'VARCHAR', 'constraint' => 100],
			'id_mapel'			=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'date'			=> ['type' => 'VARCHAR', 'constraint' => 255],
			'time'			=> ['type' => 'VARCHAR', 'constraint' => 255],
			'created_at'       	=> ['type' => 'datetime', 'null' => true],
			'updated_at'       	=> ['type' => 'datetime', 'null' => true],
			'deleted_at'       	=> ['type' => 'datetime', 'null' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_mapel', 'mapel', 'id', false, 'CASCADE');
		$this->forge->createTable('ujian', true);
	}

	public function down()
	{
		$this->forge->dropTable('ujian');
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KelasMigration extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          		=> ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true],
			'kelas'       		=> ['type' => 'VARCHAR', 'constraint' => 100],
			'jurusan' 				=> ['type' => 'VARCHAR', 'constraint' => 100],
			'tahun'			=> ['type' => 'VARCHAR', 'constraint' => 255],
			'created_at'       	=> ['type' => 'datetime', 'null' => true],
			'updated_at'       	=> ['type' => 'datetime', 'null' => true],
			'deleted_at'       	=> ['type' => 'datetime', 'null' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('kelas', true);
	}

	public function down()
	{
		$this->forge->dropTable('kelas');
	}
}

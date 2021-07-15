<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ActivityMigration extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          		=> ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true],
			'id_mapel'			=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'id_ujian'			=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'id_siswa'			=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'status'			=> ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'belum selesai'],
			'created_at'       	=> ['type' => 'datetime', 'null' => true],
			'updated_at'       	=> ['type' => 'datetime', 'null' => true],
			'deleted_at'       	=> ['type' => 'datetime', 'null' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_mapel', 'mapel', 'id', false, 'CASCADE');
		$this->forge->addForeignKey('id_ujian', 'ujian', 'id', false, 'CASCADE');
		$this->forge->addForeignKey('id_siswa', 'siswa', 'id', false, 'CASCADE');
		$this->forge->createTable('activities', true);
	}

	public function down()
	{
		$this->forge->dropTable('activities');
	}
}

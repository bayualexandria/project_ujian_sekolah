<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SoalMigration extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          		=> ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true],
			'soal'       		=> ['type' => 'TEXT'],
			'a'       		=> ['type' => 'TEXT', 'null' => true],
			'b'       		=> ['type' => 'TEXT', 'null' => true],
			'c'       		=> ['type' => 'TEXT', 'null' => true],
			'd'       		=> ['type' => 'TEXT', 'null' => true],
			'e'       		=> ['type' => 'TEXT', 'null' => true],
			'jawaban'       		=> ['type' => 'TEXT', 'null' => true],
			'id_ujian' 			=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'created_at'       	=> ['type' => 'datetime', 'null' => true],
			'updated_at'       	=> ['type' => 'datetime', 'null' => true],
			'deleted_at'       	=> ['type' => 'datetime', 'null' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_ujian', 'ujian', 'id', false, 'CASCADE');
		$this->forge->createTable('soal', true);
	}

	public function down()
	{
		$this->forge->dropTable('soal');
	}
}

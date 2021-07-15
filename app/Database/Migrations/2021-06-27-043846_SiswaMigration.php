<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SiswaMigration extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          		=> ['type' => 'INT', 'constraint' => 10, 'unsigned' => true, 'auto_increment' => true],
			'name'       		=> ['type' => 'VARCHAR', 'constraint' => 100],
			'nus' 				=> ['type' => 'VARCHAR', 'constraint' => 100],
			'password'			=> ['type' => 'VARCHAR', 'constraint' => 255],
			'gender'			=> ['type' => 'VARCHAR', 'constraint' => 20],
			'image'				=> ['type' => 'VARCHAR', 'constraint' => 255, 'default' => 'siswa.png'],
			'is_active'           	=> ['type' => 'int', 'constraint' => 5],
			'id_akses' 			=> ['type' => 'int', 'default' => 3],
			'id_kelas'			=> ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
			'created_at'       	=> ['type' => 'datetime', 'null' => true],
			'updated_at'       	=> ['type' => 'datetime', 'null' => true],
			'deleted_at'       	=> ['type' => 'datetime', 'null' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('id_kelas', 'kelas', 'id', false, 'CASCADE');
		$this->forge->createTable('siswa', true);
	}

	public function down()
	{
		$this->forge->dropTable('siswa');
	}
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class GuruSeeder extends Seeder
{
	public function run()
	{
		$faker = Factory::create('id_ID');

		for ($i = 1; $i <= 100; $i++) {
			$data = [
				'name'      => $faker->name,
				'nip'    => $faker->nik,
				'password' => password_hash('admin123', PASSWORD_DEFAULT),
				'gender' => $faker->title(),
				'image' => 'guru.jpg',
				'active' => 1,
				'id_akses' => 2,
				'created_at' => Time::createFromTimestamp($faker->unixTime()),
				'updated_at' => Time::now()
			];
			$this->db->table('guru')->insert($data);
		}
	}
}

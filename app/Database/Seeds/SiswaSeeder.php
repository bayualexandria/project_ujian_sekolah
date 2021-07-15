<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class SiswaSeeder extends Seeder
{
	public function run()
	{

		$faker = Factory::create('id_ID');

		for ($i = 1; $i <= 100; $i++) {
			$data = [
				'name'      => $faker->name,
				'nus'    => $faker->creditCardNumber,
				'password' => password_hash('admin123', PASSWORD_DEFAULT),
				'gender' => $faker->title(),
				'image' => 'siswa.png',
				'is_active' => 1,
				'id_akses' => 3,
				'created_at' => Time::createFromTimestamp($faker->unixTime()),
				'updated_at' => Time::now()
			];
			$this->db->table('siswa')->insert($data);
		}
	}
}

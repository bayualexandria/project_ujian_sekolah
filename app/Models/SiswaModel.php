<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'siswa';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['name', 'nus', 'password', 'gender', 'image', 'is_active', 'id_kelas'];

	// Dates
	protected $useTimestamps        = true;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];

	public function search($keyword)
	{
		return $this->table('siswa')
			->select('siswa.*,kelas.*')
			->join('kelas', 'kelas.id=siswa.id_kelas')
			->like('name', $keyword)
			->orLike('nus', $keyword)
			->orLike('jurusan', $keyword)
			->orLike('kelas', $keyword);
	}

	public function getAll()
	{
		return $this->table('siswa')->select('siswa.*,kelas.*')->join('kelas', 'kelas.id=siswa.id_kelas');
	}
}

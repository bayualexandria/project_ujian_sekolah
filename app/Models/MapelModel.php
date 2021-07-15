<?php

namespace App\Models;

use CodeIgniter\Model;

class MapelModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'mapel';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = true;
	protected $protectFields        = true;
	protected $allowedFields        = ['mapel', 'id_guru', 'id_kelas', 'active'];

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
		return $this->table('mapel')
			->select('guru.name,guru.image,mapel.active,mapel.id,kelas.kelas,kelas.jurusan,mapel.mapel')
			->join('kelas', 'kelas.id=mapel.id_kelas')
			->join('guru', 'guru.id=mapel.id_guru')
			->like('mapel', $keyword)
			->orLike('kelas', $keyword)
			->orLike('name', $keyword)
			->orLike('jurusan', $keyword)
			->orderBy('name', 'ASC');
	}

	public function getAll()
	{
		return $this->table('mapel')->select('guru.name,guru.image,mapel.active,mapel.id,kelas.kelas,kelas.jurusan,mapel.mapel')->join('kelas', 'kelas.id=mapel.id_kelas')->join('guru', 'guru.id=mapel.id_guru')->orderBy('name', 'ASC');
	}
}

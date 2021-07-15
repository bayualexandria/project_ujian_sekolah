<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'soal';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['soal', 'a', 'b', 'c', 'd', 'e', 'jawaban', 'id_ujian'];

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
		return $this->table('soal')
			->select('ujian.ujian,mapel.mapel')
			->join('mapel', 'mapel.id=soal.id_mapel')
			->like('soal', $keyword)
			->orLike('mapel', $keyword);
	}

	public function countSoal($ujian)
	{
		return $this->table('soal')->where('id_ujian', $ujian)->countAllResults();
	}

	public function getAll()
	{
		return $this->table('soal')->select('soal.*,mapel.mapel')->join('mapel', 'mapel.id=soal.id_mapel');
	}

	public function getSoal($id)
	{
		return $this->table('soal')->where('id_ujian', $id)->get();
	}
}

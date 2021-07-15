<?php

namespace App\Models;

use CodeIgniter\Model;

class UjianModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'ujian';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['ujian', 'id_mapel', 'time', 'date'];

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
		return $this->table('ujian')
			->select('ujian.*,mapel.mapel,mapel.id_guru,mapel.id_kelas')
			->join('mapel', 'mapel.id=ujian.id_mapel')
			->like('ujian', $keyword)
			->orLike('mapel', $keyword);
	}

	public function getAll()
	{
		$guru = auth()->id;
		return $this->table('ujian')
			->select('ujian.*,mapel.mapel,mapel.id_kelas,mapel.id_guru')
			->join('mapel', 'mapel.id=ujian.id_mapel')->where('mapel.id_guru', $guru);
	}

	public function searchJadwal($keyword)
	{
		return $this->table('ujian')
			->select('ujian.*,mapel.mapel,mapel.id_guru,mapel.id_kelas,siswa.name')
			->join('mapel', 'mapel.id=ujian.id_mapel')
			->table('mapel')
			->join('siswa', 'siswa.id_kelas=mapel.id_kelas')
			->like('ujian', $keyword)
			->orLike('mapel', $keyword)
			->orLike('name', $keyword);
	}

	public function getJadwal()
	{
		$siswa = auth()->id_kelas;
		return $this->table('ujian')
			->select('ujian.*,mapel.mapel,mapel.id_kelas,mapel.id_guru')
			->join('mapel', 'mapel.id=ujian.id_mapel')
			->where('mapel.id_kelas', $siswa);
	}
}

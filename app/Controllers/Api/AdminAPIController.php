<?php

namespace App\Controllers\Api;

use App\Models\AdminModel;
use CodeIgniter\RESTful\ResourceController;

class AdminAPIController extends ResourceController
{

	protected $Admin;

	public function __construct()
	{
		$this->Admin = new AdminModel();
	}
	/**
	 * Return an array of resource objects, themselves in array format
	 *
	 * @return mixed
	 */
	public function index()
	{
		
		$response = [
			'status'   => 200,
			'data' => $this->Admin->findAll(),
			'messages' => [
				'success' => 'Success'
			]
		];
		return $this->respond($response);
	}

	/**
	 * Return the properties of a resource object
	 *
	 * @return mixed
	 */
	public function show($id = null)
	{
		$data = $this->Admin->where('id', $id)->first();
		if ($data) {
			$response = [
				'status'   => 200,
				'data' => $data,
				'messages' => [
					'success' => 'Success'
				]
			];
			return $this->respond($response);
		} else {
			return $this->failNotFound('Data not found', $id);
		}
	}

	/**
	 * Return a new resource object, with default properties
	 *
	 * @return mixed
	 */
	public function new()
	{
		//
	}

	/**
	 * Create a new resource object, from "posted" parameters
	 *
	 * @return mixed
	 */
	public function create()
	{
		//
	}

	/**
	 * Return the editable properties of a resource object
	 *
	 * @return mixed
	 */
	public function edit($id = null)
	{
		//
	}

	/**
	 * Add or update a model resource, from "posted" properties
	 *
	 * @return mixed
	 */
	public function update($id = null)
	{
		//
	}

	/**
	 * Delete the designated resource object from the model
	 *
	 * @return mixed
	 */
	public function delete($id = null)
	{
		//
	}
}

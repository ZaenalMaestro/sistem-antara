<?php

namespace App\Controllers\API;

use App\Models\LoginModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class LoginApiController extends ResourceController
{
	use ResponseTrait;

	public function login()
	{
		$model = new LoginModel();
		$data = $model->findAll();
		return $this->respond($data, 200);
	}

	public function registration()
	{
		return view('login/registration');
	}
}
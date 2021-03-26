<?php

namespace App\Controllers\API;

use App\Models\MahasiswaModel;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;

class MahasiswaApiController extends ResourceController
{
	public function  __construct()
	{
		$this->model = new MahasiswaModel();
	}

  public function matakuliahPPI ()
  {
    return $this->respond(['message'=>'oke'], 200);
  }
}
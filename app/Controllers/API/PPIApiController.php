<?php

namespace App\Controllers\API;

use App\Models\PPiModel;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;

class PPIApiController extends ResourceController
{
	public function  __construct()
	{
		$this->model = new PPiModel();
	}

  // menampilkan response daftar matakuliah PPI
  public function matakuliahPPI(){
    $result = $this->model->getMatakuliahPPI();

    // kirimkan response ke user
    $response = [
      "status_code"     => 200,
      "daftar_matakuliah"  => $result
    ];
    return $this->respond($response, 200);    
  }

  // menampilkan response peraturan PPI
  public function peraturanPPI(){
    $result = $this->model->getPeraturanPPI();

    // kirimkan response ke user
    $response = [
      "status_code"     => 200,
      "daftar_peraturan"  => $result
    ];
    return $this->respond($response, 200);    
  }

  
  // get jadwal ppi
  public function jadwalPPI(){
    $jadwal_ppi = $this->model->getJadwalPPI();
    return $this->respond($jadwal_ppi, 200);
  }
}
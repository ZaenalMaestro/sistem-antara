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

  // kirim matakuliah yang diprogramkan 
  // belum dikonfirmasi oleh prodi
  public function matakuliahDiprogramkan ()
  {
    // get token
    $token = $this->request->getServer('HTTP_AUTHORIZATION');
    $token = explode(" ", $token)[1];

    // decode JWT
    JWT::$leeway = 60;
    $decode = JWT::decode($token, 'bem_fikom_umi', ['HS256']);

    // get data user uesrname (stambuk mahasiswa)
    $stambuk = $decode->user->username;
    $result = $this->model->getMatakuliahPPIMahasiswa($stambuk, 'belum diterima');

    // kirimkan response ke user
    $response = [
      "status_code"     => 200,
      "matakuliah_diprogramkan"  => $result
    ];
    return $this->respond($response, 200);    
  }

  // kirim matakuliah yang diprogramkan 
  // telah dikonfirmasi oleh prodi
  public function matakuliahDikonfirmasi ()
  {
    // get token
    $token = $this->request->getServer('HTTP_AUTHORIZATION');
    $token = explode(" ", $token)[1];

    // decode JWT
    JWT::$leeway = 60;
    $decode = JWT::decode($token, 'bem_fikom_umi', ['HS256']);

    // get data user uesrname (stambuk mahasiswa)
    $stambuk = $decode->user->username;
    $result = $this->model->getMatakuliahPPIMahasiswa($stambuk, 'diterima');

    // kirimkan response ke user
    $response = [
      "status_code"     => 200,
      "matakuliah_diterima"  => $result
    ];
    return $this->respond($response, 200);    
  }

  // belanja matakuliah PPI
  public function belanjaMatakuliah()
  {
    // get token
    $token = $this->request->getServer('HTTP_AUTHORIZATION');
    $token = explode(" ", $token)[1];

    // decode JWT
    JWT::$leeway  = 60;
    $decode       = JWT::decode($token, 'bem_fikom_umi', ['HS256']);

    // get satmbuk dan matakuliah yang dibelanjakan
    $request            = $this->request->getJSON();
    $stambuk            = $decode->user->username;
    $belanja_matakuliah = $request->belanja_matakuliah;
    
    // simpan matakuliah
    $tersimpan = $this->model->simpanMatakuliah($belanja_matakuliah, $stambuk);

    $response = [
      "pesan"       => "matakuliah berhasil disimpan",
      "status_code" => 200
    ];

    // jika gagal tersimpan
    if (!$tersimpan) {
      $response["pesan"]        = "matakuliah gagal disimpan";
      $response["status_code"]  = 400;
      
      return $this->respond($response, 400);    
    }

    // jika berhasil tersimpan
    return $this->respond($response, 200);        
  }
}
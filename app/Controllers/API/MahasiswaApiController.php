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

    // get token
    $this->request = service('request');
    $token = $this->request->getServer('HTTP_AUTHORIZATION');
    $token = explode(" ", $token)[1];

    // decode JWT
    JWT::$leeway      = 60;
    $decode           = JWT::decode($token, 'bem_fikom_umi', ['HS256']);
    $this->mahasiswa  = $decode->user;
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
    $result = $this->model->getMatakuliahPPIMahasiswa($stambuk);

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
    $request            = $this->request->getJSON();
    // return $this->respond($request);
    // get stambuk dan matakuliah yang dibelanjakan
    $stambuk            = $this->mahasiswa->username;
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

  // ubah matakuliah yang telah diprogramkan belanja matakuliah PPI
  public function ubahMatakuliah()
  {
    // var_dump($this->mahasiswa->username);die;
    // get stambuk dan matakuliah yang dibelanjakan
    $request            = $this->request->getJSON();
    $stambuk            = $this->mahasiswa->username;
    $belanja_matakuliah = $request->belanja_matakuliah;
    // ubah matakuliah
    $berubah = $this->model->ubahMatakuliahPPI($belanja_matakuliah, $stambuk);
    
    $response = [
      "pesan"       => "matakuliah berhasil diubah",
      "status_code" => 200
    ];

    // jika matakuliah gagal diubah
    if (!$berubah) {
      $response["pesan"]        = "matakuliah gagal diubah";
      $response["status_code"]  = 400;
      
      return $this->respond($response, 400);    
    }

    // jika berhasil tersimpan
    return $this->respond($response, 200);  
  }

  // hapus matakuliah yang diprogramkan
  public function batalkanMatakuliah()
  {
    $id_matakuliah = $this->request->getJsonVar('id_matakuliah');

    $matakuliah_dibatalkan = $this->model->batalkanMatakuliah($id_matakuliah); 

    $response = [
      "pesan"       => "matakuliah berhasil dibatalkan",
      "status_code" => 200
    ];

    // jika matakuliah gagal diubah
    if (!$matakuliah_dibatalkan) {
      $response["pesan"]        = "matakuliah gagal dibatalkan";
      $response["status_code"]  = 400;
      
      return $this->respond($response, 400);    
    }

    // jika berhasil tersimpan
    return $this->respond($response, 200);  
  }

  /*
  menampilkan semua matakuliah yg dilengkapi status matakuliah

  id_matakuliah": "1",
  "matakuliah": "Basi Data II",
  "sks": "3",
  "status": "belum_diprogramkan" or "status": "telah_diprogramkan"
  */ 
  public function matakuliahBelumprogramkan()
  {
    $stambuk            = $this->mahasiswa->username;
    $matakuliah = $this->model->matakuliahBelumDiprogramkan($stambuk);
    $output = [
      "status_code" => 200,
      "matakuliah_mahasiswa" => $matakuliah
    ];
    return $this->respond($output, 200);
  }

}
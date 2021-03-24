<?php

namespace App\Controllers\API;

use App\Models\LoginModel;
use CodeIgniter\RESTful\ResourceController;

class LoginApiController extends ResourceController
{
	protected $model;

	public function  __construct()
	{
		$this->model = new LoginModel();
	}
	

	// menangani login user
	public function login()
	{		
		$data = $this->model->findAll();
		return $this->respond($data, 200);
	}

	// menangani registration user
	public function registrasi()
	{
		$request = $this->request->getJSON();

		// password hash
		$options = [ "cost" => 10 ];
		$password = password_hash($request->password, PASSWORD_DEFAULT, $options);

		// data registrasi
		$registrasi = [
			"username" 	=> $request->stambuk,
			"password" 	=> $password,
			"role" 			=> "mahasiswa"
		];

		// data mahasiswa
		$mahasiswa = [
			"stambuk" 		=> $request->stambuk,
			"nama" 				=> $request->nama,
			"semester" 		=> $request->semester,
			"status_PPi" 	=> "belum diterima"
		];

		// hitung jumlah username
		$row = $this->model->jumlahUsername($registrasi['username']);
		
		// kembalikan pesan jika jumlah username > 0
		if($row > 0) {
			$data = [ "pesan" => "Stambuk telah terdaftar !" ];
			return $this->respond($data, 409);
		}

		// simpan registari mahasiswa
		$simpanDataRegistrasi = $this->model->save($registrasi);
		// simpan mahasiswa
		$simpanDataMahasiswa = $this->model->saveMahasiswa($mahasiswa);

		if ($simpanDataRegistrasi == true && $simpanDataMahasiswa == true) {
			$data = [ 
				"pesan" => "Registrasi berhasil !",
				"registrasi" => "true",
				"password" => $password
			];
			return $this->respond($data, 200);
		}
	}
}
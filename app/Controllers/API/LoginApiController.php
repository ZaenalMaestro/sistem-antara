<?php

namespace App\Controllers\API;

use App\Models\LoginModel;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;

class LoginApiController extends ResourceController
{
	public function  __construct()
	{
		$this->model = new LoginModel();
	}
	

	// menangani login user
	public function login()
	{		
		$request = $this->request->getJSON();
		$username = $request->username;
		$password = $request->password;

		// jika username telah terdaftar
		$usernameExist = $this->model->findUsername($username);
		if (!$usernameExist) {
			return $this->sendResponse('Username tidak valid !', 401);			
		}

		// get data user berdasarkan username
		$user = $this->model->where('username', $username)->first();
		$correctpassowrd = password_verify($password, $user['password']);

		// jika password salah
		if (!$correctpassowrd) {
			return $this->sendResponse('Password tidak valid !', 401);
		}

		// buat JSON Web Token
		$key = "bem_fikom_umi";
		$payload = [
				"iss" => "BEM FIKOM UMI",
				"aud" => "MAHASISWA",
				"iat" => time(),
				"nbf" => time() + 10,
				"exp" => time() + 3600, // token berlaku selama 1 jam
				"user" => [
					"username" => $user['username'],
					"role" => $user['role'],
				]
		];

		$jwt = JWT::encode($payload, $key);
		return $this->sendResponse('Login berhasil !', 200, $jwt);

	}

	// menangani registration user
	public function registrasi()
	{
		// get request data JSON
		$request 	= $this->request->getJSON();
		$stambuk 	= $request->stambuk;
		$nama 		= $request->nama;
		$semester = $request->semester;
		$password = $request->password;
		
		// password hash
		$options 				= [ "cost" => 10 ];
		$password_hash 	= password_hash($password, PASSWORD_DEFAULT, $options);

		// data registrasi
		$registrasi = [
			"username" 	=> $stambuk,
			"password" 	=> $password_hash,
			"role" 			=> "mahasiswa"
		];

		// data mahasiswa
		$mahasiswa = [
			"stambuk" 		=> $stambuk,
			"nama" 				=> $nama,
			"semester" 		=> $semester,
			"status_PPi" 	=> "belum diterima"
		];

		
		// jika username telah terdaftar
		$usernameExist = $this->model->findUsername($stambuk);
		if ($usernameExist) {
			return $this->sendResponse('Stambuk telah terdaftar !', 409);
		}

		// simpan registari mahasiswa
		$simpan_registrasi = $this->model->save($registrasi);
		// simpan mahasiswa
		$simpan_mahasiswa = $this->model->saveMahasiswa($mahasiswa);

		if ($simpan_registrasi == true && $simpan_mahasiswa == true) {
			// jika registrasi berhasil
			return $this->sendResponse('Registrasi berhasil !', 200);
		} else {
			// jika registrasi gagal
			return $this->sendResponse('Registrasi berhasil !', 401);
		}
	}

	// kirim respond
	public function sendResponse(string $message = '', int $code, string $jwt = '') {
		
		$response = [ 
			"pesan" 			=> $message,
			"status_code"	=> $code
		];
		if ($jwt) { 
			$response['jwt'] = $jwt; 
		}
		return $this->respond($response, $code);
	}
}
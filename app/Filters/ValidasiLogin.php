<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\LoginModel;

class ValidasiLogin implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    // menggunakan fungsi request dan response
    $this->request = service('request');
    $this->response = service('response');

    // buat object model
    $model = new LoginModel();
    
    // tangkap request JSON
    $request = $this->request->getJSON();    
		$username = $request->username;
		$password = $request->password;

		// jika username tidak terdaftar
		$usernameExist = $model->findUsername($username);
		if (!$usernameExist) {
      $output = [
        'error_form'  => 'username',
        'pesan' => 'Username tidak valid !',
        'status_code' => 401
      ];
			return $this->response->setJSON($output);
		}

		// get data user berdasarkan username
		$user = $model->where('username', $username)->first();
		$correctpassowrd = password_verify($password, $user['password']);

		// jika password salah
		if (!$correctpassowrd) {
			$output = [
        'error_form'  => 'password',
        'pesan' => 'Password tidak valid !',
        'status_code' => 401
      ];
			return $this->response->setJSON($output);		
		}



    
    // jika username tidak terdaftar
		$usernameExist = $model->findUsername($request->username);
		if (!$usernameExist) {
      $output = [
        'error_form'  => 'username',
        'pesan' => 'Username belum terdaftar !',
        'status_code' => 409
      ];
			return $this->response->setJSON($output);
		}
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    
  }
}

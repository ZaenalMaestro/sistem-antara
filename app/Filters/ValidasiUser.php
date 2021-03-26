<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\LoginModel;

class ValidasiUser implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    // menggunakan fungsi request dan response
    $this->request = service('request');
    $this->response = service('response');


    $model = new LoginModel();
    
    $request = $this->request->getJSON();    
    
    // jika username telah terdaftar
		$usernameExist = $model->findUsername($request->stambuk);
		if ($usernameExist) {
      $output = [
        'pesan' => 'Stambuk telah terdaftar !',
        'status_code' => 409
      ];
			return $this->response->setStatusCode(409)->setJSON($output);
		}
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    
  }
}

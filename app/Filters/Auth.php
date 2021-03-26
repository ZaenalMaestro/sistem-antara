<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use \Config\Services;

class Auth implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    $this->response = service('response');
    $token = $request->getServer('HTTP_AUTHORIZATION');
    if (!$token) {

      $data = [
        'message' => 'Token tidak tersedia !',
        'status_code' => 401
      ];

      return $this->response->setStatusCode(401)
                            ->setJSON($data);
    }

  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    
  }
}

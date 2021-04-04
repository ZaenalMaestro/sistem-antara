<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Firebase\JWT\JWT;

class MahasiswaAuth implements FilterInterface
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

      return redirect()->to('/login');
    }

    // validasi JWT
    try {
      // get token
      $token = explode(" ", $token)[1];

      JWT::$leeway = 60;
      $docode = JWT::decode($token, 'bem_fikom_umi', ['HS256']);      

      // validasi role
      if ($docode->user->role !== 'mahasiswa'){
        return redirect()->to('/' + $docode->user->role);
      }
    } catch (\Exception $error) {
      return redirect()->to('/login');
    }

  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    
  }
}

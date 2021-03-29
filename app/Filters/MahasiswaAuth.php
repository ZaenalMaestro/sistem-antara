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

      return $this->response->setStatusCode(401)
                            ->setJSON($data);
    }

    // validasi JWT
    try {
      // get token
      $token = explode(" ", $token)[1];

      JWT::$leeway = 60;
      $docode = JWT::decode($token, 'bem_fikom_umi', ['HS256']);      

      // validasi role
      if ($docode->user->role !== 'mahasiswa'){
        $output = [
          'pesan'       => 'Unauthorized user',
          'status_code' => 401
        ];
  
        return $this->response->setStatusCode(401)
                              ->setJSON($output);
      }
    } catch (\Exception $error) {
      $output = [
        'pesan'       => $error->getMessage(),
        'status_code' => 401
      ];

      return $this->response->setStatusCode(401)
                            ->setJSON($output);
    }

  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    
  }
}

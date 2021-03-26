<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
  protected $table = 'login';
  protected $allowedFields = ['username', 'nama', 'semester', 'password'];

  
  // cek apakah stambuk telah terdaftar
  public function findUsername ($stambuk)
  {
    // get jumlah username berdasarkan stambuk
    $username = $this->db->table($this->table)
                    ->where('username', $stambuk)
                    ->countAllResults(); 

    // true = jika username ditemukan
    // false = username tidak ditemukan
    return ($username > 0) ? true : false;
  }

  // simpan data mahasiswa
  public function saveMahasiswa($mahasiswa)
  {
    $query = $this->db->table('mahasiswa')->insert($mahasiswa);
    return $query ? true : false;
  }
}
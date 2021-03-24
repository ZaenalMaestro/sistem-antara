<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
  protected $db;
  protected $table = 'login';
  protected $primaryKey = 'id_login';
  protected $allowedFields = ['username', 'nama', 'semester', 'password'];

	public function  __construct()
	{
    $this->db = \Config\Database::connect();
	}
  
  // hitung jumlah username
  public function jumlahUsername($username) {
    $sql = "SELECT COUNT(username) as jumlah FROM login WHERE username = $username";    
    $baris = $this->db->query($sql)->getRow();

		return (int) $baris->jumlah;
  }

  // simpan data mahasiswa
  public function saveMahasiswa($mahasiswa){
    $stambuk = $mahasiswa['stambuk'];
    $nama = $mahasiswa['nama'];
    $semester = $mahasiswa['semester'];
    $status_ppi = 'belum diterima';

    $sql = "INSERT INTO mahasiswa VALUES ($stambuk, '$nama', $semester, '$status_ppi')";    
    $row = $this->db->query($sql);
    return $row->resultID;
  }
}
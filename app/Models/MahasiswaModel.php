<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
  protected $table = 'mahasiswa';
  protected $allowedFields = ['username', 'nama', 'semester', 'password'];

  // get matakuliah yang telah dikonfirmasi prodi
  // berdasarkan stambuk mahsiswa
  public function getMatakuliahPPIMahasiswa($stambuk)
  {
    $sql_query = "SELECT matakuliah, sks, status_ppi FROM matakuliah_ppi_mahasiswa WHERE stambuk = $stambuk";
    return $this->db->query($sql_query)->getResultArray();
  }

  // belanja matakuliah yang dibelanjakan - batch (daftar matakuliah lebih dari 1)
  function simpanMatakuliah($belanja_matakuliah, $stambuk)
  {
    foreach($belanja_matakuliah as $matakuliah){
      $matakuliahPPI[] = [
        "stambuk" 	  => $stambuk,
        "matakuliah" 	=> $matakuliah[0],
        "sks" 			  => $matakuliah[1]
      ];
    }

    // simpan matakuliah
    $result = $this->db->table('belanja_matakuliah')->insertBatch($matakuliahPPI);
    return $result ? true : false;
  }

  // ubah matakuliah PPI
  public function ubahMatakuliahPPI($belanja_matakuliah, $stambuk)
  {
    // hapus matakuliah ygn telah diprogramkan sebelumnya
    $terhapus = $this->db->table('belanja_matakuliah')->where('stambuk', $stambuk)->delete();
    
    // jika data gagal terhapus
    if (!$terhapus) {
      return false;
    }
    // simpan ulang matakuliah yg baru
    return $this->simpanMatakuliah($belanja_matakuliah, $stambuk);
  }

  public function batalkanMatakuliah($id_matakuliah)
  {
    $result = $this->db->table('belanja_matakuliah')->where('id_belanja_matakuliah', $id_matakuliah)->delete();
    return $result ? true : false;
  }

  public function matakuliahBelumDiprogramkan($stambuk)
  {
    $daftar_matakuliah_ppi = $this->db->table('daftar_matakuliah')->get()->getResultArray();
    $matakuliah_diprogramkan = $this->db->table('belanja_matakuliah')->where('stambuk', $stambuk)->get()->getResultArray();
    $data = [];
    foreach($daftar_matakuliah_ppi as $daftar_matakuliah) {
      $daftar_matakuliah['status'] = 'belum_diprogramkan';
      foreach ($matakuliah_diprogramkan as $matkul_mahasiswa) {
        if ($daftar_matakuliah['matakuliah'] == $matkul_mahasiswa['matakuliah']) {
          $daftar_matakuliah['status'] = 'telah_diprogramkan';
        }
      }
      $data [] = $daftar_matakuliah;
    }
    return $data;
  }
}
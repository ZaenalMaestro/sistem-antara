<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
  protected $table = 'mahasiswa';
  protected $allowedFields = ['username', 'nama', 'semester', 'password'];

  // get matakuliah yang telah dikonfirmasi prodi
  // berdasarkan stambuk mahsiswa
  public function getMatakuliahPPIMahasiswa($stambuk, $status)
  {
    $sql_query = "SELECT matakuliah, sks FROM matakuliah_ppi_mahasiswa WHERE stambuk = $stambuk and status_ppi = '$status'";
    return $this->db->query($sql_query)->getResultArray();
  }

  // simpan matakuliah yang dibelanjakan
  function simpanMatakuliah($belanja_matakuliah, $stambuk)
  {
    $jumlah_matakuliah  = count($belanja_matakuliah);
    $index              = 0;

    foreach($belanja_matakuliah as $matakuliah){
      $matakuliahPPI = [
        "stambuk" 	  => $stambuk,
        "matakuliah" 	=> $matakuliah->matakuliah,
        "sks" 			  => $matakuliah->sks
      ];

      // kembalikan nilai true
      // jika matakuliah terakhir berhasil
      if (++$index == $jumlah_matakuliah) {
        $result = $this->db->table('belanja_matakuliah')->insert($matakuliahPPI);
        return $result ? true : false;
      }  

      // simpan matakuliah
      $this->db->table('belanja_matakuliah')->insert($matakuliahPPI);
    }
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
}
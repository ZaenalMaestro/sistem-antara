<?php 

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\This;

class ProdiModel extends Model 
{
  protected $table = 'mahasiswa';

  // get jumlah mahasiswa
    // sudah mendaftar - belum diterima, ditolak, diterima
  public function getJumlahMahasiswa()
  {
    
    // get jumlah mhs - sudah mendaftar
    $sudah_mendaftar = $this->db->table($this->table)->countAllResults();
    // get jumlah mhs - belum diterima
    $belum_diterima = $this->db->table($this->table)
                          ->where('status_ppi', 'belum diterima')
                          ->countAllResults(); 
    // get jumlah mhs - diterima
    $diterima = $this->db->table($this->table)
                          ->where('status_ppi', 'diterima')
                          ->countAllResults(); 
    // get jumlah mhs - ditolak
    $ditolak = $this->db->table($this->table)
                          ->where('status_ppi', 'ditolak')
                          ->countAllResults(); 

    return [
      "mendaftar"       => $sudah_mendaftar,
      "belum_diterima"  => $belum_diterima,
      "diterima"        => $diterima,
      "ditolak"         => $ditolak
    ];
  }

  // menampilkan data mahasiswa ppi dan matakuliah yang diprogramkan
  public function getMatakuliahByStambuk($stambuk)
  {
    // get nama dan stambuk

    $sql_query = "SELECT matakuliah, sks FROM matakuliah_ppi_mahasiswa WHERE stambuk = $stambuk";
    return $this->db->query($sql_query)->getResultArray();
  }

  // menampilkan data mahasiswa berdasarkan stambuk
  public function getMahasiswaByStambuk($stambuk)
  {
    return $this->db->table($this->table)->where('stambuk', $stambuk)
                                          ->get()->getResultArray()[0]; 
  }

  // menampilkan data daftar peraturan PPI
  public function getPeraturan()
  {
    return $this->db->table('peraturan')->get()->getResultArray();
  }

  // ubah status ppi mahasiswa
  public function ubahStatus($status_ppi, $stambuk)
  {
    $result = $this->db->table($this->table)->set('status_ppi', $status_ppi)
                                            ->where('stambuk', $stambuk)
                                            ->update();
    return $result ? true : false;
  }
}
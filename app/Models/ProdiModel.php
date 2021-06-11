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

  // get status mahasiswa yang telah diterima dan diverifikasi
  public function getMahasiswaDiterima () {
    $sql_query = "SELECT * FROM mahasiswa WHERE status_ppi != 'belum diterima'";
    return $this->db->query($sql_query)->getResultArray();
  }

  // menampilkan data mahasiswa ppi dan matakuliah yang diprogramkan
  public function getMatakuliahByStambuk($stambuk)
  {
    // get nama dan stambuk

    $sql_query = "SELECT matakuliah, sks FROM matakuliah_ppi_mahasiswa WHERE stambuk = $stambuk";
    return $this->db->query($sql_query)->getResultArray();
  }

  // // menampilkan data mahasiswa ppi dan matakuliah yang diprogramkan
  public function getTotalSks($stambuk)
  {

    $sql_query = "SELECT SUM(sks) as total FROM matakuliah_ppi_mahasiswa WHERE stambuk = $stambuk";
    return (int)$this->db->query($sql_query)->getResultArray()[0]['total'];
  }

  // menampilkan data mahasiswa ppi dan matakuliah yang diprogramkan
  public function getBiayaPPI()
  {
    // get nama dan stambuk

    $sql_query = "SELECT biaya FROM biaya_ppi WHERE id_biaya = 1";
    return (int)$this->db->query($sql_query)->getResultArray()[0]['biaya'];
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
  // update biaya ppi mahasiswa
  public function ubahBiaya($biaya_ppi, $stambuk)
  {
    $result = $this->db->table($this->table)->set('biaya_ppi', $biaya_ppi)
                                            ->where('stambuk', $stambuk)
                                            ->update();
    return $result ? true : false;
  }
}
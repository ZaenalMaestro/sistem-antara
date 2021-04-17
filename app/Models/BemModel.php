<?php 

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\This;

class BemModel extends Model 
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

  // menambahkan matakuliah baru
  public function tambahMatakuliahBaru($matakuliah_baru)
  {
    $result = $this->db->table('daftar_matakuliah')->insert($matakuliah_baru);
    return $result ? true : false;
  }

  // ubah data matakuliah PPI
  public function updateMatakuliah($matakuliah)
  {
    $result = $this->db->table('daftar_matakuliah')->replace($matakuliah);
    return $result ? true : false;
  }

  // menampilkan data daftar peraturan PPI
  public function getPeraturan()
  {
    return $this->db->table('peraturan')->get()->getResultArray();
  }

  // menambahkan peraturan baru
  public function addPeraturan($peraturan)
  {
    $result = $this->db->table('peraturan')->insert($peraturan);
    return $result ? true : false;
  }

  // ubah peraturan
  public function ubahPeraturan($peraturan)
  {
    $result = $this->db->table('peraturan')->replace($peraturan);
    return $result ? true : false;
  }

  // ubah peraturan
  public function hapusPeraturan($id_peraturan)
  {
    $result = $this->db->table('peraturan')->where('id_peraturan', $id_peraturan)->delete();
    return $result ? true : false;
  }

  // ------- JADWAL PPI ------------ //
  public function getJadwalPPI()
  {
    return $this->db->table('jadwal_ppi')->get()->getResultArray();
  }

  public function ubahJadwalPPI($jadwal)
  {
    $result = $this->db->table('jadwal_ppi')->replace($jadwal);
    return $result ? true : false;
  }
  public function ubahBatasSksPPI($batas_sks_matakuliah)
  {
    $result = $this->db->table('batas_sks')->replace($batas_sks_matakuliah);
    return $result ? true : false;
  }

  // data cetak
  public function dataCetakPPI()
  {
    $mahasiswa = $this->db->table('mahasiswa')->get()->getResultArray();
    $matakuliah = $this->db->table('belanja_matakuliah')->get()->getResultArray();

    $data_cetak = [];
    foreach ($mahasiswa as $mhs) {
      foreach ($matakuliah as $matkul) {
        if ($mhs['stambuk'] === $matkul['stambuk']) {
          $mhs['matakuliah'][] = [
            'matakuliah' => $matkul['matakuliah'],
            'sks' => $matkul['sks'],
          ];
        }
      }

      if (empty($mhs['matakuliah'])) {
        $mhs['matakuliah'] = [];
      }
      $data_cetak [] = $mhs;
    }
    
    return $data_cetak;


  }
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class PPiModel extends Model
{
  // menampilkan daftar matakuliah PPI
  public function getMatakuliahPPI()
  {
    return $this->db->table('daftar_matakuliah')->get()->getResultArray();
  }

  // menampilkan peraturan PPI
  public function getPeraturanPPI()
  {
    return $this->db->table('peraturan')->get()->getResultArray();
  }

  
  // get jadwal PPI
  public function getJadwalPPI()
  {
    return $this->db->table('jadwal_ppi')->get()->getResultArray();
  }

  // get jadwal PPI
  public function getBatasMatakuliahPPI()
  {
    return $this->db->table('batas_sks')->get()->getResultArray();
  }

  // get batas praktikum
  public function getBatasPraktikumPPI()
  {
    return $this->db->table('batas_praktikum')->get()->getResultArray();
  }
}
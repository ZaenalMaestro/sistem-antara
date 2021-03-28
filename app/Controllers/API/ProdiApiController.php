<?php

namespace App\Controllers\API;

use App\Models\ProdiModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class ProdiApiController extends ResourceController
{
	public function __construct()
	{
		$this->model = new ProdiModel();
	}

	// menampilkan jumlah mahasiswa ppi
	// - sudah mendaftar - belum diterima - diterima - ditolak
	public function jumlahMahasiswaPPI()
	{
		$ppi = $this->model->getJumlahMahasiswa();

		$response = [
			"status_code" 		=> 200,
			"mendaftar"       => $ppi['mendaftar'],
      "belum_diterima"  => $ppi['belum_diterima'],
      "diterima"        => $ppi['diterima'],
      "ditolak"         => $ppi['ditolak']
		];

		return $this->respond($response, 200);
	}

	// menampilkan daftar mahasiswa PPI
	public function mahasiswaPPI()
	{
		// get semua mahasiswa PPI
		$mahasiswa_ppi = $this->model->findAll();
		$response = [
			'status_code' 	=> 200,
			'mahasiswa_ppi' => $mahasiswa_ppi
		];

		return $this->respond($response, 200);
	}

	// menampilkan detail mahasiswa berdasarkan stambuk
	public function detaiMahasiswaPPI()
	{
		$stambuk = $this->request->uri->getSegment(4);

		$detail_mahasiswa = $this->model->getMahasiswaByStambuk($stambuk);
		$matakuliah_ppi 	= $this->model->getMatakuliahByStambuk($stambuk);

		// add matakuliah kedalam detail mahasiswa
		$detail_mahasiswa['matakuliah_ppi'] = $matakuliah_ppi;

		return $this->respond($detail_mahasiswa, 200);
	}

	// ubah status mahasiswa
	public function ubahStatusMahasiswa()
	{
		$request = $this->request->getJSON();
		
		$stambuk = $request->stambuk;
		$status_ppi = $request->status_ppi;

		$status_ppi_diubah = $this->model->ubahStatus($status_ppi, $stambuk);

		$response = [
      "pesan"       => "status ppi mahasiswa berhasil diubah",
      "status_code" => 200
    ];

    // jika gagal tersimpan
    if (!$status_ppi_diubah) {
      $response["pesan"]        = "status ppi mahasiswa gagal diubah";
      $response["status_code"]  = 400;
      
      return $this->respond($response, 400);    
    }

    // jika berhasil tersimpan
    return $this->respond($response, 200);     
	}

	// menampilkan data peraturan PPI
	public function tampilPeraturan()
	{
		$peraturan = $this->model->getPeraturan();
		$response = [
			"status_code" 	=> 200,		
			"peraturan_ppi" => $peraturan
		];
		return $this->respond($response, 200);

	}
}
<?php

namespace App\Controllers\API;

use App\Models\BemModel;
use CodeIgniter\RESTful\ResourceController;

class BemApiController extends ResourceController
{
	public function __construct()
	{
		$this->model = new BemModel();
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

	// menambahkan matakuliah baru
	public function tambahMatakuliahPPI()
	{
		$request = $this->request->getJSON();
		
		$matakuliah_baru = [
			"matakuliah" 	=> $request->matakuliah,
			"sks" 				=> $request->sks
		];
		
		$matakuliah_ditambakan = $this->model->tambahMatakuliahBaru($matakuliah_baru);

		$response = [
      "pesan"       => "matakuliah ppi berhasil ditambahkan",
      "status_code" => 200
    ];

    // jika gagal tersimpan
    if (!$matakuliah_ditambakan) {
      $response["pesan"]        = "matakuliah gagal ditambahkan";
      $response["status_code"]  = 400;
      
      return $this->respond($response, 400);    
    }

    // jika berhasil tersimpan
    return $this->respond($response, 200);     
	}

	// ubah matakuliah
	public function ubahMatakuliahPPI()
	{
		$request 				= $this->request->getJSON();
		$matakuliah = [			
			"id_matakuliah"	=> $request->id_matakuliah,
			"matakuliah" 		=> $request->matakuliah,
			"sks" 					=> $request->sks
		];

		$matakuliah_diubah = $this->model->updateMatakuliah($matakuliah);

		$response = [
      "pesan"       => "matakuliah ppi berhasil diubah",
      "status_code" => 200
    ];

    // jika gagal tersimpan
    if (!$matakuliah_diubah) {
      $response["pesan"]        = "matakuliah gagal diubah";
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

	// tambah data peraturan PPI
	public function tambahPeraturan()
	{
		$peraturan = $this->request->getJsonVar('peraturan');
		$peraturan_baru = [
			"peraturan" => htmlspecialchars($peraturan)
		];
		$peraturan_ditambahkan = $this->model->addPeraturan($peraturan_baru);
		
		$response = [
      "pesan"       => "Peraturan ppi berhasil ditambahkan",
      "status_code" => 200
    ];

    // jika gagal tersimpan
    if (!$peraturan_ditambahkan) {
      $response["pesan"]        = "peraturan gagal ditambahkan";
      $response["status_code"]  = 400;
      
      return $this->respond($response, 400);    
    }

    // jika berhasil tersimpan
    return $this->respond($response, 200);
	}
	// ubah data peraturan PPI
	public function ubahPeraturan()
	{
		$request = $this->request->getJSON();
		$peraturan = [
			"id_peraturan" 	=> $request->id_peraturan,
			"peraturan" 		=> htmlspecialchars($request->peraturan),
		];
		$peraturan_diubah = $this->model->ubahPeraturan($peraturan);
		
		$response = [
      "pesan"       => "Peraturan ppi berhasil diubah",
      "status_code" => 200
    ];

    // jika gagal tersimpan
    if (!$peraturan_diubah) {
      $response["pesan"]        = "peraturan gagal diubah";
      $response["status_code"]  = 400;
      
      return $this->respond($response, 400);    
    }

    // jika berhasil tersimpan
    return $this->respond($response, 200);
	}

	// hapus data peraturan PPI
	public function hapusPeraturan()
	{
		$id_peraturan = $this->request->getJsonVar('id_peraturan');
		$peraturan_dihapus = $this->model->hapusPeraturan($id_peraturan);
		
		$response = [
      "pesan"       => "Peraturan ppi berhasil dihapus",
      "status_code" => 200
    ];

    // jika gagal tersimpan
    if (!$peraturan_dihapus) {
      $response["pesan"]        = "peraturan gagal dihapus";
      $response["status_code"]  = 400;
      
      return $this->respond($response, 400);    
    }

    // jika berhasil tersimpan
    return $this->respond($response, 200);
	}


	// ---- jadwal PPI ---- //

	// menampilkan data jadwal PPI
	public function jadwalPPI()
	{
		$jadwal = $this->model->getJadwalPPI();

		$response = [
			"status_code" => 200,
			"jadwal_ppi" => $jadwal
		];

		return $this->respond($response, 200);
	}

	// menampilkan data jadwal PPI
	public function ubahJadwalPPI()
	{
		$request = $this->request->getJSON();
		$jadwal = [
			'id_jadwal' => $request->id_jadwal,
			'mulai_pendaftaran' => $request->mulai_pendaftaran,
			'batas_pendaftaran' => $request->batas_pendaftaran,
		];

		$jadwal_diubah = $this->model->ubahJadwalPPI($jadwal);

		$response = [
			"status_code" => 200,
			"pesan" 			=> 'Jadwal berhasil diubah'
		];

		if (!$jadwal_diubah) {
			$response = [
				"status_code" => 400,
				"pesan" 			=> 'Jadwal gagal diubah'
			];
			return $this->respond($response, 400);
		}

		return $this->respond($response, 200);
	}
	// menampilkan data jadwal PPI
	public function ubahBatasSksPPI()
	{
		$request = $this->request->getJSON();
		$batas_sks_matakuliah = [
			'id_batas_sks' => $request->id_batas_sks,
			'matakuliah_maksimal' => $request->matakuliah_maksimal,
			'sks_maksimal' => $request->sks_maksimal,
		];

		$batas_sks_matakuliah_diubah = $this->model->ubahBatasSksPPI($batas_sks_matakuliah);

		$response = [
			"status_code" => 200,
			"pesan" 			=> 'Batas SKS berhasil diubah'
		];

		if (!$batas_sks_matakuliah_diubah) {
			$response = [
				"status_code" => 400,
				"pesan" 			=> 'Batas SKS gagal diubah'
			];
			return $this->respond($response, 400);
		}

		return $this->respond($response, 200);
	}

	public function dataCetakPPI()
	{
		$data_cetak = $this->model->dataCetakPPI();
		
		// get jumlah mahasiswa berdasarkan angkatan
		$allAngkatan = $this->model->getAngkatan();
		$angkatan = [];
		foreach ($allAngkatan as $tahun) {
			$tahun = $tahun['angkatan'];
			$jumlahMahasiswa = $this->model->mahasiswaByAngkatan($tahun);
			$data_angkatan = [
				'tahun' => $tahun,
				'jumlah'	=> $jumlahMahasiswa
			];
			$angkatan [] = $data_angkatan;
		}

		// get jumlah mahasiswa berdasarkan matakuliah
		$allMatakuliah = $this->model->getMatakuliah();
		$JumlahPPIBymatakuliah = [];
		foreach ($allMatakuliah as $matakuliah) {
			$matakuliah = $matakuliah['matakuliah'];
			$jumlahMahasiswa = $this->model->mahasiswaByMatakuliah($matakuliah);
			$data_matakuliah = [
				'matakuliah' => $matakuliah,
				'jumlah'	=> $jumlahMahasiswa
			];
			$JumlahPPIBymatakuliah [] = $data_matakuliah;
		} 

		$response = [
			'status_code' 	=> 200,
			'angkatan' 		=> $angkatan,
			'matakuliah' 	=> $JumlahPPIBymatakuliah
		];

		return $this->respond($response, 200);
	}

	// sks maksimal
	// menampilkan data batas praktikum PPI
	public function praktikumPPI()
	{
		$batas_praktikum = $this->model->getBatasPraktikum();

		$response = [
			"status_code" => 200,
			"batas_praktikum" => $batas_praktikum
		];

		return $this->respond($response, 200);
	}

	// menampilkan data jadwal PPI
	public function ubahBatasPraktikum()
	{
		$request = $this->request->getJSON();
		$praktikum = [
			'id' => 1,
			'batas_praktikum' => $request->batas_praktikum
		];

		$praktikum_diubah = $this->model->ubahBatasPraktikum($praktikum);

		$response = [
			"status_code" => 200,
			"pesan" 			=> 'Batas belanja praktikum berhasil diubah'
		];

		if (!$praktikum_diubah) {
			$response = [
				"status_code" => 400,
				"pesan" 			=> 'Batas belanja praktikum gagal diubah'
			];
			return $this->respond($response, 400);
		}

		return $this->respond($response, 200);
	}
}
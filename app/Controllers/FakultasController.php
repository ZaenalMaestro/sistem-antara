<?php

namespace App\Controllers;

class FakultasController extends BaseController
{	
	// menampilkan halaman dashboard prodi - home
	public function index()
	{
		$data = [
			'activeURL'=> 'home',
			'page'=> 'Fakultas',
			'URL'=> $this->sidebarFakultas
		];
		return view('fakultas/home', $data);
	}

	// menampilkan halaman dashboard prodi - data
	// meanmpilkan matakuliah yang telah dibelanjakan namun belum dikonfirmasi 
	public function data()
	{
		$data = [
			'activeURL'=> 'data',
			'page' => 'Fakultas',
			'URL'=> $this->sidebarFakultas
		];
		return view('fakultas/data', $data);
	}

	// menampilkan halaman dashboard prodi - matakuliah
	// matakuliah ppi yang telah dikonfirmasi prodi
	public function matakuliah()
	{
		$data = [
			'activeURL'=> 'matakuliah',
			'page'=> 'Fakultas',
			'URL'=> $this->sidebarFakultas
		];
		return view('fakultas/matakuliah', $data);
	}

	// menampilkan halaman dashboard prodi -> peraturan
	// untuk menampilkan peraturan yang dibuat oleh prodi
	public function peraturan()
	{
		$data = [
			'activeURL'=> 'peraturan',
			'page'=> 'Fakultas',
			'URL'=> $this->sidebarFakultas
		];
		return view('fakultas/peraturan', $data);
	}

	public function detailMahasiswa()
	{
		$data = [
			'activeURL'=> 'data',
			'page' => 'Fakultas - Data / Detail Mahasiswa PPI',
			'URL'=> $this->sidebarFakultas
		];
		return view('fakultas/detailMahasiswa', $data);
	}	
}
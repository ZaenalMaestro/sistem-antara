<?php

namespace App\Controllers;

class ProdiController extends BaseController
{	
	// menampilkan halaman dashboard prodi - home
	public function index()
	{
		$data = [
			'activeURL'=> 'home',
			'page'=> 'Home',
			'URL'=> $this->sidebarProdi
		];
		return view('prodi/home', $data);
	}

	// menampilkan halaman dashboard prodi - data
	// meanmpilkan matakuliah yang telah dibelanjakan namun belum dikonfirmasi 
	public function data()
	{
		$data = [
			'activeURL'=> 'data',
			'page' => 'Data',
			'URL'=> $this->sidebarProdi
		];
		return view('prodi/data', $data);
	}

	// menampilkan halaman dashboard prodi - matakuliah
	// matakuliah ppi yang telah dikonfirmasi prodi
	public function matakuliah()
	{
		$data = [
			'activeURL'=> 'matakuliah',
			'page'=> 'Matakuliah',
			'URL'=> $this->sidebarProdi
		];
		return view('prodi/matakuliah', $data);
	}

	// menampilkan halaman dashboard prodi -> peraturan
	// untuk menampilkan peraturan yang dibuat oleh prodi
	public function peraturan()
	{
		$data = [
			'activeURL'=> 'peraturan',
			'page'=> 'Peraturan',
			'URL'=> $this->sidebarProdi
		];
		return view('prodi/peraturan', $data);
	}

	public function detailMahasiswa()
	{
		$data = [
			'activeURL'=> 'data',
			'page' => 'Data / Detail Mahasiswa PPI',
			'URL'=> $this->sidebarProdi
		];
		return view('prodi/detailMahasiswa', $data);
	}	
}
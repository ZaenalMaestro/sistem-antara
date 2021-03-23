<?php

namespace App\Controllers;

class ProdiController extends BaseController
{	
	// menampilkan halaman dashboard mahasiswa - home
	public function index()
	{
		$data = [
			'activeURL'=> 'home',
			'page'=> 'Home',
			'URL'=> $this->sidebarMahasiswa
		];
		return view('mahasiswa/home', $data);
	}

	// menampilkan halaman dashboard mahasiswa - data
	// meanmpilkan matakuliah yang telah dibelanjakan namun belum dikonfirmasi 
	public function data()
	{
		$data = [
			'activeURL'=> 'data',
			'page' => 'Data',
			'URL'=> $this->sidebarMahasiswa
		];
		return view('mahasiswa/data', $data);
	}

	// menampilkan halaman dashboard mahasiswa - matakuliah
	// matakuliah ppi yang telah dikonfirmasi prodi
	public function matakuliah()
	{
		$data = [
			'activeURL'=> 'matakuliah',
			'page'=> 'Matakuliah',
			'URL'=> $this->sidebarMahasiswa
		];
		return view('mahasiswa/matakuliah', $data);
	}

	// menampilkan halaman dashboard mahasiswa -> peraturan
	// untuk menampilkan peraturan yang dibuat oleh prodi
	public function peraturan()
	{
		$data = [
			'activeURL'=> 'peraturan',
			'page'=> 'Peraturan',
			'URL'=> $this->sidebarMahasiswa
		];
		return view('mahasiswa/peraturan', $data);
	}

	public function daftarPPI()
	{
		$data = [
			'activeURL'=> 'home',
			'page' => 'Home / Daftar PPI'
		];
		return view('mahasiswa/daftarppi', $data);
	}

	public function editMatakuliah()
	{
		$data = [
			'activeURL'=> 'data',
			'page'=> 'Data / Edit Matakuliah PPI'
		];
		return view('mahasiswa/editmatakuliah', $data);
	}

	
}
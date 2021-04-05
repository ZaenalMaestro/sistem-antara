<?php

namespace App\Controllers;

class BemController extends BaseController
{	
	// menampilkan halaman dashboard mahasiswa - home
	public function index()
	{
		$data = [
			'activeURL'=> 'home',
			'page'=> 'Home',
			'URL'=> $this->sidebarBem
		];
		return view('bem/home', $data);
	}

	// menampilkan halaman dashboard bem - data
	// meanmpilkan matakuliah yang telah dibelanjakan namun belum dikonfirmasi 
	public function data()
	{
		$data = [
			'activeURL'=> 'data',
			'page' => 'Data',
			'URL'=> $this->sidebarBem
		];
		return view('bem/data', $data);
	}

	// menampilkan halaman dashboard bem - matakuliah
	// matakuliah ppi yang telah dikonfirmasi prodi
	public function matakuliah()
	{
		$data = [
			'activeURL'=> 'matakuliah',
			'page'=> 'Matakuliah',
			'URL'=> $this->sidebarBem
		];
		return view('bem/matakuliah', $data);
	}

	// menampilkan halaman dashboard bem -> peraturan
	// untuk menampilkan peraturan yang dibuat oleh prodi
	public function peraturan()
	{
		$data = [
			'activeURL'=> 'peraturan',
			'page'=> 'Peraturan',
			'URL'=> $this->sidebarBem
		];
		return view('bem/peraturan', $data);
	}

	public function detailMahasiswa()
	{
		$data = [
			'activeURL'=> 'data',
			'page' => 'Data / Detail Mahasiswa PPI',
			'URL'=> $this->sidebarBem
		];
		return view('bem/detailMahasiswa', $data);
	}

	public function editMatakuliah()
	{
		$data = [
			'activeURL'=> 'data',
			'page'=> 'Data / Edit Matakuliah PPI',
			'URL'=> $this->sidebarBem
		];
		return view('bem/editmatakuliah', $data);
	}

	public function cetakMatakuliah()
	{
		$data = [
			'activeURL'=> 'data',
			'page'=> 'Data / Cetak Matakuliah PPI',
			'URL'=> $this->sidebarBem
		];
		return view('bem/cetakmatakuliah', $data);
	}

	
}
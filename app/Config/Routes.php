<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// routes dashboard mahasiswa
$routes->get('/mahasiswa', 'MahasiswaController::index');
$routes->get('/mahasiswa/daftarppi', 'MahasiswaController::daftarPPI');
$routes->get('/mahasiswa/editmatakuliah', 'MahasiswaController::editMatakuliah');
$routes->get('/mahasiswa/data', 'MahasiswaController::data');
$routes->get('/mahasiswa/matakuliah', 'MahasiswaController::matakuliah');
$routes->get('/mahasiswa/peraturan', 'MahasiswaController::peraturan');

// routes dashboard BEM
$routes->get('/bem', 'BemController::index');
$routes->get('/bem/detail', 'BemController::detailMahasiswa');
$routes->get('/bem/data', 'BemController::data');
$routes->get('/bem/matakuliah', 'BemController::matakuliah');
$routes->get('/bem/peraturan', 'BemController::peraturan');
$routes->get('/bem/cetak', 'BemController::cetakMatakuliah');

// routes dashboard Prodi
$routes->get('/prodi', 'ProdiController::index');
$routes->get('/prodi/data', 'ProdiController::data');
$routes->get('/prodi/detail', 'ProdiController::detailMahasiswa');
$routes->get('/prodi/matakuliah', 'ProdiController::matakuliah');
$routes->get('/prodi/peraturan', 'ProdiController::peraturan');

// routes dashboard Fakultas
$routes->get('/fakultas', 'FakultasController::index');
$routes->get('/fakultas/data', 'FakultasController::data');
$routes->get('/fakultas/detail', 'FakultasController::detailMahasiswa');
$routes->get('/fakultas/matakuliah', 'FakultasController::matakuliah');
$routes->get('/fakultas/peraturan', 'FakultasController::peraturan');

// routes login 
// $routes->get('/login', 'LoginAPI/LoginController::login');
$routes->get('/login', 'LoginController::login');
$routes->get('/registration', 'LoginController::registration');

// ================ RESTFULL API ================

// routes login API
$routes->post('/api/login', 'API/LoginApiController::login', ['filter' => 'validasi_login']);
$routes->post('/api/registrasi', 'API/LoginApiController::registrasi', ['filter' => 'validasi_user']);

// routes mahasiswa API
$routes->post('/api/mahasiswa', 'API/MahasiswaApiController::belanjaMatakuliah', ['filter' => 'mahasiswa_auth']);
$routes->put('/api/mahasiswa', 'API/MahasiswaApiController::ubahMatakuliah', ['filter' => 'mahasiswa_auth']);
$routes->delete('/api/mahasiswa', 'API/MahasiswaApiController::batalkanMatakuliah', ['filter' => 'mahasiswa_auth']);
$routes->get('/api/mahasiswa/matakuliah', 'API/MahasiswaApiController::matakuliahDikonfirmasi', ['filter' => 'mahasiswa_auth']);
$routes->get('/api/mahasiswa/data', 'API/MahasiswaApiController::matakuliahDiprogramkan', ['filter' => 'mahasiswa_auth']);
$routes->get('/api/mahasiswa/data/edit', 'API/MahasiswaApiController::matakuliahBelumprogramkan', ['filter' => 'mahasiswa_auth']);

// routes BEM API
// route bem - mahasiswa
$routes->get('/api/bem', 'API/BemApiController::jumlahMahasiswaPPI', ['filter' => 'bem_auth']);
$routes->get('/api/bem/mahasiswa', 'API/BemApiController::mahasiswaPPI', ['filter' => 'bem_auth']);
$routes->get('/api/bem/mahasiswa/(:num)', 'API/BemApiController::detaiMahasiswaPPI', ['filter' => 'bem_auth']);
$routes->get('/api/bem/mahasiswa/cetak', 'API/BemApiController::dataCetakPPI', ['filter' => 'bem_auth']);
// route bem - matakuliah
$routes->post('/api/bem/matakuliah', 'API/BemApiController::tambahMatakuliahPPI', ['filter' => 'bem_auth']);
$routes->put('/api/bem/matakuliah', 'API/BemApiController::ubahMatakuliahPPI', ['filter' => 'bem_auth']);
// route bem - peraturan
$routes->get('/api/bem/peraturan', 'API/BemApiController::tampilPeraturan', ['filter' => 'bem_auth']);
$routes->post('/api/bem/peraturan', 'API/BemApiController::tambahPeraturan', ['filter' => 'bem_auth']);
$routes->put('/api/bem/peraturan', 'API/BemApiController::ubahPeraturan', ['filter' => 'bem_auth']);
$routes->delete('/api/bem/peraturan', 'API/BemApiController::hapusPeraturan', ['filter' => 'bem_auth']);
// route bem - peraturan
$routes->get('/api/bem/jadwal', 'API/BemApiController::jadwalPPI', ['filter' => 'bem_auth']);
$routes->put('/api/bem/jadwal', 'API/BemApiController::ubahJadwalPPI', ['filter' => 'bem_auth']);
$routes->put('/api/bem/sks', 'API/BemApiController::ubahBatasSksPPI', ['filter' => 'bem_auth']);


// route Prodi API
$routes->get('/api/prodi', 'API/ProdiApiController::jumlahMahasiswaPPI', ['filter' => 'prodi_auth']);
$routes->get('/api/prodi/mahasiswa', 'API/ProdiApiController::mahasiswaPPI', ['filter' => 'prodi_auth']);
$routes->put('/api/prodi/mahasiswa', 'API/ProdiApiController::ubahStatusMahasiswa', ['filter' => 'prodi_auth']);
$routes->get('/api/prodi/mahasiswa/(:num)', 'API/ProdiApiController::detaiMahasiswaPPI', ['filter' => 'prodi_auth']);
$routes->get('/api/prodi/peraturan', 'API/ProdiApiController::tampilPeraturan', ['filter' => 'prodi_auth']);


// route Fakultas API
$routes->get('/api/fakultas', 'API/FakultasApiController::jumlahMahasiswaPPI', ['filter' => 'fakultas_auth']);
$routes->get('/api/fakultas/mahasiswa', 'API/FakultasApiController::mahasiswaPPI', ['filter' => 'fakultas_auth']);
$routes->put('/api/fakultas/mahasiswa', 'API/FakultasApiController::ubahStatusMahasiswa', ['filter' => 'fakultas_auth']);
$routes->get('/api/fakultas/mahasiswa/(:num)', 'API/FakultasApiController::detaiMahasiswaPPI', ['filter' => 'fakultas_auth']);
$routes->get('/api/fakultas/peraturan', 'API/FakultasApiController::tampilPeraturan', ['filter' => 'fakultas_auth']);
$routes->get('/api/fakultas/biaya', 'API/FakultasApiController::getBiaya', ['filter' => 'fakultas_auth']);
$routes->put('/api/fakultas/biaya', 'API/FakultasApiController::updateBiaya', ['filter' => 'fakultas_auth']);


// route peraturan dan mataukuliah PPI API
$routes->get('/api/ppi/matakuliah', 'API/PPIApiController::matakuliahPPI');
$routes->get('/api/ppi/peraturan', 'API/PPIApiController::peraturanPPI');
$routes->get('/api/ppi/jadwal', 'API/PPIApiController::jadwalPPI');
$routes->get('/api/ppi/sks', 'API/PPIApiController::batasMatakuliahPPI');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

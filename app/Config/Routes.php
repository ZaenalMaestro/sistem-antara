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

// routes dashboard Prodi
$routes->get('/prodi', 'ProdiController::index');
$routes->get('/prodi/data', 'ProdiController::data');
$routes->get('/prodi/detail', 'ProdiController::detailMahasiswa');
$routes->get('/prodi/matakuliah', 'ProdiController::matakuliah');
$routes->get('/prodi/peraturan', 'ProdiController::peraturan');

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
$routes->get('/api/mahasiswa/matakuliah', 'API/MahasiswaApiController::matakuliahDikonfirmasi', ['filter' => 'mahasiswa_auth']);
$routes->get('/api/mahasiswa/data', 'API/MahasiswaApiController::matakuliahDiprogramkan', ['filter' => 'mahasiswa_auth']);


// route peraturan dan mataukuliah PPI API
$routes->get('/api/ppi/matakuliah', 'API/PPIApiController::matakuliahPPI');
$routes->get('/api/ppi/peraturan', 'API/PPIApiController::peraturanPPI');


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

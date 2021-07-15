<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->group('auth', function ($routes) {
	// Auth Admin
	$routes->get('admin', 'Auth::login');
	$routes->post('admin', 'Auth::accessLogin');

	// Auth Guru
	$routes->get('guru', 'Auth::loginGuru');
	$routes->post('guru', 'Auth::loginGuruAccess');

	// Siswa
	$routes->get('siswa', 'Auth::loginSiswa');
	$routes->post('siswa', 'Auth::loginSiswaAccess');
});

$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::ActionRegister');
$routes->get('logout', 'Auth::logout');
$routes->get('verification', 'Auth::verification');
$routes->get('reset', 'Auth::resetPassword');
$routes->get('forgot', 'Auth::forgot');
$routes->post('forgot', 'Auth::forgotAccess');
$routes->get('change', 'Auth::changePassword');
$routes->post('change', 'Auth::changePasswordAccess');

$routes->get('email', function () {
	return view('auth/email_activation', ['title' => 'Title', 'url' => 'Url', 'name' => 'Name']);
});

$routes->group('', ['filter' => 'auth'], function ($routes) {
	$routes->get('/', 'HomeController::index');

	$routes->group('guru', function ($routes) {
		$routes->get('', 'GuruController::index');
		$routes->post('', 'GuruController::create');
		$routes->put('(:any)', 'GuruController::update/$1');
		$routes->get('(:any)', 'GuruController::delete/$1');
	});

	$routes->group('siswa', function ($routes) {
		$routes->get('', 'SiswaController::index');
		$routes->post('', 'SiswaController::create');
		$routes->put('(:any)', 'SiswaController::update/$1');
		$routes->get('(:any)', 'SiswaController::delete/$1');
	});

	$routes->group('kelas', function ($routes) {
		$routes->get('', 'KelasController::index');
		$routes->post('', 'KelasController::create');
		$routes->put('(:any)', 'KelasController::update/$1');
		$routes->get('(:any)', 'KelasController::delete/$1');
	});

	$routes->group('mapel', function ($routes) {
		$routes->get('', 'MapelController::index');
		$routes->post('', 'MapelController::create');
		$routes->put('(:any)', 'MapelController::update/$1');
		$routes->get('(:any)', 'MapelController::delete/$1');
	});

	$routes->group('ujian', function ($routes) {
		$routes->get('', 'UjianController::index');
		$routes->post('', 'UjianController::create');
		$routes->get('detail/(:any)', 'UjianController::detail/$1');
		$routes->get('edit/(:any)', 'UjianController::edit/$1');
		$routes->get('delete/(:any)', 'UjianController::delete/$1');
		$routes->put('(:any)', 'UjianController::update/$1');
	});

	$routes->group('soal', function ($routes) {
		$routes->get('get/(:any)', 'SoalController::index/$1');
		$routes->post('', 'SoalController::create');
		$routes->put('(:any)', 'SoalController::update/$1');
		$routes->get('delete/(:any)', 'SoalController::delete/$1');
		$routes->get('edit/(:any)', 'SoalController::edit/$1');
	});

	$routes->group('jadwal', function ($routes) {
		$routes->get('', 'JadwalUjianController::index');
		$routes->get('pdf', 'JadwalUjianController::doc_ujian');
		$routes->get('finish', 'JadwalUjianController::finish');
		$routes->get('start/(:any)', 'JadwalUjianController::start/$1');
		$routes->get('get/(:any)', 'JadwalUjianController::get/$1');
		$routes->put('soal/update/(:any)', 'JadwalUjianController::soalUpdate/$1');
	});

	$routes->get('profile', 'HomeController::profile');
	$routes->post('profile/admin', 'HomeController::profileAdmin');
	$routes->put('passwordAdmin', 'HomeController::passwordAdmin');

	$routes->post('profile/guru', 'HomeController::profileGuru');
	$routes->put('passwordGuru', 'HomeController::passwordGuru');

	$routes->post('profile/siswa', 'HomeController::profileSiswa');
	$routes->put('passwordSiswa', 'HomeController::passwordSiswa');
});


// $routes->group('api', function ($routes) {
// 	$routes->resource('admin', ['controller' => 'Api\AdminAPIController']);
// });





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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

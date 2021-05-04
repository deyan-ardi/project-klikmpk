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
$routes->setDefaultController('Home');
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


$routes->group('', function ($routes) {
	$routes->get('/', 'Home::index');
	$routes->post('/', 'Home::index');
	$routes->get('/informasi-website', 'Home::informasi_website');
	$routes->get('/masuk-kelas/(:num)', 'Home::daftar_kelas/$1');
	$routes->get('/hapus-kelas/(:num)', 'Home::hapus_kelas/$1');
	$routes->get('/hapus-seluruh-mahasiswa/(:num)', 'Home::hapus_all/$1');
	$routes->get('/hapus-mahasiswa/(:num)/(:num)', 'Home::hapus_mahasiswa/$1/$2');
	$routes->post('/masuk-kelas/(:num)', 'Home::daftar_kelas/$1');
	$routes->get('/pengaturan-profil', 'Home::pengaturan_profil');
	$routes->post('/pengaturan-profil', 'Home::pengaturan_profil');
	$routes->get('/hapus-kegiatan-uts/(:num)/(:num)', 'Home::hapus_kegiatan_uts/$1/$2');
	$routes->get('/hapus-kegiatan-tugas/(:num)/(:num)', 'Home::hapus_kegiatan_tugas/$1/$2');
	$routes->get('/hapus-kegiatan-uas/(:num)/(:num)', 'Home::hapus_kegiatan_uas/$1/$2');
	$routes->get('/hapus-nilai-uts/(:num)/(:num)', 'Home::hapus_nilai_uts/$1/$2');
	$routes->get('/hapus-nilai-uas/(:num)/(:num)', 'Home::hapus_nilai_uas/$1/$2');
	$routes->get('/hapus-nilai-tugas/(:num)/(:num)', 'Home::hapus_nilai_tugas/$1/$2');
	$routes->get('/hapus-seluruh-nilai-uts/(:num)', 'Home::hapus_seluruh_nilai_uts/$1');
	$routes->get('/hapus-seluruh-nilai-uas/(:num)', 'Home::hapus_seluruh_nilai_uas/$1');
	$routes->get('/hapus-seluruh-nilai-sikap-partisipasi/(:num)', 'Home::hapus_seluruh_nilai_sikap_partisipasi/$1');
	$routes->get('/hapus-seluruh-nilai-tugas/(:num)', 'Home::hapus_seluruh_nilai_tugas/$1');
	$routes->get('/hapus-nilai-sikap-partisipasi/(:num)/(:num)', 'Home::hapus_nilai_sikap_partisipasi/$1/$2');
	$routes->get('/export-excel/(:num)', 'Home::export_excel/$1');
	$routes->get('/berhenti-membagikan/(:num)', 'Home::berhenti_membagikan/$1');
});
$routes->group('b', function ($routes) {
	$routes->get('(:any)', 'Bagikan::index/$1');
});
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
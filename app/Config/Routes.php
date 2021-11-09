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
$routes->set404Override(function () {
	echo view('errors/production');
});
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');


// back
// $routes->get('/', 'User::back');


// admin route
// NEW
$routes->get('/', 'User::landingpage');
$routes->get('/landingpage', 'User::landingpage');
$routes->get('/pengumuman-list', 'User::pengumumanList');
$routes->get('/redirect', 'User::redirect');
$routes->get('/landingpage', 'User::landingpage');
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/dashboard', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/surat_masuk', 'Admin::suratMasuk', ['filter' => 'role:admin']);
$routes->get('/admin/surat_keluar', 'Admin::suratKeluar', ['filter' => 'role:admin']);
$routes->get('/admin/all_user', 'Admin::allUsers', ['filter' => 'role:admin']);
$routes->post('/admin/edit-user', 'Admin::attemptUser', ['filter' => 'role:admin']);
$routes->post('/admin/add-user', 'Admin::attemptUser', ['filter' => 'role:admin']);
$routes->delete('/admin/delete-user', 'Admin::attemptUser', ['filter' => 'role:admin']);
$routes->post('/admin/add-surat', 'Admin::attemptSurat', ['filter' => 'role:admin']);
$routes->post('/admin/edit-surat', 'Admin::attemptSurat', ['filter' => 'role:admin']);
$routes->delete('/admin/delete-surat', 'Admin::attemptSurat', ['filter' => 'role:admin']);
$routes->get('/admin/export-warga', 'Admin::exportWarga', ['filter' => 'role:admin']);
$routes->post('/admin/export-surat', 'Admin::exportSurat', ['filter' => 'role:admin']);
$routes->get('/admin/pengumuman', 'Admin::pengumuman', ['filter' => 'role:admin']);
$routes->post('/admin/add-pengumuman', 'Admin::attemptPengumuman', ['filter' => 'role:admin']);
$routes->post('/admin/edit-pengumuman', 'Admin::attemptPengumuman', ['filter' => 'role:admin']);
$routes->delete('/admin/delete-pengumuman', 'Admin::attemptPengumuman', ['filter' => 'role:admin']);
$routes->get('/user/user_guide', 'User::user_guide', ['filter' => 'role:admin']);



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
<?php namespace Config;

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
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//Route Disposisi
$routes->get('/suratmasuk/htmlToPDF/(:segment)', 'SuratMasuk::htmlToPDF/$1');
$routes->get('/dispo/(:segment)', 'SuratMasuk::detail_disposisi/$1');
$routes->get('/tambahdispo/(:segment)', 'SuratMasuk::form_disposisi/$1');

//Route Surat Masuk
$routes->get('/suratmasuk', 'SuratMasuk::suratmasuk');
$routes->get('/tambah_sm', 'SuratMasuk::create');
$routes->get('/suratmasukdetail/(:segment)', 'SuratMasuk::detail/$1');
$routes->get('/suratmasuk/edit/(:segment)', 'SuratMasuk::edit/$1');

//Route Surat Keluar
$routes->get('/suratkeluar', 'SuratKeluar::suratkeluar');
$routes->get('/tambah_sk', 'SuratKeluar::create');
$routes->get('/suratkeluardetail/(:segment)', 'SuratKeluar::detail/$1');
$routes->get('/suratkeluar/edit/(:segment)', 'SuratKeluar::edit/$1');

//Route Laporan
$routes->get('/laporansm', 'Home::laporansm');
$routes->get('/laporansk', 'SuratKeluar::laporansk');

/**
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

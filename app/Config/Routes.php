<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// use App\Controllers\News;
// use App\Controllers\Pages;
// use App\Controllers\AsistenController;
// use App\Controllers\Login;
/*
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
// $routes->match(['get', 'post'], 'login/check', [Login::class, 'check']);
// $routes->get('login/home', [Login::class, 'home']);
// $routes->get('login/logout', [Login::class, 'logout']);
//Untuk mencari jalan sendiri ke database secara otomatis
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'todolist::index');

// $routes->get('ktp', 'ktp::index');

// $routes->get('/', 'asisten::index');

// $routes->get('/', 'pesanController::index');

// $route['user'] = 'user/index';
// $route['user/save'] = 'user/save';
// $route['user/view/(:num)'] = 'user/view/$1';
// $routes->match(['get', 'post'], 'news/create', [News::class, 'create']);
// $routes->get('news/(:segment)', [News::class, 'view']);
// $routes->get('news', [News::class, 'index']);
// $routes->get('pages', [Pages::class, 'index']);
// $routes->get('(:segment)', [Pages::class, 'view']);

// $route['default_controller'] = 'pesancontroller';
// $routes->get('/asisten', 'AsistenController::index');
// $routes->match(['get', 'post'], 'asisten/simpan', 'AsistenController::simpan');

// $route['default_controller'] = 'Home';
use App\Controllers\Asisten;

$routes->get('/asisten', 'Asisten::index');
$routes->match(['get', 'post'], 'asisten/update', [Asisten::class, 'update']);
$routes->match(['get', 'post'], 'asisten/search', [Asisten::class, 'search']);
$routes->match(['get', 'post'], 'asisten/delete', [Asisten::class, 'delete']);
$routes->match(['get', 'post'], 'asisten/login', [Asisten::class, 'login']);
$routes->match(['get', 'post'], 'asisten/check', [Asisten::class, 'check']);
$routes->match(['get', 'post'], 'asisten/logout', [Asisten::class, 'logout']);
// $routes->match(['get', 'post'], 'asisten/gagallogin', [Asisten::class, 'gagallogin']);


// $routes->match(['get', 'post'], 'asisten/logout', [Asisten::class, 'logout']);
// $routes->get('asisten/update/(:segment)', 'AsistenController::update/$1');
// $routes->post('asisten/update/(:segment)', 'AsistenController::update/$1');
// $routes->get('/asisten', 'AsistenController::index');
// $routes->match(['get', 'post'], 'asisten/simpan', 'AsistenController::simpan');
// $routes->get('asisten/update/(:segment)', 'AsistenController::update/$1');
// $routes->post('asisten/update/(:segment)', 'AsistenController::update/$1');
// $route['default_controller'] = 'Home';
// $routes->get('asisten/update/(:segment)', 'AsistenController::update/$1');
// $routes->post('asisten/update/(:segment)', 'AsistenController::update/$1');
// $routes->get('asisten/hapus/(:any)', 'AsistenController::hapus/$1');

// $routes->get('login', 'Login::index');
// $routes->post('/asisten/simpan', 'AsistenController::simpan');
// $routes->match(['get', 'post'], 'login/check', [Login::class, 'check']);
// $routes->get('login/home', [Login::class, 'home']);
// $routes->get('login/logout', [Login::class, 'logout']);



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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

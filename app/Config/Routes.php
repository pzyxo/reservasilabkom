<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// guest
$routes->get('/', 'Home::index');
$routes->get('/explore', 'Home::explore');
$routes->get('/explore/jadwal', 'Home::jadwal');
$routes->get('/about', 'Home::about');
$routes->get('/signin', 'Home::login', ["filter" => "authed"]);
$routes->get('/register', 'Home::register', ["filter" => "authed"]);
$routes->post('/check', 'Users::auth');
$routes->post('/users/register', 'Users::register');

// admin
$routes->group('', ['filter' => 'admin'], function ($routes) {
    $routes->post('/admin', 'Admin::index');
    $routes->get('/admin/users', 'Admin::users');
    $routes->get('/admin/reservation', 'Admin::reservation');
    $routes->get('/admin/reservation/accept/(:segment)', 'Admin::acceptReservation/$1');
    $routes->get('/admin/reservation/cancel/(:segment)', 'Admin::cancelReservation/$1');
    $routes->get('/admin/reservation/finish/(:segment)', 'Admin::finishReservation/$1');
    $routes->get('/admin/reservation/(:segment)', 'Admin::detailReservasi/$1');
    $routes->get('/admin/data', 'Admin::getdata');
    $routes->get('/admin/users/accept/(:segment)', 'Admin::acceptUsers/$1');
    $routes->get('/admin/users/(:segment)', 'Admin::detail/$1');
});
// member
$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/profile', 'Account::index');
    $routes->get('/users/form/(:segment)', 'Account::edit/$1');
    $routes->get('/users/reservation/(:segment)', 'Account::history/$1');
    $routes->put('/users/update/(:segment)', 'Account::update/$1');
    $routes->post('/users/reserve/', 'Account::reservation');
    $routes->get('/signout', 'Account::logout');
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

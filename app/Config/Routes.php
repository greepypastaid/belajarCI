<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/user', 'Admin\User::index');
$routes->get('/user', 'Admin\User::index');
$routes->get('/', 'Pages::index');
$routes->get('/about', 'Pages::about');
$routes->get('/contact', 'Pages::contact');
$routes->get('/komik', 'komik::index');

// pakai segment biar nanti bisa pakai link dinamis untuk detail
$routes->get('komik/(:segment)','komik::detail/$1');


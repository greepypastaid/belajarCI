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
$routes->get('/komik/create', 'komik::create');
$routes->post('/komik/save', 'komik::save');
$routes->post('/komik/delete/(:num)', 'komik::delete/$1');
$routes->get('/komik/edit/(:segment)', 'komik::edit/$1');
$routes->post('/komik/update/(:num)', 'komik::update/$1');

// pakai segment biar nanti bisa pakai link dinamis untuk detail
$routes->get('komik/(:segment)','komik::detail/$1');


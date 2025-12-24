<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Coba::index');
$routes->get('coba/(:any)/(:num)', 'Coba::contact/$1/$2');
$routes->get('/user', 'Admin\User::index');

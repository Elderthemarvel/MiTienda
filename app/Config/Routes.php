<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::dashboard');
$routes->get('/login', 'Auth::login');
$routes->get('/new_producto', 'Auth::new_producto');
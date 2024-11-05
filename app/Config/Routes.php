<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::dashboard');
$routes->get('/login', 'Auth::login');
$routes->get('/nuevo_producto', 'Home::nuevo_producto');
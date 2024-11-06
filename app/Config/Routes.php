<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::dashboard');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/nuevo_producto', 'Home::nuevo_producto');
$routes->get('/usuario', 'UsuarioController::verusuarios');
$routes->get('/nuevo_user', 'UsuarioController::nuevousuario');
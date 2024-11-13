<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'Home::dashboard');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/usuario', 'UsuarioController::verusuarios');
$routes->get('/nuevo_user', 'UsuarioController::nuevousuario');

$routes->get('/productos', 'ProductosController::productos');
$routes->get('/nuevo_producto', 'ProductosController::nuevo_producto');
$routes->post('/guardar_producto', 'ProductosController::guardar_producto');

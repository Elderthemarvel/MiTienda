<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('/home', 'Home::dashboard');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/usuario', 'UsuarioController::verusuarios');
$routes->get('/nuevo_user', 'UsuarioController::nuevousuario');
$routes->post('/guardar_usuario', 'UsuarioController::registrousuario');
$routes->get('/eliminar_user/(:num)','UsuarioController::marcaeEliminado/$1');
$routes->get('/modificar_usuario/(:num)', 'UsuarioController::formulariomodificar/$1');
$routes->post('/modificar_usuario/(:num)', 'UsuarioController::modificarusuario/$1');

$routes->get('tipos','TiposController::vertipos');

$routes->get('/productos', 'ProductosController::productos');
$routes->get('/nuevo_producto', 'ProductosController::nuevo_producto');
$routes->post('/guardar_producto', 'ProductosController::guardar_producto');

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
$routes->post('/guardar_usuario', 'UsuarioController::registrousuario');
$routes->get('/eliminar_user/(:num)','UsuarioController::marcaeEliminado/$1');

$routes->get('/modificar_usuario/(:num)', 'UsuarioController::formulariomodificar/$1');
$routes->post('/modificar_usuario/(:num)', 'UsuarioController::modificarusuario/$1');

$routes->get('administrador/productos', 'ProductosController::verproductos');
/*
$routes->get('productos', 'ProductosController::productos');
$routes->get('/productos', 'ProductosController::productos');
$routes->get('/productos/create', 'ProductosController::create');
$routes->post('/productos/create', 'ProductosController::create');
$routes->get('/productos/edit/(:num)', 'ProductosController::edit/$1');
$routes->post('/productos/update/(:num)', 'ProductosController::update/$1');
$routes->get('/productos/delete/(:num)', 'ProductosController::delete/$1');
*/
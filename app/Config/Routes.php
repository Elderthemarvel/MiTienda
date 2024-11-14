<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->get('/home', 'Home::dashboard');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->get('/generar', 'VentasController::index');
$routes->get('/nit', 'VentasController::get_nit');
$routes->get('/productos/listar', 'VentasController::productos');
$routes->get('/metodos/listar', 'VentasController::metodos');
$routes->post('/guardar_venta', 'VentasController::guardar_venta');
$routes->get('/ventas/stock', 'VentasController::stock');




$routes->get('/usuario', 'UsuarioController::verusuarios');
$routes->get('/nuevo_user', 'UsuarioController::nuevousuario');
$routes->post('/guardar_usuario', 'UsuarioController::registrousuario');
$routes->get('/eliminar_user/(:num)','UsuarioController::marcaeEliminado/$1');
$routes->get('/modificar_usuario/(:num)', 'UsuarioController::formulariomodificar/$1');
$routes->post('/modificar_usuario/(:num)', 'UsuarioController::modificarusuario/$1');

$routes->get('/modificar_pass/(:num)', 'UsuarioController::formmodificarpass/$1');
$routes->post('/mod_pass/(:num)', 'UsuarioController::modificarpass/$1');

$routes->get('/tipos','TiposController::vertipos');

$routes->get('/productos', 'ProductosController::productos');
$routes->get('/nuevo_producto', 'ProductosController::nuevo_producto');
$routes->post('/guardar_producto', 'ProductosController::guardar_producto');
$routes->get('/productos/edit/(:num)', 'ProductosController::productos_edit/$1');
$routes->post('/productos/update/(:num)', 'ProductosController::productos_update/$1');
$routes->get('/productos/confirm-delete/(:num)', 'ProductosController::productos_confirmDelete/$1');
$routes->post('/productos/delete/(:num)', 'ProductosController::productos_delete/$1');

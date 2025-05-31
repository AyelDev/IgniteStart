<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('/login', 'LoginAuth::authenticate');

$routes->get('/user','UserController::getstudents');

$routes->get('/register', 'UserRegister::index');

$routes->post('/register', 'UserRegister::register');
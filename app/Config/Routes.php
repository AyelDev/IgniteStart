<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('/login', 'LoginAuth::authenticate');

// $routes->get('/user','UserController::getstudents');

// $routes->post('user/register', 'UserRegister::register');

$routes->get('user/register', 'User::index');   

$routes->post('user/register', 'User::register');

$routes->get('user/dashboard', 'User::dashboard', ['filter' => 'authGuard']);


